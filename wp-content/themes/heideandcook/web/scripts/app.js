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

  jQuery(".fancybox").fancybox();
});
