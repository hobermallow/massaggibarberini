<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
    <li class="sidebar-toggler-wrapper">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler">
        </div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
    </li>
    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

    

    <li class="start ">
        <a href="<?php echo base_url(); ?>dashboard">
            <i class="icon-home"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

<!--     <li class="start "> -->
         <!--  <a href="<?php echo base_url(); ?>costi"> --> 
<!--             <i class="icon-globe"></i> -->
<!--             <span class="title">Costi e ricavi</span> -->
<!--         </a> -->
<!--     </li> -->

    <li class="start ">
        <a href="<?php echo base_url(); ?>gestionedottori/prestazioni">
            <i class="glyphicon glyphicon-list-alt"></i>
            <span class="title">Servizi</span>
        </a>
    </li>

    <li class="start ">
        <a href="<?php echo base_url(); ?>gestionedottori">
            <i class="icon-graduation"></i>
            <span class="title">Gestione Operatori</span>
            <span class="selected"></span>
        </a>
    </li>
	<li class="start ">
        <a href="<?php echo base_url(); ?>gallery">
            <i class="glyphicon glyphicon-film"></i>
            <span class="title">Gallery</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="start ">
        <a href="<?php echo base_url(); ?>post">
            <i class="glyphicon glyphicon-pencil"></i>
            <span class="title">Posts</span>
            <span class="selected"></span>
        </a>
    </li>
    <li class="last ">
        <a href="<?php echo base_url(); ?>categoriepazienti">
            <i class="icon-paper-clip"></i>
            <span class="title">Categorie Clienti</span>
        </a>
    </li>


    <li class="last ">
        <a href="<?php echo base_url(); ?>nuovopaziente">
            <i class="icon-user"></i>
            <span class="title">Nuovo Cliente</span>
        </a>
    </li>

    <li class="last ">
        <a href="<?php echo base_url(); ?>listapazienti">
            <i class="icon-users"></i>
            <span class="title">Lista Clienti</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>listapazienti">
                    <i class="icon-users"></i>
                    Tutti i clienti</a>
            </li>
        </ul>
    </li>

    <li class="last ">
        <a href="<?php echo base_url(); ?>punti">
            <i class="glyphicon glyphicon-qrcode"></i>
            <span class="title">Punti</span>
        </a>
        <ul class="sub-menu">
            <li>
                <a href="<?php echo base_url(); ?>punti">
                    <i class="icon-users"></i>
                    Punteggi Clienti</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>punti/categorie">
                    <i class="icon-users"></i>
                    Modifica Categorie Punti</a>
            </li>
        </ul>
    </li>

<!--     <li class="last "> -->
<!--         <a href="#"> -->
<!--             <i class="icon-folder"></i> -->
<!--             <span class="title">Magazzino</span> -->
<!--             <span class="arrow "></span> -->
<!--         </a> -->
<!--         <ul class="sub-menu"> -->
<!--             <li> -->
<!--                  <a href="<?php echo base_url(); ?>magazzino"> -->
<!--                     Lista prodotti -->
<!--                 </a> -->
<!--             </li> -->
<!--             <li> -->
<!--                 <a href="<?php echo base_url(); ?>carichi"> -->
<!--                     Lista carichi -->
<!--                 </a> -->
<!--             </li> -->
<!--         </ul> -->
<!--     </li> -->

<!--     <li class="last "> -->
<!--         <a href="<?php echo base_url(); ?>fornitori"> -->
<!--             <i class="icon-notebook"></i> -->
<!--             <span class="title">Gestione Fornitori</span> -->
<!--         </a> -->
<!--     </li> -->

    <li class="last ">
        <a href="<?php echo base_url(); ?>preventivi">
            <i class="icon-credit-card"></i>
            <span class="title">Preventivi</span>
        </a>
    </li>

    <li class="last ">
        <a href="<?php echo base_url(); ?>preventivi/insert">
            <i class="icon-credit-card"></i>
            <span class="title">Nuovo preventivo</span>
        </a>
    </li>

    <li class="last ">
        <a href="<?php echo base_url(); ?>visite/sospese">
            <i class="glyphicon glyphicon-bell"></i>
            <span class="title">Appuntamenti In Sospeso</span>
        </a>
    </li>

    <li class="last ">
        <a href="javascript:;">
            <i class="icon-calendar"></i>
            <span class="title">Calendari</span>
            <span class="arrow "></span>
        </a>
        <ul class="sub-menu">
            <?php foreach ($dottori->result() as $dottore): ?>
                <li>
                    <a href="<?php echo base_url(); ?>calendario/dottore/<?php echo $dottore->id; ?>">
                        <i class="icon-graduation"></i>
                        <?php echo $dottore->nome; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php
    //DISABLED
    if (true == false):
        ?>
        <li class="last ">
            <a href="<?php echo base_url(); ?>tasks">
                <i class="icon-eyeglasses"></i>
                <span class="title">Tasks</span>
            </a>
        </li>
    <?php endif; ?>

    <!--<li class="last ">
        <a href="<?php //echo base_url();  ?>prestazionispecialistiche">
            <i class="icon-list"></i>
            <span class="title">Prestazioni Specialistiche</span>
        </a>
    </li>-->

    <!--<li class="last ">
        <a href="<?php //echo base_url(); ?>gestionericette/ricettacustom">
            <i class="icon-chemistry"></i>
            <span class="title">Ricetta Personalizzata</span>
        </a>
    </li>-->

    <li class="last ">
        <a href="<?php echo base_url(); ?>registravisita">
            <i class="icon-cloud-upload"></i>
            <span class="title">Nuovo Appuntamento</span>
        </a>
    </li>

<!--     <li class="last "> -->
<!--         <a href="<?php echo base_url(); ?>userdrive"> -->
<!--             <i class="icon-cloud-upload"></i> -->
<!--             <span class="title">Il tuo Drive</span> -->
<!--         </a> -->
<!--     </li> -->

    <li class="last ">
        <a href="<?php echo base_url(); ?>statistiche">
            <i class="icon-graph"></i>
            <span class="title">Statistiche</span>
        </a>
    </li>

    <li class="last ">
        <a href="<?php echo base_url(); ?>impostazioni">
            <i class="icon-settings"></i>
            <span class="title">Impostazioni</span>
        </a>
    </li>

</ul>
