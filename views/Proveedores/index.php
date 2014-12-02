<?php
	include('/../../daos/ProveedorDAO.php');		
?>

<html>
	<head>
	</head>
	<body>
		<h2>Proveedores</h2>
		<a href="GestionarProveedores.php" >Nuevo<a>
		<table>
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Documento</th>
					<th>Email</th>
					<th>Telefono</th>
					
					<th></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$proveedorDAO = new ProveedorDAO();
				$proveedor = new Proveedor();
				
				$proveedores = $proveedorDAO->get($proveedor);
			
				
				foreach($proveedores as $persona){
			
				echo "<tr>
					
						<td>$persona->nombres</td>
						<td>$persona->apellidos</td>
						<td>$persona->identificacion</td>
						<td>$persona->email</td>
						<td>$persona->telefono</td>
											
						<td><a href='GestionarProveedores.php?id=$persona->idproveedor'>Editar</a> - <a href='GestionarProveedores.php?eliminarProveedor=$persona->idproveedor'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
