<?php
require 'models/estudiante.php';
require 'controllers/conexionBdController.php';
require 'controllers/baseController.php';
require 'controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$estudiantes = $estudianteController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de usuarios</h1>
        <a href="views/form_estudiante.php">Registrar usuario</a>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($estudiantes as $estudiante) {
                    echo '<tr>';
                    echo '  <td>' . $estudiante->getCodigo() . '</td>';
                    echo '  <td>' . $estudiante->getNombre() . '</td>';
                    echo '  <td>' . $estudiante->getApellido() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_estudiante.php?codigo=' . $estudiante->getCodigo() . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_usuario.php?codigo=' . $estudiante->getCodigo() . '">Borrar</a>';
                    echo '      <a href="actividades.php?codigo=' . $estudiante->getCodigo() . '&nombre=' . $estudiante-> getNombre() . '&apellido=' . $estudiante-> getApellido() . '">Notas</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>