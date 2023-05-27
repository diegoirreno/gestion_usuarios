<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadesController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$actividad = new Actividad();
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoE($_POST['codigo']);

$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);
if($resultado){
    echo '<h1>Actividad Registrada</h1>';
}else{
    echo '<h1>No se pudo registrar la actividad</h1>';
}

?>
