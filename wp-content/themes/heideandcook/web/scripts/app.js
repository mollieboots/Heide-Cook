jQuery(document).foundation();

jQuery(document).ready(function(){
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
    openEffect  : 'fade';
    closeEffect : 'fade';

  jQuery(".expandable").click(function(){
    jQuery(this).parent().siblings().children().next().slideUp("slow");
    jQuery(this).siblings(".expanded-info").slideToggle("slow");
  });

  jQuery(document).foundation();
});
