<?php

namespace tiger\main;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

class MyPlugin extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("pvpteam starting");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
    }
    
    public function onDisable(){
        $this->getLogger()->info("pvpteam stoping");
    }
    
}
