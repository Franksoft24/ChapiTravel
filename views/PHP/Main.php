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
    <title>Chapi Travel-Main</title>
    <link rel="icon" href="../Image/Favicon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../Css/Reset.css">
    <link rel="stylesheet" type="text/css" href="../Css/Style2.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto|Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../Script/Script.js"></script>
</head>

<body>
	<!--?php
	
		session_start();
		if (isset($_SESSION['username'])){
			include("conection.php");	
			$conection = mysql_connect($host, $user, $password);
			$dbselector = mysql_select_db($db,$conection);
			if (!$conection || !$dbselector){
				echo "<script type='text/javascript'>
						alert('Error al conectar la base de datos')
						location.href='Log-in.php'	
					</script>";
			}else{
				$username = mysql_query("SELECT Nombres FROM personas WHERE DocumentoIdentidad = '$_SESSION[DocumentoIdentidad]'");
				$selected = mysql_fetch_array($personas);
				echo "<script type='text/javascript'> alert('$selected[Nombres]') </script>";
			}
		}else{
			header("location:Log-in.php");
		}
	?>
    <a href="cerrarsecion.php">Cerrar Secion</a-->
    <header>
    	<img src="../Image/LogoCT.svg" width="5%" alt="logo.png">
    	<div class="user">Chapadora</div>
    </header>
    <nav>
    	<ul>
        		<li>Viajes</li>
                <li>Clientes</li>
                <li>Servicios</li>
                <li>Recervaciones</li>
                <li>Destinos</li>
        </ul>
    </nav>
    <section class="content">
    	<p>
        	ibouibiyboun
            klsdnlsklfsf	
        </p>
    </section>
</body>
</html>