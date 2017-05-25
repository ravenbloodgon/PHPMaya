<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>COCEM - ORGANIZACIONES EMPRESARIALES</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="<?php echo $_layoutParams['ruta_img']; ?>favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $_layoutParams['ruta_img']; ?>apple-touch-icon-152x152.png" />
        
        <!-- Styles -->
        <link href="<?php echo $_layoutParams['ruta_css']; ?>jquery.jgrowl.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>jquery-ui.theme.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo $_layoutParams['ruta_css']; ?>style.css" rel="stylesheet" type="text/css" />


        <!-- JavaScript -->
        <script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-1.11.0.min.js"></script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>jquery-ui.js"></script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>phpmaya.js"></script>
        <script src="<?php echo $_layoutParams['ruta_js']; ?>jquery.jgrowl.js"></script>

        <script>

            $(document).ready(function(){

                // General JS starting
                ap.BASE_URL = "<?= BASE_URL ?>";

            });

        </script>

    </head>

    <body>

    <div id="divLoading"><div id="loading"></div></div>

        <div id="divMain">

            <?php 
                infoBox();
                infoBoxError(); 
            ?>

            <!-- MENU -->
            <div id="divFullContent">
                <div id="divPresentationHeader">
                    <div>

                        <!-- Main Logo -->
                        <div id="divPresentationLogo">

                            <a  class="mainLogo" href="<?= BASE_URL ?>" title="Volver a inicio"><img src="<?php echo $_layoutParams['ruta_img']; ?>mainLogo.png" /></a>

                        </div>

                    </div>
                </div>

                    <div id="divMainMenu">
                        <div id="divToggleMenu"><div id="btToggleMenu"></div></div>
                        <div id="divMenu">
                            <ul>
                                <li><a href="#">Button 1</a></li>
                                <li><a href="#">Button 2</a></li>
                                <li><a href="#">Button 3</a></li>
                            </ul>
                        </div>
                    </div>
