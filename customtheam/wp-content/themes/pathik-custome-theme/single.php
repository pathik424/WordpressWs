<?php

// get_header();
the_post(); // the_author(); a banne jode lakhvu padse

?>


<h1><?php the_title(); ?></h1>
<h1>

   </h1>
   <?php
$imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');

?>
<div class="tshirt_img"><img src="<?php echo $imagepath[0] ?>"></div>
<h2>
   <div class="buy_bt"><a href="#">Date : <?php echo get_the_date(); // Date loop mate?></a></div>
   <div>Author Name :
      <?php the_author(); // the_post(); a banne jode lakhvu padse link che banne jode
 ?>
   </div>
</h2>
<div>
   <?php the_content(); ?>
   <?php //comment_form(); // ama khali form j dekhase?> 
   
   <?php comments_template(); ?>
</div>





<?php

// get_footer();

?>