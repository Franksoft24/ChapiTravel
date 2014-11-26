<?php
	
	include 'ViajeDAO.php';
?>

<html>
	<head>
		<title>Test page</title>
	</head>
	<body>
		<?php

			$viajeDAO = new ViajeDAO();
			$viaje = new Viajes();

			//------------------------------
			// INSERTING A TRIP
			// $viaje->setNombre("Pa la cuyaya");
			// $viaje->setCantidadPlazas(10);
			// $viaje->setFechaPartida("2014-11-25");
			// $viaje->setFechaLlegada("2014-11-29");
			
			// $viajeDAO = new ViajeDAO();
			// $result = $viajeDAO->insert($viaje);

			// echo "viajeid inserted "  . $result;

			//---------------------------------
			// GET ALL VIAJES
			// echo "<pre>";
			// 	print_r($viajeDAO->get($viaje));
			// echo "</pre>";


			//---------------------------------
			// GET VIAJE BY ID
			// $viaje->setViajeID(3);
			// echo var_dump($viajeDAO->getByID($viaje));


			//-------------------------------
			// UPDATE A TRIP
			// $viaje->setViajeID(3);
			// $viaje->setNombre("Pa la cuyaya");
			// $viaje->setCantidadPlazas(20);
			// $viaje->setFechaPartida("2014-11-25");
			// $viaje->setFechaLlegada('2014-11-30');
			
			// echo $viajeDAO->update($viaje);


			//----------------------------------
			//DELETE A TRIP
			// $viaje->setViajeID(2);
			// echo $viajeDAO->delete($viaje);







		?>
	</body>
</html>







