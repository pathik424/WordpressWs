<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action('woocommerce_before_main_content');

?>

<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs_row">
            <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
        </div>
    </div>
</section>

<section class="product_list_banner bg_pera-white">
    <div class="container">
        <div class="product_list_banner_row twenty_p">
            <h1 class="title_h2_big"><?php echo esc_html(get_field('title', 'option')); ?></h1>
            <p><?php echo esc_html(get_field('description', 'option')); ?></p>
        </div>
    </div>
</section>

<section class="product_list_sec bg_eggshell">
    <div class="container">
        <div class="product_list_row">
			<div class="product_list_category">
				<?php echo do_shortcode('[wcapf_form]'); ?>
            </div>
            <div class="product_list_otr">
            	<div class="product_list_otr_top">
            		<?php do_action('woocommerce_before_shop_loop');?>
            		<div class="view_icons">
                        <a href="#.">
                            <svg id="Grid_View_Button" data-name="Grid View Button"
                                xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <rect id="Rectangle_110" data-name="Rectangle 110" width="14" height="14" rx="2"
                                    fill="#020202" />
                                <rect id="Rectangle_138" data-name="Rectangle 138" width="14" height="14" rx="2"
                                    transform="translate(0 16)" fill="#020202" />
                                <rect id="Rectangle_136" data-name="Rectangle 136" width="14" height="14" rx="2"
                                    transform="translate(16)" fill="#020202" />
                                <rect id="Rectangle_137" data-name="Rectangle 137" width="14" height="14" rx="2"
                                    transform="translate(16 16)" fill="#020202" />
                            </svg>
                        </a>
                        <a href="#.">
                            <svg id="List_View_Button" data-name="List View Button" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
                                <rect id="Rectangle_110" data-name="Rectangle 110" width="6" height="6" rx="1" fill="#94a3b8"/>
                                <rect id="Rectangle_111" data-name="Rectangle 111" width="22" height="6" rx="1" transform="translate(8)" fill="#94a3b8"/>
                                <rect id="Rectangle_110-2" data-name="Rectangle 110" width="6" height="6" rx="1" transform="translate(0 8)" fill="#94a3b8"/>
                                <rect id="Rectangle_111-2" data-name="Rectangle 111" width="22" height="6" rx="1" transform="translate(8 8)" fill="#94a3b8"/>
                                <rect id="Rectangle_110-3" data-name="Rectangle 110" width="6" height="6" rx="1" transform="translate(0 16)" fill="#94a3b8"/>
                                <rect id="Rectangle_111-3" data-name="Rectangle 111" width="22" height="6" rx="1" transform="translate(8 16)" fill="#94a3b8"/>
                                <rect id="Rectangle_110-4" data-name="Rectangle 110" width="6" height="6" rx="1" transform="translate(0 24)" fill="#94a3b8"/>
                                <rect id="Rectangle_111-4" data-name="Rectangle 111" width="22" height="6" rx="1" transform="translate(8 24)" fill="#94a3b8"/>
                            </svg>
                        </a>
                    </div>
                </div>
                </div>
					<?php
if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	// do_action('woocommerce_before_shop_loop');

	woocommerce_product_loop_start();

	if (wc_get_loop_prop('total')) {
		while (have_posts()) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}
?>

			</div>
    	</div>
    </div>
</section>
<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
// do_action('woocommerce_sidebar');

get_footer('shop');
