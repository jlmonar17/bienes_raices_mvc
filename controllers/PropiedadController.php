<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic;
use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;

class PropiedadController
{
	public static function index(Router $router)
	{
		$propiedades = Propiedad::all();

		$resultado = $_GET["resultado"] ?? null;

		$router->render("propiedades/admin", [
			"propiedades" => $propiedades,
			"resultado" => $resultado
		]);
	}

	public static function crear(Router $router)
	{
		$propiedad = new Propiedad();
		$vendedores = Vendedor::all();

		$errores = Propiedad::getErrores();

		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$propiedad = new Propiedad($_POST["propiedad"]);

			/* Genero nombre único para la imagen */
			$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

			/* Resize de la imagen si es que el usuario seleccionó imagen */
			if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
				$imagen = ImageManagerStatic::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800, 600);
				$propiedad->setImagen($nombreImagen);
			}

			/* Valido los datos ingresados por el usuario */
			$errores = $propiedad->validar();

			if (empty($errores)) {
				/* Subir imagen */
				/* Crear carpeta  para subir la imagen */
				if (!is_dir(IMAGENES_URL)) {
					mkdir(IMAGENES_URL);
				}

				/* Guardo la imagen en el servidor */
				$imagen->save(IMAGENES_URL . $nombreImagen);

				// Guardo la propiedad en la base de datos
				$resultado = $propiedad->guardar();

				if ($resultado) {
					header("Location: /admin?resultado=1");
				}
			}
		}

		$router->render("propiedades/crear", [
			"propiedad" => $propiedad,
			"vendedores" => $vendedores,
			"errores" => $errores
		]);
	}

	public static function actualizar(Router $router)
	{
		$id = validarORedireccionar("/admin");

		$propiedad = Propiedad::find($id);
		$vendedores = Vendedor::all();

		$errores = Propiedad::getErrores();

		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$args = $_POST["propiedad"];

			$propiedad->sincronizar($args);

			// Validaciones
			$errores = $propiedad->validar();

			if (empty($errores)) {
				/* Subida de archivos */
				/* Crear carpeta  para subir la imagen */
				if (!is_dir(IMAGENES_URL)) {
					mkdir(IMAGENES_URL);
				}

				/* Genero nombre único para la imagen */
				$nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

				/* Resize de la imagen si es que el usuario seleccionó imagen */
				if ($_FILES["propiedad"]["tmp_name"]["imagen"]) {
					$imagen = ImageManagerStatic::make($_FILES["propiedad"]["tmp_name"]["imagen"])->fit(800, 600);
					$propiedad->setImagen($nombreImagen);

					/* Guardo la imagen en el servidor */
					$imagen->save(IMAGENES_URL . $nombreImagen);
				}

				$resultado = $propiedad->guardar();

				if ($resultado) {
					header("Location: /admin?resultado=2");
				}
			}
		}

		$router->render("propiedades/actualizar", [
			"propiedad" => $propiedad,
			"vendedores" => $vendedores,
			"errores" => $errores,
		]);
	}
}
