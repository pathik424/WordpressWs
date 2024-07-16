<?php

get_header();



?>




<!-- fashion section start -->
<div class="fashion_section">
   <div id="main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <h1 class="fashion_taital">Man & Woman Fashion</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <?php
                           while (have_posts()) {
                              the_post(); // For Counting loop Compulsory
                              //for Image
                              $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        ?>
                           <div class="box_main">
                              <h4 class="shirt_text"><?php the_title() // Title Show Karava Mate ?></h4>  
                              <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                              <div class="tshirt_img"><img src="<?php echo $imagepath[0] ?>"></div>
                              <p><?php echo the_excerpt(); // Short Description Mate ?></p>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#"><?php echo get_the_date(); // Date loop mate?></a></div>
                                 <div class="seemore_bt"><a href="<?php the_permalink(); // for use see full detail on single.php page?>">See More</a></div>
                              
                                 </div>
                                 </div>
                                 </div>
                              <?php   } ?>
                           </div>
                           </div>
                           </div>
                           </div>
                           
                           
                           </div>
      <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>
   </div>
</div>
<?php echo wp_pagenavi(); ?>
<!-- fashion section end -->


<?php // for widgets side bar set 
   get_sidebar(); ?>


<?php

get_footer();

?>