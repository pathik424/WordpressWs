$(document).ready(function() {
    // Add active class to the first <a> tag by default
    $('.view_icons a:first-child').addClass('active');

    // Click event handler for <a> tags inside .view_icons
    $('.view_icons a').click(function(event) {
        event.preventDefault();

        // Remove active class from all <a> tags
        $('.view_icons a').removeClass('active');

        // Add active class to the clicked <a> tag
        $(this).addClass('active');
    });
});


// list_view

$(document).ready(function () {
    $("#List_View_Button").click(function () {
      $(".product_list_otr_bottom").addClass("list_view");
      $(".product_list_otr_bottom").removeClass("grid_view");
    });

    $("#Grid_View_Button").click(function () {
      $(".product_list_otr_bottom").removeClass("list_view");
      $(".product_list_otr_bottom").addClass("grid_view");
    });
});


jQuery(document).ready(function() {
    jQuery('.sub_menu_main > a').click(function(event) {
        event.preventDefault();

        // Check if the clicked menu item is already active
        var isActive = $(this).parent().hasClass('active');

        // Close all other open submenus
        jQuery('.sub_menu_main.active').removeClass('active');

        // Toggle the active class on the clicked menu item if it wasn't active
        if (!isActive) {
            jQuery(this).parent().addClass('active');
        }
    });
});



// mobile menu 

jQuery(document).ready(function(){
  jQuery('.mobileIcon').click(function(){
        jQuery("body").toggleClass('menu-open');
  });
});


jQuery(document).ready(function () {
  jQuery('.popup-with-zoom-anim').click(function () {
    jQuery("body").addClass('Popup_open_div');
  });
  jQuery('.close-icon').click(function () {
    jQuery("body").removeClass('Popup_open_div');
  });
});


// Product Slider

var swiper = new Swiper(".slider__product", {
  slidesPerView: 4,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination-product",
    clickable: true,
  },
   autoplay: {
	delay: 2500,
	disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".swiper-button-next-product",
    prevEl: ".swiper-button-prev-product",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    601: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 18,
    },
    1100: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1440: {
      slidesPerView: 4,
      spaceBetween: 29,
    }
  },
});

// Featured Product Slider

var swiper = new Swiper(".featured_product", {
  slidesPerView: 4,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination-product",
    clickable: true,
  },
  navigation: {
    nextEl: ".featured_product_next",
    prevEl: ".featured_product_prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    601: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 18,
    },
    1100: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
    1440: {
      slidesPerView: 4,
      spaceBetween: 29,
    }
  },
});

// Find Product

var swiper = new Swiper(".find_product_slider", {
  slidesPerView: 3,
  spaceBetween: 28,
  pagination: {
    el: ".swiper-pagination-find",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next-find_product",
    prevEl: ".swiper-button-prev-find_product",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1440: {
      slidesPerView: 3,
      spaceBetween: 28,
    }
  },
});

// customer slider

var swiper = new Swiper(".review_slider", {
  slidesPerView: 1.8,
  loop: true,
  centeredSlides: true,
  grabCursor: true,
  effect: 'coverflow',
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 565,
    modifier: 0.5,
    slideShadows: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 0,
        slideShadows: false,
      },
    },
    768: {
      slidesPerView: 1.8,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 500,
        modifier: 1.6,
        slideShadows: false,
      },
    },
    990: {
      slidesPerView: 1.8,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 400,
        modifier: 1.5,
        slideShadows: false,
      },
    },
    1200: {
      slidesPerView: 2.05,
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 500,
        modifier: 1.1,
        slideShadows: false,
      },
    },
  },
  pagination: {
    el: ".swiper-pagination-review",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next-review",
    prevEl: ".swiper-button-prev-review",
  },
  speed: 500,
});

// Product Details Slider

var swiper = new Swiper(".product_details_slider_thumb", {
  // loop: true,
  spaceBetween: 15,
  slidesPerView: 3,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".product_details_slider", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});

// Accordine js product details faq

$(document).ready(function() {
  $('.comaan_faq_otr .product_details_faq_row:first-child .product_details_faq_box:first-child .product_details_faq_que').addClass('active');
  $('.comaan_faq_otr .product_details_faq_row:first-child .product_details_faq_box:first-child .product_details_faq_ans').slideDown();
  
  $('.product_details_faq_que').on('click', function() {
    if ($(this).hasClass('active')) {
      $(this).siblings('.product_details_faq_ans').slideUp();
      $(this).removeClass('active');
    } else {
      $('.product_details_faq_ans').slideUp();
      $('.product_details_faq_que').removeClass('active');
      $(this).siblings('.product_details_faq_ans').slideToggle();
      $(this).toggleClass('active');
    }
  });     
});

// hero banner offset js

var container = $('.container');
var leftOffset = container.offset().left;
var rightOffset = leftOffset;

$('.hero_banner_row').css('padding-left', leftOffset);
$('.landing_banner_row').css('padding-left', leftOffset);
// $('.menu-compny-menu-container > ul > li .sub-menu').css('padding-left', leftOffset);
$('.menu-compny-menu-container > ul > li .sub-menu').css('padding-right', rightOffset);


// append class

// Get the element with the ID 'menu-item-450'
var menuItem450 = document.getElementById('menu-item-386');

// Create a new div element
var iconDiv = document.createElement('div');

// Add the class 'icon' to the newly created div
iconDiv.className = 'icon_header';

// Append the newly created div as a child of the element with the ID 'menu-item-450'
menuItem450.appendChild(iconDiv);

// icon_header active class

$(document).ready(function() {
  $('.icon_header').click(function() {
    $(this).toggleClass('active');
  });
});

// ingredients slider

var swiper = new Swiper(".ingredients_slider", {
  slidesPerView: 3,
  spaceBetween: 29,
  keyboard: {
    enabled: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 2,
    },
    1100: {
      slidesPerView: 3,
    },
  },
  navigation: {
    nextEl: ".swiper-button-next-ingredients",
    prevEl: ".swiper-button-prev-ingredients",
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

// my account active class js

$(document).ready(function(){
    // Add 'active' class to the first child by default
    $('.tab_title_box a:first-child').addClass('active');

    $('.tab_title_box a').click(function(){
        // Remove the 'active' class from all <a> tags in the tab_title_box
        $('.tab_title_box a').removeClass('active');
        
        // Add the 'active' class to the clicked <a> tag
        $(this).addClass('active');
    });
});

$(document).ready(function(){
    $('.tab_title_box a').click(function(e){
        e.preventDefault();
        
        // Remove 'active' class from all <a> tags inside .tab_title_box
        $('.tab_title_box a').removeClass('active');
        
        // Add 'active' class to the clicked <a> tag
        $(this).addClass('active');
        
        // Get the data-attribute value of the clicked <a> tag
        var target = $(this).data('attribute');
        
        // Hide all page_box_content divs
        $('.page_box_content').hide();
        
        // Show the corresponding div based on the data-attribute value
        $('#' + target).show();
    });
    
    // Initially show login_box and hide register_box
    $('#register_box').hide();
});

// watch story popup

$(document).ready(function () {
  $('.popup-with-zoom-anim').magnificPopup({
    type: 'inline',

    fixedContentPos: false,
    fixedBgPos: true,

    overflowY: 'auto',

    closeBtnInside: true,
    preloader: false,

    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  });
});


// landing page tabbing

document.addEventListener('DOMContentLoaded', function () {
  var tabList = document.getElementById('tabList');
  var tabs = document.getElementsByClassName('magnesium_content');

  tabList.addEventListener('click', function (event) {
    var targetTabId = event.target.getAttribute('href').substring(1);

    // Hide all tabs
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].style.display = 'none';
    }

    // Remove "active" class from all tab links
    var tabLinks = tabList.getElementsByTagName('a');
    for (var i = 0; i < tabLinks.length; i++) {
      tabLinks[i].classList.remove('active');
    }

    // Show the selected tab
    var selectedTab = document.getElementById(targetTabId);
    if (selectedTab) {
      selectedTab.style.display = 'block';
    }

    // Add "active" class to the clicked tab link
    event.target.classList.add('active');
  });

  // Set the first anchor tag to have the "active" class by default
  var firstTabLink = tabList.querySelector('li:first-child a');
  if (firstTabLink) {
    firstTabLink.click();
  }
});


// watch video popup

var videoPopup = document.getElementById('videoPopup');
var playButton = document.getElementById('playButton');

// Add click event listener to the play button
playButton.addEventListener('click', function () {
  // Show the video popup
  videoPopup.style.display = 'block';

  // Play the video
  videoPopup.play();
});


  $(document).ready(function(){
        $('.popup-with-zoom-anim').on('click', function(e){
            e.preventDefault();
            $('.overlay').show();
            $('.popup').show();
        });

        $('.close-btn, .overlay').on('click', function(){
            $('.overlay').hide();
            $('.popup').hide();
        });
    });


/******************* review-js *****************/

// $(document).ready(function() {
//   $('.reviews_list_box_title').addClass('active');
//   $('.reviews_list_box_main').slideDown();
  
//   $('.reviews_list_box_title').on('click', function() {
//     if ($(this).hasClass('active')) {
//       $(this).siblings('.reviews_list_box_main').slideUp();
//       $(this).removeClass('active');
//     } else {
//       $('.reviews_list_box_main').slideUp();
//       $('.reviews_list_box_title').removeClass('active');
//       $(this).siblings('.reviews_list_box_main').slideToggle();
//       $(this).toggleClass('active');
//     }
//   });     
// });




