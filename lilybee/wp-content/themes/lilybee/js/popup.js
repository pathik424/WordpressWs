// function addClassToDiv() {
//     // Get a reference to all div elements with the class name "popup_main"
//     var divElements = document.getElementsByClassName("popup_main");

//     // Convert the HTMLCollection to an array and then use forEach
//     Array.from(divElements).forEach(function(element) {
//         element.classList.toggle("show_popup");
//     });
// }

// function addClassToDiv() {
//     // Get a reference to all div elements with the class name "popup_main"
//     var divElements = document.getElementsByClassName("popup_main");

//     // Convert the HTMLCollection to an array and then use forEach
//     Array.from(divElements).forEach(function(element) {
//         element.classList.toggle("show_popup");
//     });

//     // Add a click event listener to the overlay element
//     var overlay = document.querySelector(".overlay");
//     overlay.addEventListener("click", function() {
//         // Remove the "show_popup" class from all "popup_main" elements
//         Array.from(divElements).forEach(function(element) {
//             element.classList.remove("show_popup");
//         });
//     });
// }

function addClassToDiv() {
    // Get a reference to all div elements with the class name "popup_main"
    var divElements = document.getElementsByClassName("popup_main");

    // Convert the HTMLCollection to an array and then use forEach
    Array.from(divElements).forEach(function(element) {
        element.classList.toggle("show_popup");
    });

    // Add a click event listener to the overlay element
    var overlay = document.querySelector(".overlay");
    overlay.addEventListener("click", function() {
        // Remove the "show_popup" class from all "popup_main" elements
        Array.from(divElements).forEach(function(element) {
            element.classList.remove("show_popup");
        });
    });

    // Add a click event listener to the .close_btn elements
    var closeButtons = document.querySelectorAll(".close_btn");
    closeButtons.forEach(function(closeButton) {
        closeButton.addEventListener("click", function() {
            // Remove the "show_popup" class from the parent "popup_main" element
            var parentPopupMain = closeButton.closest(".popup_main");
            if (parentPopupMain) {
                parentPopupMain.classList.remove("show_popup");
            }
        });
    });
}

// scroll to anchor section

$(document).ready(function () {
    $('.scroll_submenu ul li a').click(function () {
        $('li a').removeClass("active");
        $(this).addClass("active");
    });
});


// back to top scroll

// // Get the button element
// var back_to_top = document.getElementById("back_to_top");        
// // When the user scrolls down 100 from the top of the document, show the button
// window.onscroll = function() {
//     scrollFunction();
// };        
// function scrollFunction() {
//     if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
//         back_to_top.classList.add('active_btn');                
//     } else {
//         back_to_top.classList.remove('active_btn');                
//     }
// }        
// // Function to smoothly scroll to the top of the document
// function smoothScrollToTop() {
//     var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
//     if (currentScroll > 0) {
//         window.requestAnimationFrame(smoothScrollToTop);
//         window.scrollTo(0, currentScroll - currentScroll / 100);
//     }
// }

var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});