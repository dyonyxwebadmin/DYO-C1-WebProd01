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

                

















<section id="personal-profile">

    <div class="row mailbox-wrapper">
        <div class="col-md-4">

            <?php widget("admin-profile") ?>
            

        </div>
        <div class="col-md-8">

            <script type="text/javascript" src="/js/widgets/parsley/parsley.js"></script>


            <link rel="stylesheet" type="text/css" href="/js/widgets/croppic/croppic.css">
            <script type="text/javascript" src="/js/widgets/croppic/croppic.js"></script>

            <!-- Uniform -->


            <div class="example-box-wrapper">
                <ul class="list-group row list-group-icons">
                    <li class="col-md-4 active">
                        <a href="#tab-personal-info" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon font-red icon-bullhorn"></i>
                            Profile Details
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="#tab-account-info" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon icon-dashboard"></i>
                            Account Information
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="#tab-profile-settings" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon font-green icon-cogs"></i>
                            Settings
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane pad0A fade active in" id="tab-personal-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box mrg15B">
                                    <h3 class="content-box-header clearfix bg-gray">
                                        <span class="icon-separator">
                                            <i class="glyph-icon icon-info"></i>
                                        </span>
                                        Personal Information
                                        <div class="header-buttons-separator">
                                            <a href="#" class="icon-separator">
                                                <i class="glyph-icon icon-question"></i>
                                            </a>
                                        </div>
                                    </h3>
                                    <div class="content-box-wrapper pad0T clearfix">
                                        <form class="form-horizontal pad15L pad15R bordered-row" id="form-personal-info" data-parsley-validate="">
                                        <div class="form-group remove-border">
                                            <label class="col-sm-3 control-label">First Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" data-profile-form="first_name" class="form-control" id="first_name" required placeholder="First name...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Last Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" data-profile-form="last_name" class="form-control" id="last_name" required placeholder="Last name...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Email:</label>
                                            <div class="col-sm-6">
                                                <input type="text" data-profile-form="email" class="form-control" id="email" required placeholder="Email address...">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Phone:</label>
                                            <div class="col-sm-6">
                                                <input type="text" data-profile-form="phone" class="form-control" id="phone" required placeholder="Phone number...">
                                            </div>
                                        </div>
                                        <div class="button-pane mrg20T">
                                            <button type="submit" class="btn btn-primary">Update Personal Information</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-account-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box mrg15B">
                                    <h3 class="content-box-header clearfix bg-gray">
                                        <span class="icon-separator">
                                            <i class="glyph-icon icon-key"></i>
                                        </span>
                                        Change Password
                                        <div class="header-buttons-separator">
                                            <a href="#" class="icon-separator">
                                                <i class="glyph-icon icon-question"></i>
                                            </a>
                                        </div>
                                    </h3>
                                    <div class="content-box-wrapper pad0T clearfix">
                                        <form class="form-horizontal pad15L pad15R bordered-row" id="form-change-password" data-parsley-validate="">
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
                                            <div class="button-pane mrg20T">
                                                <button type="submit" class="btn btn-primary">Update Password</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box mrg15B">
                                    <h3 class="content-box-header clearfix bg-gray">
                                        <span class="icon-separator">
                                            <i class="glyph-icon icon-envelope"></i>
                                        </span>
                                        Mailing Address
                                        <div class="header-buttons-separator">
                                            <a href="#" class="icon-separator">
                                                <i class="glyph-icon icon-question"></i>
                                            </a>
                                        </div>
                                    </h3>
                                    <div class="content-box-wrapper pad0T clearfix">
                                        <form class="form-horizontal pad15L pad15R bordered-row" id="form-mail-address" data-parsley-validate="">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address 1:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" data-profile-form="address1" class="form-control" id="address1" required placeholder="Address line 1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Address 2:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" data-profile-form="address2" class="form-control" id="address2" placeholder="Address line 2">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">City:</label>
                                                <div class="col-sm-6">
                                                    <input type="text" data-profile-form="city" class="form-control" id="city" required placeholder="City...">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">State:</label>
                                                <div class="col-sm-6">                                                                
                                                    <select name="state" data-profile-form="state" class="custom-select" required>
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
                                                    <input type="text" data-profile-form="zip" class="form-control" id="zip" required placeholder="Zip...">
                                                </div>
                                            </div>
                                            <div class="button-pane mrg20T">
                                                <button type="submit" class="btn btn-primary">Update Mailing Address</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-profile-settings">
                        <div class="content-box pad25A">
                            
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

    <?php includes("tools/tools-js-footer") ?>

    <!-- Page Level JavaScript Files -->
        
    <!-- Uniform -->

    <!--<link rel="stylesheet" type="text/css" href="/js/widgets/uniform/uniform.css">-->
    <script type="text/javascript" src="/js/widgets/uniform/uniform.js"></script>
    <script type="text/javascript" src="/js/widgets/uniform/uniform-demo.js"></script>

    <!-- Boostrap Tabs -->

    <script type="text/javascript" src="/js/widgets/tabs/tabs.js"></script>

    <!-- Chosen -->

    <!--<link rel="stylesheet" type="text/css" href="/js/widgets/chosen/chosen.css">-->
    <script type="text/javascript" src="/js/widgets/chosen/chosen.js"></script>
    <script type="text/javascript" src="/js/widgets/chosen/chosen-demo.js"></script>

    <!-- Input switch -->

    <!--<link rel="stylesheet" type="text/css" href="/js/widgets/input-switch/inputswitch.css">-->
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

    <script src="/js/profile.js"></script>
    <script src="/js/social.js"></script>

    <script>
        $(document).ready(function() {
            App.init();
            Profile.init();
        });
    </script>
</div>
</body>
</html>