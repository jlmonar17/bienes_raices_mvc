<main class="contenedor seccion">
	<h1 data-cy="heading-contacto">Llenar el Formulario de Contacto</h1>

	<?php if ($mensaje) : ?>
		<p data-cy="alerta-envio-formulario" class="alert exito"><?php echo $mensaje; ?></p>
	<?php endif; ?>

	<form data-cy="formulario" class="formulario" method="POST">
		<fieldset>
			<legend>Información personal</legend>

			<label for="nombre">Nombre</label>
			<input data-cy="input-nombre" type="text" id="nombre" placeholder="Tu Nombre" name="contacto[nombre]" required />

			<label for="mensaje">Mensaje</label>
			<textarea data-cy="input-mensaje" id="mensaje" placeholder="Tu Mensaje" name="contacto[mensaje]" required></textarea>
		</fieldset>

		<fieldset>
			<legend>Información sobre la propiedad</legend>

			<label for="opciones">Vende o Compra</label>
			<select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
				<option value="" disabled selected>
					-- Seleccione --
				</option>
				<option value="Compra">Compra</option>
				<option value="Vende">Vende</option>
			</select>

			<label for="precio">Tu precio o presupuesto</label>
			<input data-cy="input-precio" type="number" id="precio" placeholder="Tu precio o Presupuesto" name="contacto[precio]" required />
		</fieldset>

		<fieldset>
			<legend>Información sobre la propiedad</legend>

			<p>¿Cómo desea ser contactado?</p>
			<div class="forma-contacto">
				<label for="contactar-telefono">Teléfono</label>
				<input data-cy="input-contacto" type="radio" id="contactar-telefono" value="telefono" name="contacto[contacto]" />

				<label for="contactar-email">E-mail</label>
				<input data-cy="input-contacto" type="radio" id="contactar-email" value="email" name="contacto[contacto]" />
			</div>

			<div id="metodo-contacto"></div>
		</fieldset>

		<input type="submit" class="boton-verde" value="Enviar" />
	</form>
</main>
