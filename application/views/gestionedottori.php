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
                    <!-- /.modal -->
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN STYLE CUSTOMIZER -->


                    <!-- END STYLE CUSTOMIZER -->
                    <!-- BEGIN PAGE HEADER-->
                    <h2 class="page-title" >Gestione Operatori</h2>
                    <h2 class="page-title" style="font-size: 16px; color: red;" >(il nome è un campo obbligatorio)</h2>
                    <!-- END PAGE HEADER-->

                    <div class="clearfix">
                    </div>

                    <?php if ($error == true): ?>
                        <div class="row" >
                            <div class="input-icon margin-top-10">
                                <div class="note note-danger">
                                    <h4 class="block">Errore!</h4>
                                    <p>
                                        Errore durante l'aggiunta di un operatore, riprovare più tardi o contattare un'amminsitratore di sistema.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($registrazione_avvenuta == true): ?>
                        <div class="row" >
                            <div class="input-icon margin-top-10">
                                <div class="note note-success">
                                    <h4 class="block">Successo!</h4>
                                    <p>
                                        Hai correttamente registrato un operatore.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($delete_avvenuto == true): ?>
                        <div class="row" >
                            <div class="input-icon margin-top-10">
                                <div class="note note-success">
                                    <h4 class="block">Successo!</h4>
                                    <p>
                                        Hai correttamente rimosso un operatore dal sistema.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>



                    <form action="<?php echo base_url(); ?>gestionedottori" method="post" >

                        <div class="row" >

                            <div class="col-lg-6">

                                <div class="input-icon margin-top-10">
                                    <label>Nome:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" required name="nome" placeholder="inserisci nome e cognome dell'operatore da registrare" >
                                </div>

                                <div class="input-icon margin-top-10">
                                    <label>Telefono:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" required name="telefono" placeholder="inserisci il telefono dell'operatore" >
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Email:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" required name="email" placeholder="inserisci l'email dell'operatore" >
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="input-icon margin-top-10">
                                    <label>Dettagli aggiuntivi per gli orari dell'operatore:</label>
                                    <i class="fa fa-calendar"></i>
                                    <textarea name="orari_settimanali" class="form-control" rows="4" placeholder="inserisci dettagli aggiuntivi per gli orari settimanali dell'operatore" ></textarea>
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Dettagli aggiuntivi per l'operatore:</label>
                                    <i class="fa fa-user"></i>
                                    <textarea name="dettagli" class="form-control" rows="4" placeholder="inserisci i dettagli aggiuntivi per l'operatore" ></textarea>
                                </div>
                            </div>
                        </div>

                        <br>

                        <!-- INIZIO GESTIONE ORARI -->
                        <div class="row">
                          <div class="col-lg-8">
                        <div class="input-icon margin-top-10">
                          <h2 class="page-title">Orari settimanali per l'operatore:</h2>
                          <br>
						<table class="table table-striped">
                       <thead>
                       <tr>
                       <th>
                       Giorno
                       </th>
                       <th>
                       Selezione
                       </th>
                       <th>
                       Orario Inizio
                       </th>
                       <th>
                       Orario Fine
                       </th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                        <!-- lunedi -->
                        <td><label>Lunedi: </label></td><td><input type="checkbox" name="giorno[]" value="1"></td>
                        <td><label>Inizio:</label>
                        <select name="1-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select></td>
                        <td>
                        <!--rest of options omitted for brevity-->
                        <label>Fine:</label>
                        <select name="1-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        
                        <tr>
                        <!-- lunedi -->
                      <td><label>Martedi: </label></td><td><input type="checkbox" name="giorno[]" value="2"></td>
                        <td><label>Inizio:</label>
                        <select name="2-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        <!--rest of options omitted for brevity-->
                        <td><label>Fine:</label>
                        <select name="2-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td><label>Mercoledi: </label></td><td><input type="checkbox" name="giorno[]" value="3"></td>
                        <td><label>Inizio:</label>
                        <select name="3-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        <!--rest of options omitted for brevity-->
                        <td><label>Fine:</label>
                        <select name="3-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td><label>Giovedi: </label></td><td><input type="checkbox" name="giorno[]" value="4"></td>
                        <td><label>Inizio:</label>
                        <select name="4-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        <!--rest of options omitted for brevity-->
                        <td><label>Fine:</label>
                        <select name="4-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td><label>Venerdi: </label></td><td><input type="checkbox" name="giorno[]" value="5"></td>
                        <td><label>Inizio:</label>
                        <select name="5-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        <!--rest of options omitted for brevity-->
                        <td><label>Fine:</label>
                        <select name="5-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td><label>Sabato: </label></td><td><input type="checkbox" name="giorno[]" value="6"></td>
                        <td><label>Inizio:</label>
                        <select name="6-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        <!--rest of options omitted for brevity-->
                        <td><label>Fine:</label>
                        <select name="6-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        <tr>
                        <td><label>Domenica: </label></td><td><input type="checkbox" name="giorno[]" value="0"></td>
                        <td><label>Inizio:</label>
                        <select name="0-inizio">
                          <option value="00:00:00">00:00</option>
                          <option value="00:30:00">00:30</option>
                          <option value="01:00:00">01:00</option>
                          <option value="01:30:00">01:30</option>
                          <option value="02:00:00">02:00</option>
                          <option value="02:30:00">02:30</option>
                          <option value="03:00:00">03:00</option>
                          <option value="03:30:00">03:30</option>
                          <option value="04:00:00">04:00</option>
                          <option value="04:30:00">04:30</option>
                          <option value="05:00:00">05:00</option>
                          <option value="05:30:00">05:30</option>
                          <option value="06:00:00">06:00</option>
                          <option value="06:30:00">06:30</option>
                          <option value="07:00:00">07:00</option>
                          <option value="07:30:00">07:30</option>
                          <option value="08:00:00">08:00</option>
                          <option value="08:30:00">08:30</option>
                          <option value="09:00:00">09:00</option>
                          <option value="09:30:00">09:30</option>
                          <option value="10:00:00">10:00</option>
                          <option value="10:30:00">10:30</option>
                          <option value="11:00:00">11:00</option>
                          <option value="11:30:00">11:30</option>
                          <option value="12:00:00">12:00</option>
                          <option value="12:30:00">12:30</option>
                          <option value="13:00:00">13:00</option>
                          <option value="13:30:00">13:30</option>
                          <option value="14:00:00">14:00</option>
                          <option value="14:30:00">14:30</option>
                          <option value="15:00:00">15:00</option>
                          <option value="15:30:00">15:30</option>
                          <option value="16:00:00">16:00</option>
                          <option value="16:30:00">16:30</option>
                          <option value="17:00:00">17:00</option>
                          <option value="17:30:00">17:30</option>
                          <option value="18:00:00">18:00</option>
                          <option value="18:30:00">18:30</option>
                          <option value="19:00:00">19:00</option>
                          <option value="19:30:00">19:30</option>
                          <option value="20:00:00">20:00</option>
                          <option value="20:30:00">20:30</option>
                          <option value="21:00:00">21:00</option>
                          <option value="21:30:00">21:30</option>
                          <option value="22:00:00">22:00</option>
                          <option value="22:30:00">22:30</option>
                          <option value="23:00:00">23:00</option>
                          <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        <!--rest of options omitted for brevity-->
                        <td><label>Fine:</label>
                        <select name="0-fine">
                        <option value="00:00:00">00:00</option>
                        <option value="00:30:00">00:30</option>
                        <option value="01:00:00">01:00</option>
                        <option value="01:30:00">01:30</option>
                        <option value="02:00:00">02:00</option>
                        <option value="02:30:00">02:30</option>
                        <option value="03:00:00">03:00</option>
                        <option value="03:30:00">03:30</option>
                        <option value="04:00:00">04:00</option>
                        <option value="04:30:00">04:30</option>
                        <option value="05:00:00">05:00</option>
                        <option value="05:30:00">05:30</option>
                        <option value="06:00:00">06:00</option>
                        <option value="06:30:00">06:30</option>
                        <option value="07:00:00">07:00</option>
                        <option value="07:30:00">07:30</option>
                        <option value="08:00:00">08:00</option>
                        <option value="08:30:00">08:30</option>
                        <option value="09:00:00">09:00</option>
                        <option value="09:30:00">09:30</option>
                        <option value="10:00:00">10:00</option>
                        <option value="10:30:00">10:30</option>
                        <option value="11:00:00">11:00</option>
                        <option value="11:30:00">11:30</option>
                        <option value="12:00:00">12:00</option>
                        <option value="12:30:00">12:30</option>
                        <option value="13:00:00">13:00</option>
                        <option value="13:30:00">13:30</option>
                        <option value="14:00:00">14:00</option>
                        <option value="14:30:00">14:30</option>
                        <option value="15:00:00">15:00</option>
                        <option value="15:30:00">15:30</option>
                        <option value="16:00:00">16:00</option>
                        <option value="16:30:00">16:30</option>
                        <option value="17:00:00">17:00</option>
                        <option value="17:30:00">17:30</option>
                        <option value="18:00:00">18:00</option>
                        <option value="18:30:00">18:30</option>
                        <option value="19:00:00">19:00</option>
                        <option value="19:30:00">19:30</option>
                        <option value="20:00:00">20:00</option>
                        <option value="20:30:00">20:30</option>
                        <option value="21:00:00">21:00</option>
                        <option value="21:30:00">21:30</option>
                        <option value="22:00:00">22:00</option>
                        <option value="22:30:00">22:30</option>
                        <option value="23:00:00">23:00</option>
                        <option value="23:30:00">23:30</option>
                        </select>
                        </td>
                        </tr>
                        </tbody>
                        </table>
                       
                          
                        </div>
                      </div>
                        </div>
                        <br><br>

                        <div class="row" >
                            <div class="col-lg-6" >
                                <button type="submit" name="submit" value="submit" class="btn blue">Registra Operatore</button>
                                
                            </div>
                        </div>
                        </form>
                        <br><br>
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-heart"></i>Operatori registrati
                                </div>

                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                Nome
                                            </th>
                                            <th>
                                                Telefono
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Dettagli dell'operatore
                                            </th>
<!--                                             <th> -->
<!--                                                 Orari settimanali -->
<!--                                             </th> -->
                                            <th class="numeric">
                                                Azioni
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($dottori->result() as $dottore): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $dottore->nome; ?>
                                                </td>
                                                <td>
                                                    <?php echo $dottore->telefono; ?>
                                                </td>
                                                <td>
                                                    <?php echo $dottore->email; ?>
                                                </td>
                                                <td>
                                                    <?php echo nl2br($dottore->dettagli); ?>
                                                </td>
<!--                                                 <td> -->
                                                  <!--    <?php echo nl2br($dottore->orari_settimanali); ?> -->
<!--                                                 </td> -->

                                                <td class="numeric" style="text-align: center;" >
                                                    <a href="<?php echo base_url(); ?>gestionedottori/edit/<?php echo $dottore->id; ?>" title="Modifica" class="btn red" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url(); ?>gestionedottori/delete/<?php echo $dottore->id; ?>"  title="Elimina" class="btn purple" >
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <br><br>
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
