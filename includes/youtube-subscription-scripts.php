<?php 
//adding scripts

function youtubesubscritpion_add_scripts(){

	// Adding main css file
	wp_enqueue_style('youtubesubscritpion-main-style',plugins_url().'/youtube-subscription/css/style.css');

	//Adding main js file
	wp_enqueue_script('youtubesubscritpion-main-script',plugins_url().'/youtube-subscription/js/main.js');

	//Adding Google Script
	wp_register_script('google','https://apis.google.com/js/platform.js');
	wp_enqueue_script('google');

}

//Hook up function
add_action('wp_enqueue_scripts','youtubesubscritpion_add_scripts');

?>