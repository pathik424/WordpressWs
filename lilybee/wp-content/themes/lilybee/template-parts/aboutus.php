<?php
/*
 * Template name: About Us
 */

get_header(); ?>

<section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs_row">
            <?php echo get_hansel_and_gretel_breadcrumbs(); ?>
        </div>
    </div>
</section>

<section class="inner_banner">
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

<section class="journey_sec natural_sec about_content_sec">
    <div class="container">
        <div class="thankyou_sec">
            <div class="thankyou_sec_spantitle twenty_p">
                <p><?php the_field('about_content_span_title') ; ?></p>
            </div>
            <h2 class="title_h2_big"><?php the_field('about_content_sub_title') ; ?></h2>
        </div>
        <div class="journey_sec_row">
            <div class="journey_sec_content">
                <h2 class="title_h2"><?php the_field('about_content_title') ; ?></h2>
                <div class="natural_sec_details">
					<?php the_field('about_content') ; ?>
                </div>
            </div>
            <div class="journey_sec_img">
                <div class="journey_images">
                    <?php 
						$journey_image = get_field('journey_image');
						if( !empty( $journey_image ) ): ?>
						    <img src="<?php echo esc_url($journey_image['url']); ?>" alt="<?php echo esc_attr($journey_image['alt']); ?>" />
					<?php endif; ?>
                </div>
                <div class="journey_sec_mainimg">
                    <?php 
						$journey_sec_mainimg = get_field('journey_sec_mainimg');
						if( !empty( $journey_sec_mainimg ) ): ?>
						    <img src="<?php echo esc_url($journey_sec_mainimg['url']); ?>" alt="<?php echo esc_attr($journey_sec_mainimg['alt']); ?>" />
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="read_more bg_pera-white">
    <div class="container">
        <div class="read_more_title">
            <h2 class="title_h2_big"><?php the_field('read_more_title') ; ?></h2>
        </div>
        <?php if( have_rows('read_more_boxes') ): ?>
	        <div class="read_more_boxes">
				<?php while( have_rows('read_more_boxes') ): the_row();  ?>
		            <div class="read_more_box">
		                <div class="read_more_box_img">
		                    <?php 
								$read_more_box_img = get_sub_field('read_more_box_img');
								if( !empty( $read_more_box_img ) ): ?>
							    <img src="<?php echo esc_url($read_more_box_img['url']); ?>" alt="<?php echo esc_attr($read_more_box_img['alt']); ?>" />
							<?php endif; ?>
		                </div>
		                <div class="read_more_box_content">
		                    <h3 class="title_h2"><?php the_sub_field('read_more_box_text') ; ?></h3>
		                    <?php 
							$read_more_btn = get_sub_field('read_more_btn');
							if( $read_more_btn ): 
						    $read_more_btn_url = $read_more_btn['url'];
						    $read_more_btn_title = $read_more_btn['title'];
						    $read_more_btn_target = $read_more_btn['target'] ? $read_more_btn['target'] : '_self';
						    ?>
						    <a class="a_btn" href="<?php echo esc_url( $read_more_btn_url ); ?>" target="<?php echo esc_attr( $read_more_btn_target ); ?>"><?php echo esc_html( $read_more_btn_title ); ?></a>
						<?php endif; ?>
		                </div>
		            </div>
				<?php endwhile; ?>
	        </div>
		<?php endif; ?>
    </div>
</section>


<?php get_footer(); ?>