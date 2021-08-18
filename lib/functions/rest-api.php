<?php
/**
 * Template Part - Gutenberg Block
 *
 * @package   SeattleWebCo\WpBlockTemplatePart
 * @link      https://seattlewebco.com
 * @author    Seattle Web Co.
 * @copyright Copyright © 2021 Seattle Web Co.
 * @license   GPL-3.0
 */

namespace SeattleWebCo\WpBlockTemplatePart\Functions;

/**
 * Register REST API fields
 *
 * @return void
 */
function rest_api_post_fields() {
	$post_types = \get_post_types( array( 'show_in_rest' => true ) );

	register_rest_field(
		array_values( $post_types ),
		'template_part',
		array(
			'get_callback' => __NAMESPACE__ . '\rest_field_template_part',
			'schema'       => null,
		)
	);
}
\add_action( 'rest_api_init', __NAMESPACE__ . '\rest_api_post_fields' );

/**
 * `template_part` meta field callback
 *
 * @param array $object Post object.
 * @return string
 */
function rest_field_template_part( $object ) {
	return get_template_part( $object['id'] );
}
