<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Houston’s 2017 Top 10 IT Managed Services Companies</title>
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
                  <a class="u-link-v5 g-color-main g-color-primary--hover" href="/news">Mews</a>
                  <i class="g-color-gray-light-v2 g-ml-5">/</i>
                </li>
                <li class="list-inline-item g-color-primary">
                  <span>Houston’s 2017 Top 10 IT Managed Services Companies</span>
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
              <h1 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Named One of Houston’s 2017 Top 10 IT Managed Services Companies by the Houston Business Journal</h1>
            </div>


              <p>Thursday October 12, 2017</p>
              
              <p><strong>Houston, TX</strong>- DYONYX, a leading innovative IT solutions provider headquartered in Houston, TX, has been named one of the 2017 Top 10 IT Managed Services Companies by the Houston Business Journal.</p>

              <p>“Our ranking as one of the Top IT Managed Services Companies in Houston underscores our commitment to providing the highest quality, customized managed IT services to our clients, which are designed to increase productivity and lower costs,” said Chuck Orrico, President & CEO of DYONYX. “We’ve been serving as a trusted IT advisor to companies across all industries in Houston for 22 years and continue to expand our diverse set of offerings to ensure our clients are able to focus on their core business objectives while relying on us to handle their IT burden,” he continued. </p>

              <p>DYONYX’s managed IT services help clients enhance business operations, track people processes and assets, and improve customer satisfaction through the deployment of cloud technologies. DYONYX collaborates with clients to create solutions with emphasis on security, scalability and ease of use.  By combining the experience of their dedicated staff with powerful, state-of-the-art tools using our proven methodology and best practices, DYONYX delivers turn-key solutions that save organizations valuable time and resources.</p>

              <p>DYONYX’s clients in the Houston area include both government and commercial clients across industries such as oil and gas, energy, financial services, real estate and construction and healthcare. DYONYX is also dedicated to playing an active role in the greater Houston community and supporting charities through a variety of initiatives throughout the year including the Texas Children's Hospital, Children’s Advocacy Center of Houston (CAC), Boys and Girls Country, Love 146, Salem Ministry Missions and College Golf Fellowship.  </p>

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
