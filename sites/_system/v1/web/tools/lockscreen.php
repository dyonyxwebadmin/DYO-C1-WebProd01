<?php
    $_SESSION['user_lock'] = 1;   
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
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<style type="text/css">
    html,body {
        height: 100%;
    }
    body {
        background: #fff;
        overflow: hidden;
    }
</style>

<script type="text/javascript" src="/js/widgets/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */

    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>

<img src="/images/blurred-bg/blurred-bg-13.jpg" class="login-img wow fadeIn" alt="">

<div class="center-vertical">
    <div class="center-content row">
        <div class="col-md-4 col-sm-5 col-xs-11 col-lg-3 center-margin ">
            <div class="content-box wow bounceInDown modal-content pad20A clearfix row">
                <div class="col-md-3">
                    <img src="/user/<?php echo $_SESSION['user_id'] ?>/profile" alt="" class="img-bordered border-gray radius-all-4 img-full">
                </div>
                <div class="col-md-9">
                    <div class="meta-box text-left">
                        <h3 class="meta-heading font-size-16"><?php echo $_SESSION['user_full_name'] ?></h3>
                        <h4 class="meta-subheading font-size-13 font-gray"><?php echo $_SESSION['user_type_name'] ?></h4>
                        <div class="divider"></div>
                        <form id="login-form" class="form-inline pad10T">
                        <input type="hidden" id="login" value="<?php echo $_SESSION['user_username'] ?>">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" id="password" placeholder="Password" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-unlock-alt"></i></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php includes("tools/tools-js-footer") ?>

<script src="/js/login.js"></script>

<script>
    $(document).ready(function() {
        App.init();
        Login.init();
    });
</script>


</body>
</html>