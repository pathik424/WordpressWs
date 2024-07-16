<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lilybee
 */

?>


<section class="customer_say_sec bg_pera-white">
	<div class="container">
		<div class="customer_say_title">
			<h2 class="title_h2_big"><?php the_field('contact_banner_title', 'option'); ?></h2>
			<div id="trustpilot-widget-trustbox-0-wrapper" style="z-index: 1000; clear: both;margin-left: 0px; margin-right:  0px;margin-top: 0px; margin-bottom: 0px;" bis_skin_checked="1">
				<div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="634eff754b89780068df74f5" data-style-height="24px" data-style-width="100%" data-theme="light" data-style-alignment="center" id="trustpilot-widget-trustbox-0" style="z-index: 1000 !important; position: relative;" bis_skin_checked="1"><iframe title="Customer reviews powered by Trustpilot" loading="auto" src="https://widget.trustpilot.com/trustboxes/5419b6a8b0d04a076446a9ad/index.html?templateId=5419b6a8b0d04a076446a9ad&amp;businessunitId=634eff754b89780068df74f5#locale=en-US&amp;styleHeight=24px&amp;styleWidth=100%25&amp;theme=light&amp;styleAlignment=center" style="position: relative; height: 24px; width: 100%; border-style: none; display: block; overflow: hidden;" bis_size="{&quot;x&quot;:380,&quot;y&quot;:1955,&quot;w&quot;:1160,&quot;h&quot;:24,&quot;abs_x&quot;:380,&quot;abs_y&quot;:1955}"></iframe></div>
			</div>
			<?php //
			//$review_text_img = get_field('review_text_img' , 'option');
			// if( !empty( $review_text_img ) ): 
			?>
			<!-- <img src="<?php // echo esc_url($review_text_img['url']); 
							?>" alt="<?php // echo esc_attr($review_text_img['alt']); 
										?>" /> -->
			<?php // endif; 
			?>
		</div>
		<div class="customer_say_row">
			<div class="swiper review_slider">
				<?php if (have_rows('custmer_slider_main', 'option')) : ?>
					<div class="swiper-wrapper">
						<?php while (have_rows('custmer_slider_main', 'option')) : the_row(); ?>
							<div class="swiper-slide">
								<div class="customer_say_box">
									<div class="customer_rating">
										<?php
										$customer_rating = get_sub_field('customer_rating', 'option');
										if (!empty($customer_rating)) : ?>
											<img src="<?php echo esc_url($customer_rating['url']); ?>" alt="<?php echo esc_attr($customer_rating['alt']); ?>" />
										<?php endif; ?>
									</div>
									<div class="customer_review sixteen_p">
										<h3 class="title_h3"><?php the_sub_field('customer_review', 'option'); ?></h3>
										<?php the_sub_field('customer_sub_review'); ?>
									</div>
									<div class="customer_info">
										<p><?php the_sub_field('customer_info', 'option'); ?></p>
										<p><?php the_sub_field('customer_info_cmnt', 'option'); ?></p>
									</div>
									<div class="customer_view_all">
										<?php
										$customer_view_all = get_sub_field('customer_view_all', 'option');
										if ($customer_view_all) :
											$customer_view_all_url = $customer_view_all['url'];
											$customer_view_all_title = $customer_view_all['title'];
											$customer_view_all_target = $customer_view_all['target'] ? $customer_view_all['target'] : '_self';
										?>
											<a class="a_btn primary_btn" href="<?php echo esc_url($customer_view_all_url); ?>" target="<?php echo esc_attr($customer_view_all_target); ?>"><?php echo esc_html($customer_view_all_title); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				<div class="swiper-pagination-review pagination_box"></div>
				<div class="slider_btn">
					<div class="swiper-button-prev-review btn__product">
						<svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828" viewBox="0 0 8.414 14.828">
							<path id="Chevron_Icon" data-name="Chevron Icon" d="M0,0,6,6l6-6" transform="translate(7 1.414) rotate(90)" fill="none" stroke="#020202" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						</svg>
					</div>
					<div class="swiper-button-next-review btn__product">
						<svg xmlns="http://www.w3.org/2000/svg" width="8.414" height="14.828" viewBox="0 0 8.414 14.828">
							<path id="Chevron_Icon" data-name="Chevron Icon" d="M0,6,6,0l6,6" transform="translate(7.414 1.414) rotate(90)" fill="none" stroke="#020202" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
						</svg>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="mewsletter_sec">
	<div class="container">
		<div class="mewsletter_row bg_gray">
			<div class="mewsletter_left">
				<h2 class="title_h3"><?php the_field('cta_title', 'option'); ?></h2>
				<p><?php the_field('cta_content', 'option'); ?></p>
			</div>
			<div class="mewsletter_right">
				<!--<div class="input_field_email">
					<input type="email" placeholder="Enter your email..">
					<button class="a_btn primary_btn">Subscribe</button>
				</div>-->
                <?=  do_shortcode('[forminator_form id="693"]'); ?>
			</div>
		</div>
	</div>
</section>

<footer>
	<div class="footer_main">
		<div class="footer_top bg_perablack">
			<div class="container">
				<div class="footer_top_row">
					<div class="footer_logo">
						<a href="<?php echo site_url(); ?>">
							<?php
							$footer_logo = get_field('footer_logo', 'option');
							if (!empty($footer_logo)) : ?>
								<img src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($site_logo['alt']); ?>" />
							<?php endif; ?>
						</a>
					</div>
					<div class="footer_navbar">
						<div class="footer_nav_product">
							<h2 class="title_h6"><?php the_field('footer_nav_product', 'option'); ?></h2>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-left',
									'menu_id'        => 'Footer-left-menu',
								)
							);
							?>
						</div>
						<div class="footer_nav_menu">
							<h2 class="title_h6"><?php the_field('footer_nav_menu', 'option'); ?></h2>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-right',
									'menu_id'        => 'Footer-main-menu',
								)
							);
							?>
						</div>
						<div class="contact_footer">
							<div class="contact_media">
								<h2 class="title_h6"><?php the_field('contact_footer', 'option'); ?></h2>
								<?php if (have_rows('social_media', 'option')) : ?>
									<ul>
										<?php while (have_rows('social_media', 'option')) : the_row(); ?>
											<li>
												<a href="<?php the_sub_field('social_media_url', 'option'); ?>" target="_blank">
													<?php
													$social_media_icon = get_sub_field('social_media_icon', 'option');
													if (!empty($social_media_icon)) : ?>
														<img src="<?php echo esc_url($social_media_icon['url']); ?>" alt="<?php echo esc_attr($social_media_icon['alt']); ?>" />
													<?php endif; ?>
												</a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="shipping_txt_footer sixteen_p">
								<p><?php the_field('shipping_txt_footer', 'option'); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_bottom bg_gray">
			<div class="container">
				<div class="footer_bottom_row">
					<div class="footer_card_icon">
						<?php
						$footer_card_icon = get_field('footer_card_icon', 'option');
						if (!empty($footer_card_icon)) : ?>
							<img src="<?php echo esc_url($footer_card_icon['url']); ?>" alt="<?php echo esc_attr($footer_card_icon['alt']); ?>" />
						<?php endif; ?>
					</div>
					<div class="footer_copyright">
						<p><?php the_field('footer_copyright', 'option'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<script>
	$(document).ready(function() {
		//   $('.reviews_list_box_title').addClass('active');
		$('.reviews_list_box_main').slideUp();

		$('.reviews_list_box_title').on('click', function() {
			if ($(this).hasClass('active')) {
				$(this).siblings('.reviews_list_box_main').slideUp();
				$(this).removeClass('active');
			} else {
				$('.reviews_list_box_main').slideUp();
				$('.reviews_list_box_title').removeClass('active');
				$(this).siblings('.reviews_list_box_main').slideToggle();
				$(this).toggleClass('active');
			}
		});
	});

	/*************** form js **************/

	$(document).ready(function() {
		//   $('.reviews_list_box_title').addClass('active');
		$('#review_form form').slideUp();

		$('#review_form #reply-title').on('click', function() {
			if ($(this).hasClass('active')) {
				$(this).siblings('#review_form form').slideUp();
				$(this).removeClass('active');
			} else {
				$('#review_form form').slideUp();
				$('#review_form #reply-title').removeClass('active');
				$(this).siblings('#review_form form').slideToggle();
				$(this).toggleClass('active');
			}
		});
	});
</script>

<?php wp_footer(); ?>

</body>

</html>