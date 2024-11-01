<?php
/*
Plugin Name: Vistrail
Plugin URI: http://wordpress.org/extend/plugins/vistrail/
Description: Enables <a href="http://www.vistrail.com/">Vistrail</a> on all pages.
Version: 1.0.0
Author: Vistrail
Author URI: https://www.vistrail.com/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_vistrial() {
  add_option('vt_site_id', 'AA-00000-000');
}

function deactive_vistrail() {
  delete_option('vt_site_id');
}

function admin_init_vistrail() {
  register_setting('vistrail', 'vt_site_id');
}

function admin_menu_vistrail() {
  add_options_page('Vistrail', 'Vistrail', 'manage_options', 'vistrail', 'options_page_vistrail');
}

function options_page_vistrail() {
  include(WP_PLUGIN_DIR.'/vistrail/options.php');  
}

function vistrail() {
  $vt_site_id = get_option('vt_site_id');
?>
<script type="text/javascript">
var vt_sid='<?php echo $vt_site_id ?>';
</script>
<?php

}

function vistrail_scripts()
{
	wp_enqueue_script( 'vistrail', '//www.vistrail.com/vt.js', array(), false, false );
}

register_activation_hook(__FILE__, 'activate_vistrail');
register_deactivation_hook(__FILE__, 'deactive_vistrail');

if (is_admin()) {
  add_action('admin_init', 'admin_init_vistrail');
  add_action('admin_menu', 'admin_menu_vistrail');
}

if (!is_admin()) {
  add_action('wp_enqueue_scripts', 'vistrail',1 );
  add_action('wp_enqueue_scripts', 'vistrail_scripts',2 );
}

?>
