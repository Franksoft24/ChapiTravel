<?php

include('/../../daos/Persona.php');	
include('/../../daos/PersonaDAO.php');
include('/../../Enums/Rol.php');		

	$personaDAO = new PersonaDAO();
	$persona = new Persona();

	if (count($_POST) > 0){
			
		$persona->setPersonaID($_POST['txtID']);	
		$persona->setNombre($_POST['txtNombre']);			
		$persona->setDocumento($_POST['txtDocumento']);	
		$persona->setTelefono($_POST['txtTelefono']);
		$persona->setEmail($_POST['txtEmail']);
		$persona->setRol($_POST['txtRol']);
		$persona->setCuentaPaypal($_POST['txtCuentaPaypal']);
		$persona->setClave($_POST['txtClave']);
		
		if($_POST['txtID'] > 0){
			$personaDAO->update($persona);			
		}else{
			$personaDAO->insert($persona);
		}	
		 header("Location:../Personas/index.php");	
		exit();				
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$persona->setpersonaID($_GET['id']);
		$personaObtenido=$personaDAO->getByID($persona)[0];
		$persona->setPersonaID($personaObtenido->PersonaID);	
		$persona->setNombre($personaObtenido->NombreID);			
		$persona->setDocumento($personaObtenido->Documento);	
		$persona->setTelefono($personaObtenido->Telefono);
		$persona->setEmail($personaObtenido->Email);
		$persona->setRol($personaObtenido->Rol);
		$persona->setCuentaPaypal($personaObtenido->CuentaPaypal);
		$persona->setClave($personaObtenido->Clave);
	}else if(isset($_GET['eliminarPersona']) && $_GET['eliminarPersona']>0){
		$persona->setPersonaID($_GET['eliminarPersona']);
		$personaDAO->delete($persona);
		header("Location:../Personas/index.php");
		exit();		
	}
	
	
?>

<html>
<head>

</head>

<body>

	<form id="FormularioDePersona" method="POST" action="">
	
	
		<h2>Persona</h2>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $persona->getpersonaID() ?>"/></td>
			</tr>
			
			<tr>
				<td>Nombre:</td>
				<td><input type='text' id='txtNombre' maxlength="50" name='txtNombre' required value="<?php echo $persona->getNombre()?>"/></td>
			</tr>
			<tr>
				<td>Documento:</td>
				<td><input type='text' id='txtDocumento'  name='txtDocumento' value="<?php echo $persona->getDocumento()?>"/></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type='email' id='txtEmail'  name='txtEmail' value="<?php echo $persona->getEmail()?>"/></td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><input type='tel' id='txtTelefono'  name='txtTelefono' value="<?php echo $persona->getTelefono()?>"/></td>
			</tr>
			<tr>
				<td>Rol:</td>
				<td>
				<select id='cmbRol' name='cmbRol' ">
				
				
				<?php
					
					
					$roles = Role::getConstList(true);
				
					
					while($rol = current($roles)){
					
					if($rol != $persona->getRol()){
						echo "<option value='$rol'>". key($roles) ."</option>";			
					}else{
						echo "<option selected='selected' value='$rol'>"+ key($roles) +"</option>";	
					}
				}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td>Cuenta Paypal:</td>
				<td><input type='email' id='txtCuentaPaypal'  name='txtCuentaPaypal' value="<?php echo $persona->getCuentaPaypal()?>"/></td>
			</tr>
		</table>
		<button type="submit">Aceptar</button>
		
	</form>
</body>

</html>

