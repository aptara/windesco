<?php

require_once(dirname(__FILE__).'/../boot.php');
require_once(SG_STORAGE_PATH.'SGOneDriveStorage.php');

@session_start();
unset($_SESSION['sg_one_drive_access_token']);
unset($_SESSION['sg_one_drive_expiration_ts']);

if(backupGuardIsAjax()) {
	SGConfig::set('SG_ONE_DRIVE_REFRESH_TOKEN','');
	SGConfig::set('SG_ONE_DRIVE_CONNECTION_STRING','');

	if(isset($_POST['cancel'])) {
		die('{"success":1}');
	}
}

$oneDrive = new SGOneDriveStorage();
try {
	$oneDrive->connect();
}
catch(Exception $e) {
	header("Location: ".SG_PUBLIC_CLOUD_URL);
}

if($oneDrive->isConnected()) {
	header("Location: ".SG_PUBLIC_CLOUD_URL);
	exit();
}
