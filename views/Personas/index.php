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
						<td style='display:none;'>$persona->personaID</td>
						<td>$persona->Nombre</td>
											
						<td><a href='Gestionarpersona.php?id=$persona->personaID'>Editar</a> - <a href='Gestionarpersona.php?eliminarpersona=$persona->personaID'>Eliminar</a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
	</body>
	
</html>
