<?php
/**
 * Title: Latest News
 * Slug: moving/latest-news
 * Categories: moving, latest-news
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"60px","left":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:60px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","align":"wide","fontSize":"section-title"} -->
<h2 class="wp-block-heading alignwide has-text-align-center has-section-title-font-size"><?php esc_html_e('Get Know Our Weekly Update News & Articles','moving'); ?></h2>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":4,"align":"wide","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontSize":"20px","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"var:preset|spacing|30"}}},"textColor":"primary"} -->
<h4 class="wp-block-heading alignwide has-text-align-center has-primary-color has-text-color has-link-color" style="margin-top:var(--wp--preset--spacing--30);font-size:20px;font-style:normal;font-weight:400"><?php esc_html_e('Latest News & Blogs','moving'); ?></h4>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e('To get more about the detailed more information about a babysitter name Caretaker read latest news and blog.','moving'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":3,"query":{"perPage":"3","pages":"1","offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"pos-relative","layout":{"type":"constrained"}} -->
<div class="wp-block-group pos-relative"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"className":"news-thumb-wrap"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0"},"padding":{"top":"0","bottom":"0"}},"color":{"background":"#f0f0f0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background" style="background-color:#f0f0f0;margin-top:0px;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"spacing":{"margin":{"top":"0","bottom":"0px"},"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"bottom":{"color":"var:preset|color|primary","width":"3px"}}},"backgroundColor":"secondary","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:3px;margin-top:0;margin-bottom:0px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"30px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:30px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-terms {"term":"category","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"white","fontSize":"extra-small"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","left":"0px","right":"0px"}},"border":{"radius":"30px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="border-radius:30px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:post-author {"textAlign":"center","showAvatar":false,"byline":"","isLink":true,"style":{"typography":{"textTransform":"capitalize"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:post-title {"textAlign":"left","level":5,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.2","fontSize":"20px"},"spacing":{"margin":{"top":"0"},"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}}}} /-->

<!-- wp:post-excerpt {"excerptLength":10,"style":{"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"0","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p><?php esc_html_e('There is no post found','moving'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->