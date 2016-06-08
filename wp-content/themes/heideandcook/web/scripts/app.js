jQuery(document).foundation();
console.log('im working');
jQuery(document).ready(function(){
  jQuery('.recent-work-slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 2,
    centerMode: true,
    arrows: true
  });
});
