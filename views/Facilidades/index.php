<?php
	include('/../../daos/FacilidadDAO.php');		
?>

<?php include_once('/../includes/header-main.php'); ?>
		<div class="titleBar"><div class="title"><h2>Facilidades</h2></div><div class="jkd"></div></div>
		
		<table class="crud">
			<thead>
				<tr>
					<th style="display:none;">ID</th>
					<th>Nombre</th>
					<th>Tipo</th>
					<th>Destino</th>
					<th><a href="GestionarFacilidad.php" ><img src="../Image/iconos/Agregar.png" alt="Nuevo" width="46px" height="44px"></a></th>
				</tr>			
			</thead>
			<tbody>
			<?php
				$facilidadDAO = new FacilidadDAO();
				$facilidad = new Facilidad();
				
				$facilidades = $facilidadDAO->getDatos($facilidad);
			
				$contador = 0;
				foreach($facilidades as $facilidad){
				$contador += 1;
				$class;
				if (($contador%2)==0){
					$class = "oscuro";
				}else{
					$class = "claro";
				}
				echo "<tr class=$class>
						<td style='display:none;'>$facilidad->idfacilidad</td>
						<td>$facilidad->facilidad</td>
						<td>$facilidad->tipofacilidad</td>
						<td>$facilidad->destino</td>				
						<td><a href='GestionarFacilidad.php?id=$facilidad->idfacilidad' class='link'><img src='../Image/iconos/Editar.png' alt='Editar' width='26px' height='24px'></a>  <a href='GestionarFacilidad.php?eliminarFacilidad=$facilidad->idfacilidad' class='link'><img src='../Image/iconos/Eliminar-01.png' alt='Eliminar' width='26px' height='24px'></a></td>
						</tr>";			
				}
			
			?>
			
			</tbody>

		</table>
<?php include_once('/../includes/footer-main.php'); ?>
