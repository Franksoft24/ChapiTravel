<?php
	include('/../../daos/ViajeDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<div class="titleBar"><div class="title"><h2>Viajes</h2></div><div class="jkd"></div></div>
		
		<table class="crud">
        	<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Descripcion</th>
					<th>Fecha partida</th>
					<th>Fecha llegada</th>
					<th>Precio</th>
					<th><a href="GestionarViajes.php"><img src="../Image/iconos/Agregar.png" alt="Nuevo" width="46px" height="44px"></a></th>
				</tr>
            </thead>
			<?php
				$viajeDAO = new ViajeDAO();
				$contador = 0;
				$listaViajes = $viajeDAO->get(new Viaje());
				
				foreach($listaViajes as $viaje){
				$contador ++;
				$class;
				if(($contador%2)==0){
					$class = "oscuro";
				}else{
					$class = "claro";
				}
				echo "<tr class=$class>
						<td style='display:none;'>$viaje->idviaje</td>
						<td>$viaje->descripcion</td>
						<td>$viaje->fechainicio</td>					
						<td>$viaje->fechafin</td>					
						<td>$viaje->precio</td>					
						<td><a href='GestionarViajes.php?id=$viaje->idviaje' class='link'><img src='../Image/iconos/Editar.png' alt='Editar' width='26px' height='24px'></a> 
							<a href='GestionarViajes.php?eliminarViaje=$viaje->idviaje' class='link'><img src='../Image/iconos/Eliminar-01.png' alt='Eliminar' width='26px' height='24px'></a></td>
						</tr>";			
				}
			
			?>
			

		</table>
<?php include_once('/../includes/footer-main.php'); ?>
