<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
$path = plugin_dir_url( __FILE__ ) . '../assets/images/'; ?>
<div class="wc-stripe-card-icons-container">
    <?php if ( !empty( $arrIcons ) ) : ?>
    <ul>
    <?php foreach ( $arrIcons as $key=>$name ) :
        if ( $allowedIcons[$key] != 'yes' ) {
            continue;
        }
        ?>
        <li><img src="<?php echo $path . $name;?>" alt="<?php echo $key;?>" aria-label="<?php echo $key;?>" title="<?php echo $key;?>"/></li>
    <?php endforeach;?>
    </ul>
    <?php endif;?>
</div>
