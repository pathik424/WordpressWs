<?php
if(!defined('ABSPATH')){
    die();
}
$popups = array(
    'diwali.jpg',
    'diwali1.jpg',
    'diwali2.jpg',
);
if(isset($_POST['save_popup'])){
//  echo $_POST['popup-image'];
$popup_img = esc_sql($_POST['popup-image']);

if(get_option('pop-up-image', -1) == -1){
    add_option('pop-up-image',$popup_img);
    
}else{
    update_option('pop-up-image',$popup_img);
    
}
}
?>

<div class="wrap">
    <h1 class="wp-heading-inline"><?php echo get_admin_page_title();?></h1>
    <h3>Select Popup to show</h3>
    <form action="options-general.php?page=pop-up-menu-page" method="post">

        <ul>
            <?php
        foreach ($popups as $pop) {
            # code...
            echo "<li>
            <input type='radio' name='popup-image' value='$pop' id='$pop' />
            <label for='$pop'>$pop</label>
            
            </li>";
        }
        ?>
    </ul>
    <input type="submit" value="Save" name="save_popup">
</form>
</div>
