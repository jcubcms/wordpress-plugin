<?php
/**
 * Plugin Name:    	Youtube Subscription
 * Plugin URI:  	
 * Description:     Display Youtube subscribe button  and count 
 * Author:          Yam Bahadur Poudel
 * Version:			1.0.0
 * Author URI:      http://yambahadurp.sgedu.site/
 * License:         GPL v2 or later
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 */

//If accessed directly then exit

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