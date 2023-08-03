
$('.register').click(function () {
    $(`form[name='login']`).show();
    $(`form[name='register']`).hide();
})
$('.login').click(function () {
    $(`form[name='register']`).show();
    $(`form[name='login']`).hide();
})
$('.size_accordion .accordion-body li').click(function () {
    $('.size_accordion .accordion-body li').removeClass('active')
    $(this).addClass('active')
    $('.size_accordion button').click();
})


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