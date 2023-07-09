var toggle = false;
$('.single_product_box .read_more').click(function  () {
    $('.single_product_box .desc').toggleClass('ellipses');
    toggle = !toggle;
    if(toggle){
        $(this).html('Read Less')
    }
    else{
        $(this).html('Read More')
    }
})

$('header .fa-bars-staggered').click(function  () {
    $('.side__bar').addClass('slide')
})
$('header .fa-xmark').click(function  () {
    $('.side__bar').removeClass('slide')
})