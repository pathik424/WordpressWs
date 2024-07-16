<?php
/*
 * Template name: Contact Us
 */

get_header(); ?>

<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs_row">
            <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
        </div>
    </div>
</section>

<section class="inner_banner contact_us_banner">
    <div class="container">
        <div class="inner_banner_row">
            <div class="inner_banner_spantitle twenty_p">
                <p><?php the_field('inner_banner_span_title') ; ?></p>
            </div>
            <h1 class="title_h1"><?php the_field('inner_banner_title') ; ?></h1>
        </div>
    </div>
    <div class="inner_banner_bgimg">
        <?php 
			$inner_banner_bgimg = get_field('inner_banner_bgimg');
			if( !empty( $inner_banner_bgimg ) ): ?>
			    <img src="<?php echo esc_url($inner_banner_bgimg['url']); ?>" alt="<?php echo esc_attr($inner_banner_bgimg['alt']); ?>" />
		<?php endif; ?>
    </div>
</section>

<section class="contact_us">
    <div class="container">
        <div class="contact_us_title">
            <h2 class="title_h2_big"><?php the_field('contact_us_title') ; ?></h2>
        </div>
        <div class="contact_us_content">
            <div class="contact_us_content_left">
                <div class="contact_us_left_title">
                    <h2 class="title_h2"><?php the_field('contact_us_info_title') ; ?></h2>
                </div>
				<?php if( have_rows('contact_us_left_boxes') ): ?>
                	<div class="contact_us_left_boxes">
						<?php while( have_rows('contact_us_left_boxes') ): the_row(); ?>
		                    <div class="contact_us_left_box">
		                        <div class="contact_left_box_text sixteen_p">
		                            <p><?php the_sub_field('contact_us_content') ; ?></p>
		                        </div>		            
		                        <?php the_sub_field('contact_us_discription' ) ; ?>
		                    </div>
						<?php endwhile; ?>
                	</div>
				<?php endif; ?>
            </div>
            <div class="contact_us_content_right">
				<p>Fields marked with an asterix (*) are required.</p>
				<?php echo do_shortcode('[forminator_form id="497"]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>