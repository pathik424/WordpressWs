<?php

/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package innometrics-business
 * @since 1.0.0
 */

if (function_exists('register_block_style')) {
    /**
     * Register block styles.
     *
     * @since 0.1
     *
     * @return void
     */
    function INNOMETRICS_BUSINESS_register_block_styles()
    {
        register_block_style(
            'core/columns',
            array(
                'name'  => 'innometrics-business-boxshadow',
                'label' => __('Box Shadow', 'innometrics-business')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'innometrics-business-boxshadow',
                'label' => __('Box Shadow', 'innometrics-business')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'innometrics-business-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'innometrics-business')
            )
        );
        register_block_style(
            'core/column',
            array(
                'name'  => 'innometrics-business-boxshadow-large',
                'label' => __('Box Shadow Large', 'innometrics-business')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'innometrics-business-boxshadow',
                'label' => __('Box Shadow', 'innometrics-business')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'innometrics-business-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'innometrics-business')
            )
        );
        register_block_style(
            'core/group',
            array(
                'name'  => 'innometrics-business-boxshadow-large',
                'label' => __('Box Shadow Larger', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-boxshadow',
                'label' => __('Box Shadow', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-boxshadow-medium',
                'label' => __('Box Shadow Medium', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-boxshadow-larger',
                'label' => __('Box Shadow Large', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-image-pulse',
                'label' => __('Iamge Pulse Effect', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-image-hover-pulse',
                'label' => __('Hover Pulse Effect', 'innometrics-business')
            )
        );
        register_block_style(
            'core/image',
            array(
                'name'  => 'innometrics-business-image-hover-rotate',
                'label' => __('Hover Rotate Effect', 'innometrics-business')
            )
        );
        register_block_style(
            'core/columns',
            array(
                'name'  => 'innometrics-business-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'innometrics-business')
            )
        );

        register_block_style(
            'core/column',
            array(
                'name'  => 'innometrics-business-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'innometrics-business')
            )
        );

        register_block_style(
            'core/group',
            array(
                'name'  => 'innometrics-business-boxshadow-hover',
                'label' => __('Box Shadow on Hover', 'innometrics-business')
            )
        );

        register_block_style(
            'core/post-terms',
            array(
                'name'  => 'categories-background-with-round',
                'label' => __('Background with round corner style', 'innometrics-business')
            )
        );
        register_block_style(
            'core/post-title',
            array(
                'name'  => 'title-hover-primary-color',
                'label' => __('Hover: Primary color', 'innometrics-business')
            )
        );
        register_block_style(
            'core/post-title',
            array(
                'name'  => 'title-hover-secondary-color',
                'label' => __('Hover: Secondary color', 'innometrics-business')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-color',
                'label' => __('Hover: Primary Color', 'innometrics-business')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'innometrics-business')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-primary-bgcolor',
                'label' => __('Hover: Primary color fill', 'innometrics-business')
            )
        );
        register_block_style(
            'core/button',
            array(
                'name'  => 'button-hover-secondary-bgcolor',
                'label' => __('Hover: Secondary color fill', 'innometrics-business')
            )
        );

        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-color',
                'label' => __('Hover: Primary Color', 'innometrics-business')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-color',
                'label' => __('Hover: Secondary Color', 'innometrics-business')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-primary-fill',
                'label' => __('Hover: Primary Fill', 'innometrics-business')
            )
        );
        register_block_style(
            'core/read-more',
            array(
                'name'  => 'readmore-hover-secondary-fill',
                'label' => __('Hover: secondary Fill', 'innometrics-business')
            )
        );

        register_block_style(
            'core/list',
            array(
                'name'  => 'list-style-no-bullet',
                'label' => __('List Style: Hide bullet', 'innometrics-business')
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'  => 'hide-bullet-list-link-hover-style-primary',
                'label' => __('Hover style with primary color and hide bullet', 'innometrics-business')
            )
        );
        register_block_style(
            'core/list',
            array(
                'name'  => 'hide-bullet-list-link-hover-style-secondary',
                'label' => __('Hover style with secondary color and hide bullet', 'innometrics-business')
            )
        );

        register_block_style(
            'core/gallery',
            array(
                'name'  => 'enable-grayscale-mode-on-image',
                'label' => __('Enable Grayscale Mode on Image', 'innometrics-business')
            )
        );
        register_block_style(
            'core/social-links',
            array(
                'name'  => 'social-icon-border',
                'label' => __('Border Style', 'innometrics-business')
            )
        );
        register_block_style(
            'core/page-list',
            array(
                'name'  => 'innometrics-business-page-list-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'innometrics-business')
            )
        );
        register_block_style(
            'core/categories',
            array(
                'name'  => 'innometrics-business-categories-bullet-hide-style',
                'label' => __('Hide Bullet Style', 'innometrics-business')
            )
        );
        register_block_style(
            'core/cover',
            array(
                'name'  => 'innometrics-business-cover-round-style',
                'label' => __('Round Corner Style', 'innometrics-business')
            )
        );
    }
    add_action('init', 'INNOMETRICS_BUSINESS_register_block_styles');
}
