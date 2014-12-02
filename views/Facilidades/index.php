<?php
	include('/../../daos/FacilidadDAO.php');		
?>

<html>
	<head>
	</head>
	<body>
		<h2>Facilidades</h2>
		<a href="GestionarFacilidad.php" >Nuevo<a>
		<table>
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Destino</th>
					<th></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$facilidadDAO = new FacilidadDAO();
				$facilidad = new Facilidad();
				
				$facilidades = $facilidadDAO->getDatos($facilidad);
			
				
				foreach($facilidades as $facilidad){
			
				echo "<tr>
						<td style='display:none;'>$facilidad->idfacilidad</td>
						<td>$facilidad->facilidad</td>
						<td>$facilidad->tipofacilidad</td>
						<td>$facilidad->destino</td>				
						<td><a href='GestionarFacilidad.php?id=$facilidad->idfacilidad'>Editar</a> - <a href='GestionarFacilidad.php?eliminarFacilidad=$facilidad->idfacilidad'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
