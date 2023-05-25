<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadesController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoE($_POST['codigoEstudiante']);

$actividadController = new ActividadController();
$resultado = $actividadController->update($actividad->getId(), $actividad);
if ($resultado) {
    echo '<h1>Actividad modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la actividad</h1>';
}
?>
<br>
<a href="../actividades.php">Volver al inicio</a>