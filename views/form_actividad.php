<?php

    require '../models/actividad.php';
    require '../controllers/conexionDbController.php';
    require '../controllers/baseController.php';
    require '../controllers/actividadesController.php';

    use actividad\Actividad;
    use actividadController\ActividadController;

    $id = empty($_GET['id'])?'' : $_GET['id'];
    $actividad = new Actividad();

    if(!empty($id)){ 
        $codigoEstudiante = $_GET['codigo'];
        $nombreEstudiante = $_GET['nombre'];
        $apellidoEstudiante = $_GET['apellido'];
        $titulo = 'Modificar Actividad';
        $urlAction = "accion_modificar_actividad.php";
        $actividadController = new ActividadController();
        $actividad = $actividadController->readRow($id);
    }else{ 
        $codigoEstudiante = $_POST['codigo'];
        $nombreEstudiante = $_POST['nombre'];
        $apellidoEstudiante = $_POST['apellido'];
        $titulo = 'Registrar Actividad';
        $urlAction = "accion_registrar_actividad.php";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar actividad</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
        <form action="<?php echo $urlAction; ?>" method="post">
        <label>
            <span>Código: <?php echo $codigoEstudiante ?></span>
            <input type="hidden" name="codigo" value="<?php echo $codigoEstudiante ?>">
            <br>
        </label>
        <label>
            <input type="hidden" name="nombre" value="<?php echo $nombreEstudiante ?>">
            <br>
        </label>
            <input type="hidden" name="apellido" value="<?php echo $apellidoEstudiante ?>">
        <label>
            <span>Descripción: </span>
            <input  name="descripcion" style="width: 300px; height: 80px" value="<?php echo $actividad->getDescripcion(); ?>" ></input>
            <br><br>
        </label>
        <label>
            <span>Nota: </span>
            <input   name="nota" type="number" min="0" max = "5" value="<?php echo $actividad->getNota(); ?>" require>
            <br>
        </label>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <br>
        <button class="button" type="submit">Guardar</button>
        </form>
</body>

</html>