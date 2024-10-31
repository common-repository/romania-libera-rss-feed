<?php
/*
Plugin Name: Romania Libera Rss Feed
Plugin URI: http://www.bluebay.ro/wp-plugin-romania-libera
Description: Simple and easy way to display latest news from Romania Libera.
Author: Bluebay Design
Author URI: http://www.bluebay.ro
Version: 1.0.6
Text Domain: romania-libera
*/

//Define plugin directory
define('ROMANIALIBERA_PLUGIN_URL', plugin_dir_path( __FILE__ ));

//Include needed files for plugin
include ROMANIALIBERA_PLUGIN_URL . 'rlfeed-class.php';
include ROMANIALIBERA_PLUGIN_URL . 'widget.php';
?>
