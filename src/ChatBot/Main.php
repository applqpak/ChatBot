<?php

  namespace ChatBot;

  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\event\PlayerChatEvent;
  use pocketmine\utils\Config;
  use pocketmine\utils\TextFormat as TF;

  class Main extends PluginBase implements Listener
  {

    // Create PREFIX constant

    const PREFIX = TF::RED . "[" . TF::AQUA . "ChatBot" . TF::RED . "] " . TF::RESET;

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

      return $this->server()->getLogger();

    }

    public function pluginManager()
    {

      return $this->server()->getPluginManager();

    }

    // OK, this plugin was enabled!

    public function onEnable()
    {

      @mkdir($this->dataPath());

      $this->cfg = new Config($this->dataPath() . "config.yml", Config::YAML, array("messages" => array("hello" => "Hello, %p!")));

      $this->server()->logger()->info(PREFIX . "Enabled.");

    }

    // OK, this plugin was disabled, make sure to save the Config!

    public function onDisable()
    {

      $this->cfg->save();

      $this->server()->logger()->info(PREFIX . "Disabled. Saved Config.");

    }

    // OK, this function is called Everytime a player chats.

    public function onChat(PlayerChatEvent $event)
    {

    }

  }

?>
