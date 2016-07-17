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

                    <div class="modal fade" id="pagamento" tabindex="-1" role="dialog" aria-labelledby="pagamento" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title">Pagamento</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            Totale: <span id="totale"></span>
                                        </div>
                                        <div class="col-xs-6">
                                            Totale già pagato: <span id="totalePagato"></span>
                                        </div>
                                    </div>
                                    <form class="row" action="<?php echo base_url(); ?><?php echo "preventivi/pagamentoParziale"?>" method="POST">
                                        <input type="hidden" id="idPreventivo" name="idPreventivo" value=""/>
                                        <input type="hidden" id="totalePreventivo" name="totalePreventivo" value=""/>
                                        <input type="hidden" id="giaPagato" name="giaPagato" value=""/>
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label for="daPagare">Importo pagato</label>
                                                <input class="form-control" type="number" id="daPagare" name="daPagare"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-2">
                                            <div class="form-group">
                                                <label><br/></label>
                                                <button class="btn green form-control-static" type="submit">Conferma</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->




                    <div class="col-lg-3" style="float: right; text-align: right;" >
                        <!--<a href="<?php //echo base_url();                   ?><?php //echo "gestionericette/addricetta/".$user[0]->id;                   ?>" ><button type="submit" name="submit" value="submit" class="btn blue">Crea ricetta</button></a>-->
                        <!--<a href="<?php //echo base_url();                   ?><?php //echo "registravisita/pazienteselezionato/".$user[0]->id;                   ?>" ><button type="submit" name="submit" value="submit" class="btn green">Registra Visita</button></a>-->
                    </div>

                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <h2 class="page-title" >Modifica un paziente</h2>
                    <!--<h2 class="page-title" style="font-size: 16px; color: red;" >(nome, cognome e codice fiscale sono campi obbligatori)</h2>-->
                    <!-- END PAGE HEADER-->

                    <div class="clearfix">
                    </div>

                    <?php if ($errore == true): ?>
                        <div class="row" >
                            <div class="input-icon margin-top-10">
                                <div class="note note-danger">
                                    <h4 class="block">Errore!</h4>
                                    <p>
                                        Errore durante la modifica del paziente, controllare che tutti i campi obbligatori siano stati compilati e riprovare.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($modifica_avvenuta == true): ?>
                        <div class="row" >
                            <div class="input-icon margin-top-10">
                                <div class="note note-success">
                                    <h4 class="block">Successo!</h4>
                                    <p>
                                        Hai modificato il paziente correttamente.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>



                    <form action="<?php echo base_url(); ?>listapazienti/edit/<?php echo $user[0]->id; ?>" method="post" >

                        <div class="row" >

                            <div class="col-lg-6">
                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Nome:</h2>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $user[0]->nome; ?>">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Cognome:</h2>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="cognome" value="<?php echo $user[0]->cognome; ?>">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Email:</h2>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="email" value="<?php echo $user[0]->email; ?>">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Telefono:</h2>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $user[0]->telefono; ?>">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Indirizzo:</h2>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="indirizzo" value="<?php echo $user[0]->indirizzo; ?>">
                                </div>

                                <!--categorie dinamiche-->
                                <div class="input-icon margin-top-10">
                                    <label>Associazione categorie:</label>
                                    <br>

                                    <div class="col-md-12" >
                                        <?php foreach ($all_categorie_pazienti->result() as $categoria): ?>
                                            <label class="checkbox-inline" style="margin-left: 0px;" ><input type="checkbox" id="inlineCheckbox1" name="cat<?php echo $categoria->id_categoria; ?>" value="<?php echo $categoria->id_categoria; ?>"        <?php if (in_array($categoria->id_categoria, $categorie_assegnate_paziente)) echo "checked"; ?> ><?php echo $categoria->nome_categoria; ?></label>
                                        <?php endforeach; ?>
                                    </div>

                                </div>


                            </div>

                            <div class="col-lg-6">

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >CAP:</h2>
                                    <i class="fa fa-star"></i>
                                    <input type="text" class="form-control" name="cap" value="<?php echo $user[0]->cap; ?>">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Codice fiscale:</h2>
                                    <i class="fa fa-star"></i>
                                    <input type="text" class="form-control" name="codice_fiscale" value="<?php echo $user[0]->codice_fiscale; ?>">
                                </div>

                                <div class="input-icon margin-top-10">
                                    <h2 class="page-title" style="font-size: 16px;" >Luogo di nascita:</h2>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="luogo_nascita" value="<?php echo $user[0]->luogo_nascita; ?>" >
                                </div>

                                <div class="input-icon margin-top-10">
                                    <label>Data di nascita:</label>
                                    <br>
                                    <label>Attuale: <?php echo date('d-m-Y', strtotime($user[0]->data_nascita)); ?></label>
                                    <i class="fa fa-calendar"></i>
                                    <input class="form-control form-control-inline input-medium date-picker" name="data_nascita" size="16" type="text" value="" />
                                </div>

                                <br>

                                <div class="input-icon margin-top-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" name="alert_email" value="alert_email" <?php if ($user[0]->alert_email == 1) echo "checked"; ?>>Alert via Email</label>
                                </div>

                                <div class="input-icon margin-top-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" name="alert_sms" value="alert_sms" <?php if ($user[0]->alert_sms == 1) echo "checked"; ?> >Alert via SMS</label>
                                </div>


                            </div>



                        </div>


                        <div class="row" >

                            <div class="col-lg-12" >
                                <div class="input-icon margin-top-10">
                                    <label>Dettaglio paziente:</label>
                                    <textarea name="dettaglio_paziente" class="form-control" rows="4" placeholder="inserisci i dettagli aggiuntivi per il paziente"><?php echo $user[0]->dettaglio_paziente; ?></textarea>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row" >
                            <div class="col-lg-6">
                                <button type="submit" name="submit" value="submit" class="btn green">Salva</button>
                                </form>
                                <a href="<?php echo base_url(); ?>listapazienti" class="btn red" >Annulla</a>
                            </div>
                        </div>




                        <br>

                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-heart"></i>Tabella preventivi
                                </div>

                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                Data
                                            </th>
                                            <th>
                                                Totale
                                            </th>
                                            <th>
                                                Già Pagato
                                            </th>
                                            <th>
                                                Stato
                                            </th>
                                            <th class="numeric">
                                                Azioni
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $precId = 0;
                                        foreach ($preventivi as $prev):
                                            if ($precId == $prev->id_preventivo) {
                                                continue;
                                            }
                                            $precId = $prev->id_preventivo;
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $prev->data_preventivo; ?>
                                                </td>
                                                <td>
                                                    <?php echo $prev->totale; ?> &euro;
                                                </td>
                                                <td>
                                                    <?php echo $prev->parziale; ?> &euro;
                                                </td>
                                                <td>
                                                    <?php echo $prev->stato == 0 ? "<span class='label label-danger'>Non pagato</span>" : "<span class='label label-success'>Pagato</span>" ?> 
                                                </td>
                                                <td class="numeric" style="text-align: center;" >
                                                    <?php if ($prev->stato == 1) { ?>
                                                        <a href="<?php echo base_url(); ?><?php echo "fatture/generaFatturaECarica/" . $prev->id_preventivo; ?>" class="btn green">
                                                            <i class="icon-cloud-upload"></i> Carica fattura
                                                        </a>
                                                        <a target="blank" href="<?php echo base_url(); ?><?php echo "fatture/generaFattura/" . $prev->id_preventivo; ?>" class="btn green">
                                                            <i class="fa fa-print"></i> Stampa fattura
                                                        </a>
                                                    <?php } ?>
                                                    <a id="<?php echo $prev->stato == 0 ? "pagato-button" : "non-pagato" ?>" data-totale="<?php echo $prev->totale; ?>" data-parziale="<?php echo $prev->parziale ?>" data-id="<?php echo $prev->id_preventivo; ?>" href="<?php echo base_url(); ?><?php echo "preventivi/togglePagato/" . $prev->id_preventivo; ?>" class="btn blue">
                                                        Segna come <?php echo $prev->stato == 0 ? "Pagato" : "Non Pagato" ?>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?><?php echo "preventivi/delete/" . $prev->id_preventivo; ?>" onclick="return confirm('Sei sicuro di voler eliminare questo preventivo e la relativa visita?')" title="Elimina" class="btn purple">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-heart"></i>Tabella Visite
                                </div>

                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                Dottore
                                            </th>
                                            <th>
                                                Tipo prestazione
                                            </th>
                                            <th class="numeric">
                                                Descrizione visita
                                            </th>
                                            <th>
                                                Dettaglio visita
                                            </th>
                                            <th>
                                                Data visita
                                            </th>
                                            <th class="numeric">
                                                Orario visita
                                            </th>
                                            <th class="numeric">
                                                Azioni
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($visite->result() as $row): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->nome_dottore; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->nome_prestazione; ?>
                                                </td>
                                                <td>
                                                    <?php echo nl2br($row->descrizione); ?>
                                                </td>
                                                <td>
                                                    <?php echo nl2br($row->dettaglio); ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($row->data_visita) {
                                                        echo date('d-m-Y', strtotime($row->data_visita));
                                                    } else {
                                                        echo "/";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="numeric">
                                                    <?php
                                                    if ($row->orario_visita) {
                                                        echo $row->orario_visita;
                                                    } else {
                                                        echo "/";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="numeric" style="text-align: center;" >
                                                    <a href="<?php echo base_url(); ?><?php echo "listapazienti/editvisita/" . $row->id; ?>" title="Modifica" class="btn red">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?><?php echo "deletevisita/delete/" . $row->id; ?>" title="Elimina" class="btn purple">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12" >
                                <div class="dataTables_paginate paging_bootstrap_extended">
                                    <div class="pagination-panel"> Pagina
                                        <a href="<?php echo "/listapazienti/edit/" . $user[0]->id . "/" . ($pagina_attuale - 1); ?>" class="btn btn-sm default prev <?php if ($pagina_attuale == 1) echo "disabled"; ?>" title="Prev"><i class="fa fa-angle-left"></i></a>
                                        <span><?php echo $pagina_attuale; ?></span>
                                        <a href="<?php echo "/listapazienti/edit/" . $user[0]->id . "/" . ($pagina_attuale + 1); ?>" class="btn btn-sm default next <?php if ($pagina_attuale == $pagine_totali) echo "disabled"; ?>" title="Next"><i class="fa fa-angle-right"></i></a> di <span class="pagination-panel-total"><?php echo $pagine_totali; ?></span></div></div>
                            </div>

                            <div class="col-md-3 col-sm-12" >
                                <form action="<?php echo base_url(); ?><?php echo "listapazienti/edit/" . $user[0]->id ?>" method="post" >
                                    <input type="text" class="form-control" style="width: 70%; float: left;" name="numero_pagina" placeholder="inserisci numero pagina">
                                    <button type="submit" class="btn green">Vai</button>
                                </form>
                            </div>

                        </div>

                        <br><br>
                        <br><br>


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

        <script>
                                                    jQuery(document).ready(function () {

                                                        ComponentsPickers.init();
                                                    });
        </script>

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

                FormWizard.init();
                $("#pagamento").modal({show:false});
                $("#pagato-button").click(function (e) {
                    e.preventDefault();
                    var elem = $(this);
                    $('#pagamento').modal('show');
                    $('#pagamento #totalePagato').html(elem.data('parziale'));
                    $('#pagamento #totale').html(elem.data('totale'));
                    $('#pagamento #idPreventivo').val(elem.data('id'));
                    $('#pagamento #totalePreventivo').val(elem.data('totale'));
                    $('#pagamento #giaPagato').val(elem.data('parziale'));
                    $('#pagamento #daPagare').attr("max", Number(elem.data('totale')) - Number(elem.data('parziale')));
                    $('#pagamento #daPagare').val(Number(elem.data('totale')) - Number(elem.data('parziale')));
                });
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>