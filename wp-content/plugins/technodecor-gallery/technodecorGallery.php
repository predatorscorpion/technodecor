<?php
/*
Plugin Name: Technodecor gallery
Description: Create new gallery for posts
Version: 1.0.0
Author: Andriy Fediuk
Author URI: https://ru.wordpress.org/
Plugin URI: https://ru.wordpress.org/
*/

define('MSP_GALLERY_MODULE_DIR', plugin_dir_path(__FILE__));
define('MSP_GALLERY_MODULE_URL', plugin_dir_url(__FILE__));

require_once(MSP_GALLERY_MODULE_DIR."includes/ActivateDeactivateModule.php");

register_activation_hook(__FILE__, ['ActivateDeactivateModule', 'active_plugin']);
register_deactivation_hook(__FILE__, ['ActivateDeactivateModule', 'deactive_plugin']);

require_once(MSP_GALLERY_MODULE_DIR."includes/admin.php");