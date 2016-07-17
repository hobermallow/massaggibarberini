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
        <div class="logo" style="margin-top:0;">
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
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="<?php echo base_url(); ?>user" method="post">
                <h3 class="form-title">Ricerca il tuo codice fiscale oppure inserisci la tua anagrifica</h3>
                <div class="alert alert-danger <?php echo $error ? "" : "display-hide" ?>">
                    <button class="close" data-close="alert"></button>
                    <span><?php echo $error ? $error : "" ?></span>
                </div>
                <div class="alert alert-success <?php echo isset($paziente_salvato) ? "" : "display-hide" ?>">
                    <button class="close" data-close="alert"></button>
                    <span>Anagrafica salvata con successo</span>
                </div>
                <input type="hidden" name="search" value="search"/>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-10">
                            <label class="control-label visible-ie8 visible-ie9">Codice fiscale</label>
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Codice fiscale" name="codice_fiscale"/>
                            </div>
                        </div>
                        <div class="col-xs-1">
                            <button class="btn btn-success" type="submit">Cerca</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr/>
            <form id="formAnag" action="<?php echo base_url(); ?>user" method="post">
                <div class="row" >
                    <div class="col-lg-6">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="nome" placeholder="nome" required>
                        </div>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="cognome" placeholder="cognome" required>
                        </div>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required maxlength="16" name="codice_fiscale" placeholder="codice fiscale">
                        </div>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="indirizzo" placeholder="indirizzo">
                        </div>
                        <!--categorie dinamiche-->
                        <div class="input-icon margin-top-10">
                            <label>Associazione categorie:</label>
                            <br>
                            <div class="col-md-12" >
                                <?php foreach ($all_categorie_pazienti->result() as $categoria): ?>
                                    <label class="checkbox-inline" style="margin-left: 0px;" ><input type="checkbox" id="inlineCheckbox1" name="cat<?php echo $categoria->id_categoria; ?>" value="<?php echo $categoria->id_categoria; ?>" ><?php echo $categoria->nome_categoria; ?></label>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="email" placeholder="email">
                        </div>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="telefono" placeholder="telefono">
                        </div>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="cap" placeholder="cap">
                        </div>
                        <div class="input-icon margin-top-10">
                            <i class="fa fa-user"></i>
                            <input type="text" class="form-control" required name="luogo_nascita" placeholder="luogo di nascita">
                        </div>
                        <div class="input-icon margin-top-10">
                            <label>Data di nascita:</label>
                            <i class="fa fa-calendar"></i>
                            <input class="form-control form-control-inline required input-medium date-picker" name="data_nascita" size="16" type="text" value=""/>
                        </div>
                        <div class="margin-top-10">
                            <button class="btn btn-success" form="formAnag" name="save" value="save" type="submit">Conferma</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
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