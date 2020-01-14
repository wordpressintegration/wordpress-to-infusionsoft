<?php
/*
Plugin Name: Post to infusionsoft
Description: Here you can send form data to infusionsoft account.
Version: 1.0
Author: Farhan haider
Author Uri: https://profiles.wordpress.org/farhanhaider73
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Required plugin utility functions
 */
require_once(ABSPATH . '/wp-admin/includes/plugin.php');

function pti_load() {
	if (defined('PTI_PLUGIN_NAME')) {
		add_action('admin_notices', 'pti_plugin_conflict');
		return; // prevent plugin from loading
	}

	define('PTI_PLUGIN_FILE', __FILE__);
	include_once('load.php');
}
add_action('plugins_loaded', 'pti_load', 1500);

function pti_plugin_conflict() {
	$plugin_data = get_file_data(__FILE__, array('Plugin Name'=>'Plugin Name', 'Version'=>'Version'));

	if (PTI_PLUGIN_NAME) {
		$message = sprintf(__('The %s plugin will be inactive until you deactivate the %s plugin.'), $plugin_data['Plugin Name'], PTI_PLUGIN_NAME);
	} else {
		$message = sprintf(__('The %s plugin will be inactive as there is a conflicting plugin.'), $plugin_data['Plugin Name']);
	}
	?>
	<div class="error">
		<p><?php echo $message; ?></p>
	</div>
	<?php
}