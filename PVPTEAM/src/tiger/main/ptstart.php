<?php

namespace tiger\main;

use pocketmine\plugin\PluginBase;

class MyPlugin extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info("pvpteam starting");
    }

    public function onDisable(){
        $this->getLogger()->info("pvpteam stoping");
    }
}
