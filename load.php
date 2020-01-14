<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$plugin_data = get_file_data(PTI_PLUGIN_FILE, array('Plugin Name'=>'Plugin Name', 'Version'=>'Version'));
if ( ! defined( 'PTI_PLUGIN_NAME' ) ) {
	define( 'PTI_PLUGIN_NAME', $plugin_data['Plugin Name'] );
}
if ( ! defined( 'PTI_PLUGIN_VERSION' ) ) {
	define( 'PTI_PLUGIN_VERSION', $plugin_data['Version'] );
}
if ( ! defined( 'PTI_PLUGIN_DIR' ) ) {
	define( 'PTI_PLUGIN_DIR', dirname(PTI_PLUGIN_FILE) );
}
/* Mapify General */
if(!@include_once('core.php')) {
include_once('core.php');
}
if(!@include_once('pti_shortcode.php')) {
include_once('pti_shortcode.php');
}