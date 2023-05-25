<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadesController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();

$actividades = $actividadController->read($codigo);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                    <th>Codigo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>' . $actividad->getCodigoE() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_actividad.php?id=' . $actividad->getId() . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_actividad.php?id=' . $actividad->getId() . '">Borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <br>
        <a href="views/form_actividad.php">Registrar Actividad</a>
    </main>
</body>

</html>