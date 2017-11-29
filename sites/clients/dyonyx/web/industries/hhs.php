<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | HHS NITAAC CIO-SP3</title>

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
        <div class="container g-color-white text-center g-py-50">
          <h1 class="h2 dyonyx g-font-weight-300 mb-0">HHS NITAAC CIO-SP3</h1>
        </div>
        <!-- End Header Content -->
      </section>
      <!-- End Page Header -->


      <!-- Section -->
      <section class="container g-pt-100 g-pb-40 g-mb-60">
        <div class="row">
          <div class="col-lg-6 g-pr-30">
            <img class="img-fluid u-shadow-v5 g-rounded-20" src="/img/industry/government.jpg" alt="Government Industry" />
          </div>
          <div class="col-lg-6">
              <div class="mb-2">
                <h2 class="h3 g-color-black text-uppercase mb-2">HHS NITAAC CIO-SP3</h2>
                <div class="d-inline-block g-width-35 g-height-2 g-bg-primary mb-2"></div>
              </div>
              
              <p class="g-mb-20">The Chief Information Officer – Solutions and Partners 3 (CIO-SP3) Government-wide Acquisition Contract (GWAC) is a contract intended to provide information technology (IT) solutions and services. These IT solutions and services include health and biomedical-related IT services to meet scientific, health, administrative, operational, managerial, and information management requirements. The contract also contains general IT services partly because medical systems are increasingly integrated within a broader IT architecture, requiring a systems approach to their implementation and a sound infrastructure for their operation.</p>


              <h2 class="h3 g-color-black text-uppercase mb-2">Service Offerings</h2>
              <div class="d-inline-block g-width-35 g-height-2 g-bg-primary mb-2"></div>

              <ul class="list-unstyled g-color-gray-dark-v4">

                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> IT Services for Biomedical Research, Health Sciences, and Healthcare CIO Support</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Imaging</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Outsourcing</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> IT Operations and Maintenance</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Integration Services</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Critical Infrastructure Protection and Information Assurance</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Digital Government</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Enterprise Management Systems</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Software Development</li>
              </ul>
            

              <a class="btn btn-md u-btn-primary g-font-size-default g-rounded-50 g-py-10" href="/contact">Call Us Today</a>

        </div>
      </section>
      <!-- End Section -->

      <?php widget("contracts") ?>

      <?php widget("industries_list") ?>
      

      <?php widget("partners_full") ?>

      <?php widget("call_to_action_2") ?>
      
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
