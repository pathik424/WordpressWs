<?php get_header(); ?>

<!-- banner bg main start -->
<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <?php 
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'container' => 'nav',
                            'container_class' => 'primary-menu-container',
                            'menu_class' => 'primary-menu',
                            'menu_id' => 'primary-menu',
                        )); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header top section end -->
</div>
<!-- banner bg main end -->



<style>
  /* General styles for the primary menu */
.primary-menu-container {
    background-color: #f8f8f8; /* Background color for the menu */
    padding: 10px 0; /* Padding around the menu */
    border-bottom: 3px solid #0071a1; /* Bold bottom border for the menu */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional shadow for a subtle 3D effect */
}

/* Style for the menu itself */
.primary-menu {
    display: flex;
    justify-content: center; /* Center the menu items horizontally */
    list-style: none; /* Remove default list styling */
    margin: 0;
    padding: 0;
}

/* Style for each menu item */
.primary-menu li {
    margin: 0 20px; /* Space between menu items */
}

/* Style for the menu links */
.primary-menu a {
    text-decoration: none; /* Remove underline */
    color: #0071a1; /* Text color for menu links */
    font-size: 18px; /* Font size for menu links */
    font-weight: bold; /* Make text bold */
    padding: 12px 15px; /* Add space around the text */
    transition: color 0.3s ease, border-bottom 0.3s ease; /* Transition effects */
}

/* Hover and active states for menu links */
.primary-menu a:hover,
.primary-menu a:focus,
.primary-menu a:active {
    color: #005f86; /* Text color on hover/focus */
    border-bottom: 4px solid #0071a1; /* Bold bottom border on hover/focus */
    padding-bottom: 14px; /* Add space between text and border */
}

/* Responsive styles for the menu */
@media (max-width: 768px) {
    .primary-menu {
        flex-direction: column; /* Stack menu items vertically on small screens */
        align-items: center; /* Center the items */
    }

    .primary-menu li {
        margin: 10px 0; /* Space between menu items */
    }
}

@media (max-width: 480px) {
    .primary-menu a {
        font-size: 16px; /* Adjust font size for very small screens */
    }
}


</style>
