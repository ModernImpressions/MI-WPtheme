//SlickNav Active Code;
jQuery(document).ready(function(){
    jQuery('#nav').slicknav();
    jQuery.scrollUp();
    jQuery(".inner_header_area").sticky({topSpacing:0});
});



jQuery(document).ready(function() {
    //Slider ITEMS SLIDER //
    $("#owl-slider-item").owlCarousel({
        autoPlay: 10000,
        navigationText: ["", ""],
        navigation: true,
        pagination: false,
        itemsCustom: [
            [0, 1],
            [768, 1]
        ]

    });
    //Slider ITEMS SLIDER //
    $("#owl-team-item").owlCarousel({
        autoPlay: 10000,
        navigationText: ["", ""],
        navigation: true,
        pagination: false,
        itemsCustom: [
            [0, 1],
            [768, 4]
        ]

    });
});
