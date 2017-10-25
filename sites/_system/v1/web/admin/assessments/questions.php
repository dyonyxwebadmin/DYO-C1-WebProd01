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
    <link rel="stylesheet" type="text/css" href="/js/widgets/sortable/jquery-sortable.css">

    
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
                    <div class="col-md-8">
                        <div id="page-title">
                            <h2><?php cms("PageTitle", "::Lipsum", true, 12); ?></h2>
                            <p><?php cms("PageDesc", "::Lipsum", true, 120); ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 page-title-buttons">
                        <a class="btn btn-border btn-alt border-default font-default" href="#" title="" id="add-group"><span>Add Group</span></a>
                    </div>
                </div>

                <div class="content-box"> 
                    <h3 class="title-hero pad20T pad20L">
                        Section Questions
                    </h3>
                    <ul id="section-questions" class="questions">
                    </ul>
                </div>
                <!-- End Page Content -->   

            </div>
        </div>
    </div>
</div>



<div class="modal fade group-form" tabindex="-1" role="dialog" aria-labelledby="groupForm" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Question Grouping</h4>
            </div>
            <div class="modal-body">
                <p>Use the form below to add/edit a question grouping.  What you type will be presented to the users as a Section Title or Group Title for a number of questions assigned to this group.</p>
                
                <div class="mrg20T mrg20B">
                    <input type="text" class="form-control" id="group-text" placeholder="Enter the title or text for this group...">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="group-form-save">Save changes</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade question-form" tabindex="-1" role="dialog" aria-labelledby="questionForm" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="question-form" class="form-horizontal bordered-row">
                    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Question</h4>
                </div>
                <div class="modal-body">
                    
                    <p>User the form below to add/edit a question. </p>

                    <div class="mrg45A"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-abel text-right pad10T">Question</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="question-text" placeholder="Enter the title or text for your question...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Question Type</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-text" data-type-value="text" name="question-type" class="custom-radio">
                                            Text
                                        </label>
                                    </div>
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-amount" data-type-value="amount" name="question-type" class="custom-radio">
                                            Amount
                                        </label>
                                    </div>
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-percent" data-type-value="percent" name="question-type" class="custom-radio">
                                            Percent
                                        </label>
                                    </div>
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-none" data-type-value="none" name="question-type" class="custom-radio">
                                            No Answer
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-yes-no" data-type-value="yes-no" name="question-type" class="custom-radio">
                                            Yes or No
                                        </label>
                                    </div>
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-or" data-type-value="or" name="question-type" class="custom-radio">
                                            Ether/Or Option
                                        </label>
                                    </div>
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-single" data-type-value="single" name="question-type" class="custom-radio">
                                            Single Select
                                        </label>
                                    </div>
                                    <div class=" radio-info">
                                        <label>
                                            <input type="radio" id="question-type-multiple" data-type-value="multiple" name="question-type" class="custom-radio">
                                            Multiple Select
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Question Style</label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" checkbox-success">
                                        <label>
                                            <input type="checkbox" id="question-style-bold" value="bold" name="question-style" class="custom-checkbox">
                                            Bold
                                        </label>
                                    </div>
                                    <div class=" checkbox-success">
                                        <label>
                                            <input type="checkbox" id="question-style-italic" value="italic" name="question-style" class="custom-checkbox">
                                            italic
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" checkbox-success">
                                        <label>
                                            <input type="checkbox" id="question-style-hide-numbers" value="hide-numbers" name="question-style" class="custom-checkbox">
                                            Hide Numbering
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-header">
                    <button id="remove-value" class="btn btn-xs btn-danger pull-right mrg5L"><i class="glyph-icon icon-minus"></i></button>
                    <button id="add-value" class="btn btn-xs btn-success pull-right"><i class="glyph-icon icon-plus"></i></button>
                    <h4 class="modal-title">Option Values</h4>
                </div>

                <div id="question-values">
                    <table id="value-tables" class="table ">
                    <tbody>
                    <tr class="value-logic">
                        <td>
                            <select class="form-control value-option hide" name="question-conditions" data-value="conditions" data-row="1">
                                <option></option>
                                <option>and</option>
                                <option selected>or</option>
                            </select>
                        </td>
                        <td class="pad20T"><label>the answer is</label></td>
                        <td class="col-md-2">
                            <select class="form-control value-option" name="question-operators" data-value="operators" data-row="1">
                                <option></option>
                                <option selected>equal to</option>
                                <option>not equal to</option>
                                <option>less then</option>
                                <option>greater then</option>
                                <option>less then or equal to</option>
                                <option>greater then or equal to</option>
                                <option>contains</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control value-option" name="question-value" data-value="value" data-row="1" /></td>
                        <td class="pad20T"><label>then the assesment value is</label></td>
                        <td>
                            <select class="form-control value-option" name="question-weight" data-value="weight" data-row="1">
                                <option></option>
                                <option selected>0</option>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>25</option>
                                <option>30</option>
                                <option>35</option>
                                <option>40</option>
                                <option>45</option>
                                <option>50</option>
                                <option>55</option>
                                <option>60</option>
                                <option>65</option>
                                <option>70</option>
                                <option>75</option>
                                <option>80</option>
                                <option>85</option>
                                <option>90</option>
                                <option>95</option>
                                <option>100</option>
                            </select>
                        </td>
                        <td class="pad20T">
                            <label>
                                <input type="checkbox" class="value-option" name="question-required" data-value="required" data-row="1">
                                Required
                            </label>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>  

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="answer-form-save">Save changes</button>
                </div>
            </form>            
        </div>
    </div>
</div>

    <?php includes("tools/tools-js-footer") ?>


    <script type="text/javascript" src="/js/widgets/sortable/jquery-sortable.js"></script>
    <script type="text/javascript" src="/js/widgets/uniform/uniform.js"></script>

    <script type="text/javascript" src="/js/questions.js"></script>

    <!-- Page Level JavaScript Files -->
        
    <script>
        $(document).ready(function() {

            $('input[type="radio"].custom-radio').uniform();
            $('input[type="checkbox"].custom-checkbox').uniform();
            $('.checker span').append('<i class="glyph-icon icon-check"></i>');
            $('.radio span').append('<i class="glyph-icon icon-circle"></i>');

            App.init();
            Questions.init();


            $("#add-value").click(function() {
                $('#question-values tbody>tr:last').clone(true).insertAfter('#question-values tbody>tr:last');
                $('#question-values tbody>tr:last .value-option').val('');
                $('#question-values tbody>tr:last .value-option').removeClass('hide');
                $('#question-values tbody>tr:last').find('[data-row]').each(function() { $(this).attr("data-row", $('#question-values tbody>tr').length) });
                $('#question-values tbody>tr:last').find('[name="question-conditions"]').val('or');
                $('#question-values tbody>tr:last').find('[name="question-operators"]').val('equal to');
                $('#question-values tbody>tr:last').find('[name="question-weight"]').val('0');
                $('#question-values tbody>tr:last').find('[name="question-required"]').attr('checked', false); 

                return false;
            });

            $("#remove-value").click(function() {
                if($('#question-values tbody>tr').length > 1) {
                    $('#question-values tbody>tr:last').remove();
                }
                return false;
            });
        });
    </script>

</body>
</html>