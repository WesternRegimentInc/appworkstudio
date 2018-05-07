<?php

/*

Plugin Name: Comilla Plugin

Plugin URI: http://getmasum.net

Description: After install the Comilla WordPress Theme, you must need to install this "Comilla Plugin" first to get all functions of Comilla WP Theme.

Author: Masum Billah

Author URI: http://www.getmasum.net

Version: 1.0.0

Text Domain: comilla

*/


//define

define( 'COMILLAPLUGINDIR', dirname( __FILE__ ) ); 

// Add main files

include_once(COMILLAPLUGINDIR. '/custom_posts.php');
include_once(COMILLAPLUGINDIR. '/shortcodes.php');