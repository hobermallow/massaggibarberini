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

<link rel="stylesheet" type="text/css" href="/assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script src="/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
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
			
			<!-- BEGIN PAGE HEADER-->
			<h2 class="page-title" >Creazione nuova ricetta</h2>
            <!--<h2 class="page-title" style="font-size: 16px; color: red;" >(nome, cognome e codice fiscale sono campi obbligatori)</h2>-->
			<!-- END PAGE HEADER-->
			
			<div class="clearfix">
			</div>
            

            
            <?php $paziente_corrente = $paziente->result(); ?>

            <div class="row" >
            
            <div class="col-lg-12">
            	<h2 style="color: #4B8DF8; font-weight: bold;" >Informazioni Paziente:</h2>
            </div>
            
            <div class="col-lg-6">
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >Nome: <?php echo $paziente_corrente[0]->nome; ?></h2>
                </div>
                
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >Cognome: <?php echo $paziente_corrente[0]->cognome; ?></h2>
                </div>
                
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >Email: <?php echo $paziente_corrente[0]->email; ?></h2>
                </div>
                
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >Telefono: <?php echo $paziente_corrente[0]->telefono; ?></h2>
                </div>
                
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >Indirizzo: <?php echo $paziente_corrente[0]->indirizzo; ?></h2>
                </div>
                
                
            </div>
            
            <div class="col-lg-6">
            
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >CAP: <?php echo $paziente_corrente[0]->cap; ?></h2>
                </div>
                
                <div class="input-icon margin-top-10">
                    <h2 class="page-title" style="font-size: 24px;" >Codice fiscale: <?php echo $paziente_corrente[0]->codice_fiscale; ?></h2>
                </div>
                
                <div class="input-icon margin-top-10">
	                <h2 class="page-title" style="font-size: 24px;" >Data di nascita: <?php echo $paziente_corrente[0]->data_nascita; ?></h2>
                </div>
               
                    
                    
         	</div>
                
  
            
            </div>

     
			<div class="clearfix">
			</div>
            
            <div class="row" style="text-align: center;" >
				<div class="form-group">
                    <h2 style="color: #4B8DF8; font-weight: bold;" >Seleziona tipo ricetta:</h2>
                    <div class="radio-list" >
                    	<!--<label class="radio-inline">
                        <div class="radio" id="uniform-optionsRadios4"><input id="radio_preset" type="radio" name="optionsRadios" id="optionsRadios5" value="option0" onClick="selezionaRicettaPreset()" ></div> <span style="position: relative; font-size: 18px; top: 3px;" >Presets Ricette</span> </label>-->
                        <label class="radio-inline">
                        <div class="radio" id="uniform-optionsRadios4"><input id="radio_specialistiche" type="radio" name="optionsRadios" id="optionsRadios4" value="option1" onClick="selezionaRicettaPrestazioniSpecialistiche()" checked ></div> <span style="position: relative; font-size: 18px; top: 3px;" >Ricetta per prestazioni specialistiche</span> </label>
                        <label class="radio-inline">
                        <div class="radio" id="uniform-optionsRadios5"><input id="radio_standard" type="radio" name="optionsRadios" id="optionsRadios5" value="option2" onClick="selezionaRicettaSpecifica()" ></div> <span style="position: relative; font-size: 18px; top: 3px;" >Ricetta specifica</span> </label>
                    </div>
                </div>
            </div>
            
            
            <br><br>
            
            
            <form action="<?php echo base_url(); ?>stamparicetta" target="_blank" method="post" >
            
            <input type="hidden" name="ricetta_campo_nome" value="<?php echo $paziente_corrente[0]->nome; ?>" />
            <input type="hidden" name="ricetta_campo_cognome" value="<?php echo $paziente_corrente[0]->cognome; ?>" />
            <input type="hidden" name="ricetta_campo_indirizzo" value="<?php echo $paziente_corrente[0]->indirizzo; ?>" />
            <input type="hidden" name="ricetta_campo_codice_fiscale" value="<?php echo $paziente_corrente[0]->codice_fiscale; ?>" />
            
            
            <div id="container_form" class="row" >
            
            	<div id="print" class="col-lg-12">
            		<h2 style="color: #4B8DF8; font-weight: bold;" >Ricetta:</h2>
            	</div>
                
                <!--elenco elementi della ricetta-->
                <div class="col-lg-6" >
                	<div id="output_ricetta" class="list-group">
                     	<!--QUI DENTRO IL JAVASCRIPT SCRIVE LE VOCI DELLA RICETTA-->
                    </div>
                </div>
                
                <div class="col-lg-6" >
                
                	<div id="box_presets" >
                    
                    	<label>Preset:</label>
                        <div class="form-group">
                            
                            <select id="preset_ricetta" onChange="set_preset_ricetta()" style="width: 88%;" name="preset_ricetta" class="form-control">
                            	<option value="non_usare" selected >Non voglio usare un preset</option>
                                <option value="mappa_cromosomica" >Mappa cromosomica</option>
                                <option value="fibrosi_cistica" >Fibrosi Cistica</option>
                                <option value="test_infettivologici" >Test Infettivologici</option>
                                <option value="elettrocardiogramma" >Elettrocardiogramma</option>
                                <option value="esami_preanestesiologici" >Esami preanestesiologici</option>
                                <option value="gruppo_fattore_rh" >Gruppo e fattore Rh</option>
                                
                            </select>
                            
                        </div>
                    
                    </div>
                
                
                
 					<div id="box_specialistiche" > 
                    
                      	<div id="specialistiche_1" >
                       	<label>Prestazioni Specialistiche:</label>
                        <div class="form-group">
                            
                            <button id="add_prestazione_specialistica" style="float: right;" type="button" class="btn green" onClick="clickonAddPrestazioneSpecialistica(1)" >+</button>
                            <select id="select_prestazioni_specialistiche_1" style="width: 88%;" name="prestazioni_specialistiche" class="form-control">
                                
                                <?php foreach( $prestazioni_specialistiche->result() as $prestazione ): ?>
                                
                                <option value="<?php echo $prestazione->nome_prestazione; ?>" ><?php echo $prestazione->nome_prestazione; ?></option>
                                
                                <?php endforeach; ?>
                                
                            </select>
                            
                        </div>
                        </div>
                        
                    </div>
                    
                    
                    <div id="box_standard" >
                        <label>Campo personalizzato:</label>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-pencil"></i>
                            <button id="add_ricetta_testo" style="float: right;" type="button" class="btn green" onCLick="clickonAddCampoPersonalizzato()" >+</button>
                            <input id="testo_ricetta_personalizzata" style="width: 88%;" class="form-control" name="testo_ricetta" placeholder="Ricetta personalizzata" type="text" />
                        </div>
                    </div>
                                        
                
                </div>
            
            </div>
            
            <br><br>
            
            <div class="row" style="text-align: center;" >
            	<button id="stampa_ricetta" type="submit" class="btn green" onCLick="stampaRicetta()" >Vai alla stampa della ricetta</button>
            </div>
            
            </form>
            
            <br>

            
            
            
<script src="/assets/javascript_library/jquery.printElement.js" type="text/javascript"></script>
          
<script type="text/javascript" >

var voce_ricetta = 0; //contatore per le voci ricetta

$("#radio_preset").prop('checked', false);
$("#radio_specialistiche").prop('checked', false);
$("#radio_standard").prop('checked', false);

$("#container_form").hide();

//nascondo i box delle ricette specialistiche
//$("#specialistiche_1").hide();
$("#specialistiche_2").hide();
$("#specialistiche_3").hide();
$("#specialistiche_4").hide();
$("#specialistiche_5").hide();
$("#specialistiche_6").hide();
$("#specialistiche_7").hide();
$("#specialistiche_8").hide();
$("#specialistiche_9").hide();

$("#stampa_ricetta").hide();

$( "#testo_ricetta_personalizzata" ).keypress(function( event )
{
	if( event.keyCode == 13 )
	{
		clickonAddCampoPersonalizzato();
	}
});



function selezionaRicettaPreset()
{
	//imposto la ricetta per prestazioni specialistiche
	$("#output_ricetta").empty();
	$("#box_specialistiche").hide();
	$("#box_standard").hide(); //visualizzo anche il box per aggiungere campi personalizzati
	$("#box_presets").show();
	
	$("#container_form").show();
	
	//imposto il valore nullo nel menu a tendina
	$("#preset_ricetta").prop('selectedIndex',0);
	
	
	checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
}


function selezionaRicettaPrestazioniSpecialistiche()
{
	//imposto la ricetta per prestazioni specialistiche
	$("#output_ricetta").empty();
	$("#box_specialistiche").show();
	$("#box_standard").show(); //visualizzo anche il box per aggiungere campi personalizzati
	$("#box_presets").hide();
	
	$("#container_form").show();
	
	checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
}

function selezionaRicettaSpecifica()
{
	//imposto la ricetta per farla personalizzata manualmente
	$("#output_ricetta").empty();
	$("#box_specialistiche").hide();
	$("#box_standard").show();
	$("#box_presets").hide();
	
	$("#container_form").show();
	
	checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
}

function set_preset_ricetta()
{
	//ottengo la selezione del preset
	var preset = $("#preset_ricetta").val();
	
	if( preset == "non_usare" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Mappa Cromosomica"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"Mappa Cromosomica"+"\" /></a>");
		
		$("#output_ricetta").empty();
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
	
	if( preset == "mappa_cromosomica" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Mappa Cromosomica"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"Mappa Cromosomica"+"\" /></a>");
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
	
	if( preset == "fibrosi_cistica" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Fibrosi Cistica"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"Fibrosi Cistica"+"\" /></a>");
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
	
	if( preset == "test_infettivologici" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"HBsAg"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"HBsAg"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+1+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+1+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"HBsAb"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+1+"\" value=\""+"HBsAb"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+2+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+2+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"HCV"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+2+"\" value=\""+"HCV"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+3+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+3+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"HIV"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+3+"\" value=\""+"HIV"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+4+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+4+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"TPHA"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+4+"\" value=\""+"TPHA"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+5+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+5+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"VDRL"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+5+"\" value=\""+"VDRL"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+6+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+6+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"AntiHBc"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+6+"\" value=\""+"AntiHBc"+"\" /></a>");
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
	
	if( preset == "esami_preanestesiologici" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Azotemia"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"Azotemia"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+1+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+1+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Glicemia"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+1+"\" value=\""+"Glicemia"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+2+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+2+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Colinesterasi"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+2+"\" value=\""+"Colinesterasi"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+3+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+3+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Transaminasi"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+3+"\" value=\""+"Transaminasi"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+4+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+4+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"PT"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+4+"\" value=\""+"PT"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+5+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+5+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"PTT"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+5+"\" value=\""+"PTT"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+6+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+6+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Emocromo"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+6+"\" value=\""+"Emocromo"+"\" /></a>");
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+7+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+7+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Esame urine"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+7+"\" value=\""+"Esame urine"+"\" /></a>");
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
	
	if( preset == "elettrocardiogramma" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Elettrocardiogramma"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"Elettrocardiogramma"+"\" /></a>");
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
	
	if( preset == "gruppo_fattore_rh" )
	{
		$("#output_ricetta").empty();
		
		$("#output_ricetta").append("<a id=\"voce_ricetta_"+0+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+0+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+"Gruppo e fattore Rh"+"</p><input type=\"hidden\" name=\"ricetta_campo_"+0+"\" value=\""+"Gruppo e fattore Rh"+"\" /></a>");
		
		checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
	}
}


function clickonAddPrestazioneSpecialistica( n_box )
{
	if( countCampiRicetta() >= 8 ) return;
	
	var selected = $("#select_prestazioni_specialistiche_"+n_box).val();
	//alert( selected );
	
	$("#output_ricetta").append("<a id=\"voce_ricetta_"+voce_ricetta+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+voce_ricetta+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+selected+"</p><input type=\"hidden\" name=\"ricetta_campo_"+voce_ricetta+"\" value=\""+selected+"\" /></a>");
	
	voce_ricetta++;
	
	checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
}

function clickonAddCampoPersonalizzato()
{
	if( countCampiRicetta() >= 8 ) return;
	
	var selected = $("#testo_ricetta_personalizzata").val();
	
	if( selected == "" ) return -1;
	
	$("#output_ricetta").append("<a id=\"voce_ricetta_"+voce_ricetta+"\" class=\"list-group-item\"><span onClick=\"elimina_voce_ricetta("+voce_ricetta+")\" style=\"float: right; cursor: pointer;\" class=\"glyphicon glyphicon-remove-circle\"></span><p id=\"boxricetta3\" class=\"list-group-item-text\" style=\"font-size: 16px;\" >"+selected+"</p><input type=\"hidden\" name=\"ricetta_campo_"+voce_ricetta+"\" value=\""+selected+"\" /></a>");
	
	voce_ricetta++;
	
	$("#testo_ricetta_personalizzata").val("");
	
	checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
}

function elimina_voce_ricetta( id_voce_ricetta )
{
	//elimino la voce della ricetta con id passato come argomento
	$( ("#voce_ricetta_"+id_voce_ricetta) ).remove();
	
	checkEnablePrint(); //imposta il pulsante di stampa della ricetta nel caso in cui ci fossero voci nella ricetta
}

function countCampiRicetta()
{
	return $("#output_ricetta a").length;
}

function checkEnablePrint()
{
	var element_count = $("#output_ricetta a").length;
	
	if( element_count == 0 ) $("#stampa_ricetta").hide();
	else $("#stampa_ricetta").show();
}

function changeSettimanaPrestazioniSpecialistiche()
{
	var settimana_selezionata = $("#select_prestazioni_specialistiche").val();
	
	//valore 1
	if( settimana_selezionata == 1 )
	{
		$("#specialistiche_1").show();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 2
	if( settimana_selezionata == 2 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").show();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 3
	if( settimana_selezionata == 3 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").show();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 4
	if( settimana_selezionata == 4 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").show();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 5
	if( settimana_selezionata == 5 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").show();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 6
	if( settimana_selezionata == 6 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").show();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 7
	if( settimana_selezionata == 7 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").show();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").hide();
	}
	
	//valore 8
	if( settimana_selezionata == 8 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").show();
		$("#specialistiche_9").hide();
	}
	
	//valore 9
	if( settimana_selezionata == 9 )
	{
		$("#specialistiche_1").hide();
		$("#specialistiche_2").hide();
		$("#specialistiche_3").hide();
		$("#specialistiche_4").hide();
		$("#specialistiche_5").hide();
		$("#specialistiche_6").hide();
		$("#specialistiche_7").hide();
		$("#specialistiche_8").hide();
		$("#specialistiche_9").show();
	}
}

</script>

<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
			
            
            
			
			<div class="clearfix">
			</div>
            <!--steph: qui va eliminato -->
			<div class="clearfix">
			</div>
			
			<div class="clearfix">
			</div>

			
		</div>
	</div>
	<!-- END CONTENT -->
	<!-- BEGIN QUICK SIDEBAR -->

    
<!-- END QUICK SIDEBAR -->
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

<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/form-wizard.js"></script>

<script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="/assets/admin/pages/scripts/components-pickers.js"></script>

<script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->

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
   
   ComponentsPickers.init();
   
   FormWizard.init();
   
   
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>