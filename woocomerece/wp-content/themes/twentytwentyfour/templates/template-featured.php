<?php
// Template Name: My Featured Page

get_header();

?>

<!-- Featured Section Header -->
<section class="featured-section">
    <div class="container">
        <h2 class="featured-title">My Best Selling Products</h2>
        <p class="featured-description">Discover our top-selling products that our customers love! Browse through our selection and find your next favorite item.</p>
    </div>
</section>

<?php

function display_best_selling_products() {
    // Query WooCommerce for best-selling products
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 6, // Number of products to display for the slider
        'meta_key' => 'total_sales', // Sort by total sales
        'orderby' => 'meta_value_num', // Order by total sales (numeric)
        'order' => 'DESC', // Descending order to get best sellers
        'meta_query' => array(
            array(
                'key' => '_price', // Ensure only products with a price are included
                'value' => 0,
                'compare' => '>',
                'type' => 'NUMERIC',
            ),
        ),
    );

    $best_selling_query = new WP_Query($args);

    // Check if there are any best-selling products
    if ($best_selling_query->have_posts()) {
        echo '<div class="best-selling-products-slider">';
        echo '<div class="slider-wrapper">';
        while ($best_selling_query->have_posts()) : $best_selling_query->the_post();
            global $product;

            // Get the product categories
            $product_categories = wp_get_post_terms(get_the_ID(), 'product_cat');
            $categories_list = array();
            foreach ($product_categories as $prod_cat) {
                $categories_list[] = $prod_cat->name;
            }
            $categories_string = implode(', ', $categories_list);

            // Display product details
            echo '<div class="best-selling-product">';
            echo '<a href="' . get_permalink() . '">' . woocommerce_get_product_thumbnail() . '</a>';
            echo '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
            echo '<p class="product-categories">' . $categories_string . '</p>'; // Display product categories
            echo '<div class="price">' . $product->get_price_html() . '</div>';
            echo '<p class="description">' . wp_trim_words(get_the_excerpt(), 20, '...') . '</p>'; // Display trimmed description
            echo '<a href="' . get_permalink() . '" class="button view-product">View Product</a>';
            echo '<a href="' . do_shortcode('[add_to_cart_url id="' . $product->get_id() . '"]') . '" class="button add-to-cart">Add to Cart</a>';
            echo '</div>';
        endwhile;
        echo '</div>';
        echo '</div>';

        wp_reset_postdata();
    } else {
        echo '<p>No best-selling products found.</p>';
    }
}

// Directly call the function to display the best-selling products
display_best_selling_products();

?>

<!-- Include Slick Slider CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<style>
/* Featured Section */
.featured-section {
    background-color: #f8f9fa; /* Light gray background */
    padding: 40px 20px; /* Top and bottom padding */
    text-align: center; /* Center align content */
}

.featured-title {
    font-size: 2em;
    color: #333;
    margin-bottom: 10px;
}

.featured-description {
    font-size: 1em;
    color: #555;
    margin-bottom: 20px;
}

/* Best Selling Products Slider */
.best-selling-products-slider {
    margin: 0 auto;
    padding: 20px;
    max-width: 1200px; /* Adjust to your desired max width */
    position: relative; /* Ensure arrows are positioned relative to the slider */
}

/* Style for individual product boxes */
.best-selling-product {
    text-align: center;
    border: 1px solid #ddd;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Image styles */
.best-selling-product img {
    max-width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
    margin-bottom: 15px;
}

/* Title styles */
.best-selling-product h3 {
    font-size: 1.2em;
    margin: 10px 0;
}

/* Product Categories styles */
.best-selling-product .product-categories {
    font-size: 0.9em;
    color: #777;
    margin-bottom: 10px;
}

/* Price styles */
.best-selling-product .price {
    font-size: 1em;
    color: #333;
    margin: 10px 0;
}

/* Description styles */
.best-selling-product .description {
    font-size: 0.9em;
    color: #666;
    margin-bottom: 15px;
}

/* Button styles */
.best-selling-product .button {
    display: inline-block;
    margin: 5px 0;
    padding: 10px 20px;
    background-color: #0071a1;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    text-align: center;
}

.best-selling-product .button:hover {
    background-color: #005f86;
}

/* Centered Navigation Arrows */
.slick-prev, .slick-next {
    width: 30px;
    height: 30px;
    background-color: #0071a1;
    color: #fff;
    border-radius: 50%;
    line-height: 30px;
    text-align: center;
    z-index: 1;
    opacity: 0.75;
}

.slick-prev:hover, .slick-next:hover {
    background-color: #005f86;
    opacity: 1;
}

.slick-prev {
    left: 10px; /* Distance from the left edge */
}

.slick-next {
    right: 10px; /* Distance from the right edge */
}

.slick-prev:before, .slick-next:before {
    font-size: 18px;
    color: #fff;
}

.slick-prev:before {
    content: '←';
}

.slick-next:before {
    content: '→';
}

/* Responsive styles */
@media (max-width: 768px) {
    .best-selling-product {
        flex: 1 1 100%; /* Single item per row on medium screens */
    }
}

@media (max-width: 480px) {
    .best-selling-product {
        flex: 1 1 100%; /* Single item per row on small screens */
    }
}
</style>

<!-- Include jQuery (required for Slick Slider) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Slick Slider JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

<script>
jQuery(document).ready(function($) {
    $('.slider-wrapper').slick({
        slidesToShow: 3, // Show 3 products per slide
        slidesToScroll: 1, // Scroll 1 product per click
        dots: true, // Show dots for pagination
        arrows: true, // Show next/prev arrows
        infinite: true, // Infinite loop
        autoplay: true, // Auto-slide
        autoplaySpeed: 10000, // Auto-slide speed (in milliseconds)
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2, // Show 2 products per slide on medium screens
                    slidesToScroll: 1, // Scroll 1 product per click
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1, // Show 1 product per slide on small screens
                    slidesToScroll: 1, // Scroll 1 product per click
                }
            }
        ]
    });
});
</script>

<?php get_footer(); ?>
