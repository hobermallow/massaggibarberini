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
<title>Metronic | Pages - Calendar</title>
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
<link href="/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet"/>
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
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					Calendario <small>studio medico</small>
					</h3>
					
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
            
            
            <div class="col-md-12">
            <?php $dottore_curr = $dottore_corrente->result(); ?>
            <h2 class="page-title" ><span style="font-weight: bold; color: #4B8DF8;" >Dottore:</span> <?php echo $dottore_curr[0]->nome; ?></h2>
            </div>
            
				<div class="col-md-12">
					<div class="portlet box green-meadow calendar">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-calendar"></i>Calendario
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								
								<div class="col-md-12 col-sm-12">
									<div id="calendar" class="has-toolbar">
									</div>
								</div>
							</div>
							<!-- END CALENDAR PORTLET-->
						</div>
					</div>
				</div>
			</div>
            
            
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script>
$(function() {
var availableTags = [

<?php foreach( $pazienti->result() as $paziente ): ?>

  "<?php echo "<".$paziente->id.">"; echo " "; echo $paziente->nome; echo " "; echo $paziente->cognome; ?>",
  
<?php endforeach; ?>
  
  
];
$( "#paziente" ).autocomplete({
  source: availableTags,
  appendTo: "#dialog"
});


});

</script>
            
            
            <link rel="stylesheet" href="/assets/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  			<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
            <div id="dialog" title="Registrazione Visita" >                                                                                                                                         
            <form id="form_nuova_visita" action="<?php echo base_url(); ?>registravisita/registravisitadirettamente" method="post"  >
            <div class="row" >
              
              	<div class="input-icon margin-top-10">
                <label>Paziente <span style="font-size: 10px;" >(autocompletamento)</span>:</label>
                    <i class="fa fa-user"></i>
                    <input id="paziente" type="text" class="form-control" name="paziente" placeholder="cerca tra i pazienti...">
                </div>
                
                <div class="input-icon margin-top-10">
                <label>Ora visita:</label>
                <i class="fa icon-clock"></i>
                    <input id="input_ora_visita" name="ora_visita" type="text" class="form-control timepicker timepicker-24">
                </div>
                
                <div class="col-lg-10">
                <label>Descrizione visita:</label>
                	<textarea name="descrizione_visita" class="form-control" rows="4" placeholder="inserisci la descrizione della visita..." ></textarea>
                </div>
                
                
              
           	</div>
            <input id="data_visita" type="hidden" name="data_visita" value="" />
            <input id="dottore" type="hidden" name="dottore" value="" />
            <br>
            <button type="submit" class="btn green">Registra visita</button>
            <br>
            <img id="loading_gif" style="display: none; width: 70px;" src="/assets/loading.gif" />
          	</form>
            </div>
            
            
            
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
    
    
<div id="dialog_visita_not_unique" style="display: none;" title="Registrazione Visita" >                                                                                                                                         
    <div class="row" >
    
    	<div class="col-xs-12" >
        	<h4>Attenzione! Si sta tentando di registrare una visita nello stesso orario nel quale ne è presente un'altra.<br> Desidera continuare ugualmente?</h4>
        </div>
        
    </div>
</div>



<script>

$( "#form_nuova_visita" ).submit(function( event ) {
	
  	event.preventDefault();
	
	//attivo caricamento...
	$("#loading_gif").css("display", "inline");
	
	//controllo che non esiste gia una visita in quell'orario e per quel medico
	var data_visita = $("#data_visita").val();
	var ora_visita = $("#input_ora_visita").val();
	var id_dottore = $("#dottore").val();
	
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
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->

<script>
//variabile per fullcalendar.min.js
var id_dottore = <?php echo $dottore_curr[0]->id; ?>;
var base_url = "<?php echo base_url(); ?>";
</script>

<script>

$("#dialog").hide();

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
<script src="/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<!--<script src="/assets/admin/pages/scripts/calendar.js"></script>-->
<!--steph: carico gli eventi del calendario, non dallo script predefinito del template ma direttamente da questa view-->
<h3 id="output" ></h3>
<script>

//calcola la differenza in mesi tra due date
function monthDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth() + 1;
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}


var Calendar = function () {


    return {
        //main function to initiate the module
        init: function () {
            Calendar.initCalendar();
        },

        initCalendar: function () {

            if (!jQuery().fullCalendar) {
                return;
            }
			
			
			
			var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var h = {};

            if (Metronic.isRTL()) {
                 if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        right: 'title, prev, next',
                        center: '',
                        right: 'agendaDay, agendaWeek, month, today'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        right: 'title',
                        center: '',
                        left: 'agendaDay, agendaWeek, month, today, prev,next'
                    };
                }                
            } else {
                 if ($('#calendar').parents(".portlet").width() <= 720) {
                    $('#calendar').addClass("mobile");
                    h = {
                        left: 'title, prev, next',
                        center: '',
                        right: 'today,month,agendaWeek,agendaDay'
                    };
                } else {
                    $('#calendar').removeClass("mobile");
                    h = {
                        left: 'title',
                        center: '',
                        right: 'prev,next,today,month,agendaWeek,agendaDay'
                    };
                }
            }
           

            var initDrag = function (el) {
                // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                // it doesn't need to have a start or end
                var eventObject = {
                    title: $.trim(el.text()) // use the element's text as the event title
                };
                // store the Event Object in the DOM element so we can get to it later
                el.data('eventObject', eventObject);
                // make the event draggable using jQuery UI
                el.draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });
            }

            var addEvent = function (title) {
                title = title.length == 0 ? "Untitled Event" : title;
                var html = $('<div class="external-event label label-default">' + title + '</div>');
                jQuery('#event_box').append(html);
                initDrag(html);
            }

            $('#external-events div.external-event').each(function () {
                initDrag($(this))
            });

            $('#event_add').unbind('click').click(function () {
                var title = $('#event_title').val();
                addEvent(title);
            });

            //predefined events
            $('#event_box').html("");
            addEvent("My Event 1");
            addEvent("My Event 2");
            addEvent("My Event 3");
            addEvent("My Event 4");
            addEvent("My Event 5");
            addEvent("My Event 6");

            $('#calendar').fullCalendar('destroy'); // destroy the calendar
            $('#calendar').fullCalendar({ //re-initialize the calendar
                header: h,
                defaultView: 'month', // change default view with available options from http://arshaw.com/fullcalendar/docs/views/Available_Views/ 
                slotMinutes: 15,
                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
                drop: function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject');
                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject);

                    // assign it the date that was reported
                    copiedEventObject.start = date;
                    copiedEventObject.allDay = allDay;
                    copiedEventObject.className = $(this).attr("data-class");

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
				
				<?php $bad_characters = array( PHP_EOL, "'", "\n" ); ?>
				
				<?php
				//anche per gli script successivi
				$visita_focussed = $visita_focus->result();
				
				//ottengo il nome del paziente per far lampeggiare poi la visita
				$nome_paziente_focussed = $visita_focussed[0]->nome_paziente;
				
				
					//caricamento degli eventi
					foreach( $visite->result() as $visita ):
					$anno = (int)substr($visita->data_visita, 0, 4);
					$mese = ( (int)substr($visita->data_visita, 5, 2) ) -1; //perchè i mesi del javascript partono da 0
					$giorno = (int)substr($visita->data_visita, 8, 2);
					
					$ora = (int)substr($visita->orario_visita, 0, 2);
					$minuti = (int)substr($visita->orario_visita, 3, 2);
				?>
				
				{
					title: '<?php echo str_replace($bad_characters, ' ', $visita->nome_paziente); ?> \n <?php $bad_characters = array( PHP_EOL, "'" ); echo str_replace($bad_characters, ' ', $visita->descrizione); ?>',
					start: new Date(<?php echo $anno; ?>, <?php echo $mese; ?>, <?php echo $giorno; ?>, <?php echo $ora; ?>, <?php echo $minuti; ?>),
					allDay: false,
					//url: "/calendario/view/"+"<?php //echo $visita->id; ?>",
					url: "<?php echo base_url(); ?>listapazienti/editvisita/"+"<?php echo $visita->id; ?>",
					<?php if( $visita->nome_paziente == $nome_paziente_focussed ) echo "backgroundColor: Metronic.getBrandColor('red')"; ?>
              	},

					
					<?php endforeach; ?>
                ]
            });

        }

    };

}();
</script>
<!--fine inclusione del javascript per il calendario-->
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
<?php
//ottengo anno, mese e giorno della visita sulla quale fare il focus...
$anno = (int)substr($visita_focussed[0]->data_visita, 0, 4);
$mese = ( (int)substr($visita_focussed[0]->data_visita, 5, 2) ) -1; //perchè i mesi del javascript partono da 0
$giorno = (int)substr($visita_focussed[0]->data_visita, 8, 2);

?>
<script>


function eseguispostamentocalendario( mesi )
{
	var date = new Date();
	var m = date.getMonth();
	var y = date.getFullYear();
	var mese_visita = <?php echo $mese; ?>;
	var anno_visita = <?php echo $anno ?>;
	//alert("mese attuale: "+m);
	//alert("mese visita: "+mese_visita);
	
	//gestione dell'eccezione nel caso in cui il mese sia quello successivo
	if( mesi == 0 && mese_visita != m )
	{
		setTimeout(function(){ $(".fc-button-next").click(); }, 10);
	}
	else
	{
		if( mese_visita != m || anno_visita != y )
		{
			while( mesi >= 0 )
			{
				setTimeout(function(){ $(".fc-button-next").click(); }, 10);
				
				mesi--;
			}
		}
	
	}
	
	

}

var date = new Date( <?php echo $anno; ?>, <?php echo $mese; ?>, <?php echo $giorno; ?> );
var difference = monthDiff( new Date() , date);
//alla fine del documento c'è la funzione che permette al calendario di spostarsi in avanti fino ad arrivare alla visita appena aggiunta

setTimeout(eseguispostamentocalendario( difference ), 2000);

</script>

<script>
jQuery(document).ready(function() {       

   Calendar.init();
});
</script>


<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   
    </script>

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
   
   FormWizard.init();
   
   
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->

</body>
<!-- END BODY -->
</html>






































