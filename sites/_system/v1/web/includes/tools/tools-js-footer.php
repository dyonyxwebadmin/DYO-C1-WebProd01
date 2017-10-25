
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg in" id="userPasswordReset" tabindex="-1" role="dialog" aria-labelledby="userPasswordReset">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="addUserLabel">Add User</h4>
          </div>
          <div class="modal-body">

                <form id="user-password-form" class="form-horizontal bordered-row">

                    <div class="form-group">
                        <label class="col-sm-3 control-abel text-right pad10T">Current Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="user-current-password" placeholder="Enter the temporary password given to you...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-abel text-right pad10T">New Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="user-new-password" placeholder="Enter your new password...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-abel text-right pad10T">Confirm Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="user-confirm-password" placeholder="Please confirm your new password...">
                        </div>
                    </div>

                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="user-password-reset">Update Password</button>
          </div>
        </div>
      </div>
    </div>




<!-- FRONTEND ELEMENTS -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Noty Notifications -->

<script type="text/javascript" src="/dashboard/js/widgets/noty-notifications/noty.js"></script>

<!-- Bootstrap Dropdown -->

<!-- <script type="text/javascript" src="/dashboard/js/widgets/dropdown/dropdown.js"></script> -->

<!-- Bootstrap Tooltip -->

<!-- <script type="text/javascript" src="/dashboard/js/widgets/tooltip/tooltip.js"></script> -->

<!-- Bootstrap Popover -->

<!-- <script type="text/javascript" src="/dashboard/js/widgets/popover/popover.js"></script> -->

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="/dashboard/js/widgets/progressbar/progressbar.js"></script>

<!-- Bootstrap Buttons -->

<!-- <script type="text/javascript" src="/dashboard/js/widgets/button/button.js"></script> -->

<!-- Bootstrap Collapse -->

<!-- <script type="text/javascript" src="/dashboard/js/widgets/collapse/collapse.js"></script> -->

<!-- Superclick -->

<script type="text/javascript" src="/dashboard/js/widgets/superclick/superclick.js"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="/dashboard/js/widgets/input-switch/inputswitch-alt.js"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="/dashboard/js/widgets/slimscroll/slimscroll.js"></script>

<!-- Slidebars -->

<script type="text/javascript" src="/dashboard/js/widgets/slidebars/slidebars.js"></script>
<script type="text/javascript" src="/dashboard/js/widgets/slidebars/slidebars-demo.js"></script>

<!-- PieGage -->

<script type="text/javascript" src="/dashboard/js/widgets/charts/piegage/piegage.js"></script>
<script type="text/javascript" src="/dashboard/js/widgets/charts/piegage/piegage-demo.js"></script>

<!-- Screenfull -->

<script type="text/javascript" src="/dashboard/js/widgets/screenfull/screenfull.js"></script>

<!-- jQueryUI Autocomplete -->

<script type="text/javascript" src="/dashboard/js/widgets/autocomplete/autocomplete.js"></script>
<script type="text/javascript" src="/dashboard/js/widgets/autocomplete/menu.js"></script>

<!-- Content box -->

<script type="text/javascript" src="/dashboard/js/widgets/content-box/contentbox.js"></script>

<!-- Overlay -->

<script type="text/javascript" src="/dashboard/js/widgets/overlay/overlay.js"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="/dashboard/js/js-init/widgets-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="/css/themes/admin/layout.js"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="/dashboard/js/widgets/theme-switcher/themeswitcher.js"></script>

<!-- Time Ago -->

<script type="text/javascript" src="/dashboard/js/widgets/timeago/jquery.timeago.js"></script>

<!-- Start of block2150 Zendesk Widget script -->
<script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("https://assets.zendesk.com/embeddable_framework/main.js","block2150.zendesk.com");
/*]]>*/</script>
<!-- End of block2150 Zendesk Widget script -->

<script src="/core/cms/js/cms.js"></script>
<script src="/dashboard/js/app.js"></script>