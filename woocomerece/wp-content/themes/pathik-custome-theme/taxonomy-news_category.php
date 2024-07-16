<?php

get_header();

$catData = get_queried_object();
// print_r($catData);

$searchData='';
if($_GET['title']!=""){
   $searchData=$_GET['title'];
}



?>

<!-- Blog  section Start -->

<form action="" method="get">

   <div class="input-group rounded">
      <input type="text" class="form-control rounded" placeholder="Search by name" aria-label="Search" name="title" aria-describedby="search-addon" />
      <input type="submit" value="Search">
</div>
</form>


<div class="wrap">
   <?php
      $wpnew = array(
         'post_type' => 'news',
         'post_status' => 'publish',
         's'=>$searchData,
         'tax_query' => array(
            array(
               'taxonomy' => 'news_category',
               'field' => 'term_id',
               'terms' => $catData->term_id)
            ),

         );
         $newsquery = new Wp_Query($wpnew);
         
         while ($newsquery->have_posts()) {
            $newsquery->the_post();
            $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');    
            
            ?>
      <div class="article">
      
         
         <div class="overlay"></div>
         <?php $catData->name; ?>
         <div>
            <div class="wrap-cat">
               <span class="cat" data-hover=<?php the_title(); ?>><?php the_title(); ?></span>
            <img src="<?php echo  $imagepath[0]  ?>" >
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





<?php

get_footer();

?>