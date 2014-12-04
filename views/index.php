<!DOCTYPE HTML>
<html lang="ES-es, EN-us">
<head>
	<meta charset="utf-8">
    <meta name="description" content="this is a travel agence.">
    <meta name="keywords" content="Travel">
    <meta name="keywords" content="Viaje">
    <meta name="keywords" content="Winter travel">
    <meta name="keywords" content="Viaje de invierno">
    <meta name="keywords" content="ChapiTravel">
    <title>Chapi Travel</title>
    <link rel="icon" href="Image/Favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="Css/Reset.css">
    <link rel="stylesheet" type="text/css" href="Css/Style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto|Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="Script/Posts.js"></script>
    <script type="text/javascript" src="Script/Script.js"></script>
</head>
<body>
	<nav>
    	<ul>
        	<a href="PHP/Log-in.php"><li>Acceder</li></a>
            <a href="PHP/Registro.php"><li>Registrarse</li></a>
        </ul>
    </nav>
	<header>
    	<div id="logo"><img src="Image/LogoCT.svg" alt="logo.png" width="100%"></div>
        <div id="social">
        	<ul>
            	<a href="#"><li><img alt="facebook.svg" src="Image/svg/facebook7.svg" width="25px"></li></a>
            	<a href="#"><li><img alt="twitter.svg" src="Image/svg/social71.svg" width="25px"></li></a>
            </ul>
        </div>
        <h1><a href="index.php">Chapi Travel</a></h1>
    </header>
    <nav id="menu_secundario">
    	<ul class="nav">
        	<a href="index.php"><li>inicio</li></a>
            <a href="#"><li>acerca</li></a>
            <a href="#"><li>contacto</li></a>
            <a href="#"><li>politicas</li></a>
        </ul>
    </nav>
    <section id="intro">
    	<div class="intro">
        	<center><div class="img-intro"><center><img alt="avion.png" width="100%" src="Image/New folder/Avion.png"></center></div></center>
            <h2>Viajes internacionales</h2>
            <div class="content-intro">
            	<p>Viaje a cualquier parte del mundo con nosotros. Y aproveche de la más cómoda tarifa del mercado que le vamos a ofrecer.</p>
            </div>
        </div>
        <div class="intro">
        	<center><div class="img-intro"><center><img alt="bus-.png" width="100%" src="Image/New folder/bus-.png"></center></div></center>
            <h2>Giras y excursiones</h2>
            <div class="content-intro">
            	<p>Viaje a cualquier parte del país con nosotros. Y aproveche de la más cómoda tarifa del mercado que le vamos a ofrecer.</p>
            </div>
        </div>
        <div class="intro">
        	<center><div class="img-intro"><img alt="varco.png" width="100%" src="Image/New folder/varco.png"></div></center>
            <h2>Cruceros</h2>
            <div class="content-intro">
            	<p>Viaje a cualquier parte del mundo con nosotros. Y aproveche de la más cómoda tarifa del mercado que le vamos a ofrecer.</p>
            </div>
        </div>
    </section>
    <section id="post_area">
    	<script type="text/javascript">
        	publicaciones();
        </script>
    </section>
    <footer>
    	<h6>Desarrollado por chapisoft. Con tecnología PHP, HTML5 y CSS3.</h6>
    </footer>
</body>
</html>