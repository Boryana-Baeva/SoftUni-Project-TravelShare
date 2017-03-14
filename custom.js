$('.menuMobile').click(function () {
    $('.menuItems').slideToggle('slow');
});

$('.offerRide').click(function () {
    if ($('.offerRideExpand').is(':hidden')) {
        $('.offerRideExpand').show('slow');
    }
    $(".offerRideExpand").animate({ scrollTop: $('.offerRideExpand').height()}, 1000);
});


$('.searchRide').click(function () {
    $(this).find("h3").toggleClass('down');
    $('.searchRideExpand').show('slow');
})

$(document).ready(function () {
    $(".slide-section").click(function(e){
        var linkHref = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(linkHref).offset().top
        }, 1000);
        e.preventDefault();

    })
})