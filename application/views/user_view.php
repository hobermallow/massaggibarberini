<!DOCTYPE html>
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
        <link href="/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME STYLES -->
        <link href="/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
        <link id="style_color" href="/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- END THEME STYLES -->
        <link rel="shortcut icon" href="favicon.ico"/>

        <!-- JQUERY -->
        <script src="/assets/jquery-2.1.3.min.js" ></script>

        <!-- GOOGLE SIGN-IN -->
        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
        <meta name="google-signin-client_id" content="779847502443-vfhsoifdu96k7sq0pgomhnbfaa9utkd8.apps.googleusercontent.com">


    </head>

    <body class="login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>">
                <img style="width: 60px;" src="/assets/logo_default.png" alt=""/>
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="menu-toggler sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGIN -->
        <div class="content" style="width: 720px;">
            <div class="row" >
                <h2 class="col-sm-12" class="page-title" style="font-size: 20px;margin:0;font-weight: bold;" >Dettaglio paziente</h2>
                <div class="col-sm-6">
                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Nome: <?php echo $user[0]->nome; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Cognome: <?php echo $user[0]->cognome; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Email: <?php echo $user[0]->email; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Telefono: <?php echo $user[0]->telefono; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Indirizzo: <?php echo $user[0]->indirizzo; ?></h2>
                    </div>

                </div>

                <div class="col-sm-6">

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Categoria paziente: <?php
                            foreach ($all_categorie_pazienti->result() as $categoria) {
                                if (in_array($categoria->id_categoria, $categorie_assegnate_paziente))
                                    echo $categoria->nome_categoria;
                            }
                            ?></h2>

                    </div>
                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >CAP: <?php echo $user[0]->cap; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Codice fiscale: <?php echo $user[0]->codice_fiscale; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Luogo di nascita: <?php echo $user[0]->luogo_nascita; ?></h2>
                    </div>

                    <div class="input-icon margin-top-10">
                        <h2 class="page-title" style="font-size: 16px;" >Data di nascita: <?php echo date('d-m-Y', strtotime($user[0]->data_nascita)); ?></h2>
                    </div>
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
                                    Stato
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($visite->result() as $row): ?>
                                <tr>
                                    <td>
                                        <?php echo nl2br($row->descrizione); ?>
                                    </td>
                                    <td>
                                        <?php echo nl2br($row->dettaglio); ?>
                                    </td>
                                    <td>
                                        <?php echo date('d-m-Y', strtotime($row->data_visita)); ?>
                                    </td>
                                    <td class="numeric">
                                        <?php echo $row->orario_visita; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->stato == 0 ? "<span class='label label-danger'>Non pagato</span>" : "<span class='label label-success'>Pagato</span>" ?> 
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
                            <a href="<?php echo "/user/view/" . $user[0]->id . "/" . ($pagina_attuale - 1); ?>" class="btn btn-sm default prev <?php if ($pagina_attuale == 1) echo "disabled"; ?>" title="Prev"><i class="fa fa-angle-left"></i></a>
                            <span><?php echo $pagina_attuale; ?></span>
                            <a href="<?php echo "/user/view/" . $user[0]->id . "/" . ($pagina_attuale + 1); ?>" class="btn btn-sm default next <?php if ($pagine_totali == 0 || $pagina_attuale == $pagine_totali) echo "disabled"; ?>" title="Next"><i class="fa fa-angle-right"></i></a> di <span class="pagination-panel-total"><?php echo $pagine_totali; ?></span></div></div>
                </div>
            </div>
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright">
            2015 &copy; Medincloud - <a target="_blank" href="http://www.syrusindustry.com/" >www.syrusindustry.com</a>
        </div>
        <!-- END COPYRIGHT -->
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
        <script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/assets/global/plugins/select2/select2.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->

        <script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
        <script src="/assets/admin/pages/scripts/components-pickers.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            jQuery(document).ready(function () {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init() // init quick sidebar
                Login.init();

                ComponentsPickers.init();
                $("#showAnag").click(function (e) {
                    e.preventDefault();
                    $("#formAnag").removeClass("display-hide");
                });

            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>