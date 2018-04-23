<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Contact</title>
    <meta name="description" content="">

      <?php includes("head") ?>

  </head>

  <body>
    <main>


      <?php includes("header") ?>

      <!-- Page Header -->
      <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
        <!-- Parallax Image -->
        <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-pos-bottom-center  g-bg-black-opacity-0_5--after" style="height: 130%; background-image: url(/img/bg/4.jpg);"></div>
        <!-- End Parallax Image -->

        <!-- Header Content -->
        <div class="container g-color-white text-center g-py-200">
          <h3 class="h2 g-font-weight-300 mb-0">Call Us Today</h3>
          <h1 class="g-font-weight-600 g-font-size-55 text-uppercase">855-749-6758</h1>
        </div>
        <!-- End Header Content -->
      </section>
      <!-- End Page Header -->


      <section class="container g-pt-100 g-pb-40">
        <div class="row justify-content-between">
          <div class="col-lg-7 g-mb-60">
            <h2 class="h3">Contact Us</h2>
            <p class="g-color-gray-dark-v3 g-font-size-16">DYONYX is headquartered in Houston, Texas, with multiple data center co-locations across the country and over 100 full time consultants and a stable of both commercial and government customers across multiple industries.</p>

            <hr class="g-my-40">

            <!-- Contact Form -->
              <!--[if lte IE 8]>
              <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
              <![endif]-->
              <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
              <script>
                hbspt.forms.create({ 
                  portalId: '376700',
                  formId: '840a88de-0eff-4068-9321-ffbc39794785'
                });
              </script>
            <!-- End Contact Form -->
          </div>

          <div class="col-lg-4 g-mb-60">
            <!-- Google Map -->
            <div id="GMapCustomized-light" class="js-g-map embed-responsive embed-responsive-21by9 g-height-300"
                 data-type="custom"
                 data-lat="29.850844"
                 data-lng="-95.508024"
                 data-zoom="14"
                 data-title="DYONYX"
                 data-styles='[["", "", [{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]], ["", "labels", [{"visibility":"on"}]], ["water", "", [{"color":"#bac6cb"}]] ]'
                 data-pin="true"
                 data-pin-icon="/img/icons/pin/blue.png">
            </div>
            <!-- End Google Map -->

            <hr class="g-my-40">

            <!-- Contact Info -->
            <h2 class="h3 mb-4">Contact info</h2>
            <div class="media mb-2">
              <i class="d-flex g-color-gray-dark-v5 mt-1 mr-3 icon-hotel-restaurant-235 u-line-icon-pro"></i>
              <div class="media-body">
                <p class="g-color-gray-dark-v3 mb-2"> 13430 Northwest Freeway, Suite 1000<br />Houston, TX 77040</p>
              </div>
            </div>
            <div class="media mb-2">
              <i class="d-flex g-color-gray-dark-v5 mt-1 mr-3 icon-communication-062 u-line-icon-pro"></i>
              <div class="media-body">
                <p class="g-color-gray-dark-v3 mb-2">Email: <a href="mailto:solutions@dyonyx.com" class="g-color-gray-dark-v4">solutions@dyonyx.com</a></p>
              </div>
            </div>
            <div class="media mb-2">
              <i class="d-flex g-color-gray-dark-v5 mt-1 mr-3 icon-communication-033 u-line-icon-pro"></i>
              <div class="media-body">
                <p class="g-color-gray-dark-v3">Main: <a href="tel:7134857000" class="g-color-gray-dark-v4">713-485-7000</a></p>
              </div>
            </div>
            <div class="media mb-2">
              <i class="d-flex g-color-gray-dark-v5 mt-1 mr-3 icon-communication-033 u-line-icon-pro"></i>
              <div class="media-body">
                <p class="g-color-gray-dark-v3">Support: <a href="tel:7134857100" class="g-color-gray-dark-v4">713-485-7100</a></p>
              </div>
            </div>
            <!-- End Contact Info -->

          </div>
        </div>
      </section>

      

      <?php includes("footer") ?>

    </main>

    <!-- JS Global Compulsory -->
    <script src="/js/vendor/jquery/jquery.min.js"></script>
    <script src="/js/vendor/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="/js/vendor/tether.min.js"></script>
    <script src="/js/vendor/bootstrap/bootstrap.min.js"></script>

    <!-- JS Implementing Plugins -->
    <script src="/js/vendor/hs-megamenu/src/hs.megamenu.js"></script>
    <script src="/js/vendor/dzsparallaxer/dzsparallaxer.js"></script>
    <script src="/js/vendor/dzsparallaxer/dzsscroller/scroller.js"></script>
    <script src="/js/vendor/dzsparallaxer/advancedscroller/plugin.js"></script>
    <script src="/js/vendor/gmaps/gmaps.min.js"></script>

    <!-- JS Unify -->
    <script src="/js/hs.core.js"></script>
    <script src="/js/components/hs.header.js"></script>
    <script src="/js/helpers/hs.hamburgers.js"></script>
    <script src="/js/components/hs.tabs.js"></script>
    <script src="/js/components/hs.go-to.js"></script>
    <script src="/js/components/gmap/hs.map.js"></script>

    <!-- JS Customization -->
    <script src="/js/custom.js"></script>

    <!-- JS Plugins Init. -->
    <script>
      // initialization of google map
      function initMap() {
        $.HSCore.components.HSGMap.init('.js-g-map');
      }

      $(document).on('ready', function () {
        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
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

    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAtt1z99GtrHZt_IcnK-wryNsQ30A112J0&callback=initMap" async defer></script>
  </body>
</html>
