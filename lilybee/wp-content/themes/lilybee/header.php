<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lilybee
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>


	<header>

	<!-- Add this to your header.php file -->
<div class="loader"></div>


		<div class="header_main">
			<div class="header_top bg_perablack">
				<div class="container">
					<div class="header_top_row">
						<div class="header_logo">
							<a href="<?php echo site_url(); ?>">
								<?php
								$site_logo = get_field('site_logo', 'option');
								if (!empty($site_logo)) : ?>
									<img src="<?php echo esc_url($site_logo['url']); ?>" alt="<?php echo esc_attr($site_logo['alt']); ?>" />
								<?php endif; ?>
							</a>
						</div>
						<div class="header_searchfield">
							<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
								<label>
									<input type="search" class="search-field" placeholder="What can we help you find?" value="<?php echo get_search_query(); ?>" name="s" />
								</label>
								<button type="submit" class="search-submit search_btn">
									<svg xmlns="http://www.w3.org/2000/svg" width="22.748" height="22.754" viewBox="0 0 22.748 22.754">
										<path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M26.981,25.6l-6.327-6.386A9.016,9.016,0,1,0,19.286,20.6l6.285,6.344a.974.974,0,0,0,1.374.036A.98.98,0,0,0,26.981,25.6ZM13.569,20.677A7.119,7.119,0,1,1,18.6,18.592,7.075,7.075,0,0,1,13.569,20.677Z" transform="translate(-4.5 -4.493)" fill="#f1c354" />
									</svg>
								</button>
							</form>
						</div>
						<div class="header_shipping_txt sixteen_p">
							<p><?php the_field('header_shipping_txt', 'option'); ?></p>
						</div>
						<div class="header_options">
							<a href="/my-account/" class="profile_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="24.75" height="24.75" viewBox="0 0 24.75 24.75">
									<path id="Icon_material-person" data-name="Icon material-person" d="M17.375,17.375a5.688,5.688,0,1,0-5.687-5.687A5.686,5.686,0,0,0,17.375,17.375Zm0,2.844C13.579,20.219,6,22.124,6,25.906V28.75H28.75V25.906C28.75,22.124,21.171,20.219,17.375,20.219Z" transform="translate(-5 -5)" fill="none" stroke="#fff" stroke-width="2" />
								</svg>
							</a>
							<a href="#." class="wishlist_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="23.66" height="22.75" viewBox="0 0 23.66 22.75">
									<path id="Icon_ionic-ios-heart-empty" data-name="Icon ionic-ios-heart-empty" d="M20.665,3.938h-.057A6.471,6.471,0,0,0,15.2,6.9,6.471,6.471,0,0,0,9.8,3.938H9.745a6.43,6.43,0,0,0-6.37,6.427,13.844,13.844,0,0,0,2.719,7.547A47.643,47.643,0,0,0,15.2,26.688a47.643,47.643,0,0,0,9.111-8.776,13.844,13.844,0,0,0,2.719-7.547A6.43,6.43,0,0,0,20.665,3.938Zm2.366,13.036A43.623,43.623,0,0,1,15.2,24.686a43.688,43.688,0,0,1-7.826-7.718,12.27,12.27,0,0,1-2.411-6.6A4.826,4.826,0,0,1,9.756,5.536h.051a4.768,4.768,0,0,1,2.338.614,4.97,4.97,0,0,1,1.729,1.621,1.6,1.6,0,0,0,2.673,0A5.019,5.019,0,0,1,18.276,6.15a4.768,4.768,0,0,1,2.338-.614h.051a4.826,4.826,0,0,1,4.789,4.829A12.425,12.425,0,0,1,23.031,16.973Z" transform="translate(-3.375 -3.938)" fill="#fff" />
								</svg>
							</a>
							<a href="/wordpressWS/lilybee/cart/" class="cart_icon">
								<svg xmlns="http://www.w3.org/2000/svg" width="25.833" height="24.75" viewBox="0 0 25.833 24.75">
									<g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(-0.5 -0.5)">
										<path id="Path_18" data-name="Path 18" d="M14.727,31.364A1.364,1.364,0,1,1,13.364,30,1.364,1.364,0,0,1,14.727,31.364Z" transform="translate(-3.113 -8.477)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
										<path id="Path_19" data-name="Path 19" d="M31.227,31.364A1.364,1.364,0,1,1,29.864,30,1.364,1.364,0,0,1,31.227,31.364Z" transform="translate(-8.621 -8.477)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
										<path id="Path_20" data-name="Path 20" d="M1.5,1.5H5.833l2.9,13A2.126,2.126,0,0,0,10.9,16.068h10.53A2.126,2.126,0,0,0,23.6,14.5l1.733-8.149H6.917" transform="translate(0 0)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
									</g>
								</svg>
							</a>

						</div>


						<div class="mobileIcon">
							<a href="#."></a>
						</div>
					</div>
				</div>
			</div>
			<div class="header_bottom bg_gray">
				<div class="container">
					<div class="header_bottom_row right_menu">
						<div class="product_nav">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'header_right',
									'menu_id'        => 'main-menu',
								)
							);
							?>
						</div>
						<div class="header_navbar">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'header_left',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</div>
					</div>
					<div class="mobile_bottom_header">
						<div class="header_shipping_txt sixteen_p">
							<p><?php the_field('header_shipping_txt', 'option'); ?></p>
						</div>
						<div class="header_searchfield">
							<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
								<label>
									<input type="search" class="search-field" placeholder="What can we help you find?" value="<?php echo get_search_query(); ?>" name="s" />
								</label>
								<button type="submit" class="search-submit search_btn">
									<svg xmlns="http://www.w3.org/2000/svg" width="22.748" height="22.754" viewBox="0 0 22.748 22.754">
										<path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M26.981,25.6l-6.327-6.386A9.016,9.016,0,1,0,19.286,20.6l6.285,6.344a.974.974,0,0,0,1.374.036A.98.98,0,0,0,26.981,25.6ZM13.569,20.677A7.119,7.119,0,1,1,18.6,18.592,7.075,7.075,0,0,1,13.569,20.677Z" transform="translate(-4.5 -4.493)" fill="#f1c354" />
									</svg>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>