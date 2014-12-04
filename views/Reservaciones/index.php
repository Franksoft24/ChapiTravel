<?php
	include('/../../daos/ReservacionDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<div class="titleBar"><div class="title"><h2>Reservaciones</h2></div><div class="jkd"></div></div>
		
		<table class="crud">
        	<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Cliente</th>
					<th>Fecha viaje</th>
					<th>Descripcion</th>
					<th><a href="GestionarReservacion.php"><img src="../Image/iconos/Agregar.png" alt="Nuevo" width="46px" height="44px"></a></th>
				</tr>
            </thead>
			<?php
				$reservacionDAO = new ReservacionDAO();
				$contador= 0;
				$lista = $reservacionDAO->getReservaciones();
				
				foreach($lista as $r){
				$class;
				if(($contador%2)==0){
					$class = "oscuro";
				}else{
					$class = "claro";
				}
				echo "<tr class=$class>
						<td style='display:none;'>$r->idreservacion</td>
						<td>$r->cliente</td>
						<td>$r->fechaviaje</td>					
						<td>$r->viajedesc</td>					
						<td><a href='GestionarReservacion.php?id=$r->idreservacion' class='link'><img src='../Image/iconos/Editar.png' alt='Editar' width='26px' height='24px'></a> 
							<a href='GestionarReservacion.php?eliminarReservacion=$r->idreservacion' class='link'><img src='../Image/iconos/Eliminar-01.png' alt='Eliminar' width='26px' height='24px'></a></td>
						</tr>";			
				}
			
			?>
			

		</table>
<?php include_once('/../includes/footer-main.php'); ?>
