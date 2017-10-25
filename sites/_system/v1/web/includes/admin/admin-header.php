        <div id="page-header" class="pattern-bg-10">
            <div id="mobile-navigation">
                <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
            </div>
            <div id="header-logo" class="logo-bg">
                <a id="close-sidebar" href="#" title="Close sidebar">
                    <i class="glyph-icon icon-angle-left"></i>
                </a>
            </div>


            <?php includes("tools/tools-header-user") ?>

            <div id="header-nav-right">
                <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen">
                    <i class="glyph-icon icon-arrows-alt"></i>
                </a>


                <?php includes("tools/tools-header-edit-mode") ?>

                <a class="header-btn" id="logout-btn" href="/tools/lockscreen" title="Lockscreen page example">
                    <i class="glyph-icon icon-linecons-lock"></i>
                </a>

            </div><!-- #header-nav-right -->
        </div>