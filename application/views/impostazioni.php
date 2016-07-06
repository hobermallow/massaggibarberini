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

                    <!-- BEGIN PAGE HEADER-->
                    <h2 class="page-title" >Impostazioni del sistema</h2>
                    <!--<h2 class="page-title" style="font-size: 16px; color: red;" >(nome, cognome e codice fiscale sono campi obbligatori)</h2>-->
                    <!-- END PAGE HEADER-->

                    <div class="clearfix">
                    </div>

                    <?php
                    //ottengo i dati di tutte le impostazioni
                    $impostazioni_attuali = $impostazioni->result();

                    $alert_email = $impostazioni_attuali[0]->valore;
                    $alert_sms = $impostazioni_attuali[1]->valore;
                    ?>

                    <?php if ($update_riuscito == true): ?>
                        <div class="row" >
                            <div class="input-icon margin-top-10">
                                <div class="note note-success">
                                    <h4 class="block">Aggiornamento riuscito!</h4>
                                    <p>
                                        Hai correttamente aggiornato le impostazioni del sistema.
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>


                    <div class="row" >

                        <form action="<?php echo base_url(); ?>impostazioni/updateimpostazioni" method="post" >


                            <!--colonna 1-->
                            <div class="col-md-6" >
                                Sistema di alert via Email per tutti i pazienti: <input name="alert_email" type="checkbox" class="make-switch" data-on-color="info" data-off-color="danger" <?php if ($alert_email == "on") echo "checked"; ?>>

                            </div>



                            <!--colonna 2-->
                            <div class="col-md-6" >
                                Sistema di alert via SMS per tutti i pazienti: <input name="alert_sms" type="checkbox" class="make-switch" data-on-color="info" data-off-color="danger" <?php if ($alert_sms == "on") echo "checked"; ?> >
                            </div>


                    </div>


                    <br>

                    <button type="submit" name="submit" value="submit" class="btn green">Modifica</button>

                    </form>

                    <br><br>
                    
                    <form action="<?php echo base_url(); ?>impostazioni/updateimpostazioni" method="post" >
                        <div class="row" >

                            <div class="col-md-12" >
                                <h2 class="page-title" >Dati fatturazione:</h2>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->id : "" ?>"/>
                            <!--colonna1-->
                            <div class="col-md-4" >

                                <div class="input-icon margin-top-10">
                                    <label>Intestazione:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="intestazione" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->intestazione : "" ?>" required placeholder="Intestazione">
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Indirizzo:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="indirizzo" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->indirizzo : "" ?>" required placeholder="Indirizzo">
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>CAP:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="cap" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->cap : "" ?>" required placeholder="CAP">
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Telefono:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->telefono : "" ?>" required placeholder="Telefono">
                                </div>

                            </div> <!--colonna1-->

                            <!--colonna1-->
                            <div class="col-md-4" >

                                <div class="input-icon margin-top-10">
                                    <label>Comune:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->comune : "" ?>" name="comune" required placeholder="Comune">
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Provincia:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" maxlength="2" name="provincia" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->provincia : "" ?>" required placeholder="Provincia">
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Partita IVA:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="piva" value="<?php echo $impostazioniFatturazione ? $impostazioniFatturazione[0]->piva : "" ?>" required placeholder="Partita IVA">
                                </div>
                            </div> <!--colonna1-->  
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-md-6" >
                                <button type="submit" name="dati_fatturazione_submit" value="dati_fatturazione_submit" class="btn green">Modifica</button>
                            </div>
                        </div>

                    </form>
                    
                    <form action="<?php echo base_url(); ?>impostazioni/updateimpostazioni" method="post" >

                        <div class="row" >

                            <div class="col-md-12" >
                                <h2 class="page-title" >Aggiungi un nuovo utente di sistema:</h2>
                            </div>

                            <!--colonna1-->
                            <div class="col-md-6" >

                                <div class="input-icon margin-top-10">
                                    <label>Username:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control" name="username" placeholder="username">
                                </div>
                                <div class="input-icon margin-top-10">
                                    <label>Password:</label>
                                    <i class="fa fa-user"></i>
                                    <input type="password" class="form-control" name="password" placeholder="password">
                                </div>

                            </div> <!--colonna1-->

                            <!--colonna1-->
                            <div class="col-md-6" >

                                <div class="input-icon margin-top-10">
                                    <label>Tipologia Account:</label>
                                    <select name="tipoacc" class="form-control">
                                        <option value="0">Superadmin</option>
                                        <option value="1">Admin</option>
                                    </select>
                                </div>

                            </div> <!--colonna1-->  

                        </div>

                        <br>

                        <div class="row" >
                            <div class="col-md-6" >
                                <button type="submit" name="submit_newuser" value="submit_newuser" class="btn green">Aggiungi</button>
                            </div>
                        </div>

                    </form>

                    <br>


                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-users"></i>Account Registrati
                            </div>

                        </div>
                        <div class="portlet-body flip-scroll">
                            <table class="table table-bordered table-striped table-condensed flip-content">
                                <thead class="flip-content">
                                    <tr>
                                        <th>
                                            Username
                                        </th>
                                        <th>
                                            Tipologia Account
                                        </th>
                                        <th>
                                            Data Registrazione
                                        </th>
                                        <th class="numeric">
                                            Azioni
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($accounts->result() as $account): ?>
                                        <tr>
                                            <td>
                                                <?php echo $account->username; ?>
                                            </td>

                                            <td>
                                                <?php
                                                if ($account->tipoacc == 0)
                                                    echo "Superadmin";
                                                if ($account->tipoacc == 1)
                                                    echo "Admin";
                                                ?>
                                            </td>

                                            <td>
                                                <?php echo $account->data; ?>
                                            </td>

                                            <td class="numeric" style="text-align: center;" >
                                                <a href="<?php echo base_url(); ?>gestioneutenti/edit/<?php echo $account->id; ?>" title="Modifica" class="btn red" >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>gestioneutenti/delete/<?php echo $account->id; ?>" title="Elimina" class="btn purple" >
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>





                                </tbody>
                            </table>

                        </div>
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