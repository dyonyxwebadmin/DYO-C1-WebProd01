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
                    <div class="col-md-4 page-title-buttons"></div>
                </div>

                <section id="assessment-page">
                    <div class="row mailbox-wrapper">
                        <div class="col-md-8">


                            <div class="example-box-wrapper">
                                <ul class="list-group row list-group-icons">
                                    <li class="col-md-3 active">
                                        <a href="#tab-start" data-toggle="tab" id="start-tab" class="list-group-item">
                                            <i class="glyph-icon font-red icon-users"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="col-md-3">
                                        <a href="#tab-baseline" data-toggle="tab" id="baseline-tab" class="list-group-item disabled">
                                            <i class="glyph-icon font-red icon-dashboard"></i>
                                            Baseline
                                        </a>
                                    </li>
                                    <li class="col-md-3">
                                        <a href="#tab-assessment" data-toggle="tab" id="assessment-tab" class="list-group-item disabled">
                                            <i class="glyph-icon font-red icon-tasks"></i>
                                            Assessment
                                        </a>
                                    </li>
                                    <li class="col-md-3">
                                        <a href="#tab-partner-levels" data-toggle="tab" id="partner-level-tab" class="list-group-item">
                                            <i class="glyph-icon font-red icon-signal"></i>
                                            Partner Levels
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane pad0A fade active in" id="tab-start">
                                                    
                                            <div class="content-box mrg15B">
                                                <h3 class="content-box-header clearfix bg-red">
                                                    <span class="icon-separator">
                                                        <i class="glyph-icon icon-users"></i>
                                                    </span>
                                                    Partner Profile
                                                </h3>
                                                <div class="content-box-wrapper pad0T clearfix">
                                                <form class="form-horizontal pad15L pad15R bordered-row" id="form-assessment-profile" data-parsley-validate="">
                                        
                                                    <div class="form-group remove-border">
                                                        <label class="col-sm-3 control-label">Company Name:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-company-name="company_name" class="form-control" id="company_name" required placeholder="Company name...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group remove-border">
                                                        <label class="col-sm-3 control-label">Avnet Org ID:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-external-id="external_id" class="form-control" id="external_id" required placeholder="Avnet Org ID...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group remove-border">
                                                        <label class="col-sm-3 control-label">Main Phone:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-main-phone="main_phone" class="form-control" id="main_phone" required placeholder="Main phone number...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group remove-border">
                                                        <label class="col-sm-3 control-label">Web URL:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-url="url" class="form-control" id="url" required placeholder="http://">
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                            <div class="content-box mrg15B">
                                                <h3 class="content-box-header clearfix bg-red">
                                                    <span class="icon-separator">
                                                        <i class="glyph-icon icon-map-marker"></i>
                                                    </span>
                                                    Company Address
                                                </h3>
                                                <div class="content-box-wrapper pad0T clearfix">
                                                <form class="form-horizontal pad15L pad15R bordered-row" id="form-assessment-address" data-parsley-validate="">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Address 1:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-form="address1" class="form-control" id="address1" required placeholder="Address line 1">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Address 2:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-form="address2" class="form-control" id="address2" placeholder="Address line 2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">City:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-form="city" class="form-control" id="city" required placeholder="City...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">State:</label>
                                                        <div class="col-sm-6">                                                                
                                                            <select name="state" data-assessment-form="state" class="custom-select" required>
                                                                <option value=""></option>
                                                                <option value="AL">Alabama</option>
                                                                <option value="AK">Alaska</option>
                                                                <option value="AZ">Arizona</option>
                                                                <option value="AR">Arkansas</option>
                                                                <option value="CA">California</option>
                                                                <option value="CO">Colorado</option>
                                                                <option value="CT">Connecticut</option>
                                                                <option value="DE">Delaware</option>
                                                                <option value="DC">District Of Columbia</option>
                                                                <option value="FL">Florida</option>
                                                                <option value="GA">Georgia</option>
                                                                <option value="HI">Hawaii</option>
                                                                <option value="ID">Idaho</option>
                                                                <option value="IL">Illinois</option>
                                                                <option value="IN">Indiana</option>
                                                                <option value="IA">Iowa</option>
                                                                <option value="KS">Kansas</option>
                                                                <option value="KY">Kentucky</option>
                                                                <option value="LA">Louisiana</option>
                                                                <option value="ME">Maine</option>
                                                                <option value="MD">Maryland</option>
                                                                <option value="MA">Massachusetts</option>
                                                                <option value="MI">Michigan</option>
                                                                <option value="MN">Minnesota</option>
                                                                <option value="MS">Mississippi</option>
                                                                <option value="MO">Missouri</option>
                                                                <option value="MT">Montana</option>
                                                                <option value="NE">Nebraska</option>
                                                                <option value="NV">Nevada</option>
                                                                <option value="NH">New Hampshire</option>
                                                                <option value="NJ">New Jersey</option>
                                                                <option value="NM">New Mexico</option>
                                                                <option value="NY">New York</option>
                                                                <option value="NC">North Carolina</option>
                                                                <option value="ND">North Dakota</option>
                                                                <option value="OH">Ohio</option>
                                                                <option value="OK">Oklahoma</option>
                                                                <option value="OR">Oregon</option>
                                                                <option value="PA">Pennsylvania</option>
                                                                <option value="RI">Rhode Island</option>
                                                                <option value="SC">South Carolina</option>
                                                                <option value="SD">South Dakota</option>
                                                                <option value="TN">Tennessee</option>
                                                                <option value="TX">Texas</option>
                                                                <option value="UT">Utah</option>
                                                                <option value="VT">Vermont</option>
                                                                <option value="VA">Virginia</option>
                                                                <option value="WA">Washington</option>
                                                                <option value="WV">West Virginia</option>
                                                                <option value="WI">Wisconsin</option>
                                                                <option value="WY">Wyoming</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Zip:</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" data-assessment-form="zip" class="form-control" id="zip" required placeholder="Zip...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group remove-border">
                                                        <label class="col-sm-3 control-label">Comments</label>
                                                        <div class="col-sm-6">
                                                            <textarea data-assessment-comments="comments" class="form-control" id="comments"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="button-pane mrg20T">
                                                        <button type="submit" id="btn-begin" class="btn btn-primary">Begin Assessment</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane pad0A fade in" id="tab-baseline">
                                        <div class="content-box mrg15B">
                                            <h3 class="content-box-header clearfix bg-red">
                                                <span class="icon-separator">
                                                    <i class="glyph-icon icon-dashboard"></i>
                                                </span>
                                                Baseline Questions
                                                <div class="header-buttons-separator">
                                                    <a href="#" class="icon-separator">
                                                        <i class="glyph-icon icon-question"></i>
                                                    </a>
                                                </div>
                                            </h3>
                                            <div class="content-box-wrapper clearfix">
                                                <ul id="baseline-questions" class="questions">
                                                </ul>
                                                <div class="button-pane mrg20T">
                                                    <button type="submit" id="btn-continue" class="btn btn-primary btn-continue">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-assessment">
                                        <div class="content-box mrg15B">
                                            <h3 class="content-box-header clearfix bg-red">
                                                <span class="icon-separator">
                                                    <i class="glyph-icon icon-dashboard"></i>
                                                </span>
                                                Assessment Questions
                                                <div class="header-buttons-separator">
                                                    <a href="#" class="icon-separator">
                                                        <i class="glyph-icon icon-question"></i>
                                                    </a>
                                                </div>
                                            </h3>
                                            <div class="content-box-wrapper clearfix">
                                                <ul id="assessment-questions" class="questions">
                                                </ul>

                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="tab-partner-levels">
                                        <div class="content-box mrg15B">
                                            <h3 class="content-box-header clearfix bg-red">
                                                <span class="icon-separator">
                                                    <i class="glyph-icon icon-signal"></i>
                                                </span>
                                                Assessment Levels
                                                <div class="header-buttons-separator">
                                                    <a href="#" class="icon-separator">
                                                        <i class="glyph-icon icon-question"></i>
                                                    </a>
                                                </div>
                                            </h3>
                                            <div class="content-box-wrapper clearfix" id="assessment-levels"></div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                         
                            <div class="panel-layout assessment-level-panel">
                                <div class="panel-box">
                                    <div class="panel-content bg-blue">

                                        <h1 class="font-weight assessement-level-number"><span id="current-assessment-level">0</span></h1>
                                        <h5 class="opacity-60">Current Assessment Level</h5>

                                        <div class="row mrg15T">
                                            <div class="col-md-4 text-left">
                                                <h5 class="opacity-60">Total: <span id="current-assessment-total">0</span></h5>
                                            </div>

                                            <div class="col-md-4 text-center">
                                                <h5 class="opacity-60">Score: <span id="current-assessment-score">0</span>%</h5>
                                            </div>

                                            <div class="col-md-4 text-right">
                                                <h5 class="opacity-60">Possible: <span id="current-assessment-possible">-</span></h5>
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="panel-content pad45A bg-white text-left">

                                        <h3 id="level-name"></h3>
                                        <p id="level-text"></p>

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

    <script type="text/javascript" src="/js/widgets/sortable/jquery-sortable.js"></script>
    <script type="text/javascript" src="/js/widgets/uniform/uniform.js"></script>

    <script type="text/javascript" src="/js/widgets/input-switch/inputswitch.js"></script>

    <script type="text/javascript" src="/js/assessment.js"></script>
    <script type="text/javascript" src="/js/levels.js"></script>

    <!-- Page Level JavaScript Files -->
        
    <script>
        var config = new Object();
        config.section = ["baseline", "assessment"];

        $(document).ready(function() {
            

            $('input[type="checkbox"].custom-checkbox').uniform();
            $('input[type="radio"].custom-radio').uniform();
            $('.custom-select').uniform();

            $(".selector").append('<i class="glyph-icon icon-caret-down"></i>');
            $('.checker span').append('<i class="glyph-icon icon-check"></i>');
            $('.radio span').append('<i class="glyph-icon icon-circle"></i>');

            $("#add-value").click(function() {
                $('#question-values tbody>tr:last').clone(true).insertAfter('#question-values tbody>tr:last');
                $('#question-values tbody>tr:last .value-option').val('');
                $('#question-values tbody>tr:last .value-option').removeClass('hide');
                $('#question-values tbody>tr:last').find('[data-row]').each(function() { $(this).attr("data-row", $('#question-values tbody>tr').length) });
                $('#question-values tbody>tr:last').find('[name="question-conditions"]').val('or');
                $('#question-values tbody>tr:last').find('[name="question-operators"]').val('equal to');
                $('#question-values tbody>tr:last').find('[name="question-weight"]').val('0');

                return false;
            });

            $("#remove-value").click(function() {
                if($('#question-values tbody>tr').length > 1) {
                    $('#question-values tbody>tr:last').remove();
                }
                return false;
            });


            assessment_id = location.pathname.split("/")[4];

            readOnly = true;

            App.init();
            Assessment.init(assessment_id);
            showLevels('assessment-levels');


        });
    </script>

</body>
</html>