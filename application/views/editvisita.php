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

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <script src="/assets/jquery-ui.css" type="text/css"></script>
        <script src="/assets/jquery-2.1.3.min.js" type="text/javascript"></script>

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

                   <!--  <div class="col-lg-3" style="float: right; text-align: right;" >
                        <button class="btn green" onClick="stampa_info()" >Stampa Info Appuntamento</button>
                    </div> -->
                    <!-- BEGIN PAGE HEADER-->
                    <h2 class="page-title" >Informazioni Appuntamento</h2>
                    <!--<h2 class="page-title" style="font-size: 16px; color: red;" >(nome, cognome e codice fiscale sono campi obbligatori)</h2>-->
                    <!-- END PAGE HEADER-->
                    <?php $paziente_corrente = $paziente->result(); ?>
                    <?php $visita_corrente = $visita->result(); ?>
                    <div class="row" >

                        <div class="col-lg-12">
                            <h2 style="color: #4B8DF8; font-weight: bold;" >Informazioni Appuntamento:</h2>
                        </div>

                        <!--questo blocco sarà visibile solo per la funzionalità di stampa-->
                        <div id="window_stampa_info" style="display: none;" class="col-lg-6" >

                            <div class="input-icon margin-top-10">
                                <h2 class="page-title" style="font-size: 18px;" >Informazioni sull'appuntamento:</h2>
                            </div>

                            <div class="input-icon margin-top-10">
                                <h2 class="page-title" style="font-size: 18px;" >Nome: <?php echo $paziente_corrente[0]->nome; ?></h2>
                            </div>

                            <div class="input-icon margin-top-10">
                                <h2 class="page-title" style="font-size: 18px;" >Cognome: <?php echo $paziente_corrente[0]->cognome; ?></h2>
                            </div>

                            <div class="input-icon margin-top-10">
                                <h2 class="page-title" style="font-size: 18px;" >Data di nascita: <?php echo date('d-m-Y', strtotime($paziente_corrente[0]->data_nascita)); ?></h2>
                            </div>

                            <div class="input-icon margin-top-10">
                                <h2 class="page-title" style="font-size: 18px;" >Data e ora visita: <?php echo date('d-m-Y', strtotime($visita_corrente[0]->data_visita)); ?> alle ore <?php echo $visita_corrente[0]->orario_visita; ?> </h2>
                            </div>

                            <div class="input-icon margin-top-10" style="width: 65%;" >
                                <h2 class="page-title" style="font-size: 18px;" >Descrizione Servizio:</h2>
                                <h4 style="border: 1px solid black; border-radius: 5px; padding: 10px;" ><?php echo nl2br($visita_corrente[0]->descrizione); ?></h4>
                            </div>

                            <div class="input-icon margin-top-10" style="width: 65%;" >
                                <h2 class="page-title" style="font-size: 18px;" >Dettaglio/Riepilogo Appuntamento:</h2>
                                <h4 style="border: 1px solid black; border-radius: 5px; padding: 10px;" ><?php echo nl2br($visita_corrente[0]->dettaglio); ?></h4>
                            </div>

                           <!--  <div class="input-icon margin-top-10" style="width: 65%;" > 
                                <h2 class="page-title" style="font-size: 18px;" >Prodotti:</h2>
                                <?php foreach ($prodotti as $prodotto): ?>
                                    <h4 style="border: 1px solid black; border-radius: 5px; padding: 10px;" ><?php echo nl2br($prodotto->nome); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantità: <?php echo $prodotto->quantita ?></h4>
                                <?php endforeach; ?>
                            </div> -->


                        </div>
                        <!--fine questo blocco sarà visibile solo per la funzionalità di stampa-->

                        <form action="<?php echo base_url(); ?>listapazienti/updatevisita" method="post" >
                            <!--colonna1-->

                            <div class="col-lg-12">
                                <label>Operatore:</label>
                                <select name="id_dottore" class="form-control">
                                    <option value="">Seleziona Operatore</option>
                                    <?php
                                    foreach ($dottori->result() as $dottore) {
                                        $selected = "";
                                        if ($visita_corrente[0]->id_dottore == $dottore->id) {
                                            $selected = "selected";
                                        }
                                        echo "<option value='" . $dottore->id . "' $selected>" . $dottore->nome . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label>Tipo Servizio:</label>
                                <select name="id_prestazione" class="form-control">
                                    <option value="">Selezione Servizio</option>
                                    <?php
                                    foreach ($prestazioni->result() as $prestazione) {
                                        $selected = "";
                                        if ($visita_corrente[0]->id_prestazione == $prestazione->id) {
                                            $selected = "selected";
                                        }
                                        echo "<option value='" . $prestazione->id . "' $selected>" . $prestazione->descrizione . "</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label>Descrizione appuntamento:</label>
                                <textarea name="descrizione_visita" class="form-control" rows="3" placeholder="inserisci la descrizione della visita..." ><?php echo $visita_corrente[0]->descrizione; ?></textarea>
                            </div>

                            <div class="col-lg-12">
                                <label>Dettaglio/Riepilogo appuntamento:</label>
                                <textarea name="dettaglio_visita" class="form-control" rows="3" placeholder="inserisci il dettaglio/riepilogo della visita..." ><?php echo $visita_corrente[0]->dettaglio; ?></textarea>
                            </div>
                            <!--riga2-->
                            <div class="col-lg-6">
                                <div class="input-icon margin-top-10">
                                    <label>Data appuntamento:</label>
                                    <br>
                                    <label>Attuale: <?php
                                        if ($visita_corrente[0]->data_visita) {
                                            echo date('d-m-Y', strtotime($visita_corrente[0]->data_visita));
                                        } else {
                                            echo "/";
                                        }
                                        ?></label>
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control form-control-inline input-medium date-picker" name="data_visita" size="16" type="text" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-icon margin-top-10">
                                    <label>Orario Appuntamento:</label>
                                    <br>
                                    <label>Attuale: <?php
                                        if ($visita_corrente[0]->orario_visita) {
                                            echo $visita_corrente[0]->orario_visita;
                                        } else {
                                            echo "/";
                                        }
                                        ?>
                                    </label>
                                    <i class="fa icon-clock"></i>
                                    <input name="ora_visita" type="text" class="form-control timepicker timepicker-24" value="" />
                                </div>
                            </div>

                    </div>

                    <br>

                    <div class="row" >
                        <div class="col-lg-10" >
                            <span style="color: red;" >(descrizione, data visita e orario appuntamento sono campi obbligatori)</span>
                        </div>
                    </div>

                    <br>

                    <input type="hidden" name="id" value="<?php echo $visita_corrente[0]->id; ?>" />
                    <button type="submit" name="submit" value="submit" class="btn green">Modifica</button>

                    </form>
                    <?php if (count($prodotti) > 0) { ?>
                        <div class="row" >
                            <div class="col-sm-12">
                                <h2 style="color: #4B8DF8; font-weight: bold;" >Informazioni Prodotti:</h2>
                            </div>
                            <?php foreach ($prodotti as $prodotto): ?>
                                <div class="col-sm-12 margin-top-10" style="border-bottom: 1px solid black;">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h2 class="page-title" style="font-size: 18px;" ><?php echo nl2br($prodotto->nome); ?></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <h2 class="page-title" style="font-size: 18px;" >Quantità: <?php echo $prodotto->quantita; ?></h2>
                                        </div>
                                        <div class="col-sm-4">
                                            <h2 class="page-title" style="font-size: 18px;" >Prezzo vendita: <?php echo $prodotto->prezzo_vendita; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php } ?>
                    <div class="row" >

                        <div class="col-lg-12">
                            <h2 style="color: #4B8DF8; font-weight: bold;" >Informazioni Cliente:</h2>
                        </div>

                        <?php if (isset($paziente_corrente[0])) { //il paziente è stato trovato nel database     ?>

                            <div class="col-lg-6">
                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Nome: <?php echo $paziente_corrente[0]->nome; ?></h2>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Cognome: <?php echo $paziente_corrente[0]->cognome; ?></h2>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Email: <?php echo $paziente_corrente[0]->email; ?></h2>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Telefono: <?php echo $paziente_corrente[0]->telefono; ?></h2>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Indirizzo: <?php echo $paziente_corrente[0]->indirizzo; ?></h2>
                                </div>


                            </div>

                            <div class="col-lg-6">

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >CAP: <?php echo $paziente_corrente[0]->cap; ?></h2>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Codice fiscale: <?php echo $paziente_corrente[0]->codice_fiscale; ?></h2>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 18px;" >Data di nascita: <?php echo $paziente_corrente[0]->data_nascita; ?></h2>
                                </div>



                            </div>
                        <?php } else { //significa che il paziente non è stato trovato nel database     ?>
                            <div class="col-lg-12">
                                <h2 style="color: red; font-weight: bold;">Il cliente richiesto non è stato trovato nel database.</h2>
                            </div>
                        <?php } ?>



                    </div>


                </div>
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->

            <script>
                function stampa_info()
                {
                    $("#window_stampa_info").css("display", "inline");

                    var divToPrint = document.getElementById("window_stampa_info");
                    newWin = window.open("");
                    newWin.document.write(divToPrint.outerHTML);
                    newWin.print();
                    newWin.close();

                    $("#window_stampa_info").css("display", "none");

                }
            </script>


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
        <script>
                //Steph: imposto il time dell'ora della visita a come stava impostata originariamente
                var current_orario = $(".timepicker-24").val();
                $(".timepicker-24").val("<?php echo $visita_corrente[0]->orario_visita; ?>");

        </script>
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
                jQuery(document).ready(function () {
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