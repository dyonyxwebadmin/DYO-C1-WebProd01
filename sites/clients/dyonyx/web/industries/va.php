<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Veterans Affairs Total Technology Transformation</title>
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
        <div class="container g-color-white text-center g-py-50">
          <h1 class="h2 dyonyx g-font-weight-300 mb-0">Veterans Affairs Total Technology Transformation<br />Twenty-One (VA T4)</h1>
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
                <h2 class="h3 g-color-black text-uppercase mb-2">Veterans Affairs Total Technology Transformation Twenty-One (VA T4)</h2>
                <div class="d-inline-block g-width-35 g-height-2 g-bg-primary mb-2"></div>
              </div>
              
              <p class="g-mb-20">Veterans Affairs Transformation Twenty-One Total Technology (VA T4) is a five-year indefinite delivery/indefinite quantity (IDIQ) contract that enables VA to modernize services through transformational capabilities, systems engineering, and other solutions that span the entire range of lifecycle-based IT including cyber security, LAN/WAN management, and technical facilities support. Like many enterprises, the VA is facing an increasingly dynamic and complex global environment. It’s being asked to support higher levels of activity with greater precision and more predictable outcomes than ever before. It must work within growing budgetary pressures, with fewer personnel, and under greater demand. And of course, every move it makes is open to increased public scrutiny. VA Major Initiatives seek to address many of those challenges by moving the IT focus from vertical lines of business to a more holistic, cross-cutting approach. This transformation will keep the direct value to the Veteran front and center while managing the impact of planned improvements across the enterprise - transforming VA into a Veteran-centric, results-driven, forward-looking 21st century organization.</p>


              <h2 class="h3 g-color-black text-uppercase mb-2">Service under this contract include, but are not limited to, the following</h2>
              <div class="d-inline-block g-width-35 g-height-2 g-bg-primary mb-2"></div>

              <ul class="list-unstyled g-color-gray-dark-v4">

                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Program Management, Strategy, Enterprise Architecture and Planning Support</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Systems/Software Engineering</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Software Technology Demonstration and Transition</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Test and Evaluation</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Independent Verification and Validation</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Enterprise Network</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Enterprise Management Framework</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Cyber Security</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Operations and Maintenance</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Training</li>
                <li class="d-flex g-mb-10"><i class="icon-arrow-right-circle g-color-primary g-mt-5 g-mr-10"></i> Information Technology Facilities</li>
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
