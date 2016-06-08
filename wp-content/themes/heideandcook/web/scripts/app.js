jQuery(document).foundation();
console.log('im working');
$(document).ready(function(){
  $('.recent-work-slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true
  });
});
