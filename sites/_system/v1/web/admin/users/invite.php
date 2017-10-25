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




                <div class="row">
                    <div class="col-md-10">
                        <div id="page-title">
                            <h2><?php cms("PageTitle", "::Lipsum", true, 12); ?></h2>
                            <p><?php cms("PageDesc", "::Lipsum", true, 120); ?></p>
                        </div>
                    </div>
                    <div class="col-md-2 page-title-buttons">
                        <a class="btn btn-border btn-alt border-default font-default" href="javascript:;" title="" id="add-invite-code-button"><span>Add Invite Code</span></a>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-body">
                        <h3 class="title-hero">
                            View All Invite Codes
                        </h3>
                        <div class="example-box-wrapper">
                            <table id="datatable-invites" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            </table>
                        </div>
                    </div>
                </div>


                <div class="modal fade bs-example-modal-lg in" id="invite-modal" tabindex="-1" role="dialog" aria-labelledby="addCode">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Invite Code</h4>
                            </div>
                            <div class="modal-body">

                                <form id="invite-form" class="form-horizontal bordered-row">

                                    <div class="form-group">
                                        <label class="col-sm-3 control-abel text-right pad10T">Description</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="invite-name" placeholder="Enter the name or description for your invite code...">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-abel text-right pad10T">Limit</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="invite-limit" placeholder="How many times can this code be used?">
                                        </div>
                                    </div>

                                </form>

                                <div id="invite-code">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="tile-box bg-blue">
                                                <div class="tile-header">
                                                    Invite Code
                                                </div>
                                                <div class="tile-content-wrapper">
                                                    <i class="glyph-icon icon-lock"></i>
                                                    <div id="invite-code-view" class="tile-content pad20T pad20B">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">


                                            <form id="invite-form-edit" class="form-horizontal bordered-row">



                                                <div class="form-group">
                                                    <label class="col-sm-3 control-abel text-right pad10T">Registration URL</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-control" id="invite-url-edit"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-abel text-right pad10T">Description</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="invite-name-edit" placeholder="Enter the name or description for your invite code...">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-abel text-right pad10T">Limit</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="invite-limit-edit" placeholder="How many times can this code be used?">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-3 control-abel text-right pad10T">Count</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="invite-count-edit" placeholder="How many times this code has been used" readonly>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" id="invite-form-delete">Delete code</button>
                                <button type="button" class="btn btn-primary" id="invite-form-submit">Save changes</button>
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

    <script type="text/javascript" src="/js/invite.js"></script>


    <script type="text/javascript">

        /* Datatables export */


        $(document).ready(function() {
            App.init();
            Invite.init();
        } );



    </script>
</body>
</html>