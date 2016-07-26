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
        <!-- BEGIN GLOBAL MANDATORY STYLES 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>-->
        <link href="/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
        <link href="/assets/global/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css"/>
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
                                        <i class="icon-key"></i> Log Out 
                                    </a>
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
                    <h2 class="page-title">Calcola preventivo</h2>
                    <form id="form-preventivo" method="post" >
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2 class="page-title" style="font-size:16px;">Prestazione</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <select name="prestazioni" id="prestazioni" class="form-control">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h2 class="page-title" style="margin:0 0 15px 0;font-size:16px;">Cliente</h2>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-icon">
                                            <i class="fa fa-user"></i>
                                            <select name="paziente" id="paziente" class="form-control">
                                                <?php
                                                foreach ($pazienti as $paziente) {
                                                    echo "<option value=" . $paziente->id . ">" . $paziente->nome . " " . $paziente->cognome . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <h2 class="page-title" style="margin:0 0 15px 0;font-size:16px;">&nbsp;</h2>
                                <button id="add-visit-button" class="btn blue">Aggiungi</button>
                            </div>
                        </div>
                        <!--<div class="row">
                            <div class="col-sm-12">
                                <h2 class="page-title" style="font-size:16px;margin: 15px 0;">Prodotti</h2>
                            </div>
                        </div>-->

                    </form>
                    <!--<form id="aggiungi">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="input-icon">
                                    <i class="fa fa-folder"></i>
                                    <select name="prodotto" id="prodotto" class="form-control" required>
                    <?php
                    /* foreach ($prodotti as $prodotto) {
                      echo "<option data-id=" . $prodotto->id . " value=" . $prodotto->prezzo_vendita . ">" . $prodotto->nome . "</option>";
                      } */
                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="quantita" id="quantita" placeholder="Quantità" class="form-control" required/>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" id="add-button" class="btn blue">Aggiungi prodotto</button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="page-title" style="font-size:16px;margin: 15px 0;">Prodotti selezionati</h2>
                        </div>
                    </div>
                    <div id="prodotti-selezionati"></div>-->
                    <div class="row" >

                        <!--<div class="col-sm-4">
                            <div class="input-icon">
                                <i class="fa fa-calendar"></i>
                                <input id="data_visita" placeholder="Data Visita" class="form-control form-control-inline input-medium date-picker" name="data_visita" size="16" type="text" value=""/>
                            </div>
                            <div class="input-icon margin-top-20">
                                <i class="fa icon-clock"></i>
                                <input id="ora_visita" placeholder="Ora Visita" name="ora_visita" type="text" class="form-control form-control-inline input-medium timepicker timepicker-24">
                            </div>
                        </div>-->
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="page-title" style="font-size:16px;margin: 15px 0;">Visite</h2>
                        </div>
                    </div>
                    <div id="visite"></div>

                    <div class="row">
                        <div class="col-sm-8">
                            <button type="submit" form="form-preventivo" name="submit" value="submit" class="btn blue">Calcola</button>
                        </div>
                    </div>
                    <form id="accetta-preventivo" action="<?php echo base_url() . 'accetta'; ?>" method="POST">
                        <div class="row">
                            <div class="col-sm-4 margin-top-20">
                                <h2  class="page-title" style="margin:0 0 15px 0;font-size:16px;">Totale</h2>
                                <div class="input-icon">
                                    <i class="fa fa-euro"></i>
                                    <input type="text" class="form-control" form="accetta-preventivo" required id="totale" readonly placeholder="Totale"/>
                                </div>
                            </div>
                            <div class="col-sm-4 margin-top-20">
                                <h2 class="page-title" style="margin:0 0 15px 0;font-size:16px;">Sconto</h2>
                                <div class="input-icon">
                                    <i class="fa fa-euro"></i>
                                    <input type="number" class="form-control" required id="sconto" value="0" placeholder="Sconto"/>
                                </div>
                            </div>
                            <div class="col-sm-4 margin-top-20">
                                <h2 class="page-title" style="margin:0 0 15px 0;font-size:16px;">&nbsp;</h2>
                                <button type="submit" id="accetta-preventivo" class="btn blue">Accetta Preventivo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/clockface/js/clockface.js"></script>
        <script type="text/javascript" src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/assets/admin/pages/scripts/components-pickers.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script>
            $(document).ready(function () {
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
                $("#accetta-preventivo").submit(function (e) {
                    e.preventDefault();
                    if (addedVisits.length == 0) {
                        Metronic.alert({closeInSeconds: 5, type: "danger", message: "Devi inserire almeno un tipo di intervento per calcolare il preventivo", container: ".page-content", place: "before"});
                    }
                    else {
                        $.ajax({
                            type: 'POST',
                            url: '/preventivi/accetta',
                            dataType: 'JSON',
                            data: {visite: addedVisits, totale: $("#totale").val(), sconto: $("#sconto").val()}
                        }).then(function (data) {
                            if (data.success == 1) {
                                Metronic.alert({closeInSeconds: 5, message: "Preventivo accettato con successo", container: ".page-content", place: "before"});
                                $("input,textarea").val("");
                                addedVisits = [];
                                //$("#prodotti-selezionati, #visite").html("");
                            }
                            else {
                                Metronic.alert({closeInSeconds: 5, type: "danger", message: "Errore durante l'inserimento", container: ".page-content", place: "before"});
                            }
                        }, function (data) {
                            Metronic.alert({closeInSeconds: 5, type: "danger", message: "Errore durante l'inserimento", container: ".page-content", place: "before"});
                        });
                    }
                });
                $("#form-preventivo").submit(function (e) {
                    e.preventDefault();
                    if (addedVisits.length == 0) {
                        Metronic.alert({closeInSeconds: 5, type: "danger", message: "Devi inserire almeno un tipo di prestazione per calcolare il preventivo", container: ".page-content", place: "before"});
                        return;
                    }
                    var totale = getTotale();
                    $("#totale").val(totale);
                });

                function getTotale() {
                    var totale = 0;
                    for (var j = 0; j < addedVisits.length; j++) {
                        totale += addedVisits[j].costo_prestazione;
                        /*for (var i = 0; i < addedVisits[j].prodotti.length; i++) {
                         totale += Number(addedVisits[j].prodotti[i].prezzo) * Number(addedVisits[j].prodotti[i].quantita);
                         }*/
                    }
                    return totale;
                }
                ;

                $("#sconto").keyup(function (e) {
                    if ($("#totale").val() === "") {
                        e.preventDefault();
                    }
                    else {
                        if (!isNaN($("#sconto").val())) {
                            var sconto = $("#sconto").val();
                            var totale = getTotale();
                            var eff = totale - sconto;
                            $("#totale").val(eff);
                        }
                    }
                });
                //var addedProducts = [];
                var addedVisits = [];
                /*function renderProduct(prodotto, target) {
                 var htmlRow = "<div class='row detail-row' data-id=" + prodotto.id + " style='border-bottom:1px solid #000;'>" +
                 "<div class='col-sm-3'>" + prodotto.nome + "</div>" + "<div class='col-sm-3'>Quantità: " + $("#quantita").val() + "</div>" +
                 "<div class='col-sm-3'>Prezzo Unitario: " + $('#prodotto').val() + " &euro;</div>" +
                 "<div class='col-sm-3'>Totale: " + parseInt($("#quantita").val()) * parseFloat($('#prodotto').val()) + " &euro;" +
                 "<span class='btn btn-xs purple pull-right remove'><i class='fa fa-times'></i></span></div></div>";
                 $(target).append(htmlRow);
                 }
                 /*$("#aggiungi").submit(function (e) {
                 e.preventDefault();
                 var prodotto = $('#prodotto').find(":selected");
                 var prodToAdd = {id: prodotto.data("id"), nome: prodotto.text(), quantita: parseInt($("#quantita").val()), prezzo: parseFloat($('#prodotto').val())};
                 addedProducts.push(prodToAdd);
                 renderProduct(prodToAdd, "#prodotti-selezionati");
                 $("#quantita").val("");
                 $(".remove").off('click');
                 $(".remove").click(function () {
                 var detRow = $(this).parents(".detail-row");
                 var id = detRow.data("id");
                 var index = -1;
                 for (var i = 0; i < addedProducts.length; i++) {
                 if (addedProducts[i].id === id) {
                 index = i;
                 break;
                 }
                 }
                 if (index > -1) {
                 addedProducts.splice(index, 1);
                 }
                 detRow.remove();
                 });
                 });*/
                $.blockUI({message: "<h1>Attendere</h1>"});
                $.ajax({
                    dataType: 'JSON',
                    url: '../gestionedottori/getprestazioni',
                    success: function (data) {
                        if (data.error) {
                            alert("Sì è verificato un errore riprovare.");
                        }
                        else {
                            for (var i = 0; i < data.length; i++) {
                                $("#prestazioni").append("<option data-id='" + data[i].id + "' data-costo='" + data[i].costo_prestazione + "'>" + data[i].descrizione + "</option>");
                            }
                            $.unblockUI();
                        }
                    }
                    ,
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("Sì è verificato un errore riprovare.");
                        $.unblockUI();
                    }
                });
                /*$("#dottore").change(function () {
                 
                 var id_dottore = $(this).find(":selected").data('id');
                 
                 });*/
                $("#add-visit-button").click(function (e) {
                    e.preventDefault();
                    /*if ($('#dottore').find(":selected").data('id') == "") {
                     Metronic.alert({closeInSeconds: 5, type: "danger", message: "Specifica il dottore", container: ".page-content", place: "before"});
                     return;
                     }*/
                    if ($("#data_visita").val() === "") {
                        Metronic.alert({closeInSeconds: 5, type: "danger", message: "Specifica la data", container: ".page-content", place: "before"});
                        return;
                    }
                    if (!$('#prestazioni').find(":selected").data("costo")) {
                        Metronic.alert({closeInSeconds: 5, type: "danger", message: "Specifica una tipologia di prestazione", container: ".page-content", place: "before"});
                        return;
                    }
                    var visita = {id: addedVisits.length + 1, dottore: $('#dottore').find(":selected").data('id'), paziente: $("#paziente").val(), //prodotti: addedProducts,
                        descrizione: $("#prestazioni").val(), costo_prestazione: Number($("#prestazioni").find(":selected").data('costo')), id_prestazione: $("#prestazioni").find(":selected").data('id')};
                    addedVisits.push(visita);

                    $("#paziente").attr("disabled", true);
                    //var prodText = "";
                    /*var sep = "";
                     for (var i = 0; i < visita.prodotti.length; i++) {
                     prodText += sep + visita.prodotti[i].nome + " (" + visita.prodotti[i].quantita + ")";
                     sep = ", ";
                     }*/

                    //addedProducts = [];
                    var htmlRow = "<div class='row detail-row' data-id='" + addedVisits.length + "' style='border-bottom:1px solid #000;'>" +
                            "<div class='col-sm-3'>Client: " + $("#paziente").find(":selected").text() + "</div>" +
                            "<div class='col-sm-3'>Prestazione: " + visita.descrizione + "</div>" +
                            //"<div class='col-sm-3'>Prodotti: " + prodText + "</div>" +
                            "<div class='col-sm-1'><span class='btn btn-xs purple pull-right remove-visita'><i class='fa fa-times'></i></span></div>" +
                            "</div></div>";
                    $("#visite").append(htmlRow);
                    //$("#prodotti-selezionati").html("");

                    $(".remove-visita").off('click');
                    $(".remove-visita").click(function () {
                        var detRow = $(this).parents(".detail-row");
                        var id = detRow.data("id");
                        var index = -1;
                        for (var i = 0; i < addedVisits.length; i++) {
                            if (addedVisits[i].id == id) {
                                index = i;
                                break;
                            }
                        }
                        if (index > -1) {
                            addedVisits.splice(index, 1);
                        }

                        if (addedVisits.length == 0) {
                            $("#paziente").attr("disabled", null);
                        }

                        $("#totale").val("");
                        detRow.remove();
                    });
                });
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>