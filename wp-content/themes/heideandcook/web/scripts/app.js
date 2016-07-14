var switchTo5x=true;
if(typeof stLight !== 'undefined') {
    stLight.options({
        publisher: "31abfba6-0978-4139-8479-d6e96f61d25f",
        doNotHash: true,
        doNotCopy: true,
        hashAddressBar: false
    });
}

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

    // Fires whenever a player has finished loading
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // Fires when the player's state changes.
    function onPlayerStateChange(event) {
        // Go to the next video after the current one is finished playing
        if (event.data === 0) {
            jQuery.fancybox.next();
        }
    }

  jQuery(".fancybox-media").fancybox({
    helpers: {
        title: {
            type: 'outside',
            position: 'top',
        },
        overlay: {
            opacity: 0.2,
            css: {'background-color': 'rgba(255, 255, 255, 0.65)'}
        }
    },
    tpl: {
      closeBtn : '<a title="Close" class="fancybox-item fancybox-close custom-close" href="javascript:;"></a>',
    },
      beforeShow  : function() {
          // Find the iframe ID
          var id = jQuery.fancybox.inner.find('iframe').attr('id');

          // Create video player object and add event listeners
          var player = new YT.Player(id, {
              events: {
                  'onReady': onPlayerReady,
                  'onStateChange': onPlayerStateChange
              }
          });
      }
  });

  jQuery(".fancybox").fancybox({
    helpers: {
        title: {
            type: 'outside',
            position: 'top',
        },
        overlay: {
            opacity: 0.2,
            css: {'background-color': 'rgba(255, 255, 255, 0.65)'}
        }
    },
    tpl: {
      closeBtn : '<a title="Close" class="fancybox-item fancybox-close custom-close" href="javascript:;"></a>',
    },
    "scrolling": "no",
    "maxWidth" : "600px",
    "fitToView": false
  });

    jQuery(".contact-scroll").click(function() {
        jQuery('html, body').animate({
            scrollTop: jQuery("#contact-form").offset().top
        }, 2000);
    });
});
