<main class="contenedor seccion">
	<h1>Más sobre nosotros</h1>

	<div class="iconos-nosotros">
		<div class="icono">
			<img src="build/img/icono1.svg" alt="imagen Seguridad" loading="lazy" />

			<h3>Seguridad</h3>
			<p>
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
				sed diam nonumy eirmod tempor invidunt ut labore et
				dolore magna aliquyam erat, sed diam voluptua. At vero
				eos et accusam et justo duo dolores et ea rebum. Stet
				clita kasd gubergren, no sea takimata sanctus est Lorem
				ipsum dolor sit amet.
			</p>
		</div>

		<div class="icono">
			<img src="build/img/icono2.svg" alt="imagen precio" loading="lazy" />

			<h3>Precio</h3>
			<p>
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
				sed diam nonumy eirmod tempor invidunt ut labore et
				dolore magna aliquyam erat, sed diam voluptua. At vero
				eos et accusam et justo duo dolores et ea rebum. Stet
				clita kasd gubergren, no sea takimata sanctus est Lorem
				ipsum dolor sit amet.
			</p>
		</div>

		<div class="icono">
			<img src="build/img/icono3.svg" alt="imagen a tiempo" loading="lazy" />

			<h3>A Tiempo</h3>
			<p>
				Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
				sed diam nonumy eirmod tempor invidunt ut labore et
				dolore magna aliquyam erat, sed diam voluptua. At vero
				eos et accusam et justo duo dolores et ea rebum. Stet
				clita kasd gubergren, no sea takimata sanctus est Lorem
				ipsum dolor sit amet.
			</p>
		</div>
	</div>
</main>

<section class="seccion contenedor">
	<h2>Casas y Depas en Venta</h2>

	<div class="contenedor-anuncios">
		<?php include "listado.php"; ?>
	</div>

	<div class="alinear-derecha">
		<a class="boton boton-verde" href="/propiedades">Ver Todas</a>
	</div>
</section>

<section class="imagen-contacto">
	<h2>Encuentra la casa de tus sueños</h2>
	<p>
		Llena el formulario de contacto y un asesor se pondrá en
		contacto contigo a la brevedad
	</p>
	<a href="/contacto" class="boton-amarillo">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
	<section class="blog">
		<h3>Nuestro Blog</h3>

		<article class="entrada-blog">
			<div class="imagen">
				<picture>
					<source srcset="build/img/blog1.webp" type="image/webp" />
					<source srcset="build/img/blog1.jpg" type="image/jpg" />
					<img loading="lazy" src="build/img/blog1.jpg" alt="imagen blog" />
				</picture>
			</div>

			<div class="texto-entrada">
				<a href="/entrada">
					<h4>Terraza en el techo de tu casa</h4>

					<p class="informacion-meta">
						Escrito el: <span>21/06/2021</span> por:
						<span>Admin</span>
					</p>

					<p>
						Consejos para construir una teraza en el techo
						de tu casa, con los mejores materiales y
						ahorrando dinero
					</p>
				</a>
			</div>
		</article>

		<article class="entrada-blog">
			<div class="imagen">
				<picture>
					<source srcset="build/img/blog2.webp" type="image/webp" />
					<source srcset="build/img/blog2.jpg" type="image/jpg" />
					<img loading="lazy" src="build/img/blog2.jpg" alt="imagen blog" />
				</picture>
			</div>

			<div class="texto-entrada">
				<a href="/entrada">
					<h4>Guía para la decoración de tu hogar</h4>

					<p>
						Escrito el: <span>21/06/2021</span> por:
						<span>Admin</span>
					</p>

					<p>
						Maximiza el espacio en tu hogar con esta guia,
						aprende a combinar muebles y colores para darle
						vida a tu espacio.
					</p>
				</a>
			</div>
		</article>
	</section>

	<section class="testimoniales">
		<h3>Testimoniales</h3>

		<div class="testimonial">
			<blockquote>
				El personal se comportó de una excelente forma, muy
				buena atención y la casa que me ofrecieron cumple con
				todas mis expectativas.
			</blockquote>

			<p>- José Monar</p>
		</div>
	</section>
</div>
