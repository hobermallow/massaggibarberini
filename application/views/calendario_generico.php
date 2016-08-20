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
        <!-- BEGIN PAGE LEVEL STYLES -->
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME STYLES -->
        <link href="/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>


        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>
		<link rel="stylesheet" href="/assets/fullcalendar/fullcalendar.css">        
        <style>
            .badge.badge-success{
                display: none;
            }
        </style>
        
        <link href="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css" rel="stylesheet">
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

                    <!-- BEGIN PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-6">
                            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                            <h3 class="page-title">
                                Calendario 
                            </h3>

                            <!-- END PAGE TITLE & BREADCRUMB-->
                        </div>
                    </div>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT-->
                    <div class="row">

<div class="row">
<div class="col-md-12">
							<div id="calendar" ></div>
</div>
</div>
<div class="row">
<div class="col-md-12">
						   <form id="form_nuova_visita" action="#" method="post" >

            <div class="row" >

            <div class="col-lg-6">
            	<?php if( isset($nome_paziente) == false ): ?>
                <div class="input-icon margin-top-10">
                <label>Cliente <span style="font-size: 10px;" >(autocompletamento) (per nuovo cliente inserire in ordine nome e cognome)</span>:</label>
                    <i class="fa fa-user"></i>
                    <input id="paziente" type="text" class="form-control" name="paziente" placeholder="cerca tra i clienti...">
                </div>
                <?php endif; ?>

                <?php if( isset($nome_paziente) ==true ): ?>
                	<div class="input-icon margin-top-10">
                    <label>Cliente Selezionato: </label>
                    <i class="fa fa-user"></i>
                    <input id="paziente" type="text" class="form-control" name="paziente" value="<?php echo $nome_paziente; ?>" placeholder="cerca tra i clienti..." disabled>
                    </div>
                <?php endif; ?>

            </div>

            <div class="col-lg-3">

                <div class="input-icon margin-top-10">
                <label>Data appuntamento:</label>
                    <i class="fa fa-calendar"></i>
                    <input id="input_data_visita" class="form-control form-control-inline input-medium date-picker" name="data_visita" size="16" type="text" value=""/>
                </div>

            </div>


            <div class="col-lg-3">

                <div class="input-icon margin-top-10">
                <label>Orario appuntamento:</label>
                <i class="fa icon-clock"></i>
                    <input id="input_ora_visita" name="ora_visita" type="text" class="form-control timepicker timepicker-24">
                </div>
        	</div>

            </div>

            <br><br>

            <div class="row" >
            	<div class="col-lg-4">
                <label>Seleziona operatore al quale assegnare l'appuntamento</label>
                <select id="input_id_dottore" name="dottore" class="form-control">
                	<option value="0" >Nessuno</option>
                <?php foreach( $dottori->result() as $dottore ): ?>
                    <option value="<?php echo $dottore->id; ?>" ><?php echo $dottore->nome; ?></option>
                <?php endforeach; ?>
				</select>
                </div>

            	<div class="col-lg-8">
                <label>Descrizione visita:</label>
                	<textarea name="descrizione_visita" class="form-control" rows="4" placeholder="inserisci la descrizione dell'appuntamento..." ></textarea>
                </div>
            </div>
            <br><br>

						<div class="row" >
            	<div class="col-lg-4">
                <label>Seleziona il servizio: </label>
                <select name="prestazione" class="form-control">
                	<option value="0" >Seleziona Servizio</option>
                <?php foreach( $prestazioni->result() as $prestazione ): ?>
                    <option value="<?php echo $prestazione->id; ?>" ><?php echo $prestazione->descrizione; ?></option>
                <?php endforeach; ?>
				</select>
                </div>

                </div>
								

            <br><br>

			<div class="row" >
            <div class="col-lg-6">
            	<?php if( isset($id_paziente) ): ?>
            	<input type="hidden" name="id_paziente" value="<?php echo $id_paziente; ?>" />
                <?php endif; ?>
            	<button type="submit" class="btn green">Registra appuntamento</button>
                <br><br>
                <img id="loading_gif" style="display: none; width: 70px;" src="/assets/loading.gif" />
          	</div>
            </div>

            </form>         
                 </div>       
                    </div>



<!--                    HIC STABAT DIALOG -->
</div>



                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->


            <div id="dialog_visita_not_unique" style="display: none;" title="Registrazione Visita" >
                <div class="row" >

                    <div class="col-xs-12" >
                        <h4>Attenzione! Si sta tentando di registrare un'appuntamento nello stesso orario nel quale ne è presente un'altro.<br> Desidera continuare ugualmente?</h4>
                    </div>

                </div>
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
<!--         <script src="/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> -->
        <!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!--         <script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> -->
<!--         <script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> -->
<!--         <script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script> -->
<!--         <script src="/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script> -->
<!--         <script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> -->
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--         <script src="/assets/admin/pages/scripts/calendar.js"></script> -->
        <!--steph: carico gli eventi del calendario, non dallo script predefinito del template ma direttamente da questa view-->
        <!--fine inclusione del javascript per il calendario-->
        <script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
        <script src="/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
        <script src="/assets/admin/pages/scripts/components-pickers.js"></script>

	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.1/moment.min.js"></script>
    	<script src="/assets/fullcalendar/fullcalendar.js"></script>
      	<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

<script src="/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/components-pickers.js"></script>

<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
      	<script>


//visualizza box in jquery per l'aggiunta di una visita
function add_visita( id_dottore, giorno, mese, anno )
{
	var data_visita = ""+giorno+"/"+mese+"/"+anno;
	var dottore = id_dottore;
	
	$("#data_visita").val(data_visita);
	$("#dottore").val(dottore);



	$( "#dialog" ).dialog({
      resizable: false,
      height:480,
      modal: true,
      buttons: {
        /*"Registra Visita": function() {
          $( this ).dialog( "close" );
        },*/
        Annulla: function() {
          $( this ).dialog( "close" );
        }
      }
    });	
}

</script>
      	
<script>
jQuery(document).ready(function() {
var availableTags = [

<?php foreach( $pazienti->result() as $paziente ): ?>

  "<?php echo "<".$paziente->id.">"; echo " "; echo $paziente->nome; echo " "; echo $paziente->cognome; ?>",

<?php endforeach; ?>


];
jQuery( "#paziente" ).autocomplete({
  source: availableTags
});
});
</script>
<script type="text/javascript">
									$(function() {
										$("[name='dottore']").change(function(e) {
											//recupero l'id del dottore
											var id_dottore = $(this).find('option:selected').attr("value");
											$.post("<?php echo base_url(); ?>registravisita/getprestazionidottore/"+id_dottore, {}, function (data) {
												// alert(data);
												$("[name='prestazione']").html(data);
											});
										});
									});
								</script>


<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   
    </script>
<script>

$( "#form_nuova_visita" ).submit(function( event ) {

  	event.preventDefault();

	//attivo caricamento...
	$("#loading_gif").css("display", "inline");

	//controllo che non esiste gia una visita in quell'orario e per quel medico
	var data_visita = $("#input_data_visita").val();
	var ora_visita = $("#input_ora_visita").val();
	var id_dottore = $("#input_id_dottore").val();

	console.log(data_visita);
	console.log(ora_visita);
	console.log(id_dottore);


	$.post( "<?php echo base_url(); ?>registravisita/check_visita_unique", { data_visita: data_visita, ora_visita: ora_visita, id_dottore: id_dottore })
	.done(function( data ) {

		var result = String(data);

		if( result == "false" )
		{
			//per questi dati (dottore+data+ora) esiste già un'altra visita, visualizzo un alert...
			$( "#dialog_visita_not_unique" ).dialog({
			  resizable: false,
			  height:280,
			  modal: true,
			  buttons: {
				"Registra Visita": function() {

					//possiamo procedere a registrare la visita
				  	$( this ).dialog( "close" );

				  	$("#loading_gif").css("display", "none");

					//eseguo il submit
					$( "#form_nuova_visita" ).unbind('submit').submit();

				},
				Annulla: function() {

					//NON possiamo procedere a registrare la visita
				  	$( this ).dialog( "close" );

				 	$("#loading_gif").css("display", "none");
				}
			  }
			});

		}
		//se questa visita è univoca allora eseguo subito il submit
		else $( "#form_nuova_visita" ).unbind('submit').submit();

	});

});

</script>
<script src='/assets/fullcalendar/lang/it.js'></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
                            jQuery(document).ready(function() {

//                             	Metronic.init(); // init metronic core componets
//                             	   Layout.init(); // init layout
//                             	   QuickSidebar.init() // init quick sidebar
//                             	   Index.init();   
//                             	   Index.initDashboardDaterange();
//                             	   Index.initJQVMAP(); // init index page's custom scripts
//                             	   Index.initCalendar(); // init index page's custom scripts
//                             	   Index.initCharts(); // init index page's custom scripts
//                             	   Index.initChat();
//                             	   Index.initMiniCharts();
//                             	   Index.initIntro();
//                             	   Tasks.initDashboardWidget();
                            	   
//                             	   FormWizard.init();
                   
                            var date = new Date();
                            var d = date.getDate();
                            var m = date.getMonth();
                            var y = date.getFullYear();
                            var tooltip = $('<div/>').qtip({
                                id: 'calendar',
                                prerender: true,
                                content: {
                                    text: ' ',
                                    title: {
                                        button: true
                                    }
                                },
                                position: {
                                    my: 'bottom center',
                                    at: 'top center',
                                    target: 'mouse',
                                    viewport: $('#calendar'),
                                    adjust: {
                                        mouse: false,
                                        scroll: false
                                    }
                                },
                                show: false,
                                hide: false,
                                style: 'qtip-light'
                            }).qtip('api');

                            $('#calendar').fullCalendar({
                              header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,resourceDay'
                              },
                              defaultView: 'resourceDay',
                              editable: true,
                              droppable: true,
                              <?php $array = [];
                              	foreach ($operatori->result() as $operatore) {
                              		$array[] = ['id' => $operatore->id, 'name' => $operatore->nome ];
                              	} 
                              ?>
                              resources: <?php echo json_encode($array); ?>,
                              events: [
                                       <?php 
                                       ob_start();
                                       $i = 0;
                                       foreach ($visite->result() as $visita) {
                                       	echo "{";
                                       	echo "title: '".(isset($visita->descrizione) ? $visita->descrizione : $visita->nome_prestazione)."',";
                                       	$data = explode("-", $visita->data_visita);
                                       	$orario = explode(":", $visita->orario_visita);
                                       	echo "start: new Date($data[2], ".intval($data[1]-1).", $data[0], $orario[0], $orario[1]),";
                                       	echo "end: new Date($data[2], ".intval($data[1]-1).", $data[0], $orario[0], $orario[1]+$durate[$i]),";
                                       	echo "allDay: false,";
                                       	echo "resources: ['$visita->id_dottore']";
                                       	echo "},";
                                       	$i+=1;
                                       }
                                       $output = ob_get_clean();
                                       echo rtrim($output, ',');
                                       ?>
                               ],
                              // the 'ev' parameter is the mouse event rather than the resource 'event'
                              // the ev.data is the resource column clicked upon
                              lang: "it",
                              selectable: true,
                              selectHelper: true,
                              select: function(start, end, ev) {
                                console.log(start);
                                console.log(end);
                                console.log(ev.data); // resources
                              },
                              dayClick: function() { tooltip.hide() },
                              eventResizeStart: function() { tooltip.hide() },
                              eventDragStart: function() { tooltip.hide() },
                              viewDisplay: function() { tooltip.hide() },
                              eventClick : function(data, event, view) {
                                  var content = '<h3>'+data.title+'</h3>' + 
                                      '<p><b>Start:</b> '+data.start.toLocaleString()+'<br />' + 
                                      (data.end && '<p><b>End:</b> '+data.end.toLocaleString()+'</p>' || '');

                                  tooltip.set({
                                      'content.text': content
                                  })
                                  .reposition(event).show(event);
                              },
                              dayClick: function(event) {
                              },
                              eventDrop: function (event, delta, revertFunc) {
                                console.log(event);
                              }
                            });
                           });
        </script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
    <!-- END BODY -->
</html>
