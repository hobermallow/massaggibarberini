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
<html lang="en" >
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Medincloud - Syrus Industry</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
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
<!-- BEGIN THEME STYLES -->
<link href="/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>


<script src="/assets/charts.js/Chart.min.js" ></script>

<script src="/assets/jquery-2.1.3.min.js" ></script>


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
<body class="page-header-fixed page-quick-sidebar-over-content ">
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
			
			<!-- END BEGIN STYLE CUSTOMIZER -->
            
            
			<!-- BEGIN PAGE HEADER-->
			<h2 class="page-title" >Statistiche del sistema</h2>
            <!--<h2 class="page-title" style="font-size: 16px; color: red;" >(nome, cognome e codice fiscale sono campi obbligatori)</h2>-->
			<!-- END PAGE HEADER-->
            
            
<!-- CARICAMENTO STATISTICHE JAVASCRIPT -->


<script>

$( document ).ready(function() {




var data_patologie = {
    labels: [
	
		<?php foreach( $statistica_patologie as $stat_patologia ): ?>
			"<?php echo $stat_patologia["nome_patologia"]; ?>",
		<?php endforeach; ?>
		],
    datasets: [
        {
            label: "Patologie",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [
				
				<?php foreach( $statistica_patologie as $stat_patologia ): ?>
					<?php echo $stat_patologia["riscontri"]; ?>,
				<?php endforeach; ?>
				
			]
        },
    ]
};

var ctx_bar_chart_patologie = $("#bar_chart_patologie").get(0).getContext("2d");

var bar_chart_patologie = new Chart( ctx_bar_chart_patologie ).Bar(data_patologie, {
    barShowStroke: false
});



var data_farmaci = {
    labels: [
	
		<?php foreach( $statistica_farmaci as $stat_farmaco ): ?>
			"<?php echo $stat_farmaco["nome_farmaco"]; ?>",
		<?php endforeach; ?>
		],
    datasets: [
        {
            label: "Farmaci",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: [
				
				<?php foreach( $statistica_farmaci as $stat_farmaco ): ?>
					<?php echo $stat_farmaco["riscontri"]; ?>,
				<?php endforeach; ?>
				
			]
        },
    ]
};

var ctx_bar_chart_farmaci = $("#bar_chart_farmaci").get(0).getContext("2d");

var bar_chart_farmaci = new Chart( ctx_bar_chart_farmaci ).Bar(data_farmaci, {
    barShowStroke: false
});



var data_grafico_visite_mensili = {
    labels: [
	
		<?php foreach( $statistica_visite_mensili as $stat_visite_mese ): ?>
			"<?php echo $stat_visite_mese["mese"]." ".$stat_visite_mese["anno"]; ?>",
		<?php endforeach; ?>
	],
    datasets: [
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [
			
				<?php foreach( $statistica_visite_mensili as $stat_visite_mese ): ?>
					<?php echo $stat_visite_mese["riscontri"]; ?>,
				<?php endforeach; ?>
				
			]
        },
    ]
};

var ctx_grafico_visite_mensili = $("#grafico_visite_mensili").get(0).getContext("2d");

var grafico_visite_mensili = new Chart( ctx_grafico_visite_mensili ).Line(data_grafico_visite_mensili, {
	scaleShowGridLines : true,
});



});//document on ready


$( window ).resize(function() {
	
	var correct_width = $("#capture_width").width();
	
	//imposto le width corrette ai canvas...
	$("#grafico_visite_mensili").width(correct_width);
	$("#bar_chart_patologie").width(correct_width);
	$("#bar_chart_farmaci").width(correct_width);
	
});


</script>


<!-- FINE CARICAMENTO STATISTICHE JAVASCRIPT -->
            
            
            
			<!-- BEGIN CHART PORTLETS-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN BASIC CHART PORTLET-->
					
					<!-- END BASIC CHART PORTLET-->
					<!-- BEGIN TRACKING CURVES PORTLET-->
					
					<!-- END TRACKING CURVES PORTLET-->
					<!-- BEGIN DYNAMIC CHART PORTLET-->
					
					<!-- END DYNAMIC CHART PORTLET-->
					<!-- BEGIN STACK CHART CONTROLS PORTLET-->
					
					<!-- END STACK CHART CONTROLS PORTLET-->
					<!-- BEGIN INTERACTIVE CHART PORTLET-->
					<div id="capture_width" class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-briefcase"></i>Visite mensili
							</div>
						</div>
						<div class="portlet-body">
							<canvas id="grafico_visite_mensili" style="width: 100%; height: 200px;" ></canvas>
						</div>
					</div>
					<!-- END INTERACTIVE CHART PORTLET-->
					<!-- BEGIN BASIC CHART PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-heart"></i>Statistica Patologie Riscontrate
							</div>
						</div>
						<div class="portlet-body">
							<canvas id="bar_chart_patologie" style="width: 100%; height: 200px;" ></canvas>
						</div>
					</div>
					<!-- END BASIC CHART PORTLET-->
					<!-- BEGIN BASIC CHART PORTLET-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-chemistry"></i>Statistica Farmaci Prescritti
							</div>
						</div>
						<div class="portlet-body">
							<canvas id="bar_chart_farmaci" style="width: 100%; height: 200px;" ></canvas>
						</div>
					</div>
					<!-- END BASIC CHART PORTLET-->
				</div>
			</div>
			<!-- END CHART PORTLETS-->
			<!-- BEGIN PIE CHART PORTLET-->
			
			<!-- END PIE CHART PORTLET-->
			<!-- BEGIN PIE CHART PORTLET-->
			
			<!-- END PIE CHART PORTLET-->
			<!-- BEGIN PIE CHART PORTLET-->
			
			<!-- END PIE CHART PORTLET-->
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
	
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
<script src="/assets/global/plugins/flot/jquery.flot.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.pie.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.stack.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.crosshair.min.js"></script>
<script src="/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<!--<script src="/assets/admin/pages/scripts/charts.js"></script>-->




<!-- STEPH: CHARTS PERSONALIZZATE -->
<!--DISABLED: <script src="/assets/statistiche_charts.js"></script> -->


<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init() // init quick sidebar

});
</script>
<!-- END PAGE LEVEL SCRIPTS -->
</body>
<!-- END BODY -->
</html>