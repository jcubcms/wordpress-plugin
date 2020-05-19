<?php
/**
 * Plugin Name:    	 Youtube Subscription
 * Plugin URI:  	http://yambahadurp.sgedu.site/
 * Description:     Display Youtube subscribe button  and count 
 * Author:            Yam Bahadur Poudel
 * Author URI:       http://yambahadurp.sgedu.site/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

//If accessed directly then exit

if(!defined('ABSPATH')){
	exit;
}

// Loading script
require_once(plugin_dir_path(__FILE__).'/includes/youtube-subscription-scripts.php');