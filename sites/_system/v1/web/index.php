<?php
    $_SESSION['enroll_id'] = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title> Web Site Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <?php dashboard("includes/head") ?>

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
        background: #fff;
        overflow: hidden;
    }

</style>

<script type="text/javascript" src="/dashboard/js/widgets/wow/wow.js"></script>
<script type="text/javascript">
    /* WOW animations */
    wow = new WOW({
        animateClass: 'animated',
        offset: 100
    });
    wow.init();
</script>


<img src="/dashboard/images/blurred-bg/blurred-bg-13.jpg" class="login-img wow fadeIn" alt="">


<div class="center-vertical">
    <div class="center-content row">
        <div class="col-md-3 center-margin">

            <form method="post" action="" id="login-form">
                <div class="content-box wow bounceInDown modal-content">
                    <h3 class="content-box-header content-box-header-alt bg-default">
                        <span class="icon-separator">
                            <i class="glyph-icon icon-clock-o"></i>
                        </span>
                        <span class="header-wrapper">
                            Web Site Dashboard
                            <small>Login to your account.</small>
                        </span>
                    </h3>
                    <div class="content-box-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="email" class="form-control" id="login" placeholder="Enter email">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-envelope-o"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                                <span class="input-group-addon bg-blue">
                                    <i class="glyph-icon icon-unlock-alt"></i>
                                </span>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block">Sign In</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


<?php dashboard("includes/js-footer") ?>

<script type="text/javascript" src="/dashboard/js/widgets/noty-notifications/noty.js"></script>

<script src="/dashboard/js/login.js"></script>

<script>
    $(document).ready(function() {
        App.init();
        Login.init();
    });
</script>


</body>
</html>



