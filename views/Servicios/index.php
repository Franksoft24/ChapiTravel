<?php
	include('/../../daos/ServicioDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<div class="titleBar"><div class="title"><h2>Servicios</h2></div><div class="jkd"></div></div>
		
		<table class="crud">
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Codigo</th>
					<th><a href="GestionarServicio.php" class="link" style="color:#fff; float:none">Nuevo</a></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$servicioDAO = new ServicioDAO();
				$servicio = new Servicio();
				
				$servicios = $servicioDAO->get($servicio);
			
				$contador = 0;
				foreach($servicios as $servicio){
				$contador += 1;
				if (($contador%2)!=0)
				{
					echo "<tr class='oscuro'>
						<td style='display:none;'>$servicio->idservicio</td>
						<td>$servicio->descripcion</td>
						<td>$servicio->precio</td>	
						<td>$servicio->codigo</td>							
						<td><a href='GestionarServicio.php?id=$servicio->idservicio' class='link'>Editar</a><a href='GestionarServicio.php?eliminarServicio=$servicio->idservicio' class='link'>Eliminar</a></td>
						</tr>";
				}
				else
				{
					echo "<tr class='claro'>
						<td style='display:none;'>$servicio->idservicio</td>
						<td>$servicio->descripcion</td>
						<td>$servicio->precio</td>	
						<td>$servicio->codigo</td>							
						<td><a href='GestionarServicio.php?id=$servicio->idservicio' class='link'>Editar</a><a href='GestionarServicio.php?eliminarServicio=$servicio->idservicio' class='link'>Eliminar</a></td>
						</tr>";
				}
							
				}
			
			?>
			
			</tbody>

		</table>
<?php include_once('/../includes/footer-main.php'); ?>