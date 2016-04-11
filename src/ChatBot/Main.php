<?php

  namespace ChatBot;

  use pocketmine\plugin\PluginBase;
  use pocketmine\event\Listener;
  use pocketmine\event\PlayerChatEvent;
  use pocketmine\utils\Config;
  use pocketmine\utils\TextFormat as TF;

  class Main extends PluginBase implements Listener
  {

    public function dataPath()
    {

      return $this->getDataFolder();

    }

  }

?>
