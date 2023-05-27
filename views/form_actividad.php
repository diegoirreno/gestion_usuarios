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
        $code = $_GET['codigo'];
        $name= $_GET['nombre'];
        $apell = $_GET['apellido'];
        $titulo = 'Modificar Actividad';
        $urlAction = "accion_modificar_actividad.php";
        $actividadController = new ActividadController();
        $actividad = $actividadController->readRow($id);
    }else{ 
        $code = $_POST['codigo'];
        $name = $_POST['nombre'];
        $apell = $_POST['apellido'];
        $titulo = 'Registrar Actividad';
        $urlAction = "accion_registrar_actividad.php";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrar actividad</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
        <form action="<?php echo $urlAction; ?>" method="post">
        <label>
            <span>Código: <?php echo $code ?></span>
            <input type="hidden" name="codigo" value="<?php echo $code ?>">
            <br>
        </label>
        <label>
            <input type="hidden" name="nombre" value="<?php echo $name ?>">
            <br>
        </label>
            <input type="hidden" name="apellido" value="<?php echo $apell ?>">
        <label>
            <span>Descripción: </span>
            <input  name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" ></input>
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