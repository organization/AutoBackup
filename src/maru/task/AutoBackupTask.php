<?php
namespace maru\task;
use pocketmine\scheduler\PluginTask;
use maru\AutoBackup;
class AutoBackupTask extends PluginTask {
	private $plugin;
	public function __construct(AutoBackup $plugin) {
		parent::__construct($plugin);
		$this->plugin = $plugin;
	}
	public function onRun($currentTick) {
		$date = date("h-i");
		if ($date == "00-00" or $date == "03-00" or $date == "06-00" or $date == "09-00") {
			$this->plugin->BackupWorlds();
		}
	}
}
?>
