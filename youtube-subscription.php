<?php
/**
 * Plugin Name:    	Youtube Subscription
 * Description:     Youtube Channel Subscription  Plugin for wordpress
 * Author:          Yam Bahadur Poudel
 * Version:			1.0.0    
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

//Preventing direct access

if(!defined('ABSPATH')){
	exit;
}

// Loading script
require_once(plugin_dir_path(__FILE__).'/includes/youtube-subscription-scripts.php');

// Loading Class
require_once(plugin_dir_path(__FILE__).'/includes/youtube-subscription-class.php');

//Registering widgets
function register_youtubesubscription(){
	
register_widget('Youtube_Subscription_Widget');
}
//hooking function
add_action('widgets_init','register_youtubesubscription');

?>