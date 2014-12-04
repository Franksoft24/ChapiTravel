<?php

include('/../../daos/DestinoDAO.php');	
		

	$destinoDAO = new DestinoDAO();
	$destino = new Destino();

	if (count($_POST) > 0){
		
		$destino->setIddestino($_POST['txtID']);	
		$destino->setNombre($_POST['txtNombre']);			
		$destino->setUbicacion($_POST['txtUbicacion']);	

		if($_FILES["txtFoto"]["name"] != NULL) {
			$target_dir = "../img/";
			$target_file = $target_dir . basename($_FILES["txtFoto"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
		    if(getimagesize($_FILES["txtFoto"]["tmp_name"]) !== false){
		    	if(!file_exists($target_file)){
		    		if (move_uploaded_file($_FILES["txtFoto"]["tmp_name"], $target_file)) {
			        	$destino->setFoto($target_file);
				    }
				    else {
				    	echo "Sorry, there was an error uploading your file.";
				    }
		    	}else{
		    		echo "Sorry, file already exists.";
		    	}
		    }else{
		    	echo "Sorry, there was an error uploading your file.";
		    }
		   	
		}

		if($_POST['txtID'] > 0){
			$destinoDAO->update($destino);
			header("Location:../Destinos/index.php");	
			exit();							
		}else{
			$destinoDAO->insert($destino);
			header("Location:../Destinos/index.php");	
			exit();	
		}	
		
	}else if(isset($_GET['id']) && $_GET['id'] > 0){			
		$destino->setIddestino($_GET['id']);
		$destinoObtenido = $destinoDAO->getByID($destino)[0];
		$destino->setIddestino($destinoObtenido->iddestino);
		$destino->setNombre($destinoObtenido->nombre);
		$destino->setUbicacion($destinoObtenido->ubicacion);
		$destino->setFoto($destinoObtenido->foto);
	}else if(isset($_GET['eliminarDestino']) && $_GET['eliminarDestino']>0){
		$destino->setIddestino($_GET['eliminarDestino']);
		$destinoObtenido = $destinoDAO->getByID($destino)[0];
				
		if($destinoDAO->delete($destino)){
			if(!empty($destinoObtenido->foto)){
				unlink($destinoObtenido->foto);
			}
		}
		header("Location:../Destinos/index.php");
		exit();		
	}
	
	
?>

<?php include_once('/../includes/header-main.php'); ?>
	<form id="FormularioDeDestino" method="POST" action="" enctype="multipart/form-data">
	
	
		<h2>Destino</h2>
		<table>
		
			<tr style="display:none;">
				<td>ID:</td>
				<td><input type='text' id='txtID' name='txtID' value="<?php echo $destino->getIddestino() ?>"/></td>
			</tr>
			
			<tr>
				<td>Nombre:</td>
				<td><input type='text' required id='txtNombre' maxlength="50" name='txtNombre' value="<?php echo $destino->getNombre()?>"/></td>
			</tr>
			<tr>
				<td>Ubicacion:</td>
				<td>
					<textarea name="txtUbicacion" required id="txtUbicacion" maxlength="400" cols="30" rows="10"><?php echo $destino->getUbicacion()?></textarea>
			</tr>
			<tr>
				<td>Foto:</td>
				<td>
				<input type="file" name="txtFoto" id='txtFoto'/>
				<br/>
					<?php 
						
						if($destino->getFoto() != NULL){
							echo "<img width='100px' src='{$destino->getFoto()}'/>";
						}
						
					?>
				</td>
			</tr>
		
		</table>
		<button type="submit">Aceptar</button>
		<a href="GestionarDestino.php" >Nuevo</a>
	</form>
<?php include_once('/../includes/footer-main.php'); ?>

