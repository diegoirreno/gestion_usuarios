<?php

    require 'models/estudiante.php';
    require 'models/actividad.php';
    require 'controllers/conexionDbController.php';
    require 'controllers/baseController.php';
    require 'controllers/actividadesController.php';

    use estudiante\Estudiante;
    use actividad\Actividad;
    use actividadController\ActividadController;

    $code = $_GET['codigo'];
    $name = $_GET['nombre'];
    $apell = $_GET['apellido'];
    
    $actividadController = new ActividadController();
    $actividades = $actividadController->read($code);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actividades</title>
    <link rel="stylesheet" href="views/css/estilos.css">
</head>

<body>
    
</body>

    <main>
            <h1>Actividades</h1>

            <?php
            
            echo '<h3>Estudiante: ' . $name . '</h3>';
            echo '<h3>Código: ' . $code . '</h3>';
            
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
                        echo '      <a href="views/form_actividad.php?id=' . $actividad->getId() . ' &codigo=' . $code . '&nombre=' . $name . '&apellido=' . $apell . '">Modificar</a>';
                        echo '      <a href="views/accion_borrar_actividad.php?id=' . $actividad->getId() . '&codigo=' . $code . '&nombre=' . $name. '&apellido=' . $apell . '">Eliminar</a>';
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
            echo '<input type="hidden" name="codigo" value="' . $code . '">';
            echo '<input type="hidden" name="nombre" value="' . $name . '">';
            echo '<input type="hidden" name="apellido" value="' . $apell . '">';
            echo '<button type="submit">Agregar actividad</button>';
            echo '</form>';

            ?>

            <br>
            <a href="index.php">Volver</a>
        </main>

</html>