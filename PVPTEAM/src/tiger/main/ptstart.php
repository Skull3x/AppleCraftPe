<?php

namespace tiger\main;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\scheduler\AsyncTask;
use pocketmine\utils\TextFormat;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\item\Item;

class MyPlugin extends PluginBase{
	
	const TEAM_RED = 0;
	const TEAM_BLUE = 1;
	const TEAM_BLUE = 2;
	const TEAM_BLUE = 3;

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
