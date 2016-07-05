jQuery(document).ready(function(){
  jQuery(document).foundation();

  jQuery('.services.menu-item a').on('click', function(){
    jQuery('#mega-menu').slideToggle();
    return false;
  });

  jQuery('.recent-work-slider').slick({
     infinite: true,
     arrows: true,
     dots: false,
     slidesToShow: 4,
     slidesToScroll: 1,
     responsive: [{
         breakpoint: 700,
         settings: {
           slidesToShow: 1
         }
       }, {
       breakpoint: 1024,
       settings: {
         slidesToShow: 2
       }
     }]
  });

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
