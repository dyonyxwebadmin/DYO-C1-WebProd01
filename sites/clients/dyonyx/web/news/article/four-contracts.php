<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>DYONYX | Four Contracts</title>

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
                  <span>Four Contracts</span>
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
              <h2 class="g-color-black g-font-weight-600 text-center g-mb-30">DYONYX Awarded 4 New Contracts in Just Over One Month</h2>
            </div>


      
            <p><strong>Houston, TX</strong> &mdash;  DYONYX, a leading total IT solutions provider, has been awarded 4 separate contracts in just over one month to provide services ranging from disaster recovery to IT outsourcing to security consulting. 

            <p class="g-mb-60">The contracts highlighted below represent a diverse range of customers both in the private and public sector, as well as the variety of solutions and services we provide to help our clients with their IT needs and enable their business to succeed," stated DYONYX President & CEO Chuck Orrico. </p>



            <div class="row">
              <div class="col-md-6 g-mb-60">
                <h3 class="h4 g-color-black g-font-weight-600"><span class="g-font-size-25">01.</span> Outsource Support Contract by International Manufacturing Company</h3>
                <p>On April 4, 2017, DYONYX was awarded an IT outsourced support contract by a leading manufacturing firm based out of Germany with several U.S. office locations including Houston. DYONYX will be providing daily operational IT support to the Houston division that will involve 24/7 support of the company’s IT infrastructure and will also involve back-up and DR services. </p>
              </div>
              <div class="col-md-6 g-mb-60">
                <img class="img-fluid" src="/img/blog/manufacturing.png" alt="Outsource Support Contract by International Manufacturing Company">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 flex-md-unordered g-mb-60">
                <h3 class="h4 g-color-black g-font-weight-600"><span class="g-font-size-25">02.</span> Disaster Recovery Contract by a National Financial Services Provider</h3>
                <p>On April 24, 2017, DYONYX was awarded a Professional Services contract to provide comprehensive DR Assessment and Testing Services by a leading tax advisory firm.</p>
                <p>The contract will involve reviewing and assessing disaster recovery and business continuity processes along with prioritized recommendations to validate performance against industry best practices. </p>
              </div>
              <div class="col-md-6 flex-md-first g-mb-60">
                <img class="img-fluid" src="/img/blog/finacial-services.png" alt="Disaster Recovery Contract by a National Financial Services Provider">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 g-mb-60">
                <h2 class="h4 g-color-black g-font-weight-600"><span class="g-font-size-25">03.</span> IT Assessment Contract by Houston-based Distributing Company</h2>
                <p>On May 1, 2017, DYONYX was awarded a Professional Services contract to provide comprehensive IT Assessment Services by a leading distributor of international products throughout the United States. The contract will involve a thorough assessment of the entire IT infrastructure and technologies along with prioritized recommendations to validate performance against industry best practices.  </p>
              </div>
              <div class="col-md-6 g-mb-60">
                <img class="img-fluid" src="/img/blog/distribution.png" alt="IT Assessment Contract by Houston-based Distributing Company">
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 flex-md-unordered g-mb-60">
                <h3 class="h4 g-color-black g-font-weight-600"><span class="g-font-size-25">04.</span> Security Consulting Contract by Leading Texas Utility Agency</h3>
                <p>On May 11, 2017, DYONYX was awarded a Security consulting contract to develop a comprehensive cybersecurity and physical security outreach program for Texas electric utilities, electric cooperatives and municipally owned electric utilities.</p>
              </div>
              <div class="col-md-6 flex-md-first g-mb-60">
                <img class="img-fluid" src="/img/blog/utilities.png" alt="Security Consulting Contract by Leading Texas Utility Agency">
              </div>
            </div>

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
