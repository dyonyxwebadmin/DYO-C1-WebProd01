<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Innovative IT Managed Services Provider</title>

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
                  <a class="u-link-v5 g-color-main g-color-primary--hover" href="/blog">Blog</a>
                  <i class="g-color-gray-light-v2 g-ml-5">/</i>
                </li>
                <li class="list-inline-item g-color-primary">
                  <span>Charity Golf Tournament</span>
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
              <h2 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Sponsoring 4th Annual SIM Houston CIO Charity Golf Tournament</h2>
            </div>

            <h4 class="g-mb-30">Event on April 22nd to Benefit Houston STEM-Based Education & Non-profit organizations</h4>
      
            <p><strong>Houston, TX</strong> &mdash;  DYONYX, a leading total IT solutions provider, will be a sponsor at the 4th Annual SIM Houston CIO Charity Golf Tournament on April 22nd. The 2016 Golf Tournament raised $75,000 dollars for local Houston STEM-based education and non-profit organizations.  DYONYX leadership and team members will participate in the tournament and sponsor beverages for the players.</p>

            <p>“DYONYX is strongly committed to playing an active role in the greater Houston community and supporting charities across the country through a variety of initiatives throughout the year,” said Chuck Orrico, DYONYX President & CEO. “The SIM Houston CIO Charity Golf Tournament provides us with another wonderful way to participate with our peers to raise money for these deserving charities in Houston,” he continued.</p>

            <p>DYONYX, an IT outsourcing company founded in 1996, has been active in the Houston community since its inception, and most recently participated in fundraising efforts for Toys for Tots and the Children's Advocacy Centers of Texas, Inc. (CACTX). </p>

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
