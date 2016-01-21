<?php
namespace maru;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use maru\task\AutoBackupTask;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use maru\task\AsyncBackup;
class AutoBackup extends PluginBase implements Listener {
	public function onEnable() {
		@mkdir($this->getDataFolder());
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new AutoBackupTask($this), 20*60);
	}
	public function BackupWorlds() {
		$this->getServer()->getScheduler()->scheduleAsyncTask(new AsyncBackup($this->getDataFolder(), $this->getServer()->getDataPath()));
	}
	public function onCommand(CommandSender $sender, Command $command, $label, Array $args) {
		if(strtolower($command) == "backup") {
			$sender->sendMessage("Start backup your worlds directory");
			$this->BackupWorlds();
		}
	}
}
?>