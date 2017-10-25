        

        <div class="content-box bg-white post-box">
            <textarea name="" id="profile-status-update" class="textarea-autosize" placeholder="What's on your mind? Do you have a favorite quote or thought of the day?"></textarea>
            <div class="button-pane">

                <a href="javascript:;" id="profile-status-update-btn" class="btn btn-md btn-post float-right btn-info" title="Update Profile Status" onclick="setProfileStatus();">
                    Update Status
                </a>

            </div>
        </div>


        <script src="/js/status.js"></script>

        <script>
            $(document).ready(function() {
                ProfileStatus.init();
            });
        </script>