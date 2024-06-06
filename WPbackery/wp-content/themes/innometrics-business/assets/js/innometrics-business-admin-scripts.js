(function ($) {
  "use strict";
  $("#innometrics-business-dismiss-notice").on("click", ".notice-dismiss", function () {
    $.ajax({
      url: ajaxurl,
      data: {
        action: "INNOMETRICS_BUSINESS_dismissble_notice",
      },
    });
  });
  $("#innometrics-business-dashboard-tabs-nav li:first-child").addClass("active");
  $(".tab-content").hide();
  $(".tab-content:first").show();
  $("#innometrics-business-dashboard-tabs-nav li").click(function () {
    $("#innometrics-business-dashboard-tabs-nav li").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();
    var activeTab = $(this).find("a").attr("href");
    $(activeTab).fadeIn();
    return false;
  });
})(jQuery);
