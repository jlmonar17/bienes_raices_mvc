<main class="contenedor seccion">
	<h1>Llenar el formulario de contacto</h1>

	<?php if ($mensaje) : ?>
		<p class="alert exito"><?php echo $mensaje; ?></p>
	<?php endif; ?>

	<form class="formulario" method="POST">
		<fieldset>
			<legend>Información personal</legend>

			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" placeholder="Tu Nombre" name="contacto[nombre]" required />

			<label for="mensaje">Mensaje</label>
			<textarea id="mensaje" placeholder="Tu Mensaje" name="contacto[mensaje]" required></textarea>
		</fieldset>

		<fieldset>
			<legend>Información sobre la propiedad</legend>

			<label for="opciones">Vende o Compra</label>
			<select id="opciones" name="contacto[tipo]" required>
				<option value="" disabled selected>
					-- Seleccione --
				</option>
				<option value="Compra">Compra</option>
				<option value="Vende">Vende</option>
			</select>

			<label for="precio">Tu precio o presupuesto</label>
			<input type="number" id="precio" placeholder="Tu precio o Presupuesto" name="contacto[precio]" required />
		</fieldset>

		<fieldset>
			<legend>Información sobre la propiedad</legend>

			<p>¿Cómo desea ser contactado?</p>
			<div class="forma-contacto">
				<label for="contactar-telefono">Teléfono</label>
				<input type="radio" id="contactar-telefono" value="telefono" name="contacto[contacto]" />

				<label for="contactar-email">E-mail</label>
				<input type="radio" id="contactar-email" value="email" name="contacto[contacto]" />
			</div>

			<div id="metodo-contacto"></div>
		</fieldset>

		<input type="submit" class="boton-verde" value="Enviar" />
	</form>
</main>
