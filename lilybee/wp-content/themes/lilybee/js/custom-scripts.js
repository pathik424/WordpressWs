jQuery(document).ready(function ($) {
    // Initialize the price range slider
    $("#price-slider").slider({
        range: true,
        min: 0,
        max: 500,
        values: [0, 500],
        slide: function (event, ui) {
            $("#price-range").text("$" + ui.values[0] + " - $" + ui.values[1]);
            $("#price-min").val(ui.values[0]);
            $("#price-max").val(ui.values[1]);
        }
    });

    // Input fields for min and max values
    $('#price-min, #price-max').on('input', function () {
        var minVal = parseInt($("#price-min").val());
        var maxVal = parseInt($("#price-max").val());

        // Update slider values
        $("#price-slider").slider("values", [minVal, maxVal]);

        // Update displayed range
        $("#price-range").text("$" + minVal + " - $" + maxVal);
    });

    // Clear filters button
    $('#clear-filters').on('click', function () {
        // Reset form fields
        $('#ajax_filters_category')[0].reset();

        // Reset slider values
        $("#price-slider").slider("values", [0, 500]);
        $("#price-range").text("$0 - $500");

        // Hide the "Clear Filters" button
        $(this).hide();
    });

    // Click event for "View All" link
    $('.view-all-products-btn').on('click', function (e) {
        e.preventDefault();
        console.log('View All Clicked');
        // You can add logic here to handle "View All" click
        // For example, redirect to the main shop page
        window.location.href = '<?php echo esc_url(get_permalink()); ?>';
    });

    // Pagination click event
    $('.pagination-container').on('click', '.page-numbers', function (e) {
        e.preventDefault(); // Prevent the default behavior of the link

        var page = $(this).text();
        // Update URL with the page parameter
        var currentUrl = window.location.href;
        var newUrl = updateQueryStringParameter(currentUrl, 'paged', page);
        window.location.href = newUrl;
    });

    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            return uri + separator + key + "=" + value;
        }
    }
});
