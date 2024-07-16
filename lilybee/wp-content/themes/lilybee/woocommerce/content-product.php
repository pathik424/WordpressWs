<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<!-- <li <?php wc_product_class('', $product);?>> -->
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
$average_rating = $product->get_average_rating();

// Check if the product has ratings
if ($average_rating > 0) {
	// Output the default rating stars
	echo wc_get_rating_html($average_rating);
} else {
	// Output custom HTML for products without reviews
	echo '<div class="star-rating" role="img" aria-label="Not yet rated"></div>';
}
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
echo apply_filters('woocommerce_loop_add_to_cart_link',
	sprintf('<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="a_btn add-to-cart %s">%s</a>',
		esc_url($product->add_to_cart_url()),
		esc_attr($product->get_id()),
		esc_attr($product->get_sku()),
		$product->is_purchasable() ? 'add_to_cart_button' : '',
		esc_html($product->add_to_cart_text())
	),
	$product);
?>
        <!-- <a href="#." class="a_btn add-to-cart">Add to cart</a> -->
    </div>
</div>
