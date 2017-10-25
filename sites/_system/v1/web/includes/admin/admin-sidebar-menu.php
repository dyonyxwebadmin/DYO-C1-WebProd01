
        <div id="page-sidebar">
            <div id="header-logo" class="logo-bg mrg20B mrg20T">
                <a href="/tools">
                    <img src="/images/logo.png" />
                </a>
            </div>
            <div class="scroll-sidebar">
                <ul id="sidebar-menu">
                    <li class="header"><span><?php cms("MenuTitle", "IoT TOOLSET", true, 250); ?></span></li>
                    <li>
                        <a href="/admin" title="Dashboard">
                            <i class="glyph-icon icon-linecons-params"></i>

                            <?php if ($_SESSION['user_type'] == 4) { ?>  
                                <span>Company Administration</span>
                            <?php } else { ?>
                                <span>System Administration</span>
                            <?php } ?>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="/tools/" title="My Sponsor">
                            <i class="glyph-icon icon-typicons-home-outline"></i>
                            <span>Tools Dashboard</span>
                        </a>
                    </li>
                    <li class="header"><span>USERS</span></li>                    
                    <li>
                        <a href="/admin/users/pending" title="Today's Leads">
                            <i class="glyph-icon icon-typicons-user-add-outline"></i>
                            <span>Pending Users</span>
                        </a>
                    </li>     
                    <li class="divider"></li>                          
                    <li>
                        <a href="/admin/users" title="Today's Leads">
                            <i class="glyph-icon icon-typicons-users-outline"></i>
                            <span>Active Users</span>
                        </a>
                    </li>       
                    <li class="divider"></li>                          
                    <li>
                        <a href="/admin/users/invite" title="Today's Leads">
                            <i class="glyph-icon icon-typicons-sort-numeric-outline"></i>
                            <span>Invite Codes</span>
                        </a>
                    </li>     
                    <li class="header"><span>PARTNER ASSESSMENT TOOL</span></li>                    
                    <li>
                        <a href="/admin/assessments/baseline" title="Landing Page Templates">
                            <i class="glyph-icon icon-copy"></i>
                            <span>Baseline Questions</span>
                        </a>
                    </li>     
                    <li class="divider"></li>           
                    <li>
                        <a href="/admin/assessments/assessment" title="Form Templates">
                            <i class="glyph-icon icon-typicons-doc-text"></i>
                            <span>Assesment Questions</span>
                        </a>
                    </li> 
                    <li class="divider"></li>  
                    <li>
                        <a href="/admin/assessments/list" title="Form Templates">
                            <i class="glyph-icon icon-typicons-doc-text"></i>
                            <span>View Assessments</span>
                        </a>
                    </li> 
                    <li class="divider"></li>         
                    <li>
                        <a href="/admin/assessments/levels" title="Form Templates">
                            <i class="glyph-icon icon-signal"></i>
                            <span>Levels</span>
                        </a>
                    </li> 
                    <li class="divider"></li>     
                    <!-- <li>
                        <a href="/admin/assessments/levels" title="Form Templates">
                            <i class="glyph-icon icon-typicons-doc-text"></i>
                            <span>Levels</span>
                        </a>
                    </li> -->
                    <!-- <li class="header"><span>Training</span></li>                    
                    <li>
                        <a href="/admin/training/add" title="Today's Leads">
                            <i class="glyph-icon icon-typicons-location-outline"></i>
                            <span>Add Training</span>
                        </a>
                    </li>     
                    <li class="divider"></li>           
                    <li>
                        <a href="/admin/training/" title="Pending Leads">
                            <i class="glyph-icon icon-typicons-folder"></i>
                            <span>Library</span>
                        </a>
                    </li>
                    <li class="divider"></li>           
                    <li>
                        <a href="/admin/training/kb" title="Reports">
                            <i class="glyph-icon icon-typicons-globe-alt-outline"></i>
                            <span>Knowledge Base</span>
                        </a>
                    </li> -->
                </ul><!-- #sidebar-menu -->
            </div>
        </div>
        