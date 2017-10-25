<?php 
    checkAccess();
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>

    <meta charset="UTF-8">
    
    <title> IoT - Partner Assessment Tool </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <?php includes("tools/tools-head") ?>
    
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
        
        <?php includes("tools/tools-header") ?>

        <?php includes("tools/tools-sidebar-menu") ?>

        <div id="page-content-wrapper">
            <div id="page-content">
                
                <!-- Begin Page Content -->    


                <div class="row">
                    <div class="col-md-8">
                        <div id="page-title">
                            <h2><?php cms("PageTitle", "::Lipsum", true, 12); ?></h2>
                            <p><?php cms("PageDesc", "::Lipsum", true, 120); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 page-title-buttons"></div>
                </div>



                <div class="panel">
                    <div class="panel-body">
                        <h3 class="title-hero">
                            <?php cms("TableTitle", "Your Assessments", true, 120); ?>
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
            
            //[{"id":"cede02d0-7954-11e6-949c-448a5b6fde55","company_name":"NewCo","comments":"This is a test","assessment_date":"12 Sep 2016"}]

            var table = $('#datatable-users').DataTable( {
                "ajax": {
                    "url": "/api/assessments/assessment.list",
                    "dataSrc": ""
                },
                "columns": [
                    { "title": "Level", "data": "level", "className":"link" },
                    { "title": "Score", "data": "score", "className":"link" },
                    { "title": "ID", "data": "external_id", "className":"link" },
                    { "title": "Company", "data": "company_name", "className":"link" },
                    { "title": "Phone", "data": "main_phone", "className":"link" },
                    { "title": "Web", "data": "url", "className":"link" },
                    { "title": "Location", "data": "location", "className":"link" },
                    { "title": "Date", "data": "assessment_date", "className":"link" }
                ]
            } );
            var tt = new $.fn.dataTable.TableTools( table );


            $('.dataTables_filter input').attr("placeholder", "Search...");


            $('#datatable-users tbody').on('click', 'tr', function () {
                    var data = table.row( this ).data();
                    window.location.replace('/tools/assessments/' + data['id']);
                });

        } );

    </script>
</body>
</html>