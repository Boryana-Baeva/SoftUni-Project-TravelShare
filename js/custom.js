$('.menuMobile').click(function () {
    $('.menuItems').slideToggle('slow');
});

$('.offerRide').click(function () {
    if ($('.offerRideExpand').is(':hidden')) {
        $('.offerRideExpand').show('slow');
    }
});


$('.searchRide').click(function () {
    $(this).find("h3").toggleClass('down');
    $('.searchRideExpand').show('slow');
})
