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
                  <span>New Vice President of Strategic Accounts</span>
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
              <h1 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Hires Former Hoover Ferguson Executive as Vice President of Strategic Accounts and Infrastructure Services</h1>
            </div>



              <p>DYONYX L.P. a Houston based IT Outsourcing and Managed Services firm, announced today the appointment of Paula Stuart as Vice President of Strategic Accounts and Infrastructure Services, effective February 12, 2018. Ms. Stuart joins DYONYX from Hoover Ferguson where she is currently Vice President, Information Technology responsible for the planning, implementation and support of IT for 70 locations around the world. </p>
              
              <p>Paula will be responsible for the overall success of DYONYX's strategic accounts and will lead the planning and delivery of DYONYX's Infrastructure Services team. Paula has extensive IT merger & acquisition experience, managing SOX compliant IT infrastructures and the design of multi-faceted technical infrastructure builds across multiple companies and countries. </p>

              <p>"We are extremely excited to have Paula's experience and credentials join our company and help DYONYX and our client's achieve our respective growth and acquisition strategies," states Chuck Orrico, CEO of DYONYX. "Developing an executive team with experience that spans a range of our businesses has always been an important part of managing our company for long-term success. And in an environment where rapid technological changes require increasing flexibility and speed to market, it's even more critical that our leaders possess a broad understanding of our businesses and the customers we serve."</p>


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
