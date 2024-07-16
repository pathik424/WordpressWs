<?php
/*
 * Template name: Home
 */

get_header(); ?>
<?php
// Include WooCommerce notices on the home page
wc_print_notices();
?>


<section class="hero_banner_sec bg_eggshell">
    <div class="container">
        <div class="hero_banner_row">
            <div class="hero_banner_contant">
                <div class="banner_content_top twenty_p">
                    <p> <?php the_field('hero_banner_sub_title'); ?> </p>
                </div>
                <h1 class="title_h1"> <?php the_field('hero_banner_main_title'); ?> </h1>
                <?php
                $banner_shop_btn = get_field('banner_shop_btn');
                if ($banner_shop_btn) :
                    $banner_shop_btn_url = $banner_shop_btn['url'];
                    $banner_shop_btn_title = $banner_shop_btn['title'];
                    $banner_shop_btn_target = $banner_shop_btn['target'] ? $banner_shop_btn['target'] : '_self';
                ?>
                    <a class="a_btn" href="<?php echo esc_url($banner_shop_btn_url); ?>" target="<?php echo esc_attr($banner_shop_btn_target); ?>"><?php echo esc_html($banner_shop_btn_title); ?></a>
                <?php endif; ?>
            </div>
            <div class="hero_banner_image">
                <div class="hero_banner_image_row hero_banner_image_row1">
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 3) {
                            the_row();
                    ?>
							<?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                            <a class="banner_image_box" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                
                                    <span class="underline_btn"><?php echo esc_html($banner_shop_btn_right_title); ?></span>
                                <?php endif; ?>
                            </a>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                </div>
                <div class="hero_banner_image_row hero_banner_image_row2">
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 5) {
                            the_row();
                    ?>		
							<?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                            <a class="banner_image_box" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                
                                    <span class="underline_btn" \><?php echo esc_html($banner_shop_btn_right_title); ?></span>
                                <?php endif; ?>
                            </a>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                </div>
                <div class="hero_banner_image_row hero_banner_image_row3">
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 3) {
                            the_row();
                    ?>
							<?php
								$banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
								if ($banner_shop_btn_right) :
								$banner_shop_btn_right_url = $banner_shop_btn_right['url'];
								$banner_shop_btn_right_title = $banner_shop_btn_right['title'];
								$banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
							?>
                            <a class="banner_image_box" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                <span class="underline_btn"><?php echo esc_html($banner_shop_btn_right_title); ?></span>
                                <?php endif; ?>
                            </a>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                </div>
                <div class="hero_banner_image_row hero_banner_image_row4">
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 1) {
                            the_row();
                    ?>		
							<?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                            <a class="banner_image_box" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                
                                    <span class="underline_btn"><?php echo esc_html($banner_shop_btn_right_title); ?></span>
                                <?php endif; ?>
                            </a>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="hero_banner_image_mobile">
                <div class="hero_banner_image_row_mobile">
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                </div>
                <div class="hero_banner_image_row_mobile hero_banner_image_row1">
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 2) {
                            the_row();
                    ?>
                            <div class="banner_image_box">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                <?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                                    <a class="underline_btn" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>"><?php echo esc_html($banner_shop_btn_right_title); ?></a>
                                <?php endif; ?>
                            </div>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                </div>
                <div class="hero_banner_image_row_mobile hero_banner_image_row2">
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 3) {
                            the_row();
                    ?>
                            <div class="banner_image_box">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                <?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                                    <a class="underline_btn" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>"><?php echo esc_html($banner_shop_btn_right_title); ?></a>
                                <?php endif; ?>
                            </div>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                </div>
                <div class="hero_banner_image_row_mobile hero_banner_image_row3">
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 2) {
                            the_row();
                    ?>
                            <div class="banner_image_box">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                <?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                                    <a class="underline_btn" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>"><?php echo esc_html($banner_shop_btn_right_title); ?></a>
                                <?php endif; ?>
                            </div>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                </div>
                <div class="hero_banner_image_row_mobile hero_banner_image_row4">
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 3) {
                            the_row();
                    ?>
                            <div class="banner_image_box">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                <?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                                    <a class="underline_btn" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>"><?php echo esc_html($banner_shop_btn_right_title); ?></a>
                                <?php endif; ?>
                            </div>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                </div>
                <div class="hero_banner_image_row_mobile hero_banner_image_row4">
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                    <?php
                    if (have_rows('hero_banner_hexagone')) {
                        $row_number = 1;
                        while (have_rows('hero_banner_hexagone') && $row_number <= 2) {
                            the_row();
                    ?>
                            <div class="banner_image_box">
                                <div class="image_box_image" style="background-color:<?php the_sub_field('color'); ?>">
                                    <?php
                                    $banner_product_bg_image = get_sub_field('banner_product_bg_image');
                                    if (!empty($banner_product_bg_image)) : ?>
                                        <img src="<?php echo esc_url($banner_product_bg_image['url']); ?>" alt="<?php echo esc_attr($banner_product_bg_image['alt']); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="image_box_content">
                                    <p> <?php the_sub_field('banner_product_name'); ?> </p>
                                </div>
                                <?php
                                $banner_shop_btn_right = get_sub_field('banner_shop_btn_right');
                                if ($banner_shop_btn_right) :
                                    $banner_shop_btn_right_url = $banner_shop_btn_right['url'];
                                    $banner_shop_btn_right_title = $banner_shop_btn_right['title'];
                                    $banner_shop_btn_right_target = $banner_shop_btn_right['target'] ? $banner_shop_btn_right['target'] : '_self';
                                ?>
                                    <a class="underline_btn" href="<?php echo esc_url($banner_shop_btn_right_url); ?>" target="<?php echo esc_attr($banner_shop_btn_right_target); ?>"><?php echo esc_html($banner_shop_btn_right_title); ?></a>
                                <?php endif; ?>
                            </div>
                    <?php
                            $row_number++;
                        }
                    }
                    ?>
                    <div class="banner_image_box">
                        <div class="image_box_image bg_eggshell"></div>
                        <div class="image_box_content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_slider_sec">
    <div class="container">
        <div class="product_slider_row">
            <div class="sec_title">
                <h2 class="title_h2">Bestsellers</h2>
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

<section class="journey_sec">
    <div class="container">
        <div class="journey_sec_row">
            <div class="journey_sec_content">
                <h2 class="title_h2_big"><?php the_field('journey_sec_title'); ?></h2>
                <?php the_field('journey_sec_content'); ?>
                <?php
                $go_to_shop_btn = get_field('go_to_shop_btn');
                if ($go_to_shop_btn) :
                    $go_to_shop_btn_url = $go_to_shop_btn['url'];
                    $go_to_shop_btn_title = $go_to_shop_btn['title'];
                    $go_to_shop_btn_target = $go_to_shop_btn['target'] ? $go_to_shop_btn['target'] : '_self';
                ?>
                    <a class="a_btn" href="<?php echo esc_url($go_to_shop_btn_url); ?>" target="<?php echo esc_attr($go_to_shop_btn_target); ?>"><?php echo esc_html($go_to_shop_btn_title); ?></a>
                <?php endif; ?>
            </div>
            <div class="journey_sec_img">
                <div class="journey_images home-sec-img">
                    <?php
                    $journey_images = get_field('journey_images');
                    if (!empty($journey_images)) : ?>
                        <img src="<?php echo esc_url($journey_images['url']); ?>" alt="<?php echo esc_attr($journey_images['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="journey_sec_mainimg">
                    <?php
                    $journey_sec_mainimg = get_field('journey_sec_mainimg');
                    if (!empty($journey_sec_mainimg)) : ?>
                        <img src="<?php echo esc_url($journey_sec_mainimg['url']); ?>" alt="<?php echo esc_attr($journey_sec_mainimg['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why_lilybee_sec">
    <div class="container">
        <div class="why_lilybee_content">
            <div class="why_lilybee_title">
                <h2 class="title_h2_big"><?php the_field('why_lilybee_title'); ?></h2>
                <?php the_field('why_lilybee_content'); ?>
            </div>
            <?php if (have_rows('why_lilybee_row')) : ?>
                <div class="why_lilybee_row">
                    <?php while (have_rows('why_lilybee_row')) : the_row(); ?>
                        <div class="why_lilybee_box">
                            <div class="why_lilybee_box_img">
                                <?php
                                $why_lilybee_box_img = get_sub_field('why_lilybee_box_img');
                                if (!empty($why_lilybee_box_img)) : ?>
                                    <img src="<?php echo esc_url($why_lilybee_box_img['url']); ?>" alt="<?php echo esc_attr($why_lilybee_box_img['alt']); ?>" />
                                <?php endif; ?>
                            </div>
                            <div class="why_lilybee_box_info sixteen_p">
                                <p><?php the_sub_field('why_lilybee_content_info'); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <div class="about_us_btn">
                <?php
                $about_us_btn = get_field('about_us_btn');
                if ($about_us_btn) :
                    $about_us_btn_url = $about_us_btn['url'];
                    $about_us_btn_title = $about_us_btn['title'];
                    $about_us_btn_target = $about_us_btn['target'] ? $about_us_btn['target'] : '_self';
                ?>
                    <a class="a_btn primary_btn" href="<?php echo esc_url($about_us_btn_url); ?>" target="<?php echo esc_attr($about_us_btn_target); ?>"><?php echo esc_html($about_us_btn_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="why_lilybee_bg_image">
        <?php
        $why_lilybee_bg_image = get_field('why_lilybee_bg_image');
        if (!empty($why_lilybee_bg_image)) : ?>
            <img src="<?php echo esc_url($why_lilybee_bg_image['url']); ?>" alt="<?php echo esc_attr($why_lilybee_bg_image['alt']); ?>" />
        <?php endif; ?>
    </div>
</section>

<section class="journey_sec relief_sec">
    <div class="container">
        <div class="journey_sec_row">
            <div class="journey_sec_content">
                <h2 class="title_h2_big"><?php the_field('relif_section_title'); ?></h2>
                <?php the_field('relif_section_content'); ?>
                <div class="journey_sec_content_btn">
                    <?php
                    $relif_btn_1 = get_field('relif_btn_1');
                    if ($relif_btn_1) :
                        $relif_btn_1_url = $relif_btn_1['url'];
                        $relif_btn_1_title = $relif_btn_1['title'];
                        $relif_btn_1_target = $relif_btn_1['target'] ? $relif_btn_1['target'] : '_self';
                    ?>
                        <a class="a_btn" href="<?php echo esc_url($relif_btn_1_url); ?>" target="<?php echo esc_attr($relif_btn_1_target); ?>"><?php echo esc_html($relif_btn_1_title); ?></a>
                    <?php endif; ?>
                    <a href="#." class="a_btn white_btn popup-with-zoom-anim">
                        Watch Story
                        <svg xmlns="http://www.w3.org/2000/svg" width="10.257" height="11.723" viewBox="0 0 10.257 11.723">
                            <path id="Icon_awesome-play" data-name="Icon awesome-play" d="M9.717,4.917,1.658.153A1.093,1.093,0,0,0,0,1.1v9.527a1.1,1.1,0,0,0,1.658.946L9.717,6.808a1.1,1.1,0,0,0,0-1.891Z" transform="translate(0 -0.002)" fill="currentcolor" />
                        </svg>
						<div class="overlay"></div>
						<div class="popup">
							<a href="#." class="close-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.35793 7.99988L0.523438 1.16539L1.68894 -0.00012207L8.52344 6.83437L15.3579 -0.000118239L16.5234 1.16539L9.68894 7.99988L16.5234 14.8344L15.3579 15.9999L8.52344 9.16538L1.68895 15.9999L0.52344 14.8344L7.35793 7.99988Z" fill="#2F3D50"/>
                            </svg>
                        </a>
							<div class="dummy_video"><?php echo get_field('dummy_video'); ?></div>
						</div>
                    </a>
                </div>
            </div>
            <div class="journey_sec_img">
                <div class="journey_images">
                    <?php
                    $relif_img_1 = get_field('relif_img_1');
                    if (!empty($relif_img_1)) : ?>
                        <img src="<?php echo esc_url($relif_img_1['url']); ?>" alt="<?php echo esc_attr($relif_img_1['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="journey_sec_mainimg">
                    <?php
                    $relif_img_2 = get_field('relif_img_2');
                    if (!empty($relif_img_2)) : ?>
                        <img src="<?php echo esc_url($relif_img_2['url']); ?>" alt="<?php echo esc_attr($relif_img_2['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div id="watch-story" class="watch-story zoom-anim-dialog mfp-hide">
                <div class="watch-story_main">
                    <div class="watch-story_main_content">
                        <h4 class="title_h1"><?php the_field('watch_story_title'); ?> </h4>
                        <div class="watch_video">
                            <a href="#." class="play_button" id="playButton">
                                <svg xmlns="http://www.w3.org/2000/svg" width="31.016" height="35.449" viewBox="0 0 31.016 35.449">
                                    <path id="Icon_awesome-play" data-name="Icon awesome-play" d="M29.383,14.865,5.013.457A3.3,3.3,0,0,0,0,3.316V32.124a3.32,3.32,0,0,0,5.013,2.859l24.37-14.4a3.32,3.32,0,0,0,0-5.719Z" transform="translate(0 -0.002)" fill="#020202" />
                                </svg>
                            </a>
                            <video controls id="videoPopup" style="display: none;">
                                <source src="<?php the_field('watch_story_url'); ?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="watch-story_main_bgimg">
                        <?php
                        $watch_story_bg_image = get_field('watch_story_bg_image');
                        if (!empty($watch_story_bg_image)) : ?>
                            <img src="<?php echo esc_url($watch_story_bg_image['url']); ?>" alt="<?php echo esc_attr($watch_story_bg_image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="watch-story_main_patch">
                        <?php
                        $watch_story_pach = get_field('watch_story_pach');
                        if (!empty($watch_story_pach)) : ?>
                            <img src="<?php echo esc_url($watch_story_pach['url']); ?>" alt="<?php echo esc_attr($watch_story_pach['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ingredients_sec">
    <div class="container">
        <div class="ingredients_row">
            <div class="ingredients_title">
                <?php
                $ingredients_img = get_field('ingredients_img');
                if (!empty($ingredients_img)) : ?>
                    <img src="<?php echo esc_url($ingredients_img['url']); ?>" alt="<?php echo esc_attr($ingredients_img['alt']); ?>" />
                <?php endif; ?>
                <h2 class="title_h2_big"><?php the_field('ingredients_title'); ?></h2>
            </div>
            <div class="ingredients_content">
                <div class="ingredients_content_row">
                    <div class="swiper ingredients_slider">
                        <?php if (have_rows('ingredients_content_row')) : ?>
                            <div class="swiper-wrapper">
                                <?php while (have_rows('ingredients_content_row')) : the_row(); ?>
                                    <div class="swiper-slide">
                                        <div class="ingredients_info_box">
                                            <h3 class="title_h2 text_yellow"><?php the_sub_field('ingredients_info_title'); ?></h3>
                                            <?php the_sub_field('ingredients_info_content'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                        <div class="slider_btn">
                            <div class="swiper-button-prev-ingredients btn__product">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828" viewBox="0 0 8.414 14.828">
                                    <path id="Chevron_Icon" data-name="Chevron Icon" d="M0,0,6,6l6-6" transform="translate(7 1.414) rotate(90)" fill="none" stroke="#fefef1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </div>
                            <div class="swiper-button-next-ingredients btn__product">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828" viewBox="0 0 8.414 14.828">
                                    <path id="Chevron_Icon" data-name="Chevron Icon" d="M0,6,6,0l6,6" transform="translate(7.414 1.414) rotate(90)" fill="none" stroke="#fefef1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $ingredients_info_link = get_field('ingredients_info_link');
                if ($ingredients_info_link) :
                    $ingredients_info_link_url = $ingredients_info_link['url'];
                    $ingredients_info_link_title = $ingredients_info_link['title'];
                    $ingredients_info_link_target = $ingredients_info_link['target'] ? $ingredients_info_link['target'] : '_self';
                ?>
                    <a class="a_btn primary_btn" href="<?php echo esc_url($ingredients_info_link_url); ?>" target="<?php echo esc_attr($ingredients_info_link_target); ?>"><?php echo esc_html($ingredients_info_link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="ingredients_sec_bg">
        <?php
        $ingredients_sec_bg = get_field('ingredients_sec_bg');
        if (!empty($ingredients_sec_bg)) : ?>
            <img src="<?php echo esc_url($ingredients_sec_bg['url']); ?>" alt="<?php echo esc_attr($ingredients_sec_bg['alt']); ?>" />
        <?php endif; ?>
    </div>
</section>

<section class="find_product_sec bg_pera-white">
    <div class="container">
        <div class="find_product_title">
            <h2 class="title_h2_big"><?php the_field('find_product_title'); ?></h2>
            <div class="view_all_btn">
                <?php
                $view_all_btn = get_field('view_all_btn');
                if ($view_all_btn) :
                    $view_all_btn_url = $view_all_btn['url'];
                    $view_all_btn_title = $view_all_btn['title'];
                    $view_all_btn_target = $view_all_btn['target'] ? $view_all_btn['target'] : '_self';
                ?>
                    <a class="a_btn" href="<?php echo esc_url($view_all_btn_url); ?>" target="<?php echo esc_attr($view_all_btn_target); ?>"><?php echo esc_html($view_all_btn_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="find_product_content">
            <div class="swiper find_product_slider">
                <?php if (have_rows('find_slide')) : ?>
                    <div class="swiper-wrapper">
                        <?php while (have_rows('find_slide')) : the_row(); ?>
                            <div class="swiper-slide">
                                <div class="find_product_content_box">
                                    <div class="find_product_content_box_top">
                                        <div class="find_product_box_img">
                                            <?php
                                            $find_product_box_img = get_sub_field('find_product_box_img');
                                            if (!empty($find_product_box_img)) : ?>
                                                <img src="<?php echo esc_url($find_product_box_img['url']); ?>" alt="<?php echo esc_attr($find_product_box_img['alt']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="find_product_box_shop">
                                            <?php
                                            $find_product_box_shop = get_sub_field('find_product_box_shop');
                                            if ($find_product_box_shop) :
                                                $find_product_box_shop_url = $find_product_box_shop['url'];
                                                $find_product_box_shop_title = $find_product_box_shop['title'];
                                                $find_product_box_shop_target = $find_product_box_shop['target'] ? $find_product_box_shop['target'] : '_self';
                                            ?>
                                                <a class="a_btn" href="<?php echo esc_url($find_product_box_shop_url); ?>" target="<?php echo esc_attr($find_product_box_shop_target); ?>"><?php echo esc_html($find_product_box_shop_title); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="find_product_content_box_bottom">
                                        <h3 class="title_h3"><?php the_sub_field('find_product_box_title'); ?></h3>
                                        <?php the_sub_field('find_product_box_content'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <div class="swiper-pagination-find pagination_box"></div>
            </div>
            <div class="slider_btn">
                <div class="swiper-button-prev-find_product btn__product swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-5101fcb65bf10e9882" aria-disabled="true">
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2495_31)">
                            <path d="M7 1.41406L1 7.41406L7 13.4141" stroke="#020202" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2495_31">
                                <rect width="8.414" height="14.828" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="swiper-button-next-find_product btn__product" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-5101fcb65bf10e9882" aria-disabled="false">
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_2495_33)">
                            <path d="M1.41406 1.41406L7.41406 7.41406L1.41406 13.4141" stroke="#020202" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_2495_33">
                                <rect width="8.414" height="14.828" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product_slider_sec reverse_patch">
    <div class="container">
        <div class="product_slider_row">
            <div class="sec_title">
                <h2 class="title_h2">Featured</h2>
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
<!-- 				<div class="slider_btn">
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
				</div> -->
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

<section class="journey_sec reverse_sec natural_sec">
    <div class="container">
        <div class="journey_sec_row">
            <div class="journey_sec_content">
                <h2 class="title_h2_big"><?php the_field('natural_section_title'); ?></h2>
                <div class="natural_sec_details">
                    <?php the_field('natural_section_content'); ?>
                </div>
                <div class="journey_sec_content_btn">
                    <?php
                    $natural_section_btn = get_field('natural_section_btn');
                    if ($natural_section_btn) :
                        $natural_section_btn_url = $natural_section_btn['url'];
                        $natural_section_btn_title = $natural_section_btn['title'];
                        $natural_section_btn_target = $natural_section_btn['target'] ? $natural_section_btn['target'] : '_self';
                    ?>
                        <a class="a_btn" href="<?php echo esc_url($natural_section_btn_url); ?>" target="<?php echo esc_attr($natural_section_btn_target); ?>"><?php echo esc_html($natural_section_btn_title); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="journey_sec_img">
                <div class="journey_images">
                    <?php
                    $natural_img_1 = get_field('natural_img_1');
                    if (!empty($natural_img_1)) : ?>
                        <img src="<?php echo esc_url($natural_img_1['url']); ?>" alt="<?php echo esc_attr($natural_img_1['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <div class="journey_sec_mainimg">
                    <?php
                    $natural_img_2 = get_field('natural_img_2');
                    if (!empty($natural_img_2)) : ?>
                        <img src="<?php echo esc_url($natural_img_2['url']); ?>" alt="<?php echo esc_attr($natural_img_2['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>