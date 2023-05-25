<?php
require '../models/estudiante.php';
require '../controllers/conexionBdController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombres']);
$usuario->setApellido($_POST['apellidos']);

$estudianteController = new EstudianteController();
$resultado = $usuarioController->create($estudiante);
if ($resultado) {
    echo '<h1>Estudiante registrado</h1>';
} else {
    echo '<h1>No se pudo registrar al estudiante</h1>';
}
