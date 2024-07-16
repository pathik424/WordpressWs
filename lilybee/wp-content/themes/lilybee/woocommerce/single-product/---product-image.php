<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

global $product;

$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
		'woocommerce-product-gallery--columns-' . absint($columns),
		'images',
	)
);
?>
<div class="product_details_img">
    <!-- Main product image slider -->
    <div class="swiper product_details_slider">
        <div class="swiper-wrapper">
            <?php
// Main product image without anchor tag
echo '<div class="swiper-slide">' . wp_get_attachment_image($post_thumbnail_id, 'woocommerce_single', false, array('class' => 'wp-post-image')) . '</div>';

// Gallery images
$attachment_ids = $product->get_gallery_image_ids();
if ($attachment_ids && is_array($attachment_ids)) {
	foreach ($attachment_ids as $attachment_id) {
		echo '<div class="swiper-slide">' . wp_get_attachment_image($attachment_id, 'woocommerce_single', false, array('class' => 'wp-post-image')) . '</div>';
	}
}
?>

        </div>
    </div>
    <!-- Thumbnail slider -->
    <div thumbsSlider="" class="swiper product_details_slider_thumb">
        <div class="swiper-wrapper">
            <?php
// Main product image without anchor tag
echo '<div class="swiper-slide">' . wp_get_attachment_image($post_thumbnail_id, 'woocommerce_single', false, array('class' => 'wp-post-image')) . '</div>';

// Gallery images
$attachment_ids = $product->get_gallery_image_ids();
if ($attachment_ids && is_array($attachment_ids)) {
	foreach ($attachment_ids as $attachment_id) {
		echo '<div class="swiper-slide">' . wp_get_attachment_image($attachment_id, 'woocommerce_single', false, array('class' => 'wp-post-image')) . '</div>';
	}
}
?>
        </div>
    </div>
</div>
