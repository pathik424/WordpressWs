<?php
//Template Name:home

get_header();

$cat = get_categories(array('taxonomy = category'));
echo "<pre>";
print_r($cat);
echo "</pre>";

?>

<!-- banner section start -->
<div class="banner_section layout_padding">
   <div class="container">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
</div>
<!-- banner section end -->
</div>
<!-- banner bg main end -->
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
                        <div class="box_main">
                           <h4 class="shirt_text">Man T -shirt</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/tshirt-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Man -shirt</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/dress-shirt-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Woman Scart</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/women-clothes-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Man & Woman Fashion</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Man T -shirt</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/tshirt-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Man -shirt</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/dress-shirt-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Woman Scart</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/women-clothes-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Man & Woman Fashion</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Man T -shirt</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/tshirt-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Man -shirt</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/dress-shirt-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Woman Scart</h4>
                           <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                           <div class="tshirt_img"><img src="<?php echo get_template_directory_uri(); ?>/images/women-clothes-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
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
<!-- fashion section end -->
<!-- electronic section start -->
<div class="fashion_section">
   <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <h1 class="fashion_taital">Electronic</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Laptop</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/laptop-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Mobile</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Computers</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/computer-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Electronic</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Laptop</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/laptop-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Mobile</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Computers</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/computer-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Electronic</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Laptop</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/laptop-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Mobile</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/mobile-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Computers</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="electronic_img"><img src="<?php echo get_template_directory_uri(); ?>/images/computer-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>
   </div>
</div>
<!-- electronic section end -->
<!-- jewellery  section start -->
<div class="jewellery_section">
   <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <h1 class="fashion_taital">Jewellery Accessories</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Jumkas</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/jhumka-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Necklaces</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/neklesh-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Kangans</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/kangan-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Jewellery Accessories</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Jumkas</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/jhumka-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Necklaces</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/neklesh-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Kangans</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/kangan-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Jewellery Accessories</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Jumkas</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/jhumka-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Necklaces</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/neklesh-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                           <h4 class="shirt_text">Kangans</h4>
                           <p class="price_text">Start Price <span style="color: #262626;">$ 100</span></p>
                           <div class="jewellery_img"><img src="<?php echo get_template_directory_uri(); ?>/images/kangan-img.png"></div>
                           <div class="btn_main">
                              <div class="buy_bt"><a href="#">Buy Now</a></div>
                              <div class="seemore_bt"><a href="#">See More</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>
      <div class="loader_main">
         <div class="loader"></div>
      </div>
   </div>
</div>
<!-- jewellery  section end -->


<!-- Blog  section Start -->


<div class="wrap">
   <?php
      $wpnew = array(
         'post_type' => 'news',
         'post_status' => 'publish'
         );
         $newsquery = new Wp_Query($wpnew);
         
         while ($newsquery->have_posts()) {
            $newsquery->the_post();
            $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');    
            
            ?>
      <div class="article">
      

         <div class="overlay"></div>
         <div>
            <img src="<?php echo  $imagepath[0]  ?>" >
            <div class="wrap-cat">
               <span class="cat" data-hover=<?php the_title(); ?>><?php the_title(); ?></span>
            </div>
            </div>
         <h1>
            <span><?php the_title(); ?></span>
         <span><?php echo get_the_date(); ?></span>
      </h1>
   </div>
<?php } ?>
</div>

<style>
   @import url('https://fonts.googleapis.com/css?family=Oswald');
   @import url('https://fonts.googleapis.com/css?family=Lato');

   * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
   }

   body {
      background-image: url("https://www.nasa.gov/sites/all/themes/custom/nasatwo/images/starfield-banner.jpg");
   }

   .wrap {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      grid-gap: 10px;
      padding: 0.5em;
      perspective: 500px;
   }

   .article {
      display: flex;
      flex-direction: column;
      height: 300px;
      position: relative;
      background-size: cover;
      border-radius: 7px;
      overflow: hidden;
      padding: 1em;
      cursor: pointer;
      transform: rotateX(0deg) rotateY(0deg);
      transition: all 0.2s linear;
      will-change: transform;
   }

   /* .article:nth-child(5n+1) {
      background-image: url("https://images.unsplash.com/photo-1446776877081-d282a0f896e2?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
   }

   .article:nth-child(5n+2) {
      background-image: url("https://images.unsplash.com/photo-1518364538800-6bae3c2ea0f2?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
   }

   .article:nth-child(5n+3) {
      background-image: url("https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
   }

   .article:nth-child(5n+4) {
      background-image: url("https://images.unsplash.com/photo-1614121181207-4b6c334d353d?q=80&w=1776&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
   }

   .article:nth-child(5n+5) {
      background-image: url("https://images.unsplash.com/photo-1656077217715-bdaeb06bd01f?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
   } */


   .overlay {
      width: 100%;
      height: 100%;
      background-image: radial-gradient(circle at 50% 50%, rgba(0, 0, 0, 0.3) 20%, rgba(0, 0, 0, 0.4) 50%);
      position: absolute;
      left: 0;
      top: 0;
      z-index: 1;
   }

   .article h1 {
      font-size: 1.5em;
      font-family: 'Oswald';
      margin-top: auto;
      cursor: pointer;
      transition: all 0.3s;
      position: relative;
      z-index: 2;
      pointer-events: none;
   }

   .article h1 {
      transform: translateY(-20px)
   }

   .article h1 span {
      color: #fff;
   }

   .article span.cat {
      letter-spacing: 2px;
      font-weight: bold;
      font-family: 'Lato', sans-serif;
      position: relative;
      z-index: 2;
      pointer-events: none;
      overflow: hidden;
      color: #fff;
   }

   @media screen and (min-width:1000px) {
      .wrap {
         grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
         grid-gap: 20px;
         padding: 1em;
      }

      .article h1 {
         transform: translateY(0px);
      }

      .article:hover h1 {
         transform: translateY(-20px)
      }

      .article span.cat {
         color: transparent;
      }

      .article span.cat::before,
      .article span.cat::after {
         content: attr(data-hover);
         position: absolute;
         display: inline-block;
         left: 0;
         top: 0;
         white-space: nowrap;
         overflow: hidden;
         max-width: 0%;
         transition: max-width 300ms ease-out;
      }

      .article span.cat::before {
         color: yellow;
         transition-delay: 100ms;
      }

      .article span.cat::after {
         color: white;
      }

      .article:hover span.cat:after,
      .article:hover span.cat:before {
         max-width: 100%;
      }

      .article:hover span.cat:after {
         transition-delay: 300ms;
      }
   }
</style>

<script>
   let articles = document.querySelectorAll(".article");

   articles.forEach(i => {
      i.addEventListener(
         "mousemove",
         e => {
            let mouseX = e.offsetX;
            let mouseY = e.offsetY;
            i.querySelector(".overlay")
               .style.setProperty(
                  "background-image",
                  `radial-gradient(circle at ${(mouseX) * 100  / -i.offsetWidth+100}% ${(mouseY) * 100  / -i.offsetHeight+100}%,rgba(0,0,0,0.2) 25%,rgba(0,0,0,0.33) 50%)`
               );
            i.style.setProperty("transform", `rotateY(${  ( ( (mouseX*100) / i.offsetWidth - 50 ) / 100) * 2}deg) rotateX(${  ( ( (mouseY*100) / i.offsetHeight - 50 ) / 100) * 2}deg) `)
         },
         false
      );
      i.addEventListener("mouseleave", () => {
         i.style.setProperty("transform", `rotateX(0deg) rotateY(0deg)`);

         i.querySelector(".overlay")
            .style.setProperty(
               "background-image",
               `radial-gradient(circle at 50% 50%,rgba(0,0,0,0.2) 20%,rgba(0,0,0,0.3) 50%)`
            );
      })
   });
</script>

<!-- Blog  section end -->

<?php dynamic_sidebar('sidebar'); ?>

<?php
foreach ($cat as $catvalue) {
?>
   <a href="<?php echo get_category_link($catvalue->term_id); ?>">

      <h2><?php echo $catvalue->name ?>(<?php echo $catvalue->count ?>)</h2>
   </a>

<?php } ?>


<div class="box">

   <?php

   //wp query
   $wpnew = array(
      'post_type' => 'news',
      'post_status' => 'publish'
   );

   $newsquery = new Wp_Query($wpnew);

   while ($newsquery->have_posts()) {
      $newsquery->the_post();

   ?>
      <div class="bog-iteam">
      <?php } ?>

      </div>
      <div class="clear"></div>
</div>

<div>

<h1>
   Taxonomy Category News
</h1>

<?php
 $newscat = get_terms(['taxnomy'=>'news_category','hide_empty'=>false,'orederby'=>'name','order'=>'DESC']);
 print_r($newscat);
 // hide empty jo category hide hase e pan batavse
 
 foreach ($newscat as $value) {

  $meta_image = get_wp_term_image($value->term_id); 
   # code...

?>

<div>
   <div>
       <h2>

       <a href="<?php echo get_category_link($value->term_id); ?>">

          <?php echo ( $value->name); ?>(<?php echo $value->count ?>) 

         </h2>
      </div>
</div>
<?php } ?>


</div>



<?php


get_footer();

?>