<?php
/**
 * Add theme page
 */

function automobile_car_shop_menu() {
	add_theme_page( esc_html__( 'Automobile Car Shop', 'automobile-car-shop' ), esc_html__( 'Automobile Theme', 'automobile-car-shop' ), 'edit_theme_options', 'automobile-car-shop-info', 'automobile_car_shop_theme_page_display' );
}
add_action( 'admin_menu', 'automobile_car_shop_menu' );

function automobile_car_shop_admin_theme_style() {
	wp_enqueue_style('automobile-car-shop-custom-admin-style', esc_url(get_template_directory_uri()) . '/css/admin-style.css');
	wp_enqueue_script('automobile-car-shop-tabs', esc_url(get_template_directory_uri()) . '/js/tab.js');
}
add_action('admin_enqueue_scripts', 'automobile_car_shop_admin_theme_style');

/**
 * Display About page
 */
function automobile_car_shop_theme_page_display() {
	$theme = wp_get_theme();

	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	} ?>

	<div class="wrapper-info">
	    <div class="col-left">
	    	<h2><?php esc_html_e( 'Welcome to Automobile Car Shop Theme', 'automobile-car-shop' ); ?> <span class="version"><?php esc_html_e('Version:','automobile-car-shop'); ?> <?php echo esc_html($theme['Version']);?></span></h2>
	    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','automobile-car-shop'); ?></p>
	    </div>
	    <div class="col-right">
	    	<div class="logo">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/final-logo.png" alt="" />
			</div>
			<div class="update-now">
				<h4><?php esc_html_e('Automobile Car Shop Pro Theme','automobile-car-shop'); ?></h4>
				<h4><?php esc_html_e('Use Coupon','automobile-car-shop'); ?> ( <span><?php esc_html_e('vwpro20','automobile-car-shop'); ?></span> ) </h4>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'automobile-car-shop' ); ?></a>
				</div>
			</div>
	    </div>

	    <div class="tab-sec">
			<div class="tab">
				<button class="tablinks" onclick="automobile_car_shop_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Free Setup', 'automobile-car-shop' ); ?></button>
			  	<button class="tablinks" onclick="automobile_car_shop_open_tab(event, 'pro_theme')"><?php esc_html_e( 'Get Premium', 'automobile-car-shop' ); ?></button>
			  	<button class="tablinks" onclick="automobile_car_shop_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'automobile-car-shop' ); ?></button>
			</div>

			<div id="lite_theme" class="tabcontent open">
				<div class="lite-theme-tab">
					<h3><?php esc_html_e( 'Lite Theme Information', 'automobile-car-shop' ); ?></h3>
					<hr class="h3hr">
				  	<p><?php esc_html_e('Automobile Car Shop is a dynamic and adaptable website template designed for enterprises within the automotive domain. The theme is tailored to suit car dealerships, auto repair shops, and car rental agencies, among others. It stands as an essential avenue for establishing a robust online footprint. The Automobile Car Shop theme comes with all the necessary tools and features required to create a professional online presence. By harnessing its intuitive interface and customizable attributes, businesses can effectively spotlight their spectrum of offerings while delivering a seamless browsing experience for visitors. The theme presents an assortment of pre-designed templates and layouts meticulously curated to cater to the automotive sector. If you own a Car Service Mot, auto accessories, auto detailing, mechanic workshops, car listing, auto listing, car dealership, automobile showroom, car shop, mechanics shops, wheel shop, car dealers, garages and car rental agencies, mechanic auto shop, mechanic workshop, auto car, auto detailing, auto mechanic, auto accessories spare parts, stuning shop, tools shop,  car parts, car store this theme is your solution. These layouts are inherently responsive, ensuring a uniform presentation and functionality across diverse devices, encompassing desktops, tablets, and smartphones, thus bridging the mobile-user divide and bolstering search engine ranking prospects. It is also cross-browser compatible, ensuring your website can be accessed through any web browser. Moreover, it includes systems that allow you to easily book appointments or rent vehicles online, which is really important for businesses like car rental companies and places that fix cars. Changing how the website looks is also important, as it lets businesses make the website match their colors, fonts, and style to their own brand. The theme is also really good at helping the website show up more when people search on websites like Google, which brings in more people who are interested. This makes the website more popular without having to pay for ads. Demo: https://www.vwthemes.net/automobile-car-shop/','automobile-car-shop'); ?></p>
				  	<div class="col-left-inner">
						<div class="pro-links">
					    	<a href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site', 'automobile-car-shop'); ?></a>
							<a href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site', 'automobile-car-shop'); ?></a>
						</div>
						<div class="support-forum-col-section">
							<div class="support-forum-col">
								<h4><?php esc_html_e('Having Trouble, Need Support?', 'automobile-car-shop'); ?></h4>
								<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'automobile-car-shop'); ?></p>
								<div class="info-link">
									<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'automobile-car-shop'); ?></a>
								</div>
							</div>
							<div class="support-forum-col">
								<h4><?php esc_html_e('Reviews & Testimonials', 'automobile-car-shop'); ?></h4>
								<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'automobile-car-shop'); ?>  </p>
								<div class="info-link">
									<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'automobile-car-shop'); ?></a>
								</div>
							</div>
							<div class="support-forum-col">
								<h4><?php esc_html_e('Theme Documentation', 'automobile-car-shop'); ?></h4>
								<p> <?php esc_html_e('If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'automobile-car-shop'); ?>  </p>
								<div class="info-link">
									<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Free Theme Documentation', 'automobile-car-shop'); ?></a>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="pro_theme" class="tabcontent">
			  	<h3><?php esc_html_e( 'Premium Theme Information', 'automobile-car-shop' ); ?></h3>
				<hr class="h3hr">
			    <div class="col-left-pro">
			    	<p><?php esc_html_e('The Car Dealership WordPress Theme is a cutting-edge solution designed to transform your automotive website into an engaging and efficient platform. With a sleek and modern appearance, this theme captures attention while offering a user-friendly layout that showcases your vehicles with elegance. Its carefully crafted design ensures seamless navigation and provides an immersive browsing experience for your potential customers. The theme’s layout prioritizes clarity and organization, allowing visitors to effortlessly explore your car inventory, view detailed specifications, and compare different options. Its responsive design guarantees optimal functionality across various devices, ensuring that users have a consistent experience whether they’re on a desktop, tablet, or smartphone. Beyond its aesthetic appeal, this premium theme is equipped with a range of features and functionalities tailored for car listings. Robust search and filtering options enable users to find their desired vehicles quickly. Advanced booking and inquiry forms facilitate customer engagement, while integration with social media platforms enhances your online reach. Experience the benefits of premium features such as priority customer support, regular updates, and enhanced security measures. With customizable design options, you can align the theme’s appearance with your brand identity. Boost your website’s performance and elevate your car listing business with the power of the Car Dealership WordPress Theme.','automobile-car-shop'); ?></p>
			    	<div class="pro-links">
				    	<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'automobile-car-shop'); ?></a>
						<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'automobile-car-shop'); ?></a>
						<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'automobile-car-shop'); ?></a>
					</div>
			    </div>
			    <div class="col-right-pro">
			    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/pro.png" alt="" />
			    </div>
			  <div class="featurebox">
				    <h3 class="theme-features"><?php esc_html_e( 'Theme Features', 'automobile-car-shop' ); ?></h3>
					<hr class="h3hr1">
					<div class="table-image">
						<table class="tablebox">
							<thead>
								<tr>
									<th><?php esc_html_e('Features', 'automobile-car-shop'); ?></th>
									<th><?php esc_html_e('Free Themes', 'automobile-car-shop'); ?></th>
									<th><?php esc_html_e('Premium Themes', 'automobile-car-shop'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php esc_html_e('Easy Setup', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Responsive Design', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('SEO Friendly', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Banner Settings', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Number of Slider/ Banner', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('Banner', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('Unlimited Slides', 'automobile-car-shop'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Template Pages', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('14', 'automobile-car-shop'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Home Page Template', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('1', 'automobile-car-shop'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Theme sections', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('2', 'automobile-car-shop'); ?></td>
									<td class="table-img"><?php esc_html_e('13', 'automobile-car-shop'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Contact us Page Template', 'automobile-car-shop'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('1', 'automobile-car-shop'); ?></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Blog Templates & Layout', 'automobile-car-shop'); ?></td>
									<td class="table-img">0</td>
									<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'automobile-car-shop'); ?></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Section Reordering', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Demo Importer', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Full Documentation', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Latest WordPress Compatibility', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Woo-Commerce Compatibility', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Support 3rd Party Plugins', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Secure and Optimized Code', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Exclusive Functionalities', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Section Enable / Disable', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Section Google Font Choices', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Gallery', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Simple & Mega Menu Option', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Support to add custom CSS / JS ', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Shortcodes', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Premium Membership', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Budget Friendly Value', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Priority Error Fixing', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Custom Feature Addition', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('All Access Theme Pass', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Seamless Customer Support', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('WordPress 6.4 or later', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('PHP 8.2 or 8.3', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Test Drive Booking', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('360 degree care view feature', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr class="odd">
									<td><?php esc_html_e('Premium Car Gallery', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
									<td><?php esc_html_e('Car Listing', 'automobile-car-shop'); ?></td>
									<td class="table-img"><span class="dashicons dashicons-no"></span></td>
									<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								</tr>
								<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'automobile-car-shop'); ?></a></td>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>

			<div id="free_pro" class="tabcontent">
				<div class="support-sec">
				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'automobile-car-shop'); ?></h4>
						<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'automobile-car-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'automobile-car-shop'); ?></a>
						</div>
				  	</div>
				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'automobile-car-shop'); ?></h4>
						<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'automobile-car-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'automobile-car-shop'); ?></a>
						</div>
				  	</div>

				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'automobile-car-shop'); ?></h4>
						<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'automobile-car-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','automobile-car-shop'); ?></a>
						</div>
				  	</div>

				  	<div class="col-2">
				  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'automobile-car-shop'); ?></h4>
						<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'automobile-car-shop'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( AUTOMOBILE_CAR_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'automobile-car-shop'); ?></a>
						</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>
<?php }?>
