<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadesController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$id = empty($_GET['id']) ? '' : $_GET['id'];
$titulo = 'Registrar Actividad';
$urlAction = "accion_registrar_actividad.php";
$actividad = new Actividad();
if (!empty($id)) {
    $titulo = 'Modificar Actividad';
    $urlAction = "accion_modificar_actividad.php";
    $actividadController = new ActividadController();
    $actividad = $actividadController->readRow($codigo); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" value="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <br>
        <label>
            <span>Codigo:</span>
            <input type="number" name="codigoE" value="<?php echo $actividad->getCodigoE(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>


</html>