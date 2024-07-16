<?php
$categorycardoneID = get_theme_mod( 'card_image_one', '' );
$categorycardone = get_theme_mod( 'card_category_one', '' );

$categorycardtwoID = get_theme_mod( 'card_image_two', '' );
$categorycardtwo = get_theme_mod( 'card_category_two', '' );

$categorycardthreeID = get_theme_mod( 'card_image_three', '' );
$categorycardthree = get_theme_mod( 'card_category_three', '' );

$categorycardfourID = get_theme_mod( 'card_image_four', '' );
$categorycardfour = get_theme_mod( 'card_category_four', '' );

$categorycardfiveID = get_theme_mod( 'card_image_five', '' );
$categorycardfive = get_theme_mod( 'card_category_five', '' );

$categorycardsixID = get_theme_mod( 'card_image_six', '' );
$categorycardsix = get_theme_mod( 'card_category_six', '' );

$categorycardsevenID = get_theme_mod( 'card_image_seven', '' );
$categorycardseven = get_theme_mod( 'card_category_seven', '' );

$categorycardeightID = get_theme_mod( 'card_image_eight', '' );
$categorycardeight = get_theme_mod( 'card_category_eight', '' );


$category_card_one_array = array();
$category_card_two_array = array();
$has_card_one = false;
$has_card_two = false;
if( !empty( $categorycardoneID ) || !empty( $categorycardone ) ){
	$category_card_one = wp_get_attachment_image_src( $categorycardoneID ,'bosa-420-300');
 	if ( is_array( $category_card_one ) ){
 		$has_card_one = true;
   	 	$category_cards_one = $category_card_one[0];
   	 	$category_card_one_array['image_one'] ['ID'] = $category_cards_one;	 	
  	}
  	if ( !empty( $categorycardone ) ){
 		$has_card_one = true;
   	 	$category_card_one_array['image_one']['category'] = $categorycardone;	
  	}
}
if( !empty( $categorycardtwoID ) || !empty( $categorycardtwo ) ){
	$category_card_two = wp_get_attachment_image_src( $categorycardtwoID ,'bosa-420-300');
 	if ( is_array( $category_card_two ) ){
 		$has_card_one = true;
   	 	$category_cards_two = $category_card_two[0];
   	 	$category_card_one_array['image_two'] ['ID'] = $category_cards_two;	 	
  	}
  	if ( !empty( $categorycardtwo ) ){
 		$has_card_one = true;
   	 	$category_card_one_array['image_two']['category'] = $categorycardtwo;	
  	}
}
if( !empty( $categorycardthreeID ) || !empty( $categorycardthree ) ){
	$category_card_three = wp_get_attachment_image_src( $categorycardthreeID ,'bosa-420-300');
 	if ( is_array( $category_card_three ) ){
 		$has_card_one = true;
   	 	$category_cards_three = $category_card_three[0];
   	 	$category_card_one_array['image_three'] ['ID'] = $category_cards_three;	 	
  	}
  	if ( !empty( $categorycardthree ) ){
 		$has_card_one = true;
   	 	$category_card_one_array['image_three']['category'] = $categorycardthree;	
  	}
}
if( !empty( $categorycardfourID ) || !empty( $categorycardfour ) ){
	$category_card_four = wp_get_attachment_image_src( $categorycardfourID ,'bosa-420-300');
 	if ( is_array( $category_card_four ) ){
 		$has_card_one = true;
   	 	$category_cards_four = $category_card_four[0];
   	 	$category_card_one_array['image_four'] ['ID'] = $category_cards_four;	 	
  	}
  	if ( !empty($categorycardfour) ){
 		$has_card_one = true;
   	 	$category_card_one_array['image_four']['category'] = $categorycardfour;	
  	}
}
if( !empty( $categorycardfiveID ) || !empty( $categorycardfive ) ){
	$category_card_five = wp_get_attachment_image_src( $categorycardfiveID ,'bosa-420-300');
 	if ( is_array( $category_card_five ) ){
 		$has_card_two = true;
   	 	$category_cards_five = $category_card_five[0];
   	 	$category_card_two_array['image_five'] ['ID'] = $category_cards_five;	 	
  	}
  	if ( !empty( $categorycardfive ) ){
 		$has_card_two = true;
   	 	$category_card_two_array['image_five']['category'] = $categorycardfive;	
  	}
}
if( !empty( $categorycardsixID ) || !empty( $categorycardsix ) ){
	$category_card_six = wp_get_attachment_image_src( $categorycardsixID ,'bosa-420-300');
 	if ( is_array( $category_card_six ) ){
 		$has_card_two = true;
   	 	$category_cards_six = $category_card_six[0];
   	 	$category_card_two_array['image_six'] ['ID'] = $category_cards_six;	 	
  	}
  	if ( !empty( $categorycardsix ) ){
 		$has_card_two = true;
   	 	$category_card_two_array['image_six']['category'] = $categorycardsix;	
  	}
}
if( !empty( $categorycardsevenID ) || !empty( $categorycardseven ) ){
	$category_card_seven = wp_get_attachment_image_src( $categorycardsevenID ,'bosa-420-300');
 	if ( is_array( $category_card_seven ) ){
 		$has_card_two = true;
   	 	$category_cards_seven = $category_card_seven[0];
   	 	$category_card_two_array['image_seven'] ['ID'] = $category_cards_seven;	 	
  	}
  	if ( !empty( $categorycardseven ) ){
 		$has_card_two = true;
   	 	$category_card_two_array['image_seven']['category'] = $categorycardseven;	
  	}
}
if( !empty( $categorycardeightID ) || !empty( $categorycardeight ) ){
	$category_card_eight = wp_get_attachment_image_src( $categorycardeightID ,'bosa-420-300');
 	if ( is_array( $category_card_eight ) ){
 		$has_card_two = true;
   	 	$category_cards_eight = $category_card_eight[0];
   	 	$category_card_two_array['image_eight'] ['ID'] = $category_cards_eight;	 	
  	}
  	if ( !empty( $categorycardeight ) ){
 		$has_card_two = true;
   	 	$category_card_two_array['image_eight']['category'] = $categorycardeight;	
  	}
}

$product_cat = bosa_rental_car_get_product_categories();

if( !get_theme_mod( 'disable_category_cards_section', true ) && ( $has_card_one || $has_card_two || get_theme_mod( 'category_card_title_one' ) || get_theme_mod( 'category_card_title_two' ) ) ){ ?>
	<section class="section-card-category-area">
		<div class="row">
			<?php if( $has_card_one || get_theme_mod( 'category_card_title_one' ) ){ ?>
				<div class="col-lg-6">
					<?php if( get_theme_mod( 'category_card_title_one' ) ){ ?>
						<div class="section-title-wrap">
							<h2 class="section-title">	
								<?php echo esc_html( get_theme_mod( 'category_card_title_one' ) ); ?>
							</h2>
						</div>
					<?php } ?>
					<div class="content-wrap">
						<div class="row">
							<?php foreach( $category_card_one_array as $each_categorycardone ){ ?>
								<div class="col-sm-6">
									<article class="category-content-wrap">
										<?php 
										if ( isset( $each_categorycardone['ID'] ) && !empty( $each_categorycardone['ID'] ) ){
											$cat_url = '';
											if( isset( $each_categorycardone['category'] ) && !empty( $each_categorycardone['category'] ) ) {
												$cat_url = $each_categorycardone['category'];
											}
										?>
											<figure class= "featured-image">
												<a href="<?php echo esc_url( get_category_link( $cat_url ) ); ?>">
													<img src="<?php echo esc_url( $each_categorycardone['ID'] ); ?>">
												</a>	
											</figure>
										<?php } ?>
										<?php if ( isset( $each_categorycardone['category'] ) && !empty( $each_categorycardone['category'] ) ){ ?>
											<h5 class="entry-title">
												<a href="<?php echo esc_url( get_category_link( $each_categorycardone ['category'] ) ); ?>">
													<?php echo esc_html($product_cat[$each_categorycardone['category'] ] ); ?>
												</a>	
											</h5>
										<?php } ?>
									</article>	
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if( $has_card_two || get_theme_mod( 'category_card_title_two' ) ){ ?>
				<div class="col-lg-6">
					<?php if( get_theme_mod( 'category_card_title_two' ) ){ ?>
						<div class="section-title-wrap">
							<h2 class="section-title">	
								<?php echo esc_html( get_theme_mod( 'category_card_title_two' ) ); ?>
							</h2>
						</div>
					<?php } ?>
					<div class="content-wrap">
						<div class="row">
							<?php foreach( $category_card_two_array as $each_categorycardtwo ){ ?>
								<div class="col-sm-6">
									<article class="category-content-wrap">
										<?php 
										if ( isset( $each_categorycardtwo['ID'] ) && !empty( $each_categorycardtwo['ID'] ) ){
											$cat_url = '';
											if( isset( $each_categorycardtwo['category'] ) && !empty( $each_categorycardtwo['category'] ) ) {
												$cat_url = $each_categorycardtwo['category'];
											}
										?>
											<figure class= "featured-image">
												<a href="<?php echo esc_url( get_category_link( $cat_url ) ); ?>">
													<img src="<?php echo esc_url( $each_categorycardtwo['ID'] ); ?>">
												</a>	
											</figure>
										<?php } ?>
										<?php if ( isset( $each_categorycardtwo['category'] ) && !empty( $each_categorycardtwo['category'] ) ){ ?>
											<h5 class="entry-title">
												<a href="<?php echo esc_url( get_category_link( $each_categorycardtwo ['category'] ) ); ?>">
													<?php echo esc_html($product_cat[$each_categorycardtwo['category'] ] ); ?>
												</a>	
											</h5>
										<?php } ?>
									</article>	
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
<?php } ?>