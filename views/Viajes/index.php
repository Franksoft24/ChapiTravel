<?php
	include('/../../daos/ViajeDAO.php');		
?>

<html>
	<head>
	</head>
	<body>
		<h2>Servicios</h2>
		<a href="GestionarViajes.php">Nuevo<a>
		<table>
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Descripcion</th>
					<th>Fecha partida</th>
					<th>Fecha llegada</th>
					<th>Precio</th>
					<th></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$viajeDAO = new ViajeDAO();
				
				$listaViajes = $viajeDAO->get(new Viaje());
			
				foreach($listaViajes as $viaje){
			
				echo "<tr>
						<td style='display:none;'>$viaje->idviaje</td>
						<td>$viaje->descripcion</td>
						<td>$viaje->fechainicio</td>					
						<td>$viaje->fechafin</td>					
						<td>$viaje->precio</td>					
						<td><a href='GestionarViajes.php?id=$viaje->idviaje'>Editar</a> - 
							<a href='GestionarViajes.php?eliminarViaje=$viaje->idviaje'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
