(function ($) {
  "use strict";
  $("#innometrics-business-main-content").click(function () {
    $("html, body").animate(
      {
        scrollTop: $($.attr(this, "href")).offset().top,
      },
      500
    );
    return false;
  });
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery(".innometrics-business-scrollto-top a").fadeIn();
    } else {
      jQuery(".innometrics-business-scrollto-top a").fadeOut();
    }
  });
  jQuery(".innometrics-business-scrollto-top a").click(function () {
    jQuery("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
})(jQuery);

