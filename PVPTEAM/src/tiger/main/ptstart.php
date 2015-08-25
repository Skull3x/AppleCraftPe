<?php

namespace tiger\main;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\block\Block;
use pocketmine\event\block\BlockUpdateEvent;
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
use pocketmine\event\block\BlockBreakEvent;
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
    
   //ป้องกัน Drop ของ
   public function onDropItem(PlayerDropItemEvent $event){
	$event->setCancelled();
    }
    
    //สีแดง
    public function TRED(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::RED . $player->getDisplayName();
	$player->setNameTag($display);
	$poss = (new Position(128, 10, 128, $this->getServer()->getDefaultLevel()));
    }
    
    //สีน้ำเงิน
    public function TBLUE(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::BLUE . $player->getDisplayName();
	$player->setNameTag($display);
	$poss = (new Position(128, 10, 128, $this->getServer()->getDefaultLevel()));
    }
    
    //สีเขียว
    public function TGREEN(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::GREEN . $player->getDisplayName();
	$player->setNameTag($display);
	$poss = (new Position(128, 10, 128, $this->getServer()->getDefaultLevel()));
    }
    
    //สีเหลือง
    public function TYEELOW(Player $player){
    	$this->players[$player->getName()] = $player->getName();
    	$display = TextFormat::YEELOW . $player->getDisplayName();
	$player->setNameTag($display);
	$poss = (new Position(128, 10, 128, $this->getServer()->getDefaultLevel()));
    }
    
    //ตอนตีกันโดยจะห้ามตีทีมเดียวกันจะให้ตีทีมอื่นเท่านั้น
    public function onPlayerHurt(EntityDamageEvent $event) {
       if ($event instanceof EntityDamageByEntityEvent) {
            if ($event->getEntity() instanceof Player && $event->getDamager() instanceof Player) {
                if ( isset($this->TRED()[$event->getEntity()->getName()]) && isset($this->TRED()[$event->getDamager()->getName()])) {
                     $event->setCancelled(true);
                }
                else
                if( isset($this->TBLUE()[$event->getEntity()->getName()]) && isset($this->TBLUE()[$event->getDamager()->getName()])) {
                    $event->setCancelled(true);
                }
                else
                if( isset($this->TGREEN()[$event->getEntity()->getName()]) && isset($this->TGREEN()[$event->getDamager()->getName()])) {
                    $event->setCancelled(true);
                }
                else
                if( isset($this->TYEELOW()[$event->getEntity()->getName()]) && isset($this->TYEELOW()[$event->getDamager()->getName()])) {
                    $event->setCancelled(true);
                }
            }
        }
    }
    
    //ตอนเข้าเซิฟจะ set สีของชื่อ
    public function onJoin(PlayerJoinEvent $event){
	$player = $event->getPlayer();
	$this->teamrend($player);
    }
    
    //ตอนเกิดใหม่
    public function onRespawn(PlayerRespawnEvent $event){
       if ($event instanceof PlayerRespawnEvent) {
            if ($event->getPlayer() instanceof Player) {
                if ( isset($this->TRED()[$event->getPlayer()->getName()]) && isset($this->TRED())) {
                    $event->setRespawnPosition($this->TRED()->poss());
                }
                else
                if( isset($this->TBLUE()[$event->getPlayer()->getName()]) && isset($this->TBLUE())) {
                    $event->setRespawnPosition(this->TBLUE()->poss());
                }
                else
                if( isset($this->TGREEN()[$event->getPlayer()->getName()]) && isset($this->TGREEN())) {
                    $event->setRespawnPosition(this->TGREEN()->poss());
                }
                else
                if( isset($this->TYEELOW()[$event->getPlayer()->getName()]) && isset($this->TYEELOW())) {
                    $event->setRespawnPosition(this->TYEELOW()->poss());
                }
        }
    }
    
    //ตอนออกเซิฟ
    public function onQuitEvent(PlayerQuitEvent $event){
	$player = $event->getPlayer();
	if($player->onJoinEvent and isset($this->players[$player->getName()])){
		unset($this->players[$player->getName()]);
	}
    }
	
    //สุ่มทีม
    public function teamrend(){
    	return rand($this->TRED([0]), $this->TBLUE([0]), $this->TGREEN([0]), $this->TYEELOW([0]));
    }
    
    public function onBlockBreakEvent(BlockBreakEvent $event){
    	$player = $event->getPlayer();
    	if($player->isSurvival() and isset($this->players[$player->getName()])){
		$event->setCancelled(true);
	}
    }
    
    //ป้องกันบล็อก update
    public function onBlockUpdate(BlockUpdateEvent $event){
    	$id = $$event->getgetBlock()->getId();
                if($id === 8) {
                	$event->setCancelled(true);
                }
                if($id === 9) {
                	$event->setCancelled(true);
                }
                if($id=== 10) {
                	$event->setCancelled(true);
                }				
                if($id === 11) {
                	$event->setCancelled(true);
		}
    }
    
    public function onDisable(){
        $this->getLogger()->info("pvpteam stoping");
    }
    
}
