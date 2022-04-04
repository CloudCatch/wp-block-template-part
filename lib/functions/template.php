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
 * Helper function to get template part for a given post
 *
 * @param  int|WP_Post $post Post to get template part for.
 * @param  string      $template_part Default template part.
 * @return string
 */
function get_template_part( $post, $template_part = '' ) {
	$content = '';
	$post    = \get_post( $post );

	$template_part = $template_part ?: 'template-parts/content-' . $post->post_type;

	ob_start();

	\get_template_part( \apply_filters( 'wp_block_template_part', str_replace( '.php', '', $template_part ), $post ) );

	$has_template_part = ob_get_clean();

	if ( $has_template_part ) {
		$content = $has_template_part;
	}

	return $content;
}
