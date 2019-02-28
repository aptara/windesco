<?php
/**
 * OpenTools Plugin Update Checker Library
 * 
 * Copyright 2016 Reinhold Kainhofer
 * Extends the plugin-update-checker by Janis Elsts
 * Released under the MIT license. 
 */


// *****************************************************************
// * PLUGIN UPDATES (using plugin-update-checker and a self-written update server script)
// * http://w-shadow.com/blog/2010/09/02/automatic-updates-for-any-plugin/
// *****************************************************************


if (!class_exists('DWD_Map_PluginUpdateChecker')):

require 'plugin-update-checker.php';

class DWD_Map_PluginUpdateChecker extends Puc_v4p2_Plugin_UpdateChecker {
	//protected $credvars = array();
	//protected $ajaxurl = '';
	public function __construct($metadataUrl, $pluginFile, $slug = '', $checkPeriod = 0, $optionName = '', $muPluginFile = '')
	{
		parent::__construct($metadataUrl, $pluginFile, $slug, $checkPeriod, $optionName, $muPluginFile);
		//$this->installOTHooks();
	}
};

endif;



// *****************************************************************
