<?php
	include('/../../daos/ProveedorDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<div class="titleBar"><div class="title"><h2>Proveedores</h2></div><div class="jkd"></div></div>
		<!--a href="GestionarProveedores.php" class="link" >Nuevo</a-->
		<table  class="crud">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Documento</th>
					<th>Email</th>
					<th>Telefono</th>
					
					<th><a href="GestionarProveedores.php" class="link" style="color:#fff;float:none">Nuevo</a></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$proveedorDAO = new ProveedorDAO();
				$proveedor = new Proveedor();
				
				$proveedores = $proveedorDAO->get($proveedor);
			
				$contador = 0;
				foreach($proveedores as $persona){
				$contador +=1;
				if (($contador%2)!=0)
				{
					echo "<tr class='claro'>
					
						<td>$persona->nombres</td>
						<td>$persona->apellidos</td>
						<td>$persona->identificacion</td>
						<td>$persona->email</td>
						<td>$persona->telefono</td>
											
						<td><a href='GestionarProveedores.php?id=$persona->idproveedor' class='link'>Editar</a>  <a href='GestionarProveedores.php?eliminarProveedor=$persona->idproveedor' class='link'>Eliminar</a></td>
						</tr>";	
				}else{
					echo "<tr class='oscuro'>
					
						<td>$persona->nombres</td>
						<td>$persona->apellidos</td>
						<td>$persona->identificacion</td>
						<td>$persona->email</td>
						<td>$persona->telefono</td>
											
						<td><a href='GestionarProveedores.php?id=$persona->idproveedor' class='link'>Editar</a>  <a href='GestionarProveedores.php?eliminarProveedor=$persona->idproveedor' class='link'>Eliminar</a></td>
						</tr>";
				}
						
				}
			
			?>
			
			</tbody>

		</table>
<?php include_once('/../includes/footer-main.php'); ?>