jQuery(document).ready(function(){
  jQuery(document).foundation();

  jQuery('.services.menu-item a').on('click', function(){
    jQuery('#mega-menu').slideToggle();
    return false;
  });

  jQuery('.recent-work-slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
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
