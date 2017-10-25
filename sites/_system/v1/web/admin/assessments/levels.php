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

    <link rel="stylesheet" type="text/css" href="/js/widgets/range-slider/rangeslider.css">
<link rel="stylesheet" type="text/css" href="/js/widgets/slidebars/slidebars.css">
<link rel="stylesheet" type="text/css" href="/js/widgets/slider-ui/slider.css">
    
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




                <div class="row">
                    <div class="col-md-10">
                        <div id="page-title">
                            <h2><?php cms("PageTitle", "::Lipsum", true, 12); ?></h2>
                            <p><?php cms("PageDesc", "::Lipsum", true, 120); ?></p>
                        </div>
                    </div>
                    <div class="col-md-2 page-title-buttons">
                        <a class="btn btn-border btn-alt border-default font-default" href="javascript:;" title="" id="add-level-button"><span>Add Level</span></a>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <h3 class="title-hero">
                            Assessment Levels
                        </h3>
                        <div class="example-box-wrapper">
                            <table id="datatable-levels" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            </table>
                        </div>
                    </div>
                </div>


                <!--<link rel="stylesheet" type="text/css" href="/js/widgets/slider-ui/slider.css">-->
                <script type="text/javascript" src="/js/widgets/slider-ui/slider.js"></script>

                <!-- Range Slider -->


                <div class="modal fade bs-example-modal-lg in" id="level-modal" tabindex="-1" role="dialog" aria-labelledby="addCode">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Assessment Levels</h4>
                            </div>
                            <div class="modal-body">

                                <form id="level-form" class="form-horizontal bordered-row">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-abel text-right pad10T">Level</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="level-level" placeholder="Enter the level or rank number...">
                                        </div>
                                    </div>

                                    <div class="form-group clearfix">
                                        <label for="" class="col-sm-3 control-label">Score Range</label>
                                        <div class="col-sm-6">
                                            <div id="level-range-slider"></div>
                                            <div class="input-group">
                                                <span class="input-group-addon">Score range:</span>
                                                <input type="text" id="level-range" class="form-control" placeholder="Score range ...">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-abel text-right pad10T">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="level-name" placeholder="Enter the name for the level you are adding...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-abel text-right pad10T">Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="" id="level-text" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </form>

                                <div id="level-code">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="tile-box bg-blue">
                                                <div class="tile-header">
                                                    Assessment Level
                                                </div>
                                                <div class="tile-content-wrapper">
                                                    <i class="glyph-icon icon-signal"></i>
                                                    <div id="level-level-view" class="tile-content pad20T pad20B">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">


                                            <form id="level-form-edit" class="form-horizontal bordered-row">


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-abel text-right pad10T">Name</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="level-name-edit" placeholder="...">
                                                    </div>
                                                </div>

                                            <div class="form-group clearfix">
                                                <label for="" class="col-sm-3 control-label">Score Range</label>
                                                <div class="col-sm-6">
                                                    <div id="level-range-slider-edit"></div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Score range:</span>
                                                        <input type="text" id="level-range-edit" class="form-control" placeholder="Score range ...">
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-abel text-right pad10T">Description</label>
                                                    <div class="col-sm-6">
                                                        <textarea name="" id="level-text-edit" class="form-control"></textarea>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="level-form-delete">Delete level</button>
                                <button type="button" class="btn btn-primary" id="level-form-submit">Save changes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->











                <!-- End Page Content -->   

            </div>
        </div>
    </div>
</div>

    <?php includes("tools/tools-js-footer") ?>

    <!-- Page Level JavaScript Files -->
        

    <!-- Data tables -->

    <!--<link rel="stylesheet" type="text/css" href="/css/widgets/datatable/datatable.css">-->
    <script type="text/javascript" src="/js/widgets/datatable/datatable.js"></script>
    <script type="text/javascript" src="/js/widgets/datatable/datatable-bootstrap.js"></script>
    <script type="text/javascript" src="/js/widgets/datatable/datatable-tabletools.js"></script>
    <script type="text/javascript" src="/js/widgets/datatable/datatable-reorder.js"></script>

    <script type="text/javascript" src="/js/levels.js"></script>


    <script type="text/javascript">

        /* Datatables export */


        $(document).ready(function() {
            App.init();
            Levels.init();


          $(function() {
              "use strict";
              $("#level-range-slider").slider({
                  range: true,
                  min: 0,
                  max: 100,
                  values: [50, 75],
                  slide: function(event, ui) {
                      min_range = ui.values[0];
                      max_range = ui.values[1];
                      $("#level-range").val(ui.values[0] + "% - " + ui.values[1] + "%");
                  }
              });
              $("#level-range").val($("#level-range-slider").slider("values", 0) +
                  "% - " + $("#level-range-slider").slider("values", 1) + "%");
              min_range = $("#level-range-slider").slider("values", 0);
              max_range = $("#level-range-slider").slider("values", 1);

          });
        } );



    </script>
</body>
</html>