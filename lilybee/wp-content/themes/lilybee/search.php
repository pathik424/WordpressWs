<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package lilybee
 */

get_header();
?>

<section class="product_list_sec bg_eggshell search_box_main_otr">
    <div class="container">
        <div class="product_list_otr_bottom">
            <?php
			// Output WooCommerce notices
			wc_print_notices();
            // Customize WP_Query args to search only in 'product' post type
            $args = array(
                'post_type'      => 'product',
                's'              => get_search_query(),
                'posts_per_page' => -1, // Display all search results
            );
            $search_query = new WP_Query( $args );
            if ( $search_query->have_posts() ) :
                echo '<div class="search_result_title_box">';
                echo '<h2>Search Results for: ' . get_search_query() . '</h2>';
                echo '<p>Total Results: ' . $search_query->found_posts . '</p>';
				echo '</div>';
                while ( $search_query->have_posts() ) : $search_query->the_post();
                    global $product;
                    ?>
                    <div class="product_slider_box">
                        <div class="product_slider_box_img">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="popular_product_img">
                                <?php
                                    // Product Main Image (Full Size)
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_url($image_id, 'full'); // Fetch the full-size image URL
                                    if ($image_url) {
                                        echo '<div class="popular_product_img_otr">';
                                        echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
                                        echo '</div>';
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="product_slider_box_content">
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="popular_product_content">
                                <div class="rating_product">
                                    <?php
                                        // Output the rating stars
                                        echo wc_get_rating_html($product->get_average_rating());
                                    ?>
                                </div>
                                <div class="product_name">
                                    <h3 class="title_h3"><?php echo get_the_title(); ?></h3>
                                </div>
                                <div class="product_price sixteen_p">
                                    <p><?php echo $product->get_price_html(); ?></p>
                                </div>
                            </a>
                            <?php
                                // Display dynamic "Add to Cart" button
                                do_action('woocommerce_after_shop_loop_item');
                            ?>
                        </div>
                    </div>
                    <?php
                endwhile;
            else :
                // No search results found
                echo '<p>No products found.</p>';
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>