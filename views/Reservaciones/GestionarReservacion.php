<?php
	include('/../../Enums/Estado.php');	
	include('/../../daos/ReservacionDAO.php');	
	include('/../../daos/ViajeDAO.php');
	include('/../../daos/ClienteDAO.php');
	include('/../../daos/ReservacionServicioDAO.php');	

	$reservacionDAO = new ReservacionDAO();
	$reservacion = new Reservacion();
	$rsDAO = new ReservacionServicioDAO();

	if (count($_POST) > 0){
		$reservacion->setIdcliente($_POST['cmbCliente']);
		$reservacion->setIdviaje($_POST['cmbViaje']);
		$reservacion->setEstado($_POST['cmbEstado']);
		$reservacion->setCantidadpersonas($_POST['cantidadPersonas']);

		if($_POST['txtID'] > 0){
			$reservacion->setIdreservacion($_POST['txtID']);
			$rsDAO->eliminarServicioEnReservacion($reservacion);
			$reservacionDAO->update($reservacion);		
		}else{
			$reservacion->setEstado(Estado::PENDIENTE);
			$reservacion->setIdreservacion($reservacionDAO->insert($reservacion));
			
		}	

		if(isset($_POST['chkServicios'])) {
			for($i=0; $i < count($_POST['chkServicios']); $i++) {
				$rs = new ReservacionServicio();
				$rs->setIdreservacion($reservacion->getIdreservacion());
				$rs->setIdservicio($_POST['chkServicios'][$i]);
				$rsDAO->insert($rs);
			}
		}

		header("Location:../Reservaciones/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$reservacion->setIdreservacion($_GET['id']);
		$reservacionObtenido=$reservacionDAO->getByID($reservacion)[0];
		$reservacion->setIdcliente($reservacionObtenido->idreservacion);
		$reservacion->setIdviaje($reservacionObtenido->idviaje);
		$reservacion->setCantidadpersonas($reservacionObtenido->cantidadpersonas);
		$reservacion->setEstado($reservacionObtenido->estado);
	}else if(isset($_GET['eliminarReservacion']) && $_GET['eliminarReservacion']>0){
		$reservacion->setIdreservacion($_GET['eliminarReservacion']);
		$rsDAO->eliminarServicioEnReservacion($reservacion);
		$reservacionDAO->delete($reservacion);
		header("Location:../Reservaciones/index.php");
		exit();		
	}
?>

<?php include_once('/../includes/header-main.php'); ?>
	<form id="FormularioDeReservacion" method="POST" action="">
	
	
		<div class="titleBar"><div class="title"><h2>Reservaciones</h2></div><div class="jkd"></div></div>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $reservacion->getIdreservacion() ?>"/></td>
			</tr>
			
			<tr>
				<td>Cliente:</td>
				<td>
					<select name="cmbCliente" id="cmbCliente">
						<option value="1">Hard Coded</option>

						<?php
							$clienteDAO = new ClienteDAO();
												
							$clientes = $clienteDAO->get(new Cliente());
							
							
							foreach($clientes as $cliente){
							if($cliente->idcliente != $reservacion->getIdcliente()){
								echo "<option value='$cliente->idcliente'>".$cliente->nombres.' '.$cliente->apellidos." </option>";			
							}else{
								echo "<option selected='selected' value='$cliente->idcliente'>".$cliente->nombres.' '.$cliente->apellidos."</option>";	
							}
						}
						?>
							</select>
				</td>
			</tr>
			<tr>
				<td>Cantidad de personas:</td>
				<td><input type='number' name='cantidadPersonas' required value="<?php echo $reservacion->getCantidadpersonas()?>"/></td>
			</tr>
			<tr>
				<td>Viaje:</td>
				<td>
				<select id='cmbViaje' name='cmbViaje' >
				
				
				<?php
					$viajeDAO = new ViajeDAO();
										
					$viajes = $viajeDAO->get(new Viaje());
					
					
					foreach($viajes as $viaje){
					if($viaje->idviaje != $reservacion->getIdviaje()){
						echo "<option value='$viaje->idviaje'>$viaje->descripcion</option>";			
					}else{
						echo "<option selected='selected' value='$viaje->idviaje'>$viaje->descripcion</option>";	
					}
				}
				?>
				</select>
				</td>
			</tr>
			<?php if(!empty($reservacion->getEstado())) : ?>
			<tr>
				<td>Estado:</td>
				<td>
					<select name="cmbEstado" id="cmbEstado">
						<option value="1" <?php echo $reservacion->getEstado() == 1 ?  "selected" : ""; ?> >
							PENDIENTE</option>
						<option value="0" <?php echo $reservacion->getEstado() == 0 ?  "selected" : ""; ?> >
							PAGADA</option>
						<option value="2" <?php echo $reservacion->getEstado() == 2 ?  "selected" : ""; ?> >
							CANCELADA</option>
					</select>
				</td>
			</tr>
		<?php endif;?>
		</table>

		<fieldset>
			<legend><h2>Servicios:</h2></legend>

			<table>
                 <tr>
                 	<td></td>
					<td>
                    	<table class='forse'>
						<ul id='servicios'>
							<?php
								$serviciosEnReservacion = $rsDAO->getServiciosEnReservacion($reservacion);
								foreach($serviciosEnReservacion as $servicio) {
									if($servicio->servicio == ""){}
									else{
										echo "<li>
										<tr>
											<td>$servicio->servicio</td>
											<td><input type='checkbox' checked='checked' name='chkServicios[]' value='$servicio->idservicio'/></td>
										</tr>
										</li>";
									}
								}
								$serviciosNoEnReservacion = $rsDAO->getServiciosNoEnReservacion($reservacion);
								foreach($serviciosNoEnReservacion as $servicio) {
									if($servicio->descripcion == ""){
									}else{
										echo "<li>
											<tr>
												<td>$servicio->descripcion</td>
												<td><input type='checkbox' name='chkServicios[]' value='$servicio->idservicio'/></td>
											</tr>
										</li>";
									}
								}
							?>
						</ul>
                        </table>
					</td>
				</tr>
                <tr>
                	<td></td>
                    <td>
                    	<button type="submit" class="aceptar">Aceptar</button>
                    </td>
                </tr>
                <tr>
                	<td></td>
                    <td>
                    	<a href="GestionarReservacion.php" class="link">Nuevo</a>
                    </td>
                </tr>
			</table>
		</fieldset>
		
	</form>

<?php include_once('/../includes/footer-main.php'); ?>
