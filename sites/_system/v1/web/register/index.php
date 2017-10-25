<?php
    $_SESSION['enroll_id'] = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

<title> IoT Toolkit Registration </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<?php includes("head") ?>

<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

</head>
<body>
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div id="fullpage">
    <div class="section pattern-bg-10" id="section0">
        <div class="slide">
            <div class="center-vertical">
                <div class="center-content">
                    <div class="container">
                        <div class="hero-box font-inverse">
                            <h2 class="hero-heading wow fadeInDown font-white" data-wow-duration="0.6s">I<small class="font-white">o</small>T ToolKit</h2>
                            <p class="pad25T mrg25B hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Request a Demo</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroller-icon">
                <div class="glyph-icon icon-angle-down font-white"></div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap Wizard -->

<!--<link rel="stylesheet" type="text/css" href="/css/widgets/wizard/wizard.css">-->
<script type="text/javascript" src="/js/widgets/wizard/wizard.js"></script>
<script type="text/javascript" src="/js/widgets/wizard/wizard-demo.js"></script>

<!-- Boostrap Tabs -->

<script type="text/javascript" src="/js/widgets/tabs/tabs.js"></script>

<script type="text/javascript" src="/js/widgets/parsley/parsley.js"></script>

<!-- jQueryUI Spinner -->

<script type="text/javascript" src="/js/widgets/spinner/spinner.js"></script>
<script type="text/javascript">
    /* jQuery UI Spinner */

    $(function() { "use strict";
        $(".spinner-input").spinner();
    });
</script>

<!-- jQueryUI Autocomplete -->

<script type="text/javascript" src="/js/widgets/autocomplete/autocomplete.js"></script>
<script type="text/javascript" src="/js/widgets/autocomplete/menu.js"></script>
<script type="text/javascript" src="/js/widgets/autocomplete/autocomplete-demo.js"></script>

<!-- Touchspin -->

<!--<link rel="stylesheet" type="text/css" href="/css/widgets/touchspin/touchspin.css">-->
<script type="text/javascript" src="/js/widgets/touchspin/touchspin.js"></script>
<script type="text/javascript" src="/js/widgets/touchspin/touchspin-demo.js"></script>

<!-- Input switch -->

<!--<link rel="stylesheet" type="text/css" href="/css/widgets/input-switch/inputswitch.css">-->
<script type="text/javascript" src="/js/widgets/input-switch/inputswitch.js"></script>
<script type="text/javascript">
    /* Input switch */

    $(function() { "use strict";
        $('.input-switch').bootstrapSwitch();
    });
</script>

<!-- Textarea -->

<script type="text/javascript" src="/js/widgets/textarea/textarea.js"></script>
<script type="text/javascript">
    /* Textarea autoresize */

    $(function() { "use strict";
        $('.textarea-autosize').autosize();
    });
</script>

<!-- Multi select -->

<!--<link rel="stylesheet" type="text/css" href="/css/widgets/multi-select/multiselect.css">-->
<script type="text/javascript" src="/js/widgets/multi-select/multiselect.js"></script>
<script type="text/javascript">
    /* Multiselect inputs */

    $(function() { "use strict";
        $(".multi-select").multiSelect();
        $(".ms-container").append('<i class="glyph-icon icon-exchange"></i>');
    });
</script>

<!-- Uniform -->

<!--<link rel="stylesheet" type="text/css" href="/css/widgets/uniform/uniform.css">-->
<script type="text/javascript" src="/js/widgets/uniform/uniform.js"></script>
<script type="text/javascript" src="/js/widgets/uniform/uniform-demo.js"></script>

<!-- Chosen -->

<!--<link rel="stylesheet" type="text/css" href="/css/widgets/chosen/chosen.css">-->
<script type="text/javascript" src="/js/widgets/chosen/chosen.js"></script>
<script type="text/javascript" src="/js/widgets/chosen/chosen-demo.js"></script>


<div class="container mrg45T">
    <div class="panel-body">
        <div class="example-box-wrapper">
            <div id="form-wizard-3" class="form-wizard">
                <ul>
                    <li>
                        <a href="#step-1" id="tab-step-1" data-toggle="tab">
                            <label class="wizard-step">1</label>
                      <span class="wizard-description">
                         Account Setup
                         <small>Create your InvestaGen.com account.</small>
                      </span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-2" id="tab-step-2" data-toggle="tab" class="disabled">
                            <label class="wizard-step">2</label>
                      <span class="wizard-description">
                         Contact information
                         <small>Provide and confirm contact details</small>
                      </span>
                        </a>
                    </li>
                    <li>
                        <a href="#step-3" id="tab-step-3" data-toggle="tab" class="disabled">
                            <label class="wizard-step">3</label>
                      <span class="wizard-description">
                         Registration Confirmation
                         <small>Confirm and complete your registration</small>
                      </span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="step-1">
                        <form class="form-horizontal" id="Enroll-Step1" data-parsley-validate="">
                        <?php 
                            $code = $_SERVER['QUERY_STRING'];
                            if ($registration == "Code") { 
                        ?>

                            <div class="content-box">
                                <h3 class="content-box-header bg-default">
                                    Invitation Code
                                </h3>
                                <div class="form-horizonta example-box-wrapper pad45B bordered-row">
                                    <div id="form-group-code" class="form-group">
                                        <label class="col-sm-3 control-label">Code</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="code" required placeholder="" value="<?php echo $code ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>


                        <div class="content-box">
                            <h3 class="content-box-header bg-default">
                                Account Setup
                            </h3>
                            <div class="form-horizonta example-box-wrapper pad45B bordered-row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">First Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="first-name" required placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Last Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="last-name" required placeholder="">
                                    </div>
                                </div>
                                <div id="form-group-email" class="form-group">
                                    <label class="col-sm-3 control-label">Email Address</label>
                                    <div class="col-sm-6">
                                        <input type="text" data-parsley-type="email" class="form-control popover-button-default" id="email" required placeholder="" data-content="Please note an email will be sent to the address your provide.<br>When you get it, just click on the link provided to confirm your<br>email address." title="Email Confirmation" data-trigger="focus" data-placement="top">
                                        <span id="help-block-email" class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="password" required placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Confirm Password</label>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="confirm-password" data-parsley-equalto="#password" required placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-default text-center pad20A mrg25T">
                            <button id="button-step-1" class="btn btn-lg btn-danger">Next</button>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="step-2">
                        <form class="form-horizontal" id="Enroll-Step2" data-parsley-validate="">
                        <div class="content-box">
                            <h3 class="content-box-header bg-default">
                                Contact Information
                            </h3>
                            <div class="example-box-wrapper pad45B bordered-row">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="phone" required placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address Line 1</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="address1" required placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Address Line 2</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="address2" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="city" required placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">State</label>
                                    <div class="col-sm-6">
                                        <select name="state" class="custom-select" required>
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
                                    <label class="col-sm-3 control-label">Zip</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="zip" required placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-default text-center pad20A mrg25T">
                            <button id="button-step-2" class="btn btn-lg btn-danger">Next</button>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="step-3">
                        <div class="content-box">
                            <h3 class="content-box-header bg-default">
                                Confirm and Complete
                            </h3>
                            <div class="content-box-wrapper features-tour-box">
                                <div class="row">
                                    <div class="col-sm-5  col-sm-offset-1">
                                        <h3>Registration Submitted</h3>
                                        <p>Your registration has been submitted.  Once it is approved you will be able to:</p>
                                        <ul>
                                            <li>
                                                <i class="glyph-icon icon-check font-green"></i>
                                                Lorem ipsum dolor
                                            </li>
                                            <li>
                                                <i class="glyph-icon icon-check font-green"></i>
                                                Lorem ipsum dolor sit amet
                                            </li>
                                            <li>
                                                <i class="glyph-icon icon-check font-green"></i>
                                                Lorem ipsum dolor sit
                                            </li>
                                            <li>
                                                <i class="glyph-icon icon-check font-green"></i>
                                                Lorem ipsum dolor sit amet, consectetur.
                                            </li>
                                            <li>
                                                <i class="glyph-icon icon-check font-green"></i>
                                                Lorem ipsum dolor sit
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="bg-holder float-right">
                                            <img src="/images/back-office.png" class="img-responsive" alt="Easy to customize">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <h3 class="content-box-header bg-default">
                                Terms and Conditions
                            </h3>
                            <div class="content-box-wrapper features-tour-box">
                                <div class="row">
                                    <div class="col-sm-10  col-sm-offset-1">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ornare pharetra volutpat. Morbi vitae urna nec eros lobortis sollicitudin. Aenean ac enim in ex tincidunt sagittis eu eu diam. Morbi rhoncus orci orci, vitae varius dui varius nec. Suspendisse congue aliquam velit id consectetur. Curabitur accumsan leo est, et laoreet arcu imperdiet et. Cras nec rutrum sem. Nunc sodales lorem a enim aliquet, quis tempor mi convallis. Integer ac mollis ligula. Fusce auctor libero vel maximus cursus. Pellentesque risus sem, interdum vitae tortor ac, consectetur dapibus erat.</p>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-default text-center pad20A mrg25T">
                           
                        </div>
                    </div>
                    <div class="tab-pane" id="step-4">
                        <div class="content-box">
                            <h3 class="content-box-header bg-default">
                                Forth
                            </h3>
                            <div class="content-box-wrapper">
                                Lorem ipsum dolor sic amet dixit tu.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php includes("footer") ?>

<?php includes("js-footer") ?>

<script src="/js/register.js"></script>

<script>
    $(document).ready(function() {
        App.init();
        Register.init();
    });
</script>


</body>
</html>



