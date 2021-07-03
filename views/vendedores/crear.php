<main class="contenedor seccion">
	<h1>Nuevo(a) Vendedor</h1>

	<a href="/admin" class="boton boton-verde">Volver</a>

	<?php foreach ($errores as $error) : ?>
		<div class="alert error">
			<?php echo $error ?>
		</div>
	<?php endforeach ?>

	<form class="formulario" method="POST" action="/vendedores/crear">
		<?php include "formulario.php"; ?>

		<input type="submit" value="Crear Vendedor" class="boton boton-verde">
	</form>
</main>
