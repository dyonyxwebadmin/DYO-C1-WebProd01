
        <div id="page-sidebar">

            <div id="header-logo" class="logo-bg mrg20B mrg20T">
                <a href="/tools">
                    <img src="/images/logo.png" />
                </a>
            </div>
            <div class="scroll-sidebar">

                <ul id="sidebar-menu">
                    <li class="header"><span><?php cms("MenuTitle", "IoT TOOLSET", true, 250); ?></span></li>
                    <?php if ($_SESSION['user_type'] == 5) { ?>  
                    <li>
                        <a href="/admin" title="Dashboard">
                            <i class="glyph-icon icon-typicons-lock"></i>
                            <span>System Administration</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <?php } ?>
                    <?php if ($_SESSION['user_type'] == 4) { ?>  
                    <li>
                        <a href="/admin" title="Dashboard">
                            <i class="glyph-icon icon-typicons-lock"></i>
                            <span>Company Administration</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <?php } ?>
                    <li>
                        <a href="/tools" title="Dashboard">
                            <i class="glyph-icon icon-typicons-home-outline"></i>
                            <span>Tools Dashboard</span>
                        </a>
                    </li>
                    <li class="header"><span><?php cms("MenuTitleAssessment", "ASSESSMENT", true, 250); ?></span></li>                 
                    <li>
                        <a href="/tools/assessments" title="Today's Leads">
                            <i class="glyph-icon icon-typicons-vcard"></i>
                            <span>New Assessment</span>
                        </a>
                    </li>     
                    <li class="divider"></li>           
                    <li>
                        <a href="/tools/assessments/list" title="Pending Leads">
                            <i class="glyph-icon icon-list-alt"></i>
                            <span>View All</span>
                        </a>
                    </li>
                    <!-- <li class="header"><span>Training</span></li>                    
                    <li>
                        <a href="/tools/training/quickstart" title="Today's Leads">
                            <i class="glyph-icon icon-typicons-location-outline"></i>
                            <span>Quick Strt Guide</span>
                        </a>
                    </li>     
                    <li class="divider"></li>           
                    <li>
                        <a href="/tools/training/library" title="Pending Leads">
                            <i class="glyph-icon icon-typicons-folder"></i>
                            <span>Library</span>
                        </a>
                    </li>
                    <li class="divider"></li>    
                    <li>
                        <a href="/tools/training/kb" title="Reports">
                            <i class="glyph-icon icon-typicons-globe-alt-outline"></i>
                            <span>Knowledge Base</span>
                        </a>
                    </li> -->
                </ul><!-- #sidebar-menu -->
            </div>
        </div>
        