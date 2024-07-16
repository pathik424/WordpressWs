<?php
/*
 * Template name: Story List
 */

get_header(); ?>

<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs_row">
            <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
        </div>
    </div>
</section>

<section class="stories_banner bg_cream">
    <div class="container">
		<?php 
                            $stories_banner_image = get_field('stories_banner_image');
                            if( !empty( $stories_banner_image ) ): ?>
						 <?php endif; ?>
        <?php
        $args = array(
            'post_type'      => 'post', // Assuming post type is 'post', change it to 'news' if necessary
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            // Add any additional query parameters as needed
        );

        $featured_post = new WP_Query($args);

        if ($featured_post->have_posts()) :
            $featured_post->the_post(); ?>
            <div class="stories_banner_row">
                <div class="stories_banner_content">
                    <div class="stories_banner_spantitle twenty_p">
                        <p><?php
                            $categories = get_the_category();
                            if ($categories) {
                                foreach ($categories as $category) {
                                    echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                }
                            }
                            ?></p>
                    </div>
                    <h1 class="title_h1"> <?php the_title(); ?> </h1>
                    <div class="strories_date twenty_p">
                        <p><?php echo esc_html(get_the_date('F j, Y')); ?></p>
                    </div>
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="a_btn">Read more</a>
                </div>
                <div class="stories_banner_img">
<!--                     <div class="stories_banner_mainimg">
                                <img src="<?php echo esc_url($stories_banner_image['url']); ?>" alt="<?php echo esc_attr($stories_banner_image['alt']); ?>" />
                       
                    </div> -->
                    <div class="stories_banner_secimg">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        } ?>
                    </div>
                </div>
            </div>
            <?php
            wp_reset_postdata();
        else :
            echo '<p>No posts found</p>';
        endif;
        ?>
    </div>
    <div class="stories_banner_bgimg">
        <?php 
            $stories_banner_bg_image = get_field('stories_banner_bg_image');
            if( !empty( $stories_banner_bg_image ) ): ?>
                <img src="<?php echo esc_url($stories_banner_bg_image['url']); ?>" alt="<?php echo esc_attr($stories_banner_bg_image['alt']); ?>" />
        <?php endif; ?>
    </div>
</section>


<section class="latest_stories bg_pera-white">
    <div class="container">
        <div class="latest_stories_title">
            <div class="latest_stories_info twenty_p">
                <h2 class="title_h2_big"> <?php the_field('latest_stories_title') ; ?> </h2>
                <p> <?php the_field('latest_stories_description') ; ?></p>
            </div>
            <div class="view_all_stories">
                <a href="#." id="view-all-stories">View All Stories</a>
            </div>
        </div>
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$posts_per_page = isset($_GET['view_all']) && $_GET['view_all'] === 'true' ? -1 : 3;

$args = array(
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'order'          => 'DESC',
);

$loop = new WP_Query($args);

        $loop = new WP_Query($args);

        if ($loop->have_posts()) :
            echo '<div class="stories_boxes">';

            while ($loop->have_posts()) : $loop->the_post();
                ?>
                <div class="stories_box">
                    <div class="stories_box_img">
                        <?php if (has_post_thumbnail()) {
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

            // Pagination
            echo '<div class="blog_pagination section_padding">';
            echo paginate_links(array(
                'total'   => $loop->max_num_pages,
                'current' => max(1, get_query_var('paged')),
            ));
            echo '</div>';
        else :
            echo '<p>No posts found</p>';
        endif;
        ?>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('view-all-stories').addEventListener('click', function(event) {
            event.preventDefault();
            // Redirect to the same page URL with a query parameter indicating to show all posts
            window.location.href = '<?php echo esc_url(add_query_arg('view_all', 'true')); ?>';
        });
    });
</script>

<?php get_footer(); ?>
