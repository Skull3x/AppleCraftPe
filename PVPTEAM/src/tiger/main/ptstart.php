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
	
    private $players = array();	

    public function onEnable(){
        $this->getLogger()->info("pvpteam starting");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function TRED(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::RED . $player->getDisplayName();
	$player->setNameTag($displayrank);
    }
    
    public function TBLUE(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::BLUE . $player->getDisplayName();
	$player->setNameTag($displayrank);
    }
    
    public function TGREEN(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::GREEN . $player->getDisplayName();
	$player->setNameTag($displayrank);
    }
    
    public function TYEELOW(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::YEELOW . $player->getDisplayName();
	$player->setNameTag($displayrank);
    }
    
    public function onJoin(PlayerJoinEvent $event){
	$player = $event->getPlayer();
	$this->teamrend($player);
    }
    
    public function teamrend(){
    	return rand($TRED[0], $TBLUE[0], $TGREEN[0], $TYEELOW[0]);
    }
    
    public function onDisable(){
        $this->getLogger()->info("pvpteam stoping");
    }
    
}
