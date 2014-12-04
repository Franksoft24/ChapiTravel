<!DOCTYPE HTML>
<html lang="ES-es, EN-us">
<head>
	<meta charset="utf-8">
    <meta name="description" content="this is a travel agence.">
    <meta name="keywords" content="Travel">
    <meta name="keywords" content="Viaje">
    <meta name="keywords" content="Winter travel">
    <meta name="keywords" content="Viaje de invierno">
    <meta name="keywords" content="ChapiTravel-registro">
    <title>Chapi Travel / Registro</title>
    <link rel="icon" href="../Image/Favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../Css/Reset.css">
    <link rel="stylesheet" type="text/css" href="../Css/Style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto|Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../Script/Script.js"></script>
</head>
<body>
	<nav>
    	<ul>
        	<a href="Log-in.php"><li>Acceder</li></a>
            <a href="Registro.php"><li>Registrarse</li></a>
        </ul>
    </nav>
	<header>
    	<div id="logo"><img src="../Image/LogoCT.svg" alt="logo.png" width="100%"></div>
        <div id="social">
        	<ul>
            	<a href="#"><li><img alt="facebook.svg" src="../Image/svg/facebook7.svg" width="25px"></li></a>
            	<a href="#"><li><img alt="twitter.svg" src="../Image/svg/social71.svg" width="25px"></li></a>
            </ul>
        </div>
        <h1><a href="../index.php">Chapi Travel</a></h1>
    </header>
    <nav id="menu_secundario">
    	<ul class="nav">
        	<a href="../index.php"><li>inicio</li></a>
            <a href="#"><li>acerca</li></a>
            <a href="#"><li>contacto</li></a>
            <a href="#"><li>politicas</li></a>
        </ul>
    </nav>
    <section class="formRegistro">
    	<div id="form-singup">
        	<h1>Registrarse</h1>
            <form action="personas.php" method="post">
            	<table>
                	<tr>
                    	<td>Nombre:</td>
                        <td colspan="2"><input type="text" name="nombre" id="username" placeholder="Nombre" required></td>
                    </tr>
                    <tr>
                    	<td>Primer Apellido:</td>
                        <td colspan="2"><input type="text" name="pApellido" id="pApellido" placeholder="Primer apellido" required></td>
                    </tr>
                    <tr>
                    	<td>Segundo Apellido:</td>
                        <td colspan="2"><input type="text" name="sApellido" id="sApellido" placeholder="Segundo apellido"></td>
                    </tr>
                    <tr>
                    	<td>Documento de identificación:</td>
                        <td colspan="2"><input type="text" name="DNI" id="DNI" placeholder="DNI o pasaporte" required></td>
                    </tr>
                    <tr>
                    	<td>Telefono:</td>
                        <td colspan="2"><input type="tel" name="telefono" id="telefono" placeholder="Telefono" required></td>
                    </tr>
                    <tr>
                    	<td>E-mail:</td>
                        <td colspan="2"><input type="email" name="correo" id="correo" placeholder="Correo" required></td>
                    </tr>
                    <tr>
                    	<td>Contraseña:</td>
                        <td colspan="2"><input type="password" name="password" id="password" placeholder="******" required></td>
                    </tr>
                    <tr>
                    	<td>Repetir contraseña:</td>
                        <td colspan="2"><input type="password" name="rpassword" id="rpassword" placeholder="******" required></td>
                    </tr>
                    <tr>
                    	<td></td>
                    	<td><input type="submit" value="Aceptar" class="aceptar" onFocus="verify()"></td>
                        <td><input type="reset" value="Cancelar" class="cancelar"></td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
    <footer>
    	<h6>Desarrollado por chapisoft. Con tecnología PHP, HTML5 y CSS3.</h6>
    </footer>
</body>
</html>