<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PropiedadController
{

	public static function index(Router $router)
	{
		$propiedades = Propiedad::all();

		$router->render("propiedades/admin", [
			"propiedades" => $propiedades,
			"resultado" => null
		]);
	}

	public static function crear()
	{
		echo "Creando propiedad";
	}
	public static function actualizar()

	{
		echo "Actualizando propiedad";
	}
}
