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
 * Register block and related scripts
 *
 * @return void
 */
function register_block() {
	\wp_register_script(
		'wp-block-template-part',
		WP_BLOCK_TEMPLATE_PART_URL . 'assets/js/block.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element' ),
		WP_BLOCK_TEMPLATE_PART_VER,
		true
	);

	\register_block_type_from_metadata(
		WP_BLOCK_TEMPLATE_PART_DIR . '/lib/config',
		array(
			'render_callback'   => __NAMESPACE__ . '\render_block_template_part',
			'skip_inner_blocks' => true,
		)
	);
}
\add_action( 'init', __NAMESPACE__ . '\register_block' );

/**
 * Renders the post template part on the server.
 *
 * @param array    $attributes Block attributes.
 * @param string   $content    Block default content.
 * @param WP_Block $block      Block instance.
 * @return string  Returns the template part for the given post.
 */
function render_block_template_part( $attributes, $content, $block ) {
	if ( ! isset( $block->context['postId'] ) ) {
		return '';
	}

	$content = get_template_part( $block->context['postId'] );

	\wp_reset_postdata();

	return \apply_filters( 'wp_block_template_part_content', sprintf( '<div %1$s>%2$s</div>', get_block_wrapper_attributes(), $content ), $block, $attributes );
}
