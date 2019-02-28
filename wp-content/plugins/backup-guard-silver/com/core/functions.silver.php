<?php

function backupGuardCheckPluginUpdatesAvailable(){
	$updatePlugins = get_site_transient('update_plugins');
	if(isset($updatePlugins->response) && count($updatePlugins->response) > 0) {
		return true;
	}
	return false;
}

function backupGuardCheckThemesUpdatesAvailable(){
	$updateThemes = get_site_transient('update_themes');
	if(isset($updateThemes->response) && count($updateThemes->response) > 0) {
		return true;
	}
	return false;
}

function backupGuardCheckCoreUpdatesAvailable(){
	$updateCore = get_site_transient('update_core');
	if($updateCore->updates[0]->response == 'upgrade') {
		return true;
	}
	return false;
}

function backupGuardCheckUpdatesAvailable()
{
	return backupGuardCheckPluginUpdatesAvailable() || backupGuardCheckThemesUpdatesAvailable() || backupGuardCheckCoreUpdatesAvailable();
}


function backupGuardGetStorageNameById($storageId)
{
	$storageName = '';
	switch ($storageId) {
		case SG_STORAGE_FTP:
			$storageName = 'FTP';
			break;
		case SG_STORAGE_DROPBOX:
			$storageName = 'Dropbox';
			break;
		case SG_STORAGE_GOOGLE_DRIVE:
			$storageName = 'Google Drive';
			break;
		case SG_STORAGE_AMAZON:
			$storageName = 'Amazon S3';
			break;
		case SG_STORAGE_ONE_DRIVE:
			$storageName = "One Drive";
			break;
	}

	return $storageName;
}

function backupGuardShowWarningAboutUpdate()
{
	?>
	<style>
		.sg-update-alert-container{
			width: 100%;
			float: left;
			padding-top: 12px;
			padding-bottom: 12px;
			background-color: #fff;
			border-left: 4px solid #ffb900;
			margin-bottom: 10px;
		}

		.sg-update-alert-container .sg-logo-container {
			height: 44px;
			float: left;
			padding-left: 5px;
			padding-right: 5px;
		}

		.sg-update-alert-container .sg-text-container {
			float: left;
			padding-left: 7px;
			width: calc(100% - 120px);
		}
		.sg-update-alert-container .sg-title {
			font-size: 20px;
		}
		.sg-update-alert-container .sg-text {
			padding-top: 10px;
		}
		.sg-update-alert-container .sg-close-button{
			float: right;
			padding-right: 5px;
			position: relative;
			top: -8px;
		}
		.sg-update-alert-container .sg-close-button img{
			width: 25px;
			height: 25px;
			cursor: pointer;
		}

	</style>
	<div class="sg-update-alert-container">
		<div class="sg-logo-container">
			<img height="100%" src="<?php echo SG_PUBLIC_URL; ?>img/bg_160.png">
		</div>
		<div class="sg-text-container">
			<div class="sg-title">Wait… Don’t forget to create a backup before updating!</div>
			<div class="sg-text"> You have pending updates which should be installed on your WordPress. <a href="<?php echo SG_PUBLIC_BACKUPS_URL ?>">BackupGuard</a> strongly recommends to create a backup before installing any update package. So, you’ll be safe in case something goes wrong!</div>
		</div>
		<div class="sg-close-button"><img src="<?php echo SG_PUBLIC_URL; ?>img/close.png" onclick="sgCloseUpdateNotification();"/></div>
	</div>
	<script>
		function sgCloseUpdateNotification()
		{
			var disabled = confirm("If you close this notification you won’t receive any alerts from BackupGuard before installing updates.\nAre you sure you want to disable such notifications?");
			if(disabled){
				jQuery(".sg-update-alert-container").remove();
				var data = {
					'action': 'backup_guard_settings',
					'type': 'updateSetting',
					'alert-before-update': '0'
				};
				jQuery.get(ajaxurl, data, function(response) {});
				jQuery(".update-message button").unbind("click",sgAlertBeforeUpdate);
				jQuery(".update-link").unbind("click",sgAlertBeforeUpdate);
				jQuery("form[name='upgrade-themes'], form[name='upgrade-plugins'], form[name='upgrade']").unbind("submit",sgAlertBeforeUpdate)
			}
		}
		function sgAlertBeforeUpdate(){
			var update = confirm("Wait…You see this alert because you’ve enabled “alert to create a backup before updates” option in BackupGuard settings.\nAre you sure you want to continue updating?");
			if(update){
				return true;
			}
			return false;
		}
		(function()
		{
			window.addEventListener("load",function() {
				jQuery(".sg-update-alert-container").insertAfter('.wrap h1:first');
				jQuery("form[name='upgrade-themes'], form[name='upgrade-plugins'], form[name='upgrade']").submit(sgAlertBeforeUpdate);

			});

		})()
	</script>

	<?php
}

function backupGuardOnScreenActivate()
{
	$isAlertBeforeUpdateEnabled = SGConfig::get('SG_ALERT_BEFORE_UPDATE');
	if(!$isAlertBeforeUpdateEnabled){
		return;
	}
	$current_screen = get_current_screen();

	if(($current_screen->id === "themes" && backupGuardCheckThemesUpdatesAvailable()) || ($current_screen->id === "plugins" && backupGuardCheckPluginUpdatesAvailable())) {
		$selector = $current_screen->id === "themes" ? ".update-message button" : ".update-link";
		?>
		<script>
			function sgAlertBeforeUpdate(e) {
				var update = confirm("Wait…You see this alert because you’ve enabled “alert to create a backup before updates” option in BackupGuard settings.\nAre you sure you want to continue updating?");
				if (!update) {
					e.stopPropagation();
					return false;
				}
			}
			(function () {
				window.addEventListener("load", function () {
					jQuery("<?php echo $selector ?>").click(sgAlertBeforeUpdate);
				})
			})()
		</script>
		<?php
		backupGuardShowWarningAboutUpdate();

	}
}

function backupGuardOnUpgradeScreenActivate()
{
	$isAlertBeforeUpdateEnabled = SGConfig::get('SG_ALERT_BEFORE_UPDATE');
	if(!backupGuardCheckUpdatesAvailable()){
		return;
	}
	if ($isAlertBeforeUpdateEnabled) {
		backupGuardShowWarningAboutUpdate();
	}
}

function backupGuardOnBeforeUpdateDownload( $true, $args_hook_extra, $config )
{

	//continue downloading if there are no updates
	if($config->update_count == 0){
		return false;
	}

	//if updating
	//TODO start backup process
	return false;
}
