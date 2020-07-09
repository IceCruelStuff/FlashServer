<?php

declare(strict_types=1);

namespace DavidFlash\LobbyCore;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;

class Main extends PluginBase {

	public function onEnable() { 
		$this->getLogger()->info("Plugin Loaded!");
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool {
		if($command->getName() == "hub") {
			if(!$sender instanceof Player){
				$sender->sendMessage("§cThis works only in-game");
				return true;
			}
			$sender->sendMessage($this->getConfig()->get("message"));
			$sender->teleport($this->getServer()->getLevelByName($this->getConfig()->get("world"))->getSafeSpawn());
			$sender->setGamemode($this->getConfig()->get("gamemode"));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SLOWNESS), 20, 2, false));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::BLINDNESS), 20, 2, false));
			$sender->addTitle($this->getConfig()->get("title"));
			$sender->addSubTitle($this->getConfig()->get("subtitle"));

		
		return true;
	}elseif($command->getName() == "lobby") {
		if(!$sender instanceof Player){
			$sender->sendMessage("§cThis works only in-game");
			return true;
		}
			$sender->sendMessage($this->getConfig()->get("message"));
			$sender->teleport($this->getServer()->getLevelByName($this->getConfig()->get("world"))->getSafeSpawn());
			$sender->setGamemode($this->getConfig()->get("gamemode"));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SLOWNESS), 20, 2, false));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::BLINDNESS), 20, 2, false));
			$sender->addTitle($this->getConfig()->get("title"));
			$sender->addSubTitle($this->getConfig()->get("subtitle"));

		return true;
	}elseif($command->getName() == "flashcore") {
			$sender->sendMessage("§l§gFlash§fCore §r§f1.0.1 by David Flash");
			$sender->sendMessage("§fA Highly Customizable LobbyCore Plugin.");
			$sender->sendMessage("");
			$sender->sendMessage("§fEverything can be edited in config.yml that can be found");
			$sender->sendMessage("§fin FlashCore folder in plugin_data or plugins.");
			$sender->sendMessage("");
			$sender->sendMessage("§fThank you for using §gFlash§fCore plugin!");


		return true;
	}elseif($command->getName() === "fly"){
		if(!$sender instanceof Player){
			$sender->sendMessage("§cThis works only in-game");
			return true;
		}
		if(!$sender->hasPermission('fc.fly')){
			$sender->sendMessage('§cYou don\' have permission to use this command');
			return true;
		}
		if(!isset($args[0])){ 
			if($sender->getAllowFlight() === true){
				$sender->setAllowFlight(false);
				$sender->setFlying(false);
				$sender->sendMessage("§l§f[§gFlash§fCore] §cYour fly is now disabled.");
				return true;
			}
			$sender->setAllowFlight(true);
			$sender->setFlying(true);
			$sender->sendMessage("§l§f[§gFlash§fCore] §aYour fly is now enabled.");
			return true;
		}else{
			$player = $this->getServer()->getPlayer($args[0]);
			if($player != null){
				if($player->getAllowFlight() === true){
					$player->setAllowFlight(false);
					$player->setFlying(false);
					$player->sendMessage("§l§f[§gFlash§fCore] §cYour fly is now disabled.");
					$sender->sendMessage("§l§f[§gFlash§fCore] §c" . $player->getName() . "'s fly is now disabled.");
					return true;
				}
				$player->setAllowFlight(true);
				$player->setFlying(true);
				$player->sendMessage("§l§f[§gFlash§fCore] §aYour fly is now enabled.");
				$sender->sendMessage("§l§f[§gFlash§fCore] §a" . $player->getName() . "'s fly is now enabled.");
				return true;
			}else{
				$sender->sendMessage('§l§f[§gFlash§fCore] §cPlayer not found.');
				return true;
			}
		} 
	}
  }
}