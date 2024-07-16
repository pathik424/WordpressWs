<?php
// For menu
register_nav_menus(
    array('primary-menu' => 'Header Index Menu')
);

// for thumb nail image
add_theme_support('post-thumbnails');


// Appearance / Header 
add_theme_support('custom-header');

// For widets add in admin pannel custome theame
register_sidebar(
    array(
        'name'=>"Sidebar Location",
        'id'=>'sidebar'
    )
    );

// Custome Background Column add in theame 
add_theme_support('custom-background');




?>