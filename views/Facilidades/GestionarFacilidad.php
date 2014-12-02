<?php

include('/../../daos/DestinoDAO.php');	
include('/../../daos/FacilidadDAO.php');		

	$servicioDAO = new ServicioDAO();
	$servicio = new Servicio();

	if (count($_POST) > 0){
			
		$servicio->setServicioID($_POST['txtID']);	
		$servicio->setNombre($_POST['txtNombre']);			
		$servicio->setPrecio($_POST['txtPrecio']);	
		$servicio->setProveedorID($_POST['cmbProveedor']);
		
		if($_POST['txtID'] > 0){
			$servicioDAO->update($servicio);			
		}else{
			$servicioDAO->insert($servicio);
		}	
		 header("Location:../Servicios/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$servicio->setServicioID($_GET['id']);
		$servicioObtenido=$servicioDAO->getByID($servicio)[0];
		$servicio->setServicioID($servicioObtenido->ServicioID);
		$servicio->setNombre($servicioObtenido->Nombre);
		$servicio->setPrecio($servicioObtenido->Precio);
		$servicio->setProveedorID($servicioObtenido->ProveedorID);
	}else if(isset($_GET['eliminarServicio']) && $_GET['eliminarServicio']>0){
		$servicio->setServicioID($_GET['eliminarServicio']);
		$servicioDAO->delete($servicio);
		header("Location:../Servicios/index.php");
		exit();		
	}
	
	
?>

<html>
<head>

</head>

<body>

	<form id="FormularioDeServicio" method="POST" action="">
	
	
		<h2>Servicio</h2>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $servicio->getServicioID() ?>"/></td>
			</tr>
			
			<tr>
				<td>Nombre:</td>
				<td><input type='text' id='txtNombre' maxlength="50" name='txtNombre' value="<?php echo $servicio->getNombre()?>"/></td>
			</tr>
			<tr>
				<td>Precio:</td>
				<td><input type='number' min="0" step="any" id='txtPrecio'  name='txtPrecio'value="<?php echo $servicio->getPrecio()?>"/></td>
			</tr>
			<tr>
				<td>Proveedor:</td>
				<td>
				<select id='cmbProveedor' name='cmbProveedor' >
				
				
				<?php
					$personaDAO = new PersonaDAO();
					$persona = new Persona();
					
					$personas = $personaDAO->get($persona);
				
					
					foreach($personas as $persona){
					if($persona->PersonaID != $servicio->getProveedorID()){
						echo "<option value='$persona->PersonaID'>$persona->Nombre</option>";			
					}else{
						echo "<option selected='selected' value='$persona->PersonaID'>$persona->Nombre</option>";	
					}
				}
				?>
				</select>
				</td>
			</tr>
		
		</table>
		<button type="submit">Aceptar</button>
		<a href="GestionarFacilidad.php" >Nuevo<a>
	</form>
</body>

</html>

