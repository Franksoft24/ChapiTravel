<?php
	include('/../../daos/ServicioDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<h2>Servicios</h2>
		<a href="GestionarServicio.php" >Nuevo</a>
		<table>
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Codigo</th>
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
						<td style='display:none;'>$servicio->idservicio</td>
						<td>$servicio->descripcion</td>
						<td>$servicio->precio</td>	
						<td>$servicio->codigo</td>							
						<td><a href='GestionarServicio.php?id=$servicio->idservicio'>Editar</a> - <a href='GestionarServicio.php?eliminarServicio=$servicio->idservicio'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
<?php include_once('/../includes/footer-main.php'); ?>