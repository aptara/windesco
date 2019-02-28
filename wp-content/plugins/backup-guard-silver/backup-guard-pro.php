<?php

/**
 * Plugin Name:       BackupGuard Pro
 * Plugin URI:        https://backup-guard.com/products/backup-wordpress
 * Description:       BackupGuard is the most complete WordPress site backup and restore plugin. We offer the easiest way to backup, restore or migrate your site. You can backup your files, database or both.
 * Version:           1.1.65
 * Author:            BackupGuard
 * Author URI:        https://backup-guard.com/products/backup-wordpress
 * License:           Commercial Software License
 * License URI:
 */

if (function_exists('activate_backup_guard')) {
	die('Please deactivate any other BackupGuard version before activating this one.');
}

if (!defined('SG_BACKUP_GUARD_VERSION')) {
	define('SG_BACKUP_GUARD_VERSION', '1.1.65');
}

if (!defined('SG_BACKUP_GUARD_MAIN_FILE')) {
	define('SG_BACKUP_GUARD_MAIN_FILE', __FILE__);
}

if (!defined('SG_FORCE_DB_TABLES_RESET')) {
	define('SG_FORCE_DB_TABLES_RESET', false);
}

//if this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

require_once(plugin_dir_path(__FILE__).'public/boot.php');
require_once(plugin_dir_path(__FILE__).'BackupGuard.php');
