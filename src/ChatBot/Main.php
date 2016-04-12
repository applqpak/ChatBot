<?php

  namespace ChatBot;

  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\event\player\PlayerChatEvent;
  use pocketmine\utils\Config;
  use pocketmine\utils\TextFormat as TF;

  class Main extends PluginBase implements Listener
  {

    // Our own functions

    public function dataPath()
    {

      return $this->getDataFolder();

    }

    public function server()
    {

      return $this->getServer();

    }

    public function logger()
    {

      return $this->getLogger();

    }

    public function pluginManager()
    {

      return $this->server()->getPluginManager();

    }

    // OK, this plugin was enabled!

    public function onEnable()
    {

      $this->getServer()->getPluginManager()->registerEvents($this, $this);

      @mkdir($this->dataPath());

      $this->cfg = new Config($this->dataPath() . "config.yml", Config::YAML, array("messages" => array("hello" => "Hello, %p!")));

      $this->logger()->info("[ChatBot] Enabled.");

    }

    // OK, this plugin was disabled, make sure to save the Config!

    public function onDisable()
    {

      $this->cfg->save();

      $this->logger()->info("[ChatBot] Disabled. Saved Config.");

    }

    // OK, this function is called Everytime a player chats.

    public function onChat(PlayerChatEvent $event)
    {

      $player = $event->getPlayer();

      $player_name = $player->getName();

      $player_message = $event->getMessage();

      $messages = $this->cfg->get("messages");

      foreach($messages as $message => $reply)
      {

        // Check if the message the player sent is equal to a message in the Config, if so, reply with the corresponding message

        if(strtolower($player_message) === $message)
        {

          $player->sendMessage(str_replace(array("%p", "{player}"), array($player_name, $player_name), $messages[$message]));

        }

      }

    }

  }

?>
