
    <div id="header-nav-left">
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="/user/<?php echo $_SESSION['user_id'] ?>/profile" data-profile="image" alt="Profile image">
                <span><?php echo $_SESSION['user_full_name'] ?></span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="/tools/profile" title="" class="change-img">Change photo</a>
                            <img src="/user/<?php echo $_SESSION['user_id'] ?>/profile" alt="">
                        </div>
                        <div class="user-info">
                            <span>
                                <?php echo $_SESSION['user_full_name'] ?>
                                <i><?php echo $_SESSION['user_type_name'] ?></i>
                            </span>
                            <a href="/tools/profile" title="My profile">My profile</a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <ul class="reset-ul mrg5B">
                        <li>
                            <a href="/tools/lockscreen">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                Daskboard lockscreen
                                
                            </a>
                        </li>
                        <li>
                            <a href="/tools/profile">
                                <i class="glyph-icon float-right icon-caret-right"></i>
                                View account details
                                
                            </a>
                        </li>
                    </ul>
                    <div class="pad5A button-pane button-pane-alt text-center">
                        <a href="/logout" class="btn display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->