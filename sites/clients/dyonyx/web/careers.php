<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Careers</title>
    <meta name="description" content="">

      <?php includes("head") ?>

  </head>

  <body>
    <main>


      <?php includes("header") ?>

      <!-- Page Header -->
      <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
        <!-- Parallax Image -->
        <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-pos-bottom-center  g-bg-black-opacity-0_5--after" style="height: 130%; background-image: url(/img/bg/11.jpg);"></div>
        <!-- End Parallax Image -->

        <!-- Header Content -->
        <div class="container g-color-white text-center g-py-200">
          <h3 class="h2 g-font-weight-300 mb-0">DYONYX</h3>
          <h1 class="g-font-weight-600 g-font-size-55 text-uppercase">Join Our Team</h1>
        </div>
        <!-- End Header Content -->
      </section>
      <!-- End Page Header -->



      <!-- Contact Form -->
      <section class="container g-py-100">
        <div class="row justify-content-center g-mb-70">
            
          <iframe allowtransparency="true" frameborder="0" id="gnewtonIframe" scrolling="yes" src="http://newton.newtonsoftware.com/career/CareerHome.action?clientId=8a42a12b3798136b0137aa225e8265b4&amp;parentUrl=http%3A%2F%2Fdyonyx%2Fcareers%2F&amp;gns=" width="100%" style="overflow: hidden; height: 900px;"></iframe>

        </div>
      </section>
      <!-- End Contact Form -->


      <?php widget("phone_numbers") ?>
      

      <?php widget("map") ?>
      


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

        $('#gnewtonIframe').load(function() {
          console.log("iFrame Change: " + this.contentWindow.document.body.offsetHeight + 'px');


          // $("#gnewtonIframe").css({
          //       height: $('#gnewtonIframe').$("body").outerHeight()
          // });
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

    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyAtt1z99GtrHZt_IcnK-wryNsQ30A112J0&callback=initMap" async defer></script>
  </body>
</html>
