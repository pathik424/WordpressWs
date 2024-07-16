<?php

/**
 * Title: Topbar Default
 * Slug: innometrics-business/topbar-default
 * Categories: innometrics-business, topbar
 */

$INNOMETRICS_BUSINESS_url = trailingslashit(get_template_directory_uri());
$INNOMETRICS_BUSINESS_images = array(
    $INNOMETRICS_BUSINESS_url . 'assets/images/call-us-icon.png',
);

?>
<!-- wp:columns {"verticalAlignment":null,"style":{"typography":{"lineHeight":"1"},"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"blue","className":"innometrics-topbar"} -->
<div class="wp-block-columns innometrics-topbar has-blue-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;line-height:1"><!-- wp:column {"verticalAlignment":"center","width":"70%","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);flex-basis:70%"><!-- wp:columns {"verticalAlignment":null} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"30%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:30%"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"right":{"color":"var:preset|color|meta-color","width":"1px"},"top":{},"bottom":{},"left":{}}},"className":"innometrics-header-callus","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center","orientation":"horizontal"}} -->
<div class="wp-block-group innometrics-header-callus" style="border-right-color:var(--wp--preset--color--meta-color);border-right-width:1px;padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:image {"id":9,"sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fit","flexSize":null}},"className":"is-style-default"} -->
<figure class="wp-block-image size-full is-style-default"><img src="<?php echo esc_url($INNOMETRICS_BUSINESS_images[0]) ?>" alt="" class="wp-image-9"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|orange"}}},"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"textColor":"orange","fontSize":"small","fontFamily":"libre-baskerville"} -->
<p class="has-orange-color has-text-color has-link-color has-libre-baskerville-font-family has-small-font-size" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><?php esc_html_e('Call Us:', 'innometrics-business'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"small","fontFamily":"libre-baskerville"} -->
<p class="has-light-color-color has-text-color has-link-color has-libre-baskerville-font-family has-small-font-size"><a href="#"><?php esc_html_e('123456879', 'innometrics-business'); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"70%","className":"innometrics-header-text"} -->
<div class="wp-block-column is-vertically-aligned-center innometrics-header-text" style="flex-basis:70%"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|light-color"}}}},"textColor":"light-color","fontSize":"small","fontFamily":"libre-baskerville"} -->
<p class="has-light-color-color has-text-color has-link-color has-libre-baskerville-font-family has-small-font-size"><?php esc_html_e('Lorem ipsum dolor sit amet', 'innometrics-business'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"bottom","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"blockGap":"0"}},"className":"innometrics-header-social","layout":{"type":"default"}} -->
<div class="wp-block-column is-vertically-aligned-bottom innometrics-header-social" style="padding-top:0;padding-bottom:0"><!-- wp:social-links {"iconColor":"light-color","iconColorValue":"#FFFFFF","openInNewTab":true,"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"className":"is-style-logos-only","layout":{"type":"flex","flexWrap":"wrap"}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only" style="padding-top:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->