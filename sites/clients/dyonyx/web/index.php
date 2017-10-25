<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Innovative IT Managed Services Provider</title>

      <?php includes("head") ?>

  </head>

  <body>
    <main>

      <section class="g-bg-primary">
        <div class="container text-center g-color-white  g-pa-10">DYONYX CLOUD STARTER PACK - <a href="http://go.dyonyx.com/cloudstarterpack" class=" g-color-white " target="_blank">Click here to learn more!</a></div>
      </section>


      <?php includes("header") ?>

      <?php widget("home_slider") ?>
      
      <?php widget("services_icons") ?>

      <?php widget("company") ?>



      <hr class="g-brd-gray-light-v4 my-0">


      <?php widget("home_video") ?>

      <?php widget("solution_list") ?>

      <?php widget("about_details") ?>
      
      <?php widget("partners_full") ?>

      <?php widget("testimonials_1") ?>

      <?php widget("call_to_action_1") ?>
      
      <?php includes("footer") ?>


    </main>


    <?php includes("js") ?>
    
    <!-- JS Plugins Init. -->
    <script>
      // initialization of slider revolution
      var tpj = jQuery,
        revapi24;

      tpj(document).ready(function () {
        if (tpj("#rev_slider_24_1").revolution == undefined) {
          revslider_showDoubleJqueryError("#rev_slider_24_1");
        } else {
          revapi24 = tpj("#rev_slider_24_1").show().revolution({
            sliderType: "standard",
            jsFileLocation: "/js/vendor/revolution-slider/revolution/js/",
            sliderLayout: "fullscreen",
            dottedOverlay: "none",
            delay: 9000,
            navigation: {
              keyboardNavigation: "off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation: "off",
              mouseScrollReverse: "default",
              onHoverStop: "off",
              bullets: {
                enable: true,
                hide_onmobile: false,
                style: "bullet-bar",
                hide_onleave: false,
                direction: "horizontal",
                h_align: "center",
                v_align: "bottom",
                h_offset: 0,
                v_offset: 50,
                space: 5,
                tmp: ''
              }
            },
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [868, 768, 960, 720],
            lazyType: "none",
            shadow: 0,
            spinner: "off",
            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,
            shuffle: "off",
            autoHeight: "off",
            fullScreenAutoWidth: "off",
            fullScreenAlignForce: "off",
            fullScreenOffsetContainer: "",
            fullScreenOffset: "60px",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
              simplifyAll: "off",
              nextSlideOnWindowFocus: "off",
              disableFocusListener: false
            }
          });
        }

        if (revapi24) revapi24.revSliderSlicey();
      });

      $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of popups
        $.HSCore.components.HSPopup.init('.js-fancybox');

        // initialization of counters
        var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');


        // initialization of text animation (typing)
        $(".u-text-animation.u-text-animation--typing").typed({
          strings: [
            "IT Managed Services",
            "Cloud Services",
            "Security Services",
            "IT Professional Services"
          ],
          typeSpeed: 60,
          loop: true,
          backDelay: 1500
        });
      });

      $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
          event: 'hover',
          pageContainer: $('.container'),
          breakpoint: 991
        });
      });

      $(window).on('resize', function () {
        setTimeout(function () {
          $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
      });
    </script>
  </body>
</html>
