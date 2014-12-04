<?php

include('/../../entities/Proveedor.php');	
include('/../../daos/ProveedorDAO.php');
	

	$proveedorDAO = new ProveedorDAO();
	$proveedor = new Proveedor();

	if (count($_POST) > 0){
			
		$proveedor->setIdproveedor($_POST['txtID']);	
		$proveedor->setNombres($_POST['txtNombres']);			
		$proveedor->setApellidos($_POST['txtApellidos']);	
		$proveedor->setIdentificacion($_POST['txtIdentificacion']);
		$proveedor->setDireccion($_POST['txtDireccion']);
		$proveedor->setTelefono($_POST['txtTelefono']);
		$proveedor->setEmail($_POST['txtEmail']);
		$proveedor->setFecharegistro(date("Y-m-d H:i:s"));
		$proveedor->setHabilitado($_POST['cmbHabilitado']);
	
		if($_POST['txtID'] > 0){
			$proveedorDAO->update($proveedor);			
		}else{
			$proveedorDAO->insert($proveedor);
		}	
		
		 header("Location:../Proveedores/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$proveedor->setIdproveedor($_GET['id']);
		$proveedorObtenido=$proveedorDAO->getByID($proveedor)[0];
		$proveedor->setIdproveedor($proveedorObtenido->idproveedor);	
		$proveedor->setNombres($proveedorObtenido->nombres);			
		$proveedor->setApellidos($proveedorObtenido->apellidos);	
		$proveedor->setIdentificacion($proveedorObtenido->identificacion);
		$proveedor->setDireccion($proveedorObtenido->direccion);
		$proveedor->setTelefono($proveedorObtenido->telefono);
		$proveedor->setEmail($proveedorObtenido->email);
		
		$proveedor->setHabilitado($proveedorObtenido->habilitado);
	}else if(isset($_GET['eliminarProveedor']) && $_GET['eliminarProveedor']>0){
		$proveedor->setIdproveedor($_GET['eliminarProveedor']);
		$proveedorDAO->delete($proveedor);
		header("Location:../Proveedores/index.php");
		exit();		
	}
	
	
?>

<?php include_once('/../includes/header-main.php'); ?>

	<form id="FormularioDeproveedor" method="POST" action="">
	
	
		<div class="titleBar"><div class="title"><h2>Proveedores</h2></div><div class="jkd"></div></div>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $proveedor->getIdproveedor() ?>"/></td>
			</tr>
			
			<tr>
				<td>Nombres:</td>
				<td><input type='text' id='txtNombres' maxlength="50" name='txtNombres' required value="<?php echo $proveedor->getNombres()?>"/></td>
			</tr>
			<tr>
				<td>Apellidos:</td>
				<td><input type='text' id='txtApellidos'  name='txtApellidos' value="<?php echo $proveedor->getApellidos()?>"/></td>
			</tr>
			<tr>
				<td>Identificacion:</td>
				<td><input type='text' id='txtIdentificacion'  name='txtIdentificacion' value="<?php echo $proveedor->getIdentificacion()?>"/></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type='email' id='txtEmail'  name='txtEmail' value="<?php echo $proveedor->getEmail()?>"/></td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><input type='tel' id='txtTelefono'  name='txtTelefono' value="<?php echo $proveedor->getTelefono()?>"/></td>
			</tr>
			
			<tr>
				<td>Direccion:</td>
				<td><input type='text' id='txtDireccion'  name='txtDireccion' value="<?php echo $proveedor->getDireccion()?>"/></td>
			</tr>
			
			<tr>
				<td>Estado:</td>
				<td>
				<select id='cmbHabilitado' name='cmbHabilitado' >
					<option value="1" <?php if($proveedor->getHabilitado() == 1){echo "selected='selected'";} ?>>Habilitado</option>
					<option value="0" <?php if($proveedor->getHabilitado() == 0){echo "selected='selected'";} ?>>Deshabilitado</option>
				</select>
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
            		<a href="index.php" class="link">Volver Atras</a>
                </td>
            </tr>
		</table>
	</form>
<?php include_once('/../includes/footer-main.php'); ?>

