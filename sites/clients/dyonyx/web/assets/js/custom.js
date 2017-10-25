

      initNav('nav-item', 1)
      
      function initNav(section, level) {
          page_nav = location.pathname.split("/")[level];
          if(typeof page_nav == "undefined") {
              page_nav = "";
          }

          navCss = section + " g-mx-10--lg g-mx-15--xl";

          $("." + section).attr("class", navCss);

          if (page_nav == "") {
              $("#" + section).attr("class", navCss + " active");        
          } else {
              $("#" + section + "-" + page_nav).attr("class", navCss + " active");     
          }
      }
 