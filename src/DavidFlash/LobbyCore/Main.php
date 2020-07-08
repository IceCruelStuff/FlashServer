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
			$sender->sendMessage($this->getConfig()->get("message"));
			$sender->teleport($this->getServer()->getLevelByName($this->getConfig()->get("world"))->getSafeSpawn());
			$sender->setGamemode($this->getConfig()->get("gamemode"));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SLOWNESS), 20, 2, false));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::BLINDNESS), 20, 2, false));
			$sender->addTitle($this->getConfig()->get("title"));
			$sender->addSubTitle($this->getConfig()->get("subtitle"));

		
		return true;
	}
		if($command->getName() == "lobby") {
			$sender->sendMessage($this->getConfig()->get("message"));
			$sender->teleport($this->getServer()->getLevelByName($this->getConfig()->get("world"))->getSafeSpawn());
			$sender->setGamemode($this->getConfig()->get("gamemode"));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::SLOWNESS), 20, 2, false));
			$sender->addEffect(new EffectInstance(Effect::getEffect(Effect::BLINDNESS), 20, 2, false));
			$sender->addTitle($this->getConfig()->get("title"));
			$sender->addSubTitle($this->getConfig()->get("subtitle"));

		return true;
	}
  }
}