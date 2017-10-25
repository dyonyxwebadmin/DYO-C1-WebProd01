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
                        
                    </div>
                </div>


                <div class="panel">
                    <div class="panel-body">
                        <h3 class="title-hero">
                            Register Users Pending Approval
                        </h3>
                        <div class="example-box-wrapper">
                            <table id="datatable-users" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            </table>
                        </div>
                    </div>
                </div>














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

    <script type="text/javascript">

        /* Datatables export */

        $(document).ready(function() {
            App.init();
            
            var table = $('#datatable-users').DataTable( {
                "ajax": {
                    "url": "/api/users.list.pending",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Name", "data": "fullname", "className":"link" },
                    { "title": "Email Address", "data": "email", "className":"link" },
                    { "title": "Phone Number", "data": "phone", "className":"link" },
                    { "title": "Location", "data": "location", "className":"link" },
                    { "title": "Member Since", "data": "start_date", "className":"link" },
                    { "title": "Last Login", "data": "last_login", "className":"link" }
                ]
            } );
            var tt = new $.fn.dataTable.TableTools( table );


            $('.dataTables_filter input').attr("placeholder", "Search...");


            $('#datatable-users tbody').on('click', 'tr', function () {
                    var data = table.row( this ).data();
                    window.location.replace('/admin/users/profile/' + data['id']);
                });

        } );



    </script>
</body>
</html>