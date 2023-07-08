$('.banner-carousel').owlCarousel({
    loop:true,
    dots:true,
    responsiveClass:true,
    items: 1,
})


$('.p__carousel').owlCarousel({
    loop:true,
    margin:20,
    dots:true,
    responsiveClass:true,
    // items: 5,
        responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 5
        },
    }
})


$('.product').owlCarousel({
    loop:true,
    margin:20,
    dots:true,
    responsiveClass:true,
    items: 1,
})

var owlCarouselActive = document.getElementsByClassName("owl-item active");
 var first = owlCarouselActive[0]; //get first item
 var last = owlCarouselActive[owlCarouselActive.length - 1]; //get last item

 first.style.opacity = 0.8;
 last.style.opacity = 0.8;