<?php

    require 'models/estudiante.php';
    require 'models/actividad.php';
    require 'controllers/conexionDbController.php';
    require 'controllers/baseController.php';
    require 'controllers/actividadesController.php';

    use estudiante\Estudiante;
    use actividad\Actividad;
    use actividadController\ActividadController;

    $codigoEstudiante = $_GET['codigo'];
    $nombreEstudiante = $_GET['nombre'];
    $apellidoEstudiante = $_GET['apellido'];
    
    $actividadController = new ActividadController();
    $actividades = $actividadController->read($codigoEstudiante);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="views/css/estilos.css">
</head>

<body>
    
</body>

    <main>
            <h1>Actividades</h1>

            <?php
            
            echo '<h3>Estudiante: ' . $nombreEstudiante . '</h3>';
            echo '<h3>Código: ' . $codigoEstudiante . '</h3>';
            
            ?>

            <br>

            <table >
                <thead>
                    <tr class="table-encabezado">
                        <th>ID</th>
                        <th>Actividad</th>
                        <th>Nota</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($actividades as $actividad){
                        echo '<tr>';
                        echo '<td>' . $actividad->getId() . '</td>';
                        echo '<td>' . $actividad->getDescripcion() . '</td>';
                        echo '<td>' . $actividad->getNota() . '</td>';
                        echo '<td>';
                        echo '      <a href="views/form_actividad.php?id=' . $actividad->getId() . ' &codigo=' . $codigoEstudiante . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Modificar</a>';
                        echo '      <a href="views/accion_borrar_actividad.php?id=' . $actividad->getId() . '&codigo=' . $codigoEstudiante . '&nombre=' . $nombreEstudiante . '&apellido=' . $apellidoEstudiante . '">Eliminar</a>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
            <br>
            <?php
            ?>
            <?php

            echo '<form action="views/form_actividad.php" method="post">';
            echo '<input type="hidden" name="codigo" value="' . $codigoEstudiante . '">';
            echo '<input type="hidden" name="nombre" value="' . $nombreEstudiante . '">';
            echo '<input type="hidden" name="apellido" value="' . $apellidoEstudiante . '">';
            echo '<button type="submit">Agregar actividad</button>';
            echo '</form>';

            ?>


            <a href="index.php">Volver</a>
        </main>

</html>