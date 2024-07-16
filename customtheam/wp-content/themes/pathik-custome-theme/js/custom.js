 $(".slick-slider").slick({
      slidesToShow: 1,
      infinite: true,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 5000,
      dots: true, Boolean
      // arrows: false, Boolean
    });

 // Featured Section
$(document).ready(function () {
  $(".featuredSection-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 2, // Change to 1 for smooth scrolling
    infinite: true,
    autoplay: false,
    autoplaySpeed: 5000,
    dots: false,
    arrows: false,
  });

  // Add custom next and previous button functionality for the second slider
  $(".featuredSection .custom-prev").on("click", function () {
    $(".featuredSection .featuredSection-slider").slick("slickPrev");
  });

  $(".featuredSection .custom-next").on("click", function () {
    $(".featuredSection .featuredSection-slider").slick("slickNext");
  });
});

// Search js
$(document).ready(function(){
  
  $(".fa-search").click(function(){
    $(".wrap, .input").toggleClass("active");
    $("input[type='text']").focus();
  });
  
});

// Trending now Responsive Section Start
$(document).ready(function () {
  $(".trendingContents .trendingmobile-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: false,
  });

  // Bind click events to custom prev and next buttons
  $("#customPrev").on("click", function () {
    $(".trendingContents .trendingmobile-slider").slick("slickPrev");
  });

  $("#customNext").on("click", function () {
    $(".trendingContents .trendingmobile-slider").slick("slickNext");
  });
})

$(document).ready(function () {
  $(".featuredSection-slider.mobilesection").slick({
    slidesToShow: 3,
    slidesToScroll: 3, // Change to 1 for smooth scrolling
    infinite: true,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,
    arrows: false,
  });

  // Add custom next and previous button functionality for the second slider
  $(".featuredSection .custom-prev").on("click", function () {
    $(".featuredSection .featuredSection-slider").slick("slickPrev");
  });

  $(".featuredSection .custom-next").on("click", function () {
    $(".featuredSection .featuredSection-slider").slick("slickNext");
  });
});

// function validate() {
// var username = document.getElementById('username').value;
// var password = document.getElementById('pass').value;
  
//   if (username === "" || username === null) {
//     intensify($('#userLabel'));
//         return false;
//   }
  
//   if (password === "" || password === null) {
//        intensify($('#passLabel'));
//         return false;
//   }
// }

function intensify(intense) {
  intense.addClass('animated shakeit').delay(6000).queue(function(){
          intense.removeClass('animated shakeit').dequeue();
        });
}

// function clicked() {
//   $('button').addClass('clicked').delay(200).queue(function(){
//     $('button').removeClass('clicked').dequeue();
//   });
// }

var submit = document.getElementById('submit');
submit.addEventListener('click', clicked);
submit.addEventListener('click', validate);