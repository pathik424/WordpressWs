<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lilybee
 */

get_header();
?>

	
<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs_row">
            <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
        </div>
    </div>
</section>


<section class="story_detail">
    <div class="story_detail_top bg_pera-white">
        <div class="container">
            <div class="story_detail_top_content">
                <div class="story_detail_title">
                    <h3> <?php
						// Get the categories for the current post
						$categories = get_the_category();

						// Check if there are categories assigned to the current post
						if ( ! empty( $categories ) ) {
						    // Loop through each category
						    foreach( $categories as $category ) {
						        // Output the category name and link
						        echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
						    }
						}
						?> 
					</h3>
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="story_detail_date twenty_p">
                    <p> <?php echo get_the_date('F j, Y'); ?> </p>
                </div>
                <div class="story_detail_img">
					<?php if ( has_post_thumbnail() ) {
                        the_post_thumbnail();
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="story_detail_bottom ">
        <div class="container">
            <div class="story_detail_content">
            	<?php the_content(); ?>
            </div>
        </div>
    </div>
</section>


 <section class="related_stories bg_pera-white">
    <div class="container">
        <a href="/story-list/" class="back_btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="22" viewBox="0 0 6 22">
                <text id="_" data-name="›" transform="matrix(-1, 0, 0, 1, 6, 17)" fill="#020202" font-size="18" font-family="Roboto-Regular, Roboto"><tspan x="0" y="0">›</tspan></text>
            </svg>
            Back to Stories                  
        </a>
        <div class="related_stories_title">
            <h2 class="title_h2_big">Related Stories</h2>
        </div>
        <?php
		    $related_args = array(
		        'post_type'      => 'post',
		        'post_status'    => 'publish',
		        'posts_per_page' => 3,
		        'category__in'   => wp_get_post_categories(get_the_ID()), // Change this to match your criteria
		        'post__not_in'   => array(get_the_ID()), // Exclude the current post
		    );

		    $related_loop = new WP_Query($related_args);

		    echo '<div class="stories_boxes">';

		    while ($related_loop->have_posts()) : $related_loop->the_post(); ?>
		        <div class="stories_box">
		        	<div class="stories_box_img">
	                    <?php if ( has_post_thumbnail() ) {
	                        the_post_thumbnail();
	                    } ?>
	                </div>
	                <div class="stories_box_content">
	                    <p><?php
						    $categories = get_the_category();
						    if ($categories) {
						        foreach ($categories as $category) {
						            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
						        }
						    }
						?></p>
	                    <h2 class="title_h2"><?php the_title(); ?></h2>
	                    <div class="stories_date">
	                        <p><?php echo esc_html(get_the_date('F j, Y')); ?></p>
	                    </div>
	                    <a href="<?php echo esc_url(get_permalink()); ?>" class="a_btn">Read More</a>
	                </div>
	            </div>
		    <?php endwhile;

		    echo '</div>';
		    wp_reset_postdata();
		    ?>
    </div>
</section>


<?php
get_footer();
