<?php
/**
 * Plugin Name:     Template Part - Gutenberg Block
 * Description:     Gutenberg block to render a template part inside a query loop
 * Version:         0.0.0-development
 * Author:          Seattle Web Co.
 * Author URI:      https://seattlewebco.com
 * Text Domain:     wp-block-template-part
 * Domain Path:     /languages/
 * Contributors:    seattlewebco, dkjensen
 * Requires PHP:    7.0.0
 *
 * @package SeattleWebCo\WpBlockTemplatePart
 */

namespace SeattleWebCo\WpBlockTemplatePart;

define( 'WP_BLOCK_TEMPLATE_PART_DIR', \plugin_dir_path( __FILE__ ) );
define( 'WP_BLOCK_TEMPLATE_PART_URL', \plugin_dir_url( __FILE__ ) );
define( 'WP_BLOCK_TEMPLATE_PART_VER', '0.0.0-development' );

require_once WP_BLOCK_TEMPLATE_PART_DIR . '/lib/functions/block.php';
require_once WP_BLOCK_TEMPLATE_PART_DIR . '/lib/functions/rest-api.php';
require_once WP_BLOCK_TEMPLATE_PART_DIR . '/lib/functions/template.php';

/**
 * Setup plugin
 *
 * @return void
 */
function initialize() {
	\load_plugin_textdomain( 'wp-block-template-part', false, WP_BLOCK_TEMPLATE_PART_DIR . '/languages' );
}
\add_action( 'plugins_loaded', __NAMESPACE__ . '\initialize' );
