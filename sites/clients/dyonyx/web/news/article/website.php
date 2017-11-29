<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Streamlined, Redesigned Website</title>

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
                  <span>Streamlined, Redesigned Website</span>
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
              <h1 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Launches Streamlined, Redesigned Website</h1>
            </div>

            <p><strong>Houston, TX</strong> &mdash; DYONYX, LP, a Houston-based innovative IT solutions provider, redesigned the www.DYONYX.com website with dynamic content and a sleek, easily navigable design.

            <p>
              The site is optimized for mobile use and features:

              <ul>
                  <li>new videos and blog content, including DYONYX's experience assisting customers during Hurricane Harvey in September 2017</li>
                  <li>exclusive information briefs and white papers </li>
                  <li>stories from DYONYX clients from over the years on how DYONYX has helped them achieve their business goals </li>
              </ul>              
            </p>

            <p>"DYONYX continues to be on the forefront of technology as we design the highest quality and most innovative modern solutions for our clients, and we wanted our website to reflect that," stated Chuck Orrico, President and CEO at DYONYX. "The new site design allows us to tell the story of how our solutions impact our clients and to more easily highlight trends and critical news in the IT field so we can keep our site visitors up-to-date," he continued.  </p>

            <p>DYONYX's new site features their four main areas of service, IT Managed Services, Cloud Services, Security Services and Professional Services as well as the federal and commercial industries they serve, including oil and gas, energy, healthcare, real estate and financial services. In addition, it features DYONYX's signature client engagement model, its expanded leadership team and the charities DYONYX has been working with across Houston and the country throughout its 22 years in business. </p>

            <p>The site relaunch comes on the heels of the announcement that DYONYX was recently named as one of the Top 10 IT Managed Services Companies in Houston by the Houston Business Journal. To learn more and visit the redesigned site, click here or go to <a href="https://www.dyonyx.com">www.dyonyx.com</a></p>

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
