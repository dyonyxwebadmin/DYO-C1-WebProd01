<?php
//http://investagen.com/enroll/complete.php?tx=43015143PL844625F&st=Completed&amt=1%2e00&cc=USD&cm=&item_number=1001

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

<title> Login page 5 </title>
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

<?php includes("top-bar") ?>
<?php includes("main-header") ?>

<div class="hero-box hero-box-smaller full-bg-9 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">Online Enrollment  </h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Become an Independent Representative today.</p>
    </div>
    <div class="hero-overlay bg-black"></div>
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
                        <a href="#step-1" id="tab-step-1" data-toggle="tab" class="disabled">
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
                         Enrollment Kit
                         <small>Everything you need to get started</small>
                      </span>
                        </a>
                    </li>
                    <li class="active">
                        <a href="#step-4" id="tab-step-4" data-toggle="tab">
                            <label class="wizard-step">4</label>
                      <span class="wizard-description">
                         Enrollment Confirmation
                         <small>Let's get started today!</small>
                      </span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="step-4">
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

<script src="/js/enroll.js"></script>

<script>
    $(document).ready(function() {
        App.init();
        Enroll.init();
    });
</script>

</body>
</html>



