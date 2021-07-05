<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
	public static function index(Router $router)
	{
		$propiedades = Propiedad::get(3);
		$inicio = true;

		$router->render("paginas/index", [
			"propiedades" => $propiedades,
			"inicio" => $inicio
		]);
	}

	public static function nosotros(Router $router)
	{
		$router->render("paginas/nosotros");
	}

	public static function propiedades(Router $router)
	{
		$propiedades = Propiedad::all();

		$router->render("paginas/propiedades", [
			"propiedades" => $propiedades
		]);
	}

	public static function propiedad(Router $router)
	{
		$id = validarORedireccionar("/propiedades");

		$propiedad = Propiedad::find($id);

		$router->render("paginas/propiedad", [
			"propiedad" => $propiedad
		]);
	}

	public static function blog(Router $router)
	{
		$router->render("paginas/blog");
	}

	public static function entrada(Router $router)
	{
		$router->render("paginas/entrada");
	}

	public static function contacto(Router $router)
	{
		$mensaje = null;

		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$respuestas = $_POST["contacto"];

			// Creo instancia de mail
			$mail = new PHPMailer();

			//Configurar SMTP
			$mail->isSMTP();
			$mail->Host = 'smtp.mailtrap.io';
			$mail->SMTPAuth = true;
			$mail->Port = 2525;
			$mail->Username = 'f0c2d9003df56d';
			$mail->Password = '68aef8436c331d';
			$mail->SMTPSecure = "tls";

			// Configuración conteniudo del email
			$mail->setFrom("from@example.com", "Mailer");
			$mail->addAddress("jose@example.com", "José Luis");

			//Habilitar HTML
			$mail->isHTML(true);
			$mail->CharSet = "UTF-8";
			$mail->Subject = "Nuevo contacto";

			$contenido = "<html>";
			$contenido .= "<h1>Tienes un nuevo mensaje</h1>";
			$contenido .= "<p> Nombre: " . $respuestas["nombre"] . "</p>";

			// Mostrar algunos datos en el email de forma condicional
			if ($respuestas["contacto"] === "email") {
				$contenido .= "<p>Eligió ser contactado por email.</p>";
				$contenido .= "<p> Email: " . $respuestas["email"] . "</p>";
			} else {
				$contenido .= "<p>Eligió ser contactado por teléfono.</p>";
				$contenido .= "<p> Teléfono: " . $respuestas["telefono"] . "</p>";
				$contenido .= "<p> Fecha contacto: " . $respuestas["fecha"] . " " . $respuestas["hora"] . "</p>";
			}

			$contenido .= "<p> Mensaje: " . $respuestas["mensaje"] . "</p>";
			$contenido .= "<p> Vende o Compra: " . $respuestas["tipo"] . "</p>";
			$contenido .= "<p> Precio o presupuesto: $" . $respuestas["precio"] . "</p>";
			$contenido .= "</html>";

			$mail->Body = $contenido;
			$mail->AltBody = "Texto alternativo sin html";

			if ($mail->send()) {
				$mensaje = "Correo Enviado Correctamente";
			} else {
				$mensaje = "El mensaje no se pudo enviar, contacte a soporte...";
			}
		}

		$router->render("paginas/contacto", [
			"mensaje" => $mensaje
		]);
	}
}
