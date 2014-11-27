<?php
	include('/../../daos/ServicioDAO.php');		
?>

<html>
	<head>
	</head>
	<body>
		<h2>Servicios</h2>
		<a href="GestionarServicio.php" >Nuevo<a>
		<table>
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$servicioDAO = new ServicioDAO();
				$servicio = new Servicio();
				
				$servicios = $servicioDAO->get($servicio);
			
				
				foreach($servicios as $servicio){
			
				echo "<tr>
						<td style='display:none;'>$servicio->ServicioID</td>
						<td>$servicio->Nombre</td>
						<td>$servicio->Precio</td>					
						<td><a href='GestionarServicio.php?id=$servicio->ServicioID'>Editar</a> - <a href='GestionarServicio.php?eliminarServicio=$servicio->ServicioID'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
