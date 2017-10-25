<?php 
    checkAdminAccess();
    header( 'Location: /admin/users' ) ;
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>

    <meta charset="UTF-8">
    
    <title> IoT - Partner Assessment Tool - Administration </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php includes("admin/admin-head") ?>
    
    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>

</head>
<body>
<div id="sb-site">

    <?php includes("tools/tools-users-online") ?>

    <?php includes("tools/tools-status") ?>
    
    <?php includes("tools/tools-loading") ?>

    <div id="page-wrapper">
        
        <?php includes("admin/admin-header") ?>

        <?php includes("admin/admin-sidebar-menu") ?>

        <div id="page-content-wrapper">
            <div id="page-content">
                
                <!-- Begin Page Content -->    


                <div id="page-title">
                    <h2><?php cms("PageTitle", "::Lipsum", true, 12); ?></h2>
                    <p><?php cms("PageDesc", "::Lipsum", true, 120); ?></p>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <?php widget("earnings") ?>
                    </div>
                    <div class="col-md-4">
                        <?php widget("subscriptions") ?>
                    </div>
                    <div class="col-md-4">
                        <?php widget("downloads") ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <?php widget("recent-sales") ?>

                        <?php widget("button-stats") ?>

                        <?php widget("live-stats") ?>
                    </div>
                    <div class="col-md-4">
                        
                        <?php widget("button-actions") ?>
                        
                        <?php widget("activity-feed") ?>

                        <?php widget("status-update") ?>

                        <?php widget("tasks") ?>                        
                        
                    </div>
                </div> 

                <!-- End Page Content -->   

            </div>
        </div>
    </div>


    <?php includes("tools/tools-js-footer") ?>

    <!-- Page Level JavaScript Files -->
        
    <!-- Sparklines charts -->

    <script type="text/javascript" src="/js/widgets/charts/sparklines/sparklines.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/sparklines/sparklines-demo.js"></script>

    <!-- Flot charts -->

    <script type="text/javascript" src="/js/widgets/charts/flot/flot.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/flot/flot-resize.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/flot/flot-stack.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/flot/flot-pie.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/flot/flot-tooltip.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/flot/flot-demo-1.js"></script>

    <!-- PieGage charts -->

    <script type="text/javascript" src="/js/widgets/charts/piegage/piegage.js"></script>
    <script type="text/javascript" src="/js/widgets/charts/piegage/piegage-demo.js"></script>


    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>

</div>
</body>
</html>