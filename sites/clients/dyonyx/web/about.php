<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | About</title>

      <?php includes("head") ?>

  </head>

  <body>
    <main>


      <?php includes("header") ?>

      <!-- Page Header -->
      <section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall " data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
        <!-- Parallax Image -->
        <div class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-pos-bottom-center  g-bg-black-opacity-0_5--after" style="height: 130%; background-image: url(/img/bg/5.jpg);"></div>
        <!-- End Parallax Image -->

        <!-- Header Content -->
        <div class="container g-color-white text-center g-py-200">
          <h2 class="g-font-weight-600 g-font-size-55 text-uppercase">DYONYX</h2>
          <h3 class="h2 dyonyx g-font-weight-300 mb-0">Innovative IT Solutions Provider</h3>
        </div>
        <!-- End Header Content -->
      </section>
      <!-- End Page Header -->



      <?php widget("team_blocks") ?>


      <hr class="g-brd-gray-light-v4 my-0">

      
      <?php widget("values") ?>

      <?php widget("about_info") ?>
      
      <?php widget("about_video") ?>
      
      <?php widget("charities") ?>


      

      <?php widget("partners_full") ?>


      <hr class="g-brd-gray-light-v4 my-0">
      

      <?php includes("footer") ?>


    </main>


    <?php includes("js") ?>
 
    <!-- JS Plugins Init. -->
    <script>
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
            "an awesome template",
            "perfect template",
            "just like a boss"
          ],
          typeSpeed: 60,
          loop: true,
          backDelay: 1500
        });

        $.HSCore.components.HSModalWindow.init('[data-modal-target]');
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
