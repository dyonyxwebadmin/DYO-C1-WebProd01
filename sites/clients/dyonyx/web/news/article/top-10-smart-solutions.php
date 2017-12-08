<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | After the Flood</title>
    <meta name="description" content="">

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
              <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Blog Article</h2>
            </div>

            <div class="align-self-center ml-auto">
              <ul class="u-list-inline">
                <li class="list-inline-item g-mr-5">
                  <a class="u-link-v5 g-color-main g-color-primary--hover" href="/">Home</a>
                  <i class="g-color-gray-light-v2 g-ml-5">/</i>
                </li>
                <li class="list-inline-item g-mr-5">
                  <a class="u-link-v5 g-color-main g-color-primary--hover" href="/news">News</a>
                  <i class="g-color-gray-light-v2 g-ml-5">/</i>
                </li>
                <li class="list-inline-item g-color-primary">
                  <span>Top 10 Smart Solutions</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- End Breadcrumbs -->


      <!-- Blog Single Item Info -->
      <section class="container g-pt-100 g-pb-60">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="g-mb-60">
              <h1 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Featured as a Top 10 Smart Solution for Government by Government CIO Outlook Magazine</h1>
            </div>


              

              <p><strong>Houston, TX</strong> &mdash; DYONYX, a leading innovative IT solutions provider based in Houston, TX, has been featured by Government CIO Outlook Magazine as one of the Top 10 Smart Solutions for Government in 2017.</p> 

              <p>"Our selection by Government CIO Outlook Magazine as one of the Top 10 Smart Solutions for Government reflects our goal to be a true IT partner to many federal agencies, designing custom, innovative solutions that meet their individual needs, so they can focus on serving our country," stated Chuck Orrico, DYONYX President & CEO. </p>

              <p>Government CIO Outlook is a technology magazine based in Fremont, California that focuses on the trends, challenges and opportunities for CIOs to deliver an efficient technology-driven services and operations in enabling smart governance.</p>

              <p><a href="https://smart-solutions.govciooutlook.com/vendor/dyonyx-innovative-federal-commercial-it-solutions-cid-132-mid-18.html?utm_source=hs_email&utm_medium=email&utm_content=59106807&_hsenc=p2ANqtz-8faR4UuWZkoQiNo46KEYOEyg_QaaYMFDsnhdREKeRXoPccd2r1fApRwefKNmpAxSdyr5YFUljAcg-qcRtcJQOv1upWh8IxPE7LbhjcoZaTA3CAtYw&_hsmi=59106807" target="_blank">View the article featuring DYONYX by clicking here.</a></p>


          </div>
        </div>
      </section>
      <!-- End Blog Single Item Info -->


      <?php widget("blog_about") ?>

      <?php includes("footer") ?>

    </main>


    <?php includes("js") ?>

    <!-- JS Plugins Init. -->
    <script>
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

        // initialization of masonry
        $('.masonry-grid').imagesLoaded().then(function () {
          $('.masonry-grid').masonry({
            columnWidth: '.masonry-grid-sizer',
            itemSelector: '.masonry-grid-item',
            percentPosition: true
          });
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
