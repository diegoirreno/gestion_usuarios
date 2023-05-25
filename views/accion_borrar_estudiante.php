<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();
$resultado = $estudianteController->delete($_GET['codigo']);
if ($resultado) {
    echo '<h1>Estudiante eliminado</h1>';
} else {
    echo '<h1>No se pudo eliminar al estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>