<?php

include('/../../daos/ViajeDAO.php');	
include('/../../daos/DestinoDAO.php');
include('/../../daos/RutaDAO.php');

	$viajeDAO = new ViajeDAO();
	$viaje = new Viaje();

	if (count($_POST) > 0){
		
		echo var_dump($_POST);
		//echo var_dump($_FILES["tripPicture"]);

		if($_FILES["tripPicture"]["name"] != NULL) {
			$target_dir = "../img/";
			$target_file = $target_dir . basename($_FILES["tripPicture"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			// Check if image file is a actual image or fake image
		    $check = getimagesize($_FILES["tripPicture"]["tmp_name"]);
		   if (move_uploaded_file($_FILES["tripPicture"]["tmp_name"], $target_file)) {
	        	$viaje->setFoto($target_file);
		    }
		    else {
		    	echo "Sorry, there was an error uploading your file.";
		    }
		}
		else {
			$viaje->setFoto("");
		}

		$viaje->setViajeID($_POST['txtID']);
		$viaje->setDescripcion($_POST['txtDescripcion']);
		$viaje->setFechaPartida($_POST['txtFechaPartida']);
		$viaje->setFechaLlegada($_POST['txtFechaLlegada']);
		$viaje->setPrecio($_POST['txtPrecio']);	
		
		$rutaDAO = new RutaDAO();
		if($viaje->getViajeID() > 0){
			echo "update";
			$viajeDAO->eliminarRutaDeViaje($viaje->getViajeID());
			//$rutaDAO->deleteViajesDeRuta(new Ruta(), $viaje->getViajeID());
			$viajeDAO->update($viaje);			
		}else{
			echo "insert";
			$viaje->setViajeID($viajeDAO->insert($viaje));
		}	

		if(isset($_POST['chkDestinos'])) {
			$destinos = $_POST['chkDestinos'];
			for($i=0; $i < count($_POST['chkDestinos']); $i++) {
				$ruta = new Ruta();
				$ruta->setViajeID($viaje->getViajeID());
				$ruta->setDestinoID($destinos[$i]);
				$ruta->setOrden($i);
				$rutaDAO->insert($ruta);
				//var_dump($ruta);
			}
		}

		 header("Location:../Viajes/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$viaje->setViajeID($_GET['id']);
		$viajeObtenido=$viajeDAO->getByID($viaje)[0];
		$viaje->setViajeID($viajeObtenido->idviaje);
		$viaje->setDescripcion($viajeObtenido->descripcion);
		$viaje->setFechaPartida($viajeObtenido->fechainicio);
		$viaje->setFechaLlegada($viajeObtenido->fechafin);
		$viaje->setPrecio($viajeObtenido->precio);
		$viaje->setFoto($viajeObtenido->foto);
	}else if(isset($_GET['eliminarViaje']) && $_GET['eliminarViaje']>0){
		$rutaDAO = new RutaDAO();

		$viaje->setViajeID($_GET['eliminarViaje']);
		//$rutaDAO->deleteViajesDeRuta(new Ruta(), $viaje->getViajeID());
		$viajeDAO->eliminarRutaDeViaje($viaje->getViajeID());
		$viajeDAO->delete($viaje);
		header("Location:../Viajes/index.php");
		exit();		
	}
	
	
?>

	<script type="text/javascript" src="Sortable.js"></script>
	<style>
		#destinos li * {
			cursor: move;
		}		

		#destinos li input {
			cursor: pointer;
		}
	</style>
<?php include_once('/../includes/header-main.php'); ?>
	<form id="FormularioDeViaje" method="POST" action="" enctype="multipart/form-data">
	
	
		<div class="titleBar"><div class="title"><h2>Viajes</h2></div><div class="jkd"></div></div>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $viaje->getViajeID() ?>"/></td>
			</tr>
			
			<tr>
				<td>Descripcion:</td>
				<td><input type='text' id='txtDescripcion' maxlength="50" name='txtDescripcion' required value="<?php echo $viaje->getDescripcion()?>"/></td>
			</tr>
			<tr>
				<td>Fecha partida:</td>
				<td><input type='date' id='txtFechaPartida' placeholder="yyyy-mm-dd" name='txtFechaPartida' required value="<?php echo $viaje->getFechaPartida()?>"/></td>
			</tr>
			<tr>
				<td>Fecha llegada:</td>
				<td><input type='date' id='txtFechaLlegada' name='txtFechaLlegada' placeholder="yyyy-mm-dd" required value="<?php echo $viaje->getFechaLlegada()?>"/></td>
			</tr>
			<tr>
				<td>Precio:</td>
				<td><input type='number' min="0" step="any" id='txtPrecio' name='txtPrecio' required value="<?php echo $viaje->getPrecio()?>"/></td>
			</tr>
			<tr>
				<td>Imagen:</td>
				<td>
					<input type="file" name="tripPicture" id="tripPicture"/>
					<br/>
					<?php 
						
						if($viaje->getFoto() != NULL){
							echo $viaje->getFoto();
							echo "<img width='100px' src='{$viaje->getFoto()}'/>";
						}
						
					?>
				</td>
			</tr>
		</table>

		<fieldset>
			<legend><h2>Ruta:</h2></legend>

			<table>
				<tr>
					<td>
						Destino:
					</td>
                    <td></td>
                 </tr>
                 <tr>
                 	<td></td>
					<td>
                    	<table class='forse'>
						<ul id='destinos'>
							<?php
								$viajeDAO = new ViajeDAO();
								$viajeId = $viaje->getViajeID();

								$destinosDelViaje = $viajeDAO->obtenerDestinosEnViaje($viajeId);
								foreach($destinosDelViaje as $destino) {
										echo "<li>
										<tr>
											<td>$destino->nombre</td>
											<td><input type='checkbox' checked='checked' name='chkDestinos[]' value='$destino->iddestino'/></td>
										</tr>
										</li>";
								}
								$destinosFaltantes = $viajeDAO->obtenerDestinosFueraDeViaje($viajeId);
								foreach($destinosFaltantes as $destino) {
									
										echo "<li>
											<tr>
												<td>$destino->nombre</td>
												<td><input type='checkbox' name='chkDestinos[]' value='$destino->iddestino'/></td>
											</tr>
										</li>";
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
                    	<a href="GestionarViajes.php" class="link">Nuevo</a>
                    </td>
                </tr>
			</table>
		</fieldset>
		
	</form>

<script type="text/javascript">
	document.onreadystatechange = function() {
		var lista = document.getElementById('destinos');
		new Sortable(lista);
	};
</script>

<?php include_once('/../includes/footer-main.php'); ?>
