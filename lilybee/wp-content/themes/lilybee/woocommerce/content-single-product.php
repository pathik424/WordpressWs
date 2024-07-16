<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<section class="product_details_sec bg_pera-white">
    <div class="container">
        <div class="product_details_row">

            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action('woocommerce_before_single_product_summary');
            ?>

            <div class="product_details_content">
                <div class="product_details_name">
                    <h2 class="title_h2_big"><?php the_title(); ?></h2>
                </div>
                <div class="product_details_price">
                    <h3 class="title_h2"><?php echo $product->get_price_html(); ?></h3>
                    <p>Inc. VAT</p>
                </div>
                <div class="product_details_stock">
                    <?php global $product;

                    // Check if the product is in stock
                    if ($product->is_in_stock()) {
                        echo '<div class="product_details_stock_box sixteen_p">';
                        echo '<svg id="Group_483" data-name="Group 483" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">';
                        echo '<path id="Path_150" data-name="Path 150" d="M8,0A8,8,0,1,1,0,8,8,8,0,0,1,8,0Z" fill="#7e8e78" />';
                        echo '<path id="Path_149" data-name="Path 149" d="M10.833,5.176a.621.621,0,0,1,0,.848l-4.572,4.8a.552.552,0,0,1-.808,0l-2.286-2.4a.621.621,0,0,1,0-.848.552.552,0,0,1,.808,0L5.857,9.552l4.167-4.376A.552.552,0,0,1,10.833,5.176Z" transform="translate(1)" fill="#fff" fill-rule="evenodd" />';
                        echo '</svg>';
                        echo '<p>In Stock</p>';
                        echo '</div>';
                    } else {
                        // Product is out of stock, display different HTML
                        echo '<div class="product_details_out_of_stock_box sixteen_p">';
                        echo '<svg width="16" height="16" viewBox="0 0 256 256" fill="none" xmlns="http://www.w3.org/2000/svg">';
                        echo '<path d="M104.335 1.86674C14.3352 20.8001 -27.9315 122.133 22.3352 198C55.8019 248.533 120.469 268.8 176.602 246.133C207.002 233.867 233.002 208.533 245.802 178.667C254.202 158.933 255.669 151.467 255.535 126.667C255.535 106.533 255.135 103.6 251.802 92.6667C238.069 47.6001 205.135 15.4667 160.335 3.33341C148.735 0.266739 116.335 -0.533261 104.335 1.86674ZM109.935 88.9334L128.335 107.2L144.735 91.2001C163.535 72.5334 166.069 70.6667 172.069 70.6667C178.469 70.6667 185.669 77.8667 185.669 84.2667C185.669 90.2667 183.802 92.8001 165.135 111.6L149.135 128L167.402 146.4C183.269 162.533 185.669 165.467 185.669 169.2C185.669 178.267 180.069 183.867 171.135 184C165.269 184 164.869 183.733 147.135 166.133L129.002 148.133L110.869 166.133C92.7352 184 92.6019 184 86.3352 184C77.5352 184 72.3352 178.8 72.3352 170C72.3352 163.733 72.3352 163.6 90.2019 145.467L108.202 127.333L90.2019 109.2C72.6019 91.4667 72.3352 91.0667 72.3352 85.2001C72.4685 76.2667 77.9352 70.8001 86.8685 70.6667C91.0019 70.6667 93.4019 72.5334 109.935 88.9334Z" fill="#9a4242"/>';
                        echo '</svg>';
                        echo '<p>Out of Stock</p>';
                        echo '</div>';
                    }
                    ?>
                    <p>Tax included. <a href="#.">Shipping</a> calculated at checkout.</p>
                </div>

                <div class="product_input_fields">
                    <?php
                    global $product;

                    if (!$product->is_purchasable()) {
                        return;
                    }

                    echo wc_get_stock_html($product); // WPCS: XSS ok.

                    if ($product->is_in_stock()) : ?>

                        <?php do_action('woocommerce_before_add_to_cart_form'); ?>

                        <form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
                            <?php do_action('woocommerce_before_add_to_cart_button'); ?>

                            <div class="product_counter">
                                <button type="button" onclick="decrementbtn()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="2" viewBox="0 0 16 2">
                                        <line id="Line_80" data-name="Line 80" x2="14" transform="translate(1 1)" fill="none" stroke="#020202" stroke-linecap="round" stroke-width="2" />
                                    </svg>
                                </button>
                                <?php
                                do_action('woocommerce_before_add_to_cart_quantity');

                                woocommerce_quantity_input(
                                    array(
                                        'min_value' => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
                                        'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                                        'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                                    )
                                );

                                do_action('woocommerce_after_add_to_cart_quantity');
                                ?>
                                <button type="button" onclick="incrementbtn()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                        <g id="Group_513" data-name="Group 513" transform="translate(1 1)">
                                            <line id="Line_9" data-name="Line 9" x2="14" transform="translate(0 7)" fill="none" stroke="#020202" stroke-linecap="round" stroke-width="2" />
                                            <line id="Line_10" data-name="Line 10" x2="14" transform="translate(7) rotate(90)" fill="none" stroke="#020202" stroke-linecap="round" stroke-width="2" />
                                        </g>
                                    </svg>
                                </button>
                            </div>

                            <button type="submit" class="a_btn add-to-cart" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

                            <?php do_action('woocommerce_after_add_to_cart_button'); ?>
                        </form>

                        <?php do_action('woocommerce_after_add_to_cart_form'); ?>

                    <?php endif; ?>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Run this code when the DOM is fully loaded
                        // Call the disableDecrementButton function to set the initial state
                        disableDecrementButton();
                        // Call the disableIncrementButton function to set the initial state
                        disableIncrementButton();
                    });

                    function disableDecrementButton() {
                        var quantityInput = document.querySelector('.product_input_fields .product_counter .quantity input');
                        var decrementButton = document.querySelector('.product_input_fields .product_counter button[onclick="decrementbtn()"]');

                        // Disable decrement button on page load if the quantity is already at its minimum
                        if (parseInt(quantityInput.value) <= parseInt(quantityInput.getAttribute('min'))) {
                            decrementButton.disabled = true;
                        }
                    }

                    function disableIncrementButton() {
                        var quantityInput = document.querySelector('.product_input_fields .product_counter .quantity input');
                        var incrementButton = document.querySelector('.product_input_fields .product_counter button[onclick="incrementbtn()"]');

                        // Disable increment button on page load if the quantity is already at its maximum
                        if (parseInt(quantityInput.value) >= parseInt(quantityInput.getAttribute('max'))) {
                            incrementButton.disabled = true;
                        }
                    }

                    function decrementbtn() {
                        var quantityInput = document.querySelector('.product_input_fields .product_counter .quantity input');
                        var currentValue = parseInt(quantityInput.value);

                        if (currentValue > 1) {
                            quantityInput.value = currentValue - 1;
                        }

                        // Enable increment button when decreasing the quantity only if it's less than the maximum
                        var incrementButton = document.querySelector('.product_input_fields .product_counter button[onclick="incrementbtn()"]');
                        incrementButton.disabled = parseInt(quantityInput.value) >= parseInt(quantityInput.getAttribute('max'));

                        // Disable decrement button if the quantity is 1
                        var decrementButton = document.querySelector('.product_input_fields .product_counter button[onclick="decrementbtn()"]');
                        decrementButton.disabled = parseInt(quantityInput.value) <= 1;
                    }

                    function incrementbtn() {
                        var quantityInput = document.querySelector('.product_input_fields .product_counter .quantity input');
                        var currentValue = parseInt(quantityInput.value);
                        var maxValue = parseInt(quantityInput.getAttribute('max'));

                        if (currentValue < maxValue) {
                            quantityInput.value = currentValue + 1;
                        }

                        // Disable increment button if the quantity reaches its maximum
                        var incrementButton = document.querySelector('.product_input_fields .product_counter button[onclick="incrementbtn()"]');
                        incrementButton.disabled = parseInt(quantityInput.value) >= maxValue;

                        // Enable decrement button when increasing the quantity only if it's greater than the minimum
                        var decrementButton = document.querySelector('.product_input_fields .product_counter button[onclick="decrementbtn()"]');
                        decrementButton.disabled = parseInt(quantityInput.value) <= parseInt(quantityInput.getAttribute('min'));
                    }
                </script>
                <div class="payment_option">
                    <a href="#.">
                        View payment options
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path id="Question_Icon" data-name="Question Icon" d="M20,11a9,9,0,1,1-9-9A9,9,0,0,1,20,11ZM11,7.625a1.125,1.125,0,0,0-.975.562A1.125,1.125,0,1,1,8.077,7.063a3.375,3.375,0,1,1,4.048,4.871v.191a1.125,1.125,0,1,1-2.25,0V11A1.125,1.125,0,0,1,11,9.875a1.125,1.125,0,0,0,0-2.25Zm0,9A1.125,1.125,0,1,0,9.875,15.5,1.125,1.125,0,0,0,11,16.625Z" transform="translate(-2 -2)" fill="#020202" fill-rule="evenodd" />
                        </svg>
                    </a>
                </div>


                <?php
                global $product;

                // Get the short description
                $short_description = wc_format_content($product->get_short_description());

                // Display the short description
                if (!empty($short_description)) { ?>
                    <div class="product_info">
                        <?php echo $short_description; // WPCS: XSS ok.                
                        ?>
                    </div>
                <?php
                }
                ?>




                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 *
                 * @hooked woocommerce_template_single_title - 5
                 * @hooked woocommerce_template_single_rating - 10
                 * @hooked woocommerce_template_single_price - 10
                 * @hooked woocommerce_template_single_excerpt - 20
                 * @hooked woocommerce_template_single_add_to_cart - 30
                 * @hooked woocommerce_template_single_meta - 40
                 * @hooked woocommerce_template_single_sharing - 50
                 * @hooked WC_Structured_Data::generate_product_data() - 60
                 */
                // do_action('woocommerce_single_product_summary');
                ?>
            </div>
        </div>
    </div>
</section>


<section class="product_details_faq">
    <div class="container">
        <div class="product_details_faq_title">
            <h2 class="title_h2">Product Details</h2>
        </div>
        <div class="comaan_faq_otr">
            <?php if (have_rows('product_details_faq_otr')) : ?>
                <div class="product_details_faq_row">
                    <?php
                    $total_boxes = 0; // Initialize total boxes counter
                    while (have_rows('product_details_faq_otr')) : the_row();
                        $total_boxes++; // Increment total boxes counter
                    ?>
                        <div class="product_details_faq_box">
                            <div class="product_details_faq_que">
                                <div class="product_details_faq_que_otr">
                                    <h3 class="title_h3"> <?php the_sub_field('product_details_faq_title'); ?> </h3>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14.828" height="8.414" viewBox="0 0 14.828 8.414">
                                    <path id="Chevron_Icon" data-name="Chevron Icon" d="M0,6,6,0l6,6" transform="translate(13.414 7.414) rotate(180)" fill="none" stroke="#020202" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </div>
                            <div class="product_details_faq_ans">
                                <?php the_sub_field('product_details_faq_content'); ?>
                            </div>
                        </div>
                        <?php
                        // Check if total boxes modulo 3 is 0 to start a new row
                        if ($total_boxes % 3 == 0) : ?>
                </div>
                <div class="product_details_faq_row">
                <?php endif; ?>
            <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="product_review_box">
            <div class="product_details_faq_title" bis_skin_checked="1">
                <h2 class="title_h2">Reviews</h2>
                <div id="trustpilot-widget-trustbox-0-wrapper" style="z-index: 1000; clear: both;margin-left: 0px; margin-right:  0px;margin-top: 0px; margin-bottom: 0px;" bis_skin_checked="1">
                    <div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="634eff754b89780068df74f5" data-style-height="24px" data-style-width="100%" data-theme="light" data-style-alignment="center" id="trustpilot-widget-trustbox-0" style="z-index: 1000 !important; position: relative;" bis_skin_checked="1"><iframe title="Customer reviews powered by Trustpilot" loading="auto" src="https://widget.trustpilot.com/trustboxes/5419b6a8b0d04a076446a9ad/index.html?templateId=5419b6a8b0d04a076446a9ad&amp;businessunitId=634eff754b89780068df74f5#locale=en-US&amp;styleHeight=24px&amp;styleWidth=100%25&amp;theme=light&amp;styleAlignment=center" style="position: relative; height: 24px; width: 100%; border-style: none; display: block; overflow: hidden;" bis_size="{&quot;x&quot;:380,&quot;y&quot;:1955,&quot;w&quot;:1160,&quot;h&quot;:24,&quot;abs_x&quot;:380,&quot;abs_y&quot;:1955}"></iframe></div>
                </div>
            </div>
            <?php
            // Display product reviews
            comments_template();
            ?>
        </div>
    </div>
</section>


<section class="product_slider_sec bg_pera-white no_patch_sec">
    <div class="container">
        <div class="product_slider_row">
            <div class="sec_title">
                <h2 class="title_h2">You May Also Like</h2>
            </div>
            <div class="swiper slider__product">
				<div class="swiper-wrapper">
					<?php
			// Get the selected products from the ACF field
			$popular_products = get_field('products');

			// Check if there are any selected products
			if ($popular_products) {
				foreach ($popular_products as $product_post) {
					// Get product details
					$product = wc_get_product($product_post->ID);
					$product_id = $product->get_id();
					$product_name = $product->get_name();
					// If it's a simple product, get the regular price and sale price
					$regular_price = $product->get_regular_price();
					$sale_price = $product->get_sale_price();
					$product_price = $regular_price; // Default to regular price
					if ($sale_price) {
						$product_price = $sale_price; // If sale price exists, use that
					}
					$product_image = $product->get_image('full');
					// Get the product link
					$product_link = $product->get_permalink();
			?>
					<div class="swiper-slide">
						<div class="product_slider_box">
							<div class="product_slider_box_img">
								<a href="<?php echo esc_url($product_link); ?>" class="popular_product_img">
									<?php
									// Product Main Image (Full Size)
									$image_id = get_post_thumbnail_id($product_id);
									$image_url = wp_get_attachment_image_url($image_id, 'full'); // Fetch the full-size image URL
									if ($image_url) {
										echo '<div class="popular_product_img_otr">';
										echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($product_name) . '" />';
										echo '</div>';
									}
									?>
								</a>
							</div>
							<div class="product_slider_box_content">
								<a href="<?php echo esc_url($product_link); ?>" class="popular_product_content">
									<!-- <div class="rating_product"> -->
											<?php
											// $average_rating = $product->get_average_rating();

											// // Check if the product has ratings
											// if ($average_rating > 0) {
											//     // Output the default rating stars
											//     echo wc_get_rating_html($average_rating);
											// } else {
											//     // Output custom HTML for products without reviews
											//     echo '<div class="star-rating" role="img" aria-label="Not yet rated"></div>';
											// }
											?>
										<!-- </div> -->
									<div class="product_name">
										<h3 class="title_h3"><?php echo esc_html($product_name); ?></h3>
									</div>
									<div class="product_price sixteen_p">
										<p><?php echo wp_kses_post($product->get_price_html()); ?></p>
									</div>
								</a>
								<?php
								// Display dynamic "Add to Cart" button
								echo apply_filters(
									'woocommerce_loop_add_to_cart_link',
									sprintf(
										'<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="a_btn add-to-cart %s">%s</a>',
										esc_url($product->add_to_cart_url()),
										esc_attr($product->get_id()),
										esc_attr($product->get_sku()),
										$product->is_purchasable() ? 'add_to_cart_button' : '',
										esc_html($product->add_to_cart_text())
									),
									$product
								);
								?>
							</div>
						</div>
					</div>
			<?php
				}
			} else {
				// No products selected
				echo 'No popular products selected.';
			}
			?>

				</div>
				<div class="swiper-pagination-product pagination_box"></div>
			</div>
			<div class="slider_btn">
                <div class="swiper-button-prev-product btn__product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828" viewBox="0 0 8.414 14.828">
                        <path id="Chevron_Icon" data-name="Chevron Icon" d="M0,0,6,6l6-6" transform="translate(7 1.414) rotate(90)" fill="none" stroke="#020202" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </div>
                <div class="swiper-button-next-product btn__product">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828" viewBox="0 0 8.414 14.828">
                        <g id="Group_8251" data-name="Group 8251" transform="translate(-39.086 -78.086)">
                            <path id="Chevron_Icon" data-name="Chevron Icon" d="M0,6,6,0l6,6" transform="translate(46.5 79.5) rotate(90)" fill="none" stroke="#020202" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                        </g>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<?php do_action('woocommerce_after_single_product'); ?>