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

    public function onEnable(){
        $this->getLogger()->info("pvpteam starting");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function TRED(PlayerJoinEvent $event){
    	
    }
    
    public function TBLUE(Player $event){
    	
    }
    
    public function TGREEN(Player $event){
    	
    }
    
    public function TYEELOW(Player $event){
    	
    }
    
    public function onJoin(PlayerJoinEvent $event){
		$player = $event->getPlayer();
		team = rand($TRED[0], $TBLUE[0], $TGREEN[0], $TYEELOW[0]);
    }
    
    public function onDisable(){
        $this->getLogger()->info("pvpteam stoping");
    }
    
}
