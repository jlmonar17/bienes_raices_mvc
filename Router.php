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

	public function post($url, $fn)
	{
		$this->rutasPOST[$url] = $fn;
	}

	public function comprobarRutas()
	{
		$rutasProtegidas = ["/admin", "/propiedades/crear", "/propiedades/actualizar", "/propiedades/eliminar", "/vendedores/crear", "/vendedores/actualizar", "/vendedores/eliminar"];
		session_start();
		$auth = $_SESSION["login"] ?? null;

		$urlActual = $_SERVER["PATH_INFO"] ?? "/";
		$metodo = $_SERVER["REQUEST_METHOD"];

		if ($metodo === "GET") {
			$fn = $this->rutasGET[$urlActual] ?? null;
		} else {
			$fn = $this->rutasPOST[$urlActual] ?? null;
		}

		if (in_array($urlActual, $rutasProtegidas) && !$auth) {
			header("Location: /");
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
