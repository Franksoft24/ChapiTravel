<?php
$m = "";
if(count($_POST) > 0){
    if(isset($_POST['correo']) && $_POST['correo'] == "test@gmail.com"){
        header('Location: /../chapitravel/views/Viajes/');
    }else{
        $m = "Contraseña / Email inválido";
    }
}

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="description" content="this is a travel agence.">
    <meta name="keywords" content="Travel">
    <meta name="keywords" content="Viaje">
    <meta name="keywords" content="Winter travel">
    <meta name="keywords" content="Viaje de invierno">
    <meta name="keywords" content="ChapiTravel-registro">
    <title>Chapi Travel / log-in</title>
    <link rel="icon" href="../Image/Favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../Css/Reset.css">
    <link rel="stylesheet" type="text/css" href="../Css/Style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto|Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../Script/Script.js"></script>
</head>
<body>
	<section class="log-in">
    	<div id="title">
        	<h1>Log-in</h1>
        </div>
        <div id="formLI"><center>
        	<form method="post" action="">
            	<table>
                	<tr>
                    	<td colspan="2"><input type="email" name="correo" placeholder="Correo" required></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><input type="password" name="password" placeholder="********" required></td>
                    </tr>
                    <tr>
                    	<td width="50%"></td>
                        <td><input type="submit" value="Acceder" class="aceptar"></td>
                    </tr>
                    <tr>
                        <td style="color:black;"><?php echo $m;?></td>
                    </tr>
                </table>
            </form></center>
        </div>
        <div id="links">
        	<ul>
            	<a href="Registro.php"><li>Registrarse</li></a>
                <a href="../index.php"><li>Ir a la pagina principal</li></a>
            </ul>
        </div>
    </section>
</body>
</html>