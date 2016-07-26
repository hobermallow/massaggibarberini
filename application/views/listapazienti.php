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

        <script src="/assets/jquery-2.1.3.min.js" type="text/javascript"></script>

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
                    <h2 class="page-title" >Lista Clienti</h2>
                    <!-- END PAGE HEADER-->

                    <div class="clearfix">
                    </div>


                    <?php if (true == false): ?>
                        <form action="<?php echo base_url(); ?>listapazienti/search" method="post" >
                            <div class="row" >
                                <div class="col-md-4" >
                                    <div class="input-group">
                                        <div class="input-icon">
                                            <i class="fa fa-eye fa-fw"></i>
                                            <input class="form-control" type="text" name="ricerca" placeholder="Ricerca paziente">
                                        </div>
                                        <span class="input-group-btn">
                                            <button id="search" name="submit_search" class="btn btn-success blue" type="submit"><i class="fa fa-arrow-right fa-fw"></i> Cerca</button>
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    <?php endif; ?>



                    <form action="<?php echo base_url(); ?>listapazienti/filtriavanzati" method="post" >
                        <div class="row" >

                            <div class="col-md-12" >
                                <h2 style="color: #4B8DF8; font-weight: bold;" >Filtri avanzati:</h2>
                            </div>

                            <div class="col-md-2" >
                                <div class="form-group">
                                    <label>Categoria clienti:</label>
                                    <select name="categoria_pazienti" class="form-control">

                                        <option value="0" <?php if (!isset($filtro_categoria_pazienti)) echo "selected"; ?> > Tutte</option>

                                        <?php foreach ($all_categorie_pazienti->result() as $categoria): ?>
                                            <option value="<?php echo $categoria->id_categoria; ?>" <?php if (isset($filtro_categoria_pazienti) && $filtro_categoria_pazienti == $categoria->id_categoria) echo "selected"; ?> ><?php echo $categoria->nome_categoria; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" >
                                <label>Nome cliente:</label>
                                <input type="text" class="form-control" name="nome" <?php if (isset($filtro_nome)) echo "value=" . $filtro_nome . ""; ?> >
                            </div>
                            <div class="col-md-2" >
                                <label>Cognome cliente:</label>
                                <input type="text" class="form-control" name="cognome" <?php if (isset($filtro_cognome)) echo "value=" . $filtro_cognome . ""; ?> >
                            </div>

                            <div class="col-md-2" >
                                <label>Luogo di nascita:</label>
                                <input type="text" class="form-control number_input_handler_integer" name="luogo_nascita" <?php if (isset($filtro_luogo_nascita)) echo "value=" . $filtro_luogo_nascita . ""; ?> >
                            </div>
                            <div class="col-md-2" >
                                <label>Indirizzo:</label>
                                <input type="text" class="form-control" name="indirizzo" <?php if (isset($filtro_indirizzo)) echo "value=" . $filtro_indirizzo . ""; ?> >
                            </div>
                            <div class="col-md-2" >
                                <label>Codice fiscale:</label>
                                <input type="text" class="form-control" name="codice_fiscale" <?php if (isset($filtro_codice_fiscale)) echo "value=" . $filtro_codice_fiscale . ""; ?> >
                            </div>
                            <div class="col-md-2" >
                                <label>Telefono:</label>
                                <input type="text" class="form-control" name="telefono" <?php if (isset($filtro_telefono)) echo "value=" . $filtro_telefono . ""; ?> >
                            </div>
                            <div class="col-md-2" >
                                <label>Email:</label>
                                <input type="text" class="form-control" name="email" <?php if (isset($filtro_email)) echo "value=" . $filtro_email . ""; ?> >
                            </div>

                        </div>

                        <br>

                        <div class="row" >
                            <div class="col-md-12" >
                                <button type="submit" name="submit_filter" value="submit_filter" class="btn blue">Applica Filtri</button>

                                </form>
                                <a href="<?php echo base_url(); ?>listapazienti" class="btn red" >Annulla Filtri</a>
                            </div>
                        </div>



                        <br>


                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-users"></i>Tabella Clienti
                                </div>

                            </div>
                            <div class="portlet-body flip-scroll">

                                <?php if (isset($ricerca_search) && isset($pazienti) == false): ?>
                                    <div class="row" style="text-align: center;" >
                                        <img id="loading_gif" src="/assets/loading.gif" />
                                        <h3 id="loading_text" style="color: #4B8DF8;" ><b>Caricamento in corso, attendere...</b></h3>
                                    </div>
                                    <br>
                                <?php endif; ?>

                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                Categoria
                                            </th>
                                            <th>
                                                Cognome
                                            </th>
                                            <th class="numeric">
                                                Nome
                                            </th>
                                            <th>
                                                Luogo di nascita
                                            </th>
                                            <th class="numeric">
                                                Data di nascita
                                            </th>
                                            <th class="numeric">
                                                Indirizzo
                                            </th>
                                            <th class="numeric">
                                                Codice Fiscale
                                            </th>
                                            <th class="numeric">
                                                Telefono
                                            </th>
                                            <th class="numeric">
                                                Email
                                            </th>
                                            <th class="numeric">
                                                Azioni
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_body" >

                                        <?php if (isset($pazienti)): ?>
                                            <?php foreach ($pazienti->result() as $row): ?>
                                                <tr>
                                                    <td>
                                                        <?php if (isset($current_categorie_pazienti[$row->id])) echo $current_categorie_pazienti[$row->id]["nome_categoria"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->cognome; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->nome; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row->luogo_nascita; ?>
                                                    </td>
                                                    <td class="numeric">
                                                        <?php echo date('d-m-Y', strtotime($row->data_nascita)); ?>
                                                    </td>
                                                    <td class="numeric">
                                                        <?php echo $row->indirizzo; ?>
                                                    </td>
                                                    <td class="numeric">
                                                        <?php echo $row->codice_fiscale; ?>
                                                    </td>
                                                    <td class="numeric">
                                                        <?php echo $row->telefono; ?>
                                                    </td>
                                                    <td class="numeric">
                                                        <?php echo $row->email; ?>
                                                    </td>
                                                    <td class="numeric" style="text-align: center;" >
                                                    <!--     <a href="<?php echo base_url(); ?><?php echo "listapazienti/drive/" . $row->id; ?>" title="Cartella Clinica" class="btn blue"> -->
<!--                                                             <i class="fa icon-cloud-upload"></i> -->
<!--                                                         </a> -->
                                                        <a href="<?php echo base_url(); ?><?php echo "listapazienti/edit/" . $row->id; ?>" title="Modifica" class="btn red">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url(); ?><?php echo "listapazienti/delete/" . $row->id; ?>" title="Elimina" class="btn purple">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>





                                    </tbody>
                                </table>

                            </div>
                        </div>


                        <?php if (!isset($ricerca_search)): ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-12" >
                                    <div class="dataTables_paginate paging_bootstrap_extended">
                                        <div class="pagination-panel"> Pagina

                                            <a href="<?php echo "/listapazienti/view/" . ($pagina_attuale - 1); ?>" class="btn btn-sm default prev <?php if ($pagina_attuale == 1) echo "disabled"; ?>" title="Prev"><i class="fa fa-angle-left"></i></a>
                                            <span><?php echo $pagina_attuale; ?></span>
                                            <a href="<?php echo "/listapazienti/view/" . ($pagina_attuale + 1); ?>" class="btn btn-sm default next <?php if ($pagina_attuale == $pagine_totali) echo "disabled"; ?>" title="Next"><i class="fa fa-angle-right"></i></a> di <span class="pagination-panel-total"><?php echo $pagine_totali; ?></span></div></div>


                                </div>

                                <div class="col-md-3 col-sm-12" >
                                    <form action="<?php echo base_url(); ?>listapazienti/view" method="post" >
                                        <input type="text" class="form-control" style="width: 70%; float: left;" name="numero_pagina" placeholder="inserisci numero pagina">
                                        <button type="submit" class="btn green">Vai</button>
                                    </form>
                                </div>

                            </div>
                        <?php endif; ?>



                        <div class="clearfix">
                        </div>




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

        <script>

            //caricamento dei filtri
            var filtro_categoria_pazienti = "<?php echo $filtro_categoria_pazienti; ?>";
            var filtro_nome = "<?php echo $filtro_nome ?>";
            var filtro_cognome = "<?php echo $filtro_cognome; ?>";
            var filtro_luogo_nascita = "<?php echo $filtro_luogo_nascita; ?>";
            var filtro_indirizzo = "<?php echo $filtro_indirizzo; ?>";
            var filtro_codice_fiscale = "<?php echo $filtro_codice_fiscale; ?>";
            var filtro_telefono = "<?php echo $filtro_telefono; ?>";
            var filtro_email = "<?php echo $filtro_email; ?>";


            $.post("<?php echo base_url(); ?>listapazienti/esegui_query_pazienti", {filtro_categoria_pazienti: filtro_categoria_pazienti, filtro_nome: filtro_nome, filtro_cognome: filtro_cognome, filtro_luogo_nascita: filtro_luogo_nascita, filtro_indirizzo: filtro_indirizzo, filtro_codice_fiscale: filtro_codice_fiscale, filtro_telefono: filtro_telefono, filtro_email: filtro_email}, function (data) {
                        $("#table_body").html(data);

                        $("#loading_gif").css("display", "none");
                        $("#loading_text").css("display", "none");
                    });



        </script>

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
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>
