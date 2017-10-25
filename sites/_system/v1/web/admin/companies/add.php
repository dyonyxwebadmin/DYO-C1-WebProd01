<?php 
    checkAdminAccess();
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



                <!--<link rel="stylesheet" type="text/css" href="/js/widgets/input-switch/inputswitch.css">-->
                <script type="text/javascript" src="/js/widgets/input-switch/inputswitch.js"></script>
                <script type="text/javascript">
                    /* Input switch */

                    $(function() { "use strict";
                        $('.input-switch').bootstrapSwitch();
                    });
                </script>




                <section id="offer-details">

                    <div class="row mailbox-wrapper">
                        <div class="col-md-4">

                            <div class="panel-layout disabled">
                                <div class="panel-box">


                                    <div class="panel-content image-box">

                                        <div class="image-content font-white">

                                            <div class="center-vertical">
                                                <div class="meta-box center-content">
                                                    
                                                    <input type="checkbox" data-on-color="primary" data-size="large" name="company-status-switch" id="company-status-switch" class="input-switch" data-on-text="On" data-off-text="Off">
                                                    <h3 id="company-status-message" class="pad20T">
                                                        This company is not currently active
                                                    </h3>
                                                    <p class="pad10T">
                                                        Use the toggle switch to activate or deactivate this company. When an company is
                                                        active uesrs will be able to see offeres associated to this company to create leads for.
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                        <img src="/images/blurred-bg/blurred-bg-9.jpg" alt="">

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8">

                            <script type="text/javascript" src="/js/widgets/parsley/parsley.js"></script>


                            <link rel="stylesheet" type="text/css" href="/js/widgets/croppic/croppic.css">
                            <script type="text/javascript" src="/js/widgets/croppic/croppic.js"></script>

                            <!-- Uniform -->


                            <!-- Textarea -->

                            <script type="text/javascript" src="/js/widgets/textarea/textarea.js"></script>
                            <script type="text/javascript">
                                /* Textarea autoresize */

                                $(function() { "use strict";
                                    $('.textarea-autosize').autosize();
                                });
                            </script>

                            <div class="example-box-wrapper">
                                <ul class="list-group row list-group-icons">
                                    <li class="col-md-3 active">
                                        <a href="#tab-company-details" data-toggle="tab" class="list-group-item">
                                            <i class="glyph-icon font-red icon-typicons-info"></i>
                                            Details
                                        </a>
                                    </li>
                                    <li class="col-md-3">
                                        <a href="#tab-company-contacts" data-toggle="tab" class="list-group-item disabled">
                                            <i class="glyph-icon icon-typicons-laptop"></i>
                                            Contacts
                                        </a>
                                    </li>
                                    <li class="col-md-3">
                                        <a href="#tab-company-offers" data-toggle="tab" class="list-group-item disabled">
                                            <i class="glyph-icon icon-typicons-doc-text"></i>
                                            Offers
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane pad0A fade active in" id="tab-company-details">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content-box mrg15B">
                                                    <h3 class="content-box-header clearfix bg-gray">
                                                        <span class="icon-separator">
                                                            <i class="glyph-icon icon-info"></i>
                                                        </span>
                                                        Company Details
                                                        <div class="header-buttons-separator">
                                                            <a href="#" class="icon-separator">
                                                                <i class="glyph-icon icon-question"></i>
                                                            </a>
                                                        </div>
                                                    </h3>
                                                    <div class="content-box-wrapper pad0T clearfix">
                                                        <form class="form-horizontal pad15L pad15R bordered-row" id="form-add-company" data-parsley-validate="">
                                                        <div class="form-group remove-border">
                                                            <label class="col-sm-3 control-label">Company Name:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" data-company-frorm="name" class="form-control" id="name" required placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Description:</label>
                                                            <div class="col-sm-6">
                                                                <textarea id="description" rows="3" data-company-frorm="description" class="form-control textarea-autosize"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Lead Goal:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" data-company-frorm="lead_goal" class="form-control" id="lead_goal" required placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="button-pane mrg20T">
                                                            <button type="submit" class="btn btn-primary">Add Company</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <!-- End Page Content -->   

            </div>
        </div>
    </div>
</div>

    <?php includes("tools/tools-js-footer") ?>

    <!-- Page Level JavaScript Files -->
    

    <script src="/js/company.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
            Company.init('add');
        });
    </script>
</body>
</html>