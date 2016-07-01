jQuery(document).ready(function(){
  jQuery(document).foundation();

  jQuery('.services.menu-item a').on('click', function(){
    jQuery('#mega-menu').slideToggle();
  });

  jQuery('.recent-work-slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      }
  }]
  });


// jQuery('.fancybox').fancybox({
//        helpers: {
//            title: {
//                type: 'outside',
//                position: 'top',
//            },
//            overlay: {
//                css: {
//                    'background' : 'rgba(255, 255, 255, 0.9)'
//                }
//            }
//        },
//        tpl: {
//            closeBtn: '<a title="Close" class="fancybox-item fancybox-close my-close" href="javascript:;"></a>',
//            next: '<a title="Next" class="fancybox-nav fancybox-next my-next" href="javascript:;"><span></span></a>',
//            prev: '<a title="Previous" class="fancybox-nav fancybox-prev my-prev" href="javascript:;"><span></span></a>'
//        },
//        padding: 0,
//    });

  jQuery(".fancybox").fancybox({
    helpers: {
        title: {
            type: 'outside',
            position: 'top',
        },
    },
    tpl: {
      closeBtn : '<a title="Close" class="fancybox-item fancybox-close custom-close" href="javascript:;"></a>',
    },
    "scrolling" : "no",
    "minWidth" : "610px",
  });
});

if (jQuery('.accordion-title').attr('aria-expanded') === "true") {
  console.log("open");
}
