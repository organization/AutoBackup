<?php
namespace maru\task;
use pocketmine\scheduler\AsyncTask;
class AsyncBackup extends AsyncTask {
	private $dataFolder, $dataPath;
	public function __construct($dataFolder, $dataPath) {
		$this->dataFolder = $dataFolder;
		$this->dataPath = $dataPath;
	}
	public function onRun() {
		$zip = new \ZipArchive();
		$error = $zip->open($this->dataFolder.date("y-n-j_H-i.zip"));
		if($error !== TRUE) {
			echo "압축파일을 열 수 없습니다.\n";
			echo "이유: {$error}\n";
			return;
		}
		$zip->addFromString($this->dataPath."worlds/");
		$zip->close();
	}
}
?>