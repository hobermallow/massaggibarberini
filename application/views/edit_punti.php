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
        <style>
            .badge.badge-success{
                display: none;
            }
        </style>
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


                    <!-- BEGIN PAGE CONTENT-->
                    <div class = "page-header">
   
   						<h1>
      						Punti Fedeltà
   						</h1>
   
					</div>



                    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
                    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>



                    <link rel="stylesheet" href="/assets/jquery-ui.css">
                    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>




                        <br>
                        <!-- Se viene settato il punto o vengono azzerati -->
                          <?php if ($modifica_avvenuta):  ?>
                          <div class="row" >
                          	<div class="input-icon margin-top-10">
                              <div class="note note-success">
              				              <h4 class="block">Punti aggiornati!</h4>
              				                  <p>
              				                        Punti aggiornati correttamente.
              				                  </p>
              			          </div>
                              </div>
                          </div>
                        <?php endif; ?>
                      <?php if($errore) : ?>
                            <div class="row" >
                            	<div class="input-icon margin-top-10">
                                <div class="note note-danger">
                				              <h4 class="block">Errore!</h4>
                				                  <p>
                				                        Errore nell'aggiornamento dei punti.
                				                  </p>
                			          </div>
                              </div>
                            </div>

                        <?php endif; ?>

                        <!-- Inizio select delle categorie -->
                        <div class="form-group">
                        <select class="form-control" name="categoria" form="aggiorna_punti">
                          <option value="" selected >Seleziona categoria</option>
                          <?php foreach ($categorie_punti as $row): ?>
                            <option value="<?php echo $row->id; ?>" valo="<?php echo array_shift($punti); ?>" max-val="<?php echo $row->max_punti; ?>"><?php echo $row->categoria; ?></option>
                          <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-users"></i>Cliente
                                </div>

                            </div>
                            <div class="portlet-body flip-scroll">



                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                        <tr>
                                            <th>
                                                Cognome
                                            </th>
                                            <th class="numeric">
                                                Nome
                                            </th>
                                            <th class="numeric">
                                                Punti
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody id="table_body" >

                                        <?php if (isset($paziente)): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $paziente->cognome; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $paziente->nome; ?>
                                                    </td>

                                                    <td id="punti">
                                                    </td>
                                                </tr>
                                        <?php endif; ?>





                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <form class="" action="index.html" method="post" id="aggiorna_punti">

                          <input type="hidden" name="id_paziente" value="<?php echo $paziente->id; ?>">
                        <!-- Bottone per aggiungere un punto o azzerarli -->
                          <button  class="btn btn-default" formaction="/punti/edit/<?php echo $paziente->id; ?>" formmethod="post" type="submit" name="punto" value="1" >Aggiungi un punto</button>
                          <button  class="btn btn-default" formaction="/punti/edit/<?php echo $paziente->id; ?>" formmethod="post" type="submit" name="azzera" value="1" >Azzera</button>
                          <script type="text/javascript">
                            $("[name='punto']").hide();
                            $("[name='azzera']").hide();
                          </script>
                        </form>

                </div>
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->


            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($){
            // $('#button').show();
            //esempi di funzioni
            //impostazione di un attributo
            // $('.classe').attr('title','ciao');
            //salvo i valori dei punteggi
            //update di un elemento
            $('select[name=categoria]').change(function(e){
              //valore del select:
            // var valore = $(this).val();
            //selettore per l'opzione selezionata nel select
            var opzione = $(this).find('option:selected');
            if(opzione.attr('value') == "") {
              $('[name="punto"]').hide();
              $('[name="azzera"]').hide();
              $('#punti').text("0");
            }
            else if(parseInt(opzione.attr('valo')) < parseInt(opzione.attr('max-val'))) {
              $('[name="punto"]').show();
              $('[name="azzera"]').hide();
              $('#punti').text(parseInt(opzione.attr('valo')));
            }
            else {
              $('[name="azzera"]').show();
              $('[name="punto"]').hide();
              $('#punti').text(parseInt(opzione.attr('valo')));
            }
          });
        });
        </script>

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



                    <!-- END PAGE CONTENT-->
                </div>
            </div>
            <!-- END CONTENT -->





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
                                var base_url = "<?php echo base_url(); ?>";</script>
        <script src="/assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="/assets/global/scripts/metronic.js" type="text/javascript"></script>
        <script src="/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
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
        <script>
                            jQuery(document).ready(function() {

                    ComponentsPickers.init();
                    });</script>

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
