@if(app()->getLocale() == 'ar')
<!-- BEGIN CORE PLUGINS -->
<script src="{{aurl()}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{aurl()}}/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{aurl()}}/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

<script>

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	 config.language = 'ar';
	// config.uiColor = '#AADC6E';
};

</script>


@else



<!-- BEGIN CORE PLUGINS -->
<script src="{{aurl()}}/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->






<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{aurl()}}/global/scripts/app.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->





<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{aurl()}}/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{aurl()}}/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>

@endif

