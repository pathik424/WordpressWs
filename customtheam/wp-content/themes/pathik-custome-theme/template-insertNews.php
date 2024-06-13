<?php
//Template Name:add news

get_header();

// a form frontend mathi data fill karse
if(isset($_POST['savenews'])){
   // echo "string";
   //  wp_insert_post e pre define function che
   $id = wp_insert_post(
      array(
         'post type'=> 'news',
         'post_status'=>'draft',

         'post_title'=> $_POST['ntitle'],
         'post_content'=> $_POST['ndes'],

      )
      );

      wp_set_object_terms($id,$_POST['newscat'],'news_category');
}
?>
<?php
 echo "<pre>";
 print_r($_REQUEST);
//  print_r($_FILES);
 echo "</pre>"; 

 ?>


<form action="" method="post" style="padding: 20px;" class="formData">

<div>New Title</div>
<div>
   <input type="text" name="ntitle">
</div>
<div>New Description</div>
<div>
   <textarea name="ndes" id=""></textarea>
</div>
<select name="newscat" id="">
   <option value="">select category</option>
    <?php
   $newscat = get_terms(['taxnomy'=>'news_category','hide_empty'=>false,'orederby'=>'name','order'=>'DESC']);
//  print_r($newscat);
 // hide empty jo category hide hase e pan batavse
 
 foreach ($newscat as $value) {
   ?>

   <option value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>

   <?php } ?>
</select>
<button name ="savenews">Save News</button>
</form>
<div class="clear"></div>
      
<?php


get_footer();

?>