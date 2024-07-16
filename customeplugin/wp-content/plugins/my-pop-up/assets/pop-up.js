jQuery(document).ready(function($){
    setTimeout(function(){
        $('.popup-wrapper').fadeIn();
    }, 2000);


    $('.close').click(function(){
        $('.popup-wrapper').fadeOut();
    });

    });
