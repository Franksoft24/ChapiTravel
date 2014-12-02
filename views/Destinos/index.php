<?php
	include('/../../daos/DestinoDAO.php');		
?>

<html>
	<head>
	</head>
	<body>
		<h2>Servicios</h2>
		<a href="GestionarDestino.php" >Nuevo<a>
		<table>
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Ubicacion</th>
					<th>Foto</th>
					<th></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$destinoDAO = new DestinoDAO();
				$destino = new Destino();
				
				$destinos = $destinoDAO->get($destino);
			
				foreach($destinos as $destino){
			
				echo "<tr>
						<td style='display:none;'>$destino->iddestino</td>
						<td>$destino->nombre</td>
						<td>$destino->ubicacion</td>					
						<td><a href='GestionarDestino.php?id=$destino->iddestino'>Editar</a> - <a href='GestionarDestino.php?eliminarDestino=$destino->iddestino'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
