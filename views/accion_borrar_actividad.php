<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadesController.php';

use actividadController\ActividadController;
$id = $_GET['id'];
    $codigoEstudiante = $_GET['codigo'];
    $nombreEstudiante = $_GET['nombre'];
    $apellidoEstudiante = $_GET['apellido'];

$actividadController = new ActividadController();
$resultado = $actividadController->delete($id);
if ($resultado) {
    echo '<h1>Actividad eliminada</h1>';
} else {
    echo '<h1>No se pudo eliminar la actividad</h1>';
}

?>
