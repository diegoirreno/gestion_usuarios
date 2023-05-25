<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadesController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>Actividad eliminada</h1>';
} else {
    echo '<h1>No se pudo eliminar la actividad</h1>';
}
?>
<br>
<a href="../actividades.php">Volver al inicio</a>