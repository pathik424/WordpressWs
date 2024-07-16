<?php get_header(); ?>

<?php//the Content thi e thase ke je word press ma page banavyu che eno data show thase apni theame ma ?>
<?php the_content();?>

<?php // for feature image show karava mate ?>
<div>
    <?php the_post_thumbnail(array(300,300));?>
</div>


<?php get_footer();?>