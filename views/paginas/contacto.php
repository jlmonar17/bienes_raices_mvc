<main class="contenedor seccion">
	<h1>Llenar el formulario de contacto</h1>

	<form class="formulario" method="POST">
		<fieldset>
			<legend>Información personal</legend>

			<label for="nombre">Nombre</label>
			<input type="text" id="nombre" placeholder="Tu Nombre" name="contacto[nombre]" required />

			<label for="email">E-mail</label>
			<input type="email" id="email" placeholder="Tu Email" name="contacto[email]" required />

			<label for="telefono">Teléfono</label>
			<input type="tel" id="telefono" placeholder="Tu Teléfono" name="contacto[telefono]" />

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
				<input type="radio" id="contactar-telefono" name="contacto[contacto]" required />

				<label for="contactar-email">E-mail</label>
				<input type="radio" id="contactar-email" name="contacto[contacto]" required />
			</div>

			<p>Si eligió teléfono, elija la fecha y la hora</p>

			<label for="fecha">Fecha:</label>
			<input type="date" id="fecha" name="contacto[fecha]" />

			<label for="hora">Hora:</label>
			<input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]" />
		</fieldset>

		<input type="submit" class="boton-verde" value="Enviar" />
	</form>
</main>
