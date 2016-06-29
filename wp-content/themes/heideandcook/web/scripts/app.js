jQuery(document).ready(function(){
  jQuery(document).foundation();

  var megaMenu = jQuery('#mega-menu');
  var megaMenuLink = jQuery('.services.menu-item a');
  megaMenuLink.on('click', function(){
    megaMenuLink.parent().toggleClass('active');
    megaMenu.stop(true, true).fadeToggle();
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

  jQuery(".fancybox").fancybox();
});
