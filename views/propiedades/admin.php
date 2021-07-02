<main class="contenedor seccion">
	<h1>Administrador de Bienes Raices</h1>

	<?php
	if ($resultado) :
		$mensaje = mostrarNotificacion(intval($resultado));
		if ($mensaje) : ?>
			<p class="alert exito"><?php echo sanitizar($mensaje); ?></p>
	<?php endif;
	endif;    ?>

	<a href="propiedades/crear.php" class="boton boton-verde">Nueva propiedad</a>
	<a href="vendedores/crear.php" class="boton boton-amarillo">Nuevo(a) vendedor</a>

	<h2>Propiedades</h2>

	<table class="propiedades">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titulo</th>
				<th>Imagen</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($propiedades as $propiedad) : ?>
				<tr>
					<td><?php echo $propiedad->id; ?></td>
					<td><?php echo $propiedad->titulo; ?></td>
					<td>
						<img class="imagen-table" src="../imagenes/<?php echo $propiedad->imagen; ?>">
					</td>
					<td>$ <?php echo $propiedad->precio; ?></td>
					<td>
						<form method="POST" class="w-100">
							<input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
							<input type="hidden" name="tipo" value="propiedad">

							<input type="submit" class="boton-rojo-block" value="Eliminar">
						</form>
						<a href="propiedades/actualizar.php?id=<?php echo  $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</main>
