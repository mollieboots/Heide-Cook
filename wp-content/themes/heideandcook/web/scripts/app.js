jQuery(document).foundation();

jQuery(document).ready(function(){
  jQuery('.recent-work-slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true
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
