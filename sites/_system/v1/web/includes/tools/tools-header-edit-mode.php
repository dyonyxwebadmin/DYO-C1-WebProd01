
        <?php if ($_SESSION['user_type'] == "5") { ?>
            <div class="dropdown" id="edit-mode-btn">
                <?php if ($_SESSION['edit_mode'] == "off") { ?>
                    <a data-toggle="dropdown" href="#" title="">
                        <span class="small-badge bg-red"></span>
                        <i class="glyph-icon icon-linecons-pencil"></i>
                    </a>
                    <div class="dropdown-menu pad0A box-sm float-right" id="edit-mode-dropdown">
                        <div class="pad25A font-black">
                            <h3 class="font-red">Edit Mode is Off</h3>
                            Edit mode allows you to edit content inline with the page. 
                        </div>
                        <div class="pad5A button-pane button-pane-alt text-center">
                            <a href="#" id="edit-mode-toggle" class="btn display-block font-normal hover-green" title="View all notifications">
                                Turn On Edit Mode
                            </a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a data-toggle="dropdown" href="#" title="">
                        <span class="small-badge bg-green"></span>
                        <i class="glyph-icon icon-linecons-pencil"></i>
                    </a>
                    <div class="dropdown-menu pad0A box-sm float-right" id="edit-mode-dropdown">
                        <div class="pad25A font-black">
                            <h3 class="font-red">Edit Mode is On</h3>
                            Edit mode allows you to edit content inline with the page. 
                        </div>
                        <div class="pad5A button-pane button-pane-alt text-center">
                            <a href="#" id="edit-mode-toggle" class="btn display-block font-normal hover-green" title="View all notifications">
                                Turn Off Edit Mode
                            </a>
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php }?>