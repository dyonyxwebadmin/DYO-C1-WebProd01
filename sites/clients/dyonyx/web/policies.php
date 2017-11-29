<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Policies</title>

      <?php includes("head") ?>

  </head>

  <body>
    <main>


      <?php includes("header") ?>

      <!-- Breadcrumbs -->
      <section class="g-bg-gray-light-v5 g-py-50">
        <div class="container">
          <div class="d-sm-flex text-center">
            <div class="align-self-center">
              <h1 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Policies</h1>
            </div>

            <div class="align-self-center ml-auto">
              <ul class="u-list-inline">
                <li class="list-inline-item g-mr-5">
                  <a class="u-link-v5 g-color-main g-color-primary--hover" href="/">Home</a>
                  <i class="g-color-gray-light-v2 g-ml-5">/</i>
                </li>
                <li class="list-inline-item g-color-primary">
                  <span>Policies</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- End Breadcrumbs -->

      <section class="container g-pt-100 g-pb-70">
        <div class="row align-items-center">
          <div class="col-md-7 g-mb-30">
          <br />
          <br />
          <br />
          <br />
          Coming soon...
          <br />
          <br />
          <br />
          <br />
          <br />
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
