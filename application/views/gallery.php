<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 3.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Medincloud - Syrus Industry</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="/assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<style type="text/css">
	#gallery, #upload {
		border: 1px solid #ccc; margin: 10px auto; width: 570px; padding: 10px;
	}
	
	#blank_gallery {
		font-family: Arial; font-size: 18px; font-weight: bold;
		text-align: center;
	}
	.thumb {
		float: left; width: 125px; height: 85px; padding: 10px; margin: 10px; background-color: #ddd;
	}
	.thumb:HOVER {
		outline: 1px solid #999;
	}
	img {
		border: 0;
	}
	
	.sk-circle {
  margin: 100px auto;
  width: 100px;
  height: 100px;
  position: relative;
}
.sk-circle .sk-child {
  width: 100%;
  height: 100%;
  position: absolute;
  left: 0;
  top: 0;
}
.sk-circle .sk-child:before {
  content: '';
  display: block;
  margin: 0 auto;
  width: 15%;
  height: 15%;
  background-color: #333;
  border-radius: 100%;
  -webkit-animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
          animation: sk-circleBounceDelay 1.2s infinite ease-in-out both;
}
.sk-circle .sk-circle2 {
  -webkit-transform: rotate(30deg);
      -ms-transform: rotate(30deg);
          transform: rotate(30deg); }
.sk-circle .sk-circle3 {
  -webkit-transform: rotate(60deg);
      -ms-transform: rotate(60deg);
          transform: rotate(60deg); }
.sk-circle .sk-circle4 {
  -webkit-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
          transform: rotate(90deg); }
.sk-circle .sk-circle5 {
  -webkit-transform: rotate(120deg);
      -ms-transform: rotate(120deg);
          transform: rotate(120deg); }
.sk-circle .sk-circle6 {
  -webkit-transform: rotate(150deg);
      -ms-transform: rotate(150deg);
          transform: rotate(150deg); }
.sk-circle .sk-circle7 {
  -webkit-transform: rotate(180deg);
      -ms-transform: rotate(180deg);
          transform: rotate(180deg); }
.sk-circle .sk-circle8 {
  -webkit-transform: rotate(210deg);
      -ms-transform: rotate(210deg);
          transform: rotate(210deg); }
.sk-circle .sk-circle9 {
  -webkit-transform: rotate(240deg);
      -ms-transform: rotate(240deg);
          transform: rotate(240deg); }
.sk-circle .sk-circle10 {
  -webkit-transform: rotate(270deg);
      -ms-transform: rotate(270deg);
          transform: rotate(270deg); }
.sk-circle .sk-circle11 {
  -webkit-transform: rotate(300deg);
      -ms-transform: rotate(300deg);
          transform: rotate(300deg); }
.sk-circle .sk-circle12 {
  -webkit-transform: rotate(330deg);
      -ms-transform: rotate(330deg);
          transform: rotate(330deg); }
.sk-circle .sk-circle2:before {
  -webkit-animation-delay: -1.1s;
          animation-delay: -1.1s; }
.sk-circle .sk-circle3:before {
  -webkit-animation-delay: -1s;
          animation-delay: -1s; }
.sk-circle .sk-circle4:before {
  -webkit-animation-delay: -0.9s;
          animation-delay: -0.9s; }
.sk-circle .sk-circle5:before {
  -webkit-animation-delay: -0.8s;
          animation-delay: -0.8s; }
.sk-circle .sk-circle6:before {
  -webkit-animation-delay: -0.7s;
          animation-delay: -0.7s; }
.sk-circle .sk-circle7:before {
  -webkit-animation-delay: -0.6s;
          animation-delay: -0.6s; }
.sk-circle .sk-circle8:before {
  -webkit-animation-delay: -0.5s;
          animation-delay: -0.5s; }
.sk-circle .sk-circle9:before {
  -webkit-animation-delay: -0.4s;
          animation-delay: -0.4s; }
.sk-circle .sk-circle10:before {
  -webkit-animation-delay: -0.3s;
          animation-delay: -0.3s; }
.sk-circle .sk-circle11:before {
  -webkit-animation-delay: -0.2s;
          animation-delay: -0.2s; }
.sk-circle .sk-circle12:before {
  -webkit-animation-delay: -0.1s;
          animation-delay: -0.1s; }

@-webkit-keyframes sk-circleBounceDelay {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  } 40% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes sk-circleBounceDelay {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
            transform: scale(0);
  } 40% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
#progress {
	margin: auto;
	position: relative;
	width: 240px;
}

#progress p
{
	display: block;
	width: 240px;
	padding: 2px 5px;
	margin: 2px 0;
	
	border: 1px inset #446;
	border-radius: 5px;
	background-image: url("/progress.png");
}

#progress p.success
{
	background: #0c0 none 0 0 no-repeat;
}

#progress p.failed
{
	background: #c00 none 0 0 no-repeat;
}
</style>
<!-- custom css for thumbail -->
 <link href="/assets/global/css/thumbnail-gallery.css" rel="stylesheet">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="<?php echo base_url(); ?>dashboard">
			<img src="/assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

				<!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<!--<img alt="" class="img-circle" src="/assets/admin/layout/img/avatar3_small.jpg"/>-->
					<span class="username">
					<?php echo $username; ?> </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">

						<li>
							<a href="<?php echo base_url(); ?>logout">
							<i class="icon-key"></i> Log Out </a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->

			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<?php $this->load->view("left_menu"); ?>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->

			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			 <div class="container">
			
			<div class="row">
			
            <div class="col-lg-12">
                <h1 class="page-header">Gallery</h1>
            </div>

			
			<div >
			<?php if(isset($immagini) && count($immagini)) :?>
			<?php foreach ($immagini as $image):?>
			<div class="thumb col-lg-3 col-md-4 col-xs-6">
				<a href="<?php echo $image["image_url"]?>" class="thumbnail">
				<img class="img-responsive"  src="<?php echo $image["image_thumb"]?>">
				</a>
				<input form="upload" type="checkbox" name="images[]" value="<?php echo $image['image_name']?>">
			</div>
			<?php endforeach;?>
			<?php else:?>
			<div id="blank_gallery">Carica un immagine</div>
			<?php endif;?>
			</div>
			</div>
			<div class="row">
			<?php
				echo form_open_multipart('gallery', ['class' => 'form', 'id' => 'upload']);
				echo '<fieldset class="form-group" >';
				echo form_upload(['name' => 'userfile', 'id' => 'file']);
				echo form_submit(['name' => 'upload'], "Upload");
				echo form_submit(['name' => 'delete'], "Cancella");
				echo '</fieldset>';
				echo form_close();
			?>
			</div>
			<div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="sk-circle" style="visibility: hidden;" id="loading">
  <div class="sk-circle1 sk-child"></div>
  <div class="sk-circle2 sk-child"></div>
  <div class="sk-circle3 sk-child"></div>
  <div class="sk-circle4 sk-child"></div>
  <div class="sk-circle5 sk-child"></div>
  <div class="sk-circle6 sk-child"></div>
  <div class="sk-circle7 sk-child"></div>
  <div class="sk-circle8 sk-child"></div>
  <div class="sk-circle9 sk-child"></div>
  <div class="sk-circle10 sk-child"></div>
  <div class="sk-circle11 sk-child"></div>
  <div class="sk-circle12 sk-child"></div>
			</div>
			</div>
			</div>
			</div>
			<div class="container">
			<div class="row">
			<div class="col-md-12">
			<div id="progress">
			</div>
			</div>
			</div>
			</div>
			<script>
			//utility functions to hide/show loading gif
			
			</script>
<!-- 			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
			<script type="text/javascript">
			
			
			</script>

			<!-- END PAGE HEADER-->
		 	<!-- END ACCORDION PORTLET-->



		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->

<!-- END QUICK SIDEBAR -->
</div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; Medincloud - <a target="_blank" href="http://www.syrusindustry.com/" >www.syrusindustry.com</a>
	</div>
	<div class="page-footer-tools">
		<span class="go-top">
		<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/assets/global/plugins/respond.min.js"></script>
<script src="/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!--<script src="/assets/global/plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init() // init quick sidebar
   Index.init();
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Index.initIntro();
   Tasks.initDashboardWidget();

   function showLoading() {
	   var loading = document.getElementById ( "loading" ) ;
	   loading.style.visibility = "visible";
	}

	function hideLoading() {
		var loading = document.getElementById ( "loading" ) ;
		   loading.style.visibility = "hidden";
	}

 //create progress bar
	var o = document.getElementById("progress");
	var bar = o.appendChild(document.createElement("p"));
	bar.appendChild(document.createTextNode("upload "));
	$("input[type=submit]").click(function (e) {
		e.stopPropagation();
		e.preventDefault();
		showLoading();
		//creo la barra di progresso
		//get the file 
		var file = $("#file").prop('files')[0];
		var form = $("#upload");
		var data = new FormData();
		//append the file to FormData
		data.append($(this).attr('name'), $(this).val());
		var checkedImages = $('input[name="images[]"]:checked').map(function() {
			data.append('images[]', this.value);
		}).get();
		
		data.append('userfile', file);
		$.ajax({
	        
	        type: 'POST',
	        url: "<?php echo base_url(); ?>gallery/upload",
	        data: data,
	        cache: false,
	        dataType: 'text',
	        processData: false, // Don't process the files
	        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	        success: function(data, textStatus, jqXHR)
	        {
		        alert(data);
	            location.reload(true);
	           document.getElementById('progress').getElementsByTagName('p')[0].classname = "success";
	           hideLoading()
	        },
	        xhr: function(){
	            // get the native XmlHttpRequest object
	            var xhr = $.ajaxSettings.xhr() ;
	            // set the onprogress event handler
	            xhr.upload.onprogress = function (progress) {
			            // calculate upload progress
			            var pc = parseInt(100 -((progress.loaded / progress.total) * 100));
			            // log upload progress to console
			           document.getElementById('progress').getElementsByTagName('p')[0].style.backgroundPosition = pc + "% 0px";
			          } ;
	            // set the onload event handler
	            xhr.upload.onload = function(){ console.log('DONE!') } ;
	            // return the customized object
	            return xhr ;
	        },
	        error: function(jqXHR, textStatus, errorThrown)
	        {
	            // Handle errors here
	            alert(data);
	            console.log('ERRORS: ' + textStatus);
	           document.getElementById('progress').getElementsByTagName('p')[0].classname = "failed";
	            // STOP LOADING SPINNER
	            hideLoading();
	        }
	    });

		
	});     

});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
