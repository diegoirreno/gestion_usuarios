<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadesController.php';

use actividadController\ActividadController;
$id = $_GET['id'];
    $code = $_GET['codigo'];
    $name = $_GET['nombre'];
    $apell = $_GET['apellido'];

$actividadController = new ActividadController();
$resultado = $actividadController->delete($id);
if ($resultado) {
    echo '<h1>Actividad eliminada</h1>';
} else {
    echo '<h1>No se pudo eliminar la actividad</h1>';
}

echo '<a href="../actividades.php?codigo=' . $code . '&nombre=' . $name . '&apellido=' . $apell . '">Volver</a>';

?>
