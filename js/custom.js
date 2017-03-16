$('.menuMobile').click(function () {
    $('.mobileHidden').addClass('active');
});
$('.icon-rightArrow').click(function () {
    $('.mobileHidden').removeClass('active');
});

/*$('.offerRide').click(function () {
    $(this).find("h3").toggleClass('down');
    $('.searchRideExpand').show('slow');
});
$('.down').click(function () {
    $('.searchRideExpand').hide('slow');
});*/
$('.offerShow').click(function(){
    $(this).toggleClass('down');
    $('.offerRideExpand').slideToggle('slow');
});

$('.searchShow').click(function () {
    $(this).toggleClass('down');
    $('.searchRideExpand').slideToggle('slow');
});

