<?php

include('/../../daos/ServicioDAO.php');	
include('/../../daos/ProveedorDAO.php');		

	$servicioDAO = new ServicioDAO();
	$servicio = new Servicio();

	if (count($_POST) > 0){
			
		$servicio->setIdservicio($_POST['txtID']);	
		$servicio->setDescripcion($_POST['txtNombre']);			
		$servicio->setPrecio($_POST['txtPrecio']);	
		$servicio->setCodigo($_POST['txtCodigo']);
		$servicio->setIdproveedor($_POST['cmbProveedor']);
		$servicio->setHabilitado($_POST['cmbHabilitado']);
	
		if($_POST['txtID'] > 0){
			$servicioDAO->update($servicio);			
		}else{
			$servicioDAO->insert($servicio);
		}	
		 header("Location:../Servicios/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$servicio->setIdservicio($_GET['id']);
		$servicioObtenido=$servicioDAO->getByID($servicio)[0];
		$servicio->setIdservicio($_GET['id']);
		$servicio->setDescripcion($servicioObtenido->descripcion);
		$servicio->setPrecio($servicioObtenido->precio);
		$servicio->setIdproveedor($servicioObtenido->idproveedor);
		$servicio->setCodigo($servicioObtenido->codigo);
		$servicio->setHabilitado($servicioObtenido->habilitado);
	}else if(isset($_GET['eliminarServicio']) && $_GET['eliminarServicio']>0){
		$servicio->setIdservicio($_GET['eliminarServicio']);
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
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $servicio->getIdservicio() ?>"/></td>
			</tr>
			
			<tr>
				<td>Descripcion:</td>
				<td><input type='text' id='txtNombre' maxlength="50" name='txtNombre' value="<?php echo $servicio->getDescripcion()?>"/></td>
			</tr>
			<tr>
				<td>Codigo:</td>
				<td><input type='text' id='txtCodigo' maxlength="50" name='txtCodigo' value="<?php echo $servicio->getCodigo()?>"/></td>
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
					$proveedorDAO = new ProveedorDAO();
					$proveedor = new Proveedor();
					
					$proveedores = $proveedorDAO->get($proveedor);
				
					
					foreach($proveedores as $persona){
					if($persona->idproveedor != $servicio->getIdproveedor()){
						echo "<option value='$persona->idproveedor'>$persona->nombres</option>";			
					}else{
						echo "<option selected='selected' value='$persona->idproveedor'>$persona->nombres</option>";	
					}
				}
				?>
				</select>
				</td>
			</tr>
			
			<tr>
				<td>Estado:</td>
				<td>
				<select id='cmbHabilitado' name='cmbHabilitado' >
					<option value="1" <?php if($servicio->getHabilitado() == 1){echo "selected='selected'";} ?>>Habilitado</option>
					<option value="0" <?php if($servicio->getHabilitado() == 0){echo "selected='selected'";} ?>>Deshabilitado</option>
				</select>
				</td>
			</tr>
		</table>
		<button type="submit">Aceptar</button>
		<a href="Index.php" >Volver Atras<a>
	</form>
</body>

</html>

