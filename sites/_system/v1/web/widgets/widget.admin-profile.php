
    <div class="panel-layout">
        <div class="panel-box">

            <div class="panel-content image-box">
                <div class="image-content font-white">

                    <div class="meta-box meta-box-bottom">
                        <img src="" width="200" alt="" data-profile="image" class="meta-image img-bordered img-circle">
                        <h3 class="meta-heading" data-profile="fullname"></h3>
                        <h4 class="meta-subheading" data-profile="type_name"></h4>
                    </div>

                </div>
                <img src="/images/blurred-bg/blurred-bg-13.jpg" alt="">

            </div>
            <div class="panel-content pad15A bg-white radius-bottom-all-4">

                <div class="clear profile-box">


                    <button type="button" id="user-access-approve" data-user-access="approve" class="btn btn-primary btn-lg btn-block hide user-access">Approve User Access</button>
                    <?php if ($_SESSION['user_type'] == "5") { ?>
                        <div class="row pad10T pad10B">
                            <div class="col-md-6"><button type="button" id="user-access-client" data-user-access="client" class="btn btn-black btn-lg btn-block user-access">Make Client Admin</button></div>
                            <div class="col-md-6"><button type="button" id="user-access-admin" data-user-access="admin" class="btn btn-info btn-lg btn-block user-access">Make System Admin</button></div>
                        </div>
                    <?php } ?>
                    <button type="button" id="user-access-disable" data-user-access="disable" class="btn btn-danger btn-lg btn-block user-access">Disable User Account</button>
                    


                </div>
            </div>
        </div>
    </div>