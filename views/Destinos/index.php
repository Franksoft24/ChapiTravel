<?php
	include('/../../daos/DestinoDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<div class="titleBar"><div class="title"><h2>Destinos</h2></div><div class="jkd"></div></div>
		
		<table class="crud">
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Ubicacion</th>
					<th style="display:none">Foto</th>
					<th><a href="GestionarDestino.php" ><img src="../Image/iconos/Agregar.png" alt="Nuevo" width="46px" height="44px"></a></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$destinoDAO = new DestinoDAO();
				$destino = new Destino();
				
				$destinos = $destinoDAO->get($destino);
				$contador = 0;
				foreach($destinos as $destino){
				$contador++;
				$class;
				if(($contador%2)==0){
					$class = "oscuro";
				}else{
					$class = "claro";
				}
				echo "<tr class=$class>
						<td style='display:none;'>$destino->iddestino</td>
						<td>$destino->nombre</td>
						<td>$destino->ubicacion</td>	
						<td style='display:none'></td>				
						<td><a href='GestionarDestino.php?id=$destino->iddestino' class='link'><img src='../Image/iconos/Editar.png' alt='Editar' width='26px' height='24px'></a><a href='GestionarDestino.php?eliminarDestino=$destino->iddestino' class='link'><img src='../Image/iconos/Eliminar-01.png' alt='Eliminar' width='26px' height='24px'></a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
<?php include_once('/../includes/footer-main.php'); ?>