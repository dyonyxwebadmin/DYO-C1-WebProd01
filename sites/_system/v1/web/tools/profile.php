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

                

















<section id="personal-profile" style="display:none;">

    <div class="row mailbox-wrapper">
        <div class="col-md-4">

            <?php widget("profile") ?>

            

        </div>
        <div class="col-md-8">

            <?php widget("status-update") ?>    

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
                        <a href="#tab-social-settings" data-toggle="tab" class="list-group-item">
                            <i class="glyph-icon font-green icon-share-alt"></i>
                            Social Accounts
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
                                            <i class="glyph-icon icon-camera"></i>
                                        </span>
                                        Profile Image
                                        <div class="header-buttons-separator">
                                            <a href="#" class="icon-separator">
                                                <i class="glyph-icon icon-question"></i>
                                            </a>
                                        </div>
                                    </h3>
                                    <div class="content-box-wrapper clearfix">
                                        <div class="form-group">
                                            <div class="col-sm-4">
                                                <style>
                                                #form-profile-image {
                                                            width: 300px;
                                                            height: 300px;
                                                            border: #dfe8f1 solid 1px;
                                                            position:relative; /* or fixed or absolute */
                                                        }
                
                                                </style>

                                                <div id="form-profile-image" style="background-image: url('/user/<?php echo $_SESSION["user_id"]; ?>/profile')"></div>

                                                <script> 
                                                    var cropperOptions = {
                                                        uploadUrl:'/api/profile.image.upload',
                                                        cropUrl:'/api/profile.image.crop',
                                                        onBeforeImgUpload: function(){ $('#form-profile-image').css('background-image', 'none'); },
                                                        onAfterImgCrop: function(){ $('*[data-profile="image"]').attr("src", SESSION.profile_image); $('#form-profile-image').css('background-image', SESSION.profile_image); },
                                                        doubleZoomControls:false,
                                                        rotateControls:false     
                                                    }       
                                                    var cropperHeader = new Croppic('form-profile-image', cropperOptions);
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-sm-1"></div>
                                            <div class="col-sm-6">
                                            <h3>Upload Your Profile Photo</h3>
                                            <p>
                                                Click on the upload icon to the left to upload a new profile image. Once your images is uploaded you can resize your image to fit and then click the checkmark to save your image.
                                            </p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <label class="col-sm-3 control-label">Old password:</label>
                                                <div class="col-sm-6">
                                                    <input type="password" class="form-control" id="old_password" placeholder="" required>
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
                    <div class="tab-pane fade" id="tab-social-settings">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box mrg15B">
                                    <h3 class="content-box-header clearfix bg-gray">
                                        <span class="icon-separator">
                                            <i class="glyph-icon icon-share-alt"></i>
                                        </span>
                                        Social Profiles
                                        <div class="header-buttons-separator">
                                            <a href="#" class="icon-separator">
                                                <i class="glyph-icon icon-question"></i>
                                            </a>
                                        </div>
                                    </h3>                                
                                    <div class="content-box-wrapper pad20A clearfix">
                                            
                                        <table id="list-user-social" class="table table-striped table-bordered">
                                        </table>


                                    </div>
                                </div>                                
                                <div class="content-box-wrapper pad20L pad20R clearfix text-right">


                                        <a href="/api/social/twitter.connect" class="btn btn-lg bg-twitter">
                                            <span class="glyph-icon icon-separator">
                                                <i class="glyph-icon icon-twitter"></i>
                                            </span>
                                            <span class="button-content">
                                                Add Twitter Account
                                            </span>
                                        </a>
                                        
                                        <a href="/api/social/facebook.connect" class="btn btn-lg bg-facebook">
                                            <span class="glyph-icon icon-separator">
                                                <i class="glyph-icon icon-facebook"></i>
                                            </span>
                                            <span class="button-content">
                                                Add Facebook Account
                                            </span>
                                        </a>               
                                </div>          
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-paypal-settings">
                        <div class="content-box pad25A">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="public-profile" style="display:none">
    <?php widget("profile-public") ?>

    <div class="row mailbox-wrapper">
        <div class="col-md-4">

            <div class="content-box mrg15B">
                <div class="content-box-wrapper clearfix">
                    <h3>Get in touch</h3>
                    <ul class="contact-list mrg15T mrg25B reset-ul">
                        <li>
                            <i class="glyph-icon icon-home"></i>
                            <span data-profile="city"></span>, 
                            <span data-profile="state"></span> 
                        </li>
                        <li>
                            <i class="glyph-icon icon-phone"></i>
                            <span data-profile="phone"></span>
                        </li>
                        <li>
                            <i class="glyph-icon icon-envelope-o"></i>
                            <a href="javascript:;" class="mailto" title="" data-profile="email"></a>
                        </li>
                    </ul>
                    <div class="divider mrg25T mrg25B"></div>
                    <blockquote class="font-gray">
                        <p data-profile="status">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <div class="font-size-12">
                            Last Updated: <span data-profile="status_date"></span>
                        </div>
                    </blockquote>
                </div>
            </div>
            <?php widget("team") ?>
            

        </div>
        <div class="col-md-8">


            <div class="content-box mrg15B">
                <div class="content-box-wrapper text-center clearfix">

                    <div class="clear profile-box">
                        <ul class="nav nav-pills nav-justified">
                            <li>
                                <a href="#" class="btn btn-sm bg-google">
                                    <span class="glyph-icon icon-separator">
                                        <i class="glyph-icon icon-google-plus"></i>
                                    </span>
                                    <span class="button-content">
                                        Google+
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-sm bg-facebook">
                                    <span class="glyph-icon icon-separator">
                                        <i class="glyph-icon icon-facebook"></i>
                                    </span>
                                    <span class="button-content">
                                        Facebook
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-sm bg-twitter">
                                    <span class="glyph-icon icon-separator">
                                        <i class="glyph-icon icon-twitter"></i>
                                    </span>
                                    <span class="button-content">
                                        Twitter
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
                
            <?php widget("status-update") ?>    
            
            <?php widget("activity-feed") ?>    

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