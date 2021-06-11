$j = jQuery.noConflict();
$j(document).ready(function() {
    var n = $j(window).width();
    $j(".HoverLine").mouseover(function() {
        $j(this).children("div:last-child").addClass("HoverLinePop");
    });
    $j(".HoverLine").mouseleave(function() {
        $j(this).children("div:last-child").removeClass("HoverLinePop");
    });
});