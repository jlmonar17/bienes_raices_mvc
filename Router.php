<?php

namespace MVC;

class Router
{
	public $rutasGET = [];
	public $rutasPOST = [];

	public function get($url, $fn)
	{
		$this->rutasGET[$url] = $fn;
	}

	public function comprobarRutas()
	{
		$urlActual = $_SERVER["PATH_INFO"] ?? "/";
		$metodo = $_SERVER["REQUEST_METHOD"];

		if ($metodo === "GET") {
			$fn = $this->rutasGET[$urlActual] ?? null;
		}

		if ($fn) {
			// La URL existe y hay una función asociada
			call_user_func($fn, $this);
		} else {
			echo "Página no encontrada";
		}
	}

	/**
	 * Renderiza la vista html.
	 *
	 * @param string $view nombre/ruta de la vista a renderizar.
	 */
	public function render($view, $datos = [])
	{
		foreach ($datos as $key => $value) {
			$$key = $value;
		}

		// Inicia almacenamiento en memoria por un momento
		ob_start();
		include __DIR__ . "/views/" . $view . ".php";

		// Asigna el contenido del buffer a la variable, luego limpia el buffer
		$contenido = ob_get_clean();

		// La variable $contenido estará disponible para ser usada en layout.php
		include __DIR__ . "/views/layout.php";
	}
}
