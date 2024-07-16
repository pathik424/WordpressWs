<?php
/**
 * The template for displaying category pages.
 *
 * @package YourTheme
 */

get_header();
?>

<section class="product_list_banner bg_cream product_cat_list">
    <div class="container">
        <div class="product_list_banner_row twenty_p">
            <h1 class="title_h2_big"><?php single_cat_title(); ?></h1>
        </div>
    </div>
</section>

<section class="stories_banner product_cat_list">
    <div class="container">
        <div class="stories_boxes">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    ?>
                    <div class="stories_box" id="post-<?php echo get_the_ID(); ?>" <?php post_class(); ?>>
                        <div class="stories_box_img">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail();
                            } ?>
                        </div>
                        <div class="stories_box_content">
                            <h2 class="title_h2"><?php the_title(); ?></h2>
                            <div class="stories_date">
                                <p><?php echo esc_html(get_the_date('F j, Y')); ?></p>
                            </div>
                            <a href="<?php echo esc_url(get_permalink()); ?>" class="a_btn">Read More</a>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
                <div class="pagination">
                    <?php the_posts_pagination(); ?>
                </div>
            <?php
            else :
                echo 'No blog posts found.';
            endif;
            ?>
        </div><!-- .stories_boxes -->
    </div><!-- .container -->
</section><!-- .stories_banner -->

<?php
get_footer();
?>
