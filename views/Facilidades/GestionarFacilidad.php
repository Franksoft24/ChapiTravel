<?php

include('/../../daos/DestinoDAO.php');	
include('/../../daos/FacilidadDAO.php');
include('/../../daos/TipoFacilidadDAO.php');

	$facilidadDAO = new FacilidadDAO();
	$facilidad = new Facilidad();

	if (count($_POST) > 0){
			
		$facilidad->setIdfacilidad($_POST['txtID']);	
		$facilidad->setIddestino($_POST['cmbDestino']);			
		$facilidad->setIdtipofacilidad($_POST['cmbTipoFacilidad']);	
		$facilidad->setDescripcion($_POST['txtDescripcion']);
		
		if($_POST['txtID'] > 0){
			$facilidadDAO->update($facilidad);			
		}else{
			$facilidadDAO->insert($facilidad);
		}	
		 header("Location:../Facilidades/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$facilidad->setIdfacilidad($_GET['id']);
		$facilidadObtenida=$facilidadDAO->getByID($facilidad)[0];
		$facilidad->setIdfacilidad($facilidadObtenida->idfacilidad);
		$facilidad->setIddestino($facilidadObtenida->iddestino);
		$facilidad->setIdtipofacilidad($facilidadObtenida->idtipofacilidad);
		$facilidad->setDescripcion($facilidadObtenida->descripcion);
	}else if(isset($_GET['eliminarFacilidad']) && $_GET['eliminarFacilidad']>0){
		$facilidad->setIdfacilidad($_GET['eliminarFacilidad']);
		$facilidadDAO->delete($facilidad);
		header("Location:../Facilidades/index.php");
		exit();		
	}
	
	
?>
<?php include_once('/../includes/header-main.php'); ?>

	<form id="FormularioDeFacilidad" method="POST" action="">
	
	
		<h2>Facilidad</h2>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $facilidad->getIdfacilidad() ?>"/></td>
			</tr>
			
			<tr>
				<td>Descripcion:</td>
				<td><input type='text' required id='txtDescripcion' maxlength="50" name='txtDescripcion' 
				value="<?php echo $facilidad->getDescripcion()?>"/></td>
			</tr>
			<tr>
				<td>Destino:</td>
				<td>
				<select id='cmbDestino' name='cmbDestino' >
				
				
				<?php
					$destinoDAO = new DestinoDAO();
					$destino = new Destino();
					
					$destinos = $destinoDAO->get($destino);
				
					
					foreach($destinos as $destino){
					if($destino->iddestino != $facilidad->getIddestino()){
						echo "<option value='$destino->iddestino'>$destino->nombre</option>";			
					}else{
						echo "<option selected='selected' value='$destino->iddestino'>$destino->nombre</option>";	
					}
				}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Tipo Facilidad:</td>
				<td>
				<select id='cmbTipoFacilidad' name='cmbTipoFacilidad' >
				
				
				<?php
					$tipoFacilidadDAO = new TipoFacilidadDAO();
					$tipoFacilidad = new TipoFacilidad();
					
					$tiposFacilidades = $tipoFacilidadDAO->get($tipoFacilidad);
					
					
					foreach($tiposFacilidades as $tipoFacilidad){
					if($tipoFacilidad->idtipofacilidad != $facilidad->getIdtipofacilidad()){
						echo "<option value='$tipoFacilidad->idtipofacilidad'>$tipoFacilidad->nombre</option>";			
					}else{
						echo "<option selected='selected' value='$tipoFacilidad->idtipofacilidad'>$tipoFacilidad->nombre</option>";	
					}
				}
				?>
				</select>
				</td>
			</tr>
		</table>
		<button type="submit">Aceptar</button>
		<a href="GestionarFacilidad.php" >Nuevo</a>
	</form>
<?php include_once('/../includes/footer-main.php'); ?>
