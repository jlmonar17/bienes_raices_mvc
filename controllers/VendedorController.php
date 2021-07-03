<?php

namespace Controllers;

use Model\Vendedor;
use MVC\Router;

class VendedorController
{
	public static function crear(Router $router)
	{
		$vendedor = new Vendedor();
		$errores = Vendedor::getErrores();

		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$vendedor = new Vendedor($_POST["vendedor"]);

			/* Valido los datos ingresados por el usuario */
			$errores = $vendedor->validar();

			if (empty($errores)) {
				// Guardo al vendedor en la base de datos
				$resultado = $vendedor->guardar();

				if ($resultado) {
					header("Location: /admin?resultado=1");
				}
			}
		}

		$router->render("vendedores/crear", [
			"vendedor" => $vendedor,
			"errores" => $errores
		]);
	}

	public static function actualizar()
	{
		echo "Actualizando vendedor";
	}

	public static function eliminar()
	{
		echo "Eliminando vendedor";
	}
}
