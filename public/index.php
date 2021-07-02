<?php

require_once __DIR__ . "/../includes/app.php";

use Controllers\PropiedadController;
use MVC\Router;

$router = new Router();

$router->get("/admin", [PropiedadController::class, "index"]);
$router->get("/propiedades/crear", [PropiedadController::class, "crear"]);
$router->get("/propiedades/actualizar", [PropiedadController::class, "actualizar"]);

$router->comprobarRutas();
