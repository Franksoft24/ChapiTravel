<?php
	include('/../../daos/PersonaDAO.php');		
?>

<html>
	<head>
	</head>
	<body>
		<h2>Personas</h2>
		<a href="GestionarPersona.php" >Nuevo<a>
		<table>
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Documento</th>
					<th>Email</th>
					<th>Telefono</th>
					
					<th></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$personaDAO = new PersonaDAO();
				$persona = new Persona();
				
				$personas = $personaDAO->get($persona);
			
				
				foreach($personas as $persona){
			
				echo "<tr>
						<td style='display:none;'>$persona->PersonaID</td>
						<td>$persona->Nombre</td>
						<td>$persona->Documento</td>
						<td>$persona->Email</td>
						<td>$persona->Telefono</td>
											
						<td><a href='GestionarPersona.php?id=$persona->PersonaID'>Editar</a> - <a href='GestionarPersona.php?eliminarPersona=$persona->PersonaID'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
