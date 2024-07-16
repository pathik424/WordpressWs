<?php
/*
 * Template name: Landing Page 
 */

get_header(); ?>
<?php
// Include WooCommerce notices on the home page
wc_print_notices();
?>
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs_row">
            <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
        </div>
    </div>
</section>

<section class="landing_banner bg_eggshell">
    <div class="container">
        <div class="landing_banner_row">
            <div class="landing_banner_content">
                <div class="main_span_title twenty_p">
                    <p><?php the_field('inner_banner_span_title') ; ?></p>
                </div>
                <h1 class="title_h1"><?php the_field('inner_banner_title') ; ?></h1>
            </div>
            <div class="inner_banner_bgimg">
		        <?php 
					$inner_banner_bgimg = get_field('inner_banner_bgimg');
					if( !empty( $inner_banner_bgimg ) ): ?>
					    <img src="<?php echo esc_url($inner_banner_bgimg['url']); ?>" alt="<?php echo esc_attr($inner_banner_bgimg['alt']); ?>" />
				<?php endif; ?>
		    </div>
        </div>
    </div>
</section>

<section class="symptoms_sec bg_pera-white">
    <div class="container">
		<div class="symptoms_sec_row_title twenty_p">
            <h2 class="title_h2_big"><?php the_field('symptoms_title') ; ?></h2>
            <?php the_field('symptoms_top_discription') ; ?>
		</div>
		<?php if( have_rows('symptoms_sec_row') ): ?>
            <div class="symptoms_sec_row">
				<?php while( have_rows('symptoms_sec_row') ): the_row();?> 
	                <a href="<?php the_sub_field('link_url') ; ?>" class="symptoms_box">
	                    <div class="symptoms_box_img">
	                        <?php 
								$symptoms_box_img = get_sub_field('symptoms_box_img');
								if( !empty( $symptoms_box_img ) ): ?>
								    <img src="<?php echo esc_url($symptoms_box_img['url']); ?>" alt="<?php echo esc_attr($symptoms_box_img['alt']); ?>" />
							<?php endif; ?>
	                    </div>
	                    <div class="symptoms_box_content sixteen_p">
	                        <p><?php the_sub_field('symptoms_box_content') ; ?></p>
	                    </div>
	                </a>
				<?php endwhile; ?>
            </div>
		<?php endif; ?>
		<div class="symptoms_sec_row_title twenty_p">
            <?php the_field('symptoms_discription') ; ?>
        </div>
    </div>
</section>

<?php if ( 'yes' == get_field('slider_yes_no') ): ?>

<section class="product_slider_sec no_patch_sec bg_yellow">
	<div class="container">
	    <div class="product_slider_row">
	        <div class="sec_title">
	            <h2 class="title_h2"><?php the_field('products_section_title') ; ?></h2>
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
						<svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828"
							viewBox="0 0 8.414 14.828">
							<path id="Chevron_Icon" data-name="Chevron Icon" d="M0,0,6,6l6-6"
								transform="translate(7 1.414) rotate(90)" fill="none" stroke="#020202"
								stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						</svg>
					</div>
					<div class="swiper-button-next-product btn__product">
						<svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828"
							viewBox="0 0 8.414 14.828">
							<g id="Group_8251" data-name="Group 8251" transform="translate(-39.086 -78.086)">
								<path id="Chevron_Icon" data-name="Chevron Icon" d="M0,6,6,0l6,6"
									transform="translate(46.5 79.5) rotate(90)" fill="none" stroke="#020202"
									stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
							</g>
						</svg>
					</div>
				</div>
	    </div>
	</div>
</section>

<?php else: ?>
<?php endif; ?>

<section class="magnesium_sec bg_perablack">
    <div class="container">
        <div class="magnesium_title">
            <svg id="Group_8291" data-name="Group 8291" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" width="52.673" height="45.484"
                viewBox="0 0 52.673 45.484">
                <defs>
                    <clipPath id="clip-path">
                        <rect id="Rectangle_737" data-name="Rectangle 737" width="52.673" height="45.484"
                            fill="#fdf8eb" />
                    </clipPath>
                </defs>
                <g id="Group_8290" data-name="Group 8290" clip-path="url(#clip-path)">
                    <path id="Path_384" data-name="Path 384"
                        d="M51.973,9.557c-.987-1.95-3.086-3.04-5.915-3.072a6.77,6.77,0,0,1-4.882-1.566,6.05,6.05,0,0,0-3.816-1.773c-.2-.018-.395-.032-.595-.046-1.277-.092-2.6-.186-3.442-1.228-.119-.149-.227-.31-.342-.482A2.5,2.5,0,0,0,31.612.172a2.2,2.2,0,0,0-.6-.078,4.583,4.583,0,0,0-1.307.239A19.29,19.29,0,0,0,26.413,1.8c-.951-.79-2.218-1.8-3.536-1.8a2.636,2.636,0,0,0-1.722.664c-.188.158-.372.321-.553.482a7.822,7.822,0,0,1-1.644,1.226,8.724,8.724,0,0,1-3.242.742c-.53.053-1.079.108-1.623.207a5.325,5.325,0,0,0-2.955,1.428c-.106.108-.209.218-.308.324A3.559,3.559,0,0,1,9.421,6.147,8.416,8.416,0,0,1,6.759,6.5a11.459,11.459,0,0,0-2.193.2A5.725,5.725,0,0,0,1.4,8.512,6.1,6.1,0,0,0,.02,12.838a.637.637,0,0,0,.613.609c8.025.436,16.06,5.086,22.623,13.093.471.574.923,1.153,1.339,1.72.034.044.067.092.1.138.06.085.119.17.184.25a1.6,1.6,0,0,0,.14.149.576.576,0,0,0,.271.344c.073.122.147.248.218.374l.2.354v15a.6.6,0,0,0,.627.613.65.65,0,0,0,.423-.149.6.6,0,0,0,.2-.464v-15c.234-.374.482-.746.744-1.123a.666.666,0,0,0,.044-.067A41.98,41.98,0,0,1,32.7,22.935a35,35,0,0,1,11.013-7.568,25.234,25.234,0,0,1,8.324-1.92.637.637,0,0,0,.613-.609,6.286,6.286,0,0,0-.682-3.281M28.716,25.426c-.241.289-.462.56-.68.827,0-.014,0-.025,0-.039a29.6,29.6,0,0,1,.817-5.536,11.4,11.4,0,0,1,6.1-7.594,2.4,2.4,0,0,0,1.826.932.545.545,0,0,0,.055,0,.142.142,0,0,0,.034,0,2.376,2.376,0,0,0,1.582-4.108,2.378,2.378,0,0,0-1.628-.636,2.43,2.43,0,0,0-1.075.253,2.376,2.376,0,0,0-1.286,2.326c0,.028.007.057.009.085a12.432,12.432,0,0,0-6.682,7.913,22.844,22.844,0,0,0-.829,4.413V9.853A2.389,2.389,0,0,0,28.712,7.61c0-.018,0-.034,0-.046s0-.032,0-.044A2.41,2.41,0,0,0,27.15,5.33a2.284,2.284,0,0,0-.8-.145,2.373,2.373,0,0,0-1.83.85,2.406,2.406,0,0,0-.225,2.742,2.352,2.352,0,0,0,1.417,1.07V23.812a22.966,22.966,0,0,0-.923-3.736,13.4,13.4,0,0,0-7.171-8.165,1.784,1.784,0,0,0,.018-.22.34.34,0,0,0,0-.046.25.25,0,0,0,0-.044,2.406,2.406,0,0,0-1.559-2.188,2.255,2.255,0,0,0-.8-.145,2.371,2.371,0,0,0-1.828.847,2.406,2.406,0,0,0-.227,2.742,2.377,2.377,0,0,0,2.062,1.155,2.579,2.579,0,0,0,.441-.039,2.3,2.3,0,0,0,1.435-.9,12.412,12.412,0,0,1,6.59,7.842,24.9,24.9,0,0,1,.93,4.443c.025.22.055.445.085.673.021.154.041.31.062.466-.09-.115-.181-.23-.276-.349a47.207,47.207,0,0,0-3.594-4,36.386,36.386,0,0,0-11.5-7.92,26.626,26.626,0,0,0-8.2-1.991,5.035,5.035,0,0,1,.792-2.51A4.383,4.383,0,0,1,4.7,7.952,10.79,10.79,0,0,1,6.975,7.72a11.055,11.055,0,0,0,2.363-.243,4.3,4.3,0,0,0,2.2-1.3A4.339,4.339,0,0,1,13.361,4.8a10.38,10.38,0,0,1,2.494-.425,13.1,13.1,0,0,0,2.168-.317,7.5,7.5,0,0,0,2.889-1.488c.165-.138.324-.3.5-.466a2.775,2.775,0,0,1,1.272-.9,1.3,1.3,0,0,1,.214-.018c.9,0,1.982.932,2.7,1.55.115.1.223.193.319.273a.67.67,0,0,0,.434.168.647.647,0,0,0,.3-.078l.064-.034a21.025,21.025,0,0,1,3.208-1.483l.055-.018a3.468,3.468,0,0,1,1.013-.227.892.892,0,0,1,.335.057,2.176,2.176,0,0,1,.829.912,4.037,4.037,0,0,0,.53.721,6.04,6.04,0,0,0,4.138,1.341,5.244,5.244,0,0,1,2.395.567,5.756,5.756,0,0,1,1.017.817c.09.083.177.165.266.246a7.955,7.955,0,0,0,5.559,1.743c1.722.018,3.973.487,4.916,2.622a5.294,5.294,0,0,1,.441,1.869c-8.094.638-16.147,5.318-22.7,13.194"
                        transform="translate(0)" fill="#fdf8eb" />
                </g>
            </svg>
            <h2 class="title_h2_big"><?php the_field('magnesium_title') ; ?></h2>
        </div>
        <div class="magnesium_row">
            <div class="magnesium_fields">
                <ul id="tabList">
					<?php if( have_rows('rpt_list') ): ?>
						<?php while( have_rows('rpt_list') ): the_row();  ?>
                    		<li><a href="#relaxation"><?php the_sub_field('rpt_list_title') ; ?></a></li>
						<?php endwhile; ?>
					<?php endif; ?>
                </ul>
            </div>
			<?php if( have_rows('magnesium_content') ): ?>
 				<?php while( have_rows('magnesium_content') ): the_row(); ?>
		            <div class="magnesium_content">    
		                <div class="magnesium_content_row">
		                    <div class="magnesium_content_left">
		                        <?php 
									$magnesium_image = get_sub_field('magnesium_image');
									if( !empty( $magnesium_image ) ): ?>
									    <img src="<?php echo esc_url($magnesium_image['url']); ?>" alt="<?php echo esc_attr($magnesium_image['alt']); ?>" />
								<?php endif; ?>
		                        <div class="product_shop">
		                            <?php 
										$product_shop_btn = get_sub_field('product_shop_btn');
										if( $product_shop_btn ): 
										    $product_shop_btn_url = $product_shop_btn['url'];
										    $product_shop_btn_title = $product_shop_btn['title'];
										    $product_shop_btn_target = $product_shop_btn['target'] ? $product_shop_btn['target'] : '_self';
										    ?>
										    <a class="a_btn" href="<?php echo esc_url( $product_shop_btn_url ); ?>" target="<?php echo esc_attr( $product_shop_btn_target ); ?>"><?php echo esc_html( $product_shop_btn_title ); ?></a>
									<?php endif; ?>
		                        </div>
		                    </div>
		                    <div class="magnesium_content_right">
		                        <h3 class="title_h3"><?php the_sub_field('magnesium_sub_title') ; ?></h3>
		                        <?php the_sub_field('magnesium_discription') ; ?>
		                    </div>
		                </div>
		            </div>
				<?php endwhile; ?>
			<?php endif; ?>
        </div>
    </div>
    <div class="magnesium_bgimg">
        <?php 
			$magnesium_bgimg = get_field('magnesium_bgimg');
			if( !empty( $magnesium_bgimg ) ): ?>
			    <img src="<?php echo esc_url($magnesium_bgimg['url']); ?>" alt="<?php echo esc_attr($magnesium_bgimg['alt']); ?>" />
		<?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>