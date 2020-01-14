<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$dir = dirname( plugin_basename( PTI_PLUGIN_FILE ) ) . DIRECTORY_SEPARATOR . 'languages';
	load_plugin_textdomain('pti', false, $dir);
	global $wpdb;
	//************* End *************
	add_action( 'admin_init', 'pti_plugin_settings' );
	function pti_plugin_settings() {
		register_setting( 'pti', 'message_box' );
	}
//*************
	add_action('admin_menu', 'pti_plugin_menu');
	function pti_plugin_menu() {
	add_menu_page('PTI', 'PTI', 'administrator', 'PTI-settings', 'PTI_forms_shortcode', 'dashicons-admin-generic');
	//add_submenu_page( 'contact-records-plugin-settings', '', '', 'manage_options', 'full_details', 'sub_menu_listings_fulldetails');
	}
	if(!@include_once('admin/form_data.php')) {
	include_once('admin/form_data.php');
	}
	if(!@include_once('action.php')) {
	include_once('action.php');
	}
function pti_enqueue_assets() {
	
	global $pti_footer_scripts;
	wp_enqueue_style('my-styles', plugins_url('assets/css/style.css', PTI_PLUGIN_FILE), array(), '');
	wp_enqueue_script('j-validate', plugins_url('assets/js/jquery.validate.min.js', PTI_PLUGIN_FILE), array(), false, true);
	wp_enqueue_script('custom-js', plugins_url('assets/js/custom.js', PTI_PLUGIN_FILE), array(), false, true); 
	echo $pti_footer_scripts; 
	}
add_action('wp_footer', 'pti_enqueue_assets');
/********************* Admin Includes*******************/
function pti_load_custom_wp_admin_style() {
/********************* Admin Style*******************/ 
	wp_register_style( 'custom_wp_admin_css', plugins_url('/admin/css/pti-admin-style.css', __FILE__), false, '1.0.0' );
	wp_enqueue_style( 'custom_wp_admin_css' );
	wp_register_style( 'multiselect-css', plugins_url('/admin/css/multiselect.css', __FILE__), false, '1.0.0' );
	wp_enqueue_style( 'multiselect-css' );
	wp_register_style( 'multiselect-css', plugins_url('/admin/css/multiselect.css', __FILE__), false, '1.0.0' );
	wp_enqueue_style( 'multiselect-css' );
	wp_register_style( 'colorpicker-css', plugins_url('/admin/css/colorpicker.min.css', __FILE__), false, '1.0.0' );
	wp_enqueue_style( 'colorpicker-css' );
  /********************* Admin Script*******************/ 
  
	wp_enqueue_script( 'multiselect', plugins_url('/admin/js/multiselect.js', __FILE__), array(), false, true );
	wp_register_script( 'multiselect', '' );
	wp_enqueue_script( 'colorpicker.min', plugins_url('/admin/js/colorpicker.min.js', __FILE__), array(), false, true );
	wp_register_script( 'colorpicker.min', '' );
	wp_enqueue_script( 'custom_wp_admin_script', plugins_url('/admin/js/pti-adminjs.js', __FILE__), array(), false, true );
	wp_register_script( 'custom_wp_admin_script', '' ); 
}
add_action( 'admin_enqueue_scripts', 'pti_load_custom_wp_admin_style' );  