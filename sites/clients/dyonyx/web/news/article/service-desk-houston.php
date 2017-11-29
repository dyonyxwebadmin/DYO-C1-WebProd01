<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Opens New Headquarters in Houston, TX</title>

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
                  <span>ç</span>
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
              <h2 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Awarded Service Desk Contract by Leading City of Houston Agency</h2>
            </div>


            <p><strong>Houston, TX</strong> &mdash; On June 16, 2017, DYONYX was awarded a Professional Services contract to provide ITIL based service desk training and support to a City of Houston Agency. The contract will involve reviewing and assessing service desk processes and systems along with prioritized recommendations to validate performance against industry best practices.  This is the 5th new contract that DYONYX has been awarded in the last 2 months. </p>

            <p>"DYONYX is a true technology partner with the City of Houston (CoH); we have supported their IT efforts in every department throughout the course of 13 years," stated DYONYX CEO Chuck Orrico. "Our understanding of CoH IT Leadership, goals, projects and partners, as well as our security-focused, comprehensive solutions and world class service have enabled the City to achieve their goals and better serve the residents of the City," he continued.</p>

            <p>DYONYX provides solutions to federal, state and local government, including Managed IT Services, Program Management Support, Hosting and Enterprise Architecture Design.  To learn more about DYONYX's experience serving the Pubic sector, <a href="/industries/government">click here.</a> </p>

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
