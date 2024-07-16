<?php

/**
 * innometrics-business: Block Patterns
 *
 * @since innometrics-business 1.0.0
 */

/**
 * Registers pattern categories for innometrics-business
 *
 * @since innometrics-business 1.0.0
 *
 * @return void
 */
function INNOMETRICS_BUSINESS_register_pattern_category()
{
	$block_pattern_categories = array(
		'innometrics-business' => array('label' => __('innometrics-business Patterns', 'innometrics-business')),
	);

	$block_pattern_categories = apply_filters('INNOMETRICS_BUSINESS_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}
}
add_action('init', 'INNOMETRICS_BUSINESS_register_pattern_category', 9);
