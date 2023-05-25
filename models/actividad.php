<?php

namespace actividad;

class Actividad extends Estudiante
{
    private $id;
    private $descripcion;
    private $nota;
    private Estudiante $codigo;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id = $value;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($value)
    {
        $this->descripcion = $value;
    }
    public function getNota()
    {
        return $this->nota;
    }
    public function setNota($value)
    {
        $this->nota = $value;
    }



    
}