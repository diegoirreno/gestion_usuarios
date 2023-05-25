<?php

namespace actividadController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use actividad\Actividad;

class ActividadController extends BaseController
{

    function create($actividad)
    {
        $sql = 'insert into actividades ';
        $sql .= '(descripcion,nota,codigoE) values ';
        $sql .= '(';
        $sql .= $actividad->getDescripcion() . ',';
        $sql .= number_format($actividad->getNota(). 2,'.', '') . ',';
        $sql .= $actividad->getCodigoE() . ')';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function read($codigo)
    {
        $sql = 'select * from actividades';
        $sql .= 'where codigoE =' .$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoE($codigo);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' .$id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividad();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad->setId($id);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoE($registro['codigoEstudiante']);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function update($id, $actividad)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion=' . $actividad->getDescripcion() . ',';
        $sql .= 'nota="' . $actividad->getNota() . '"';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
