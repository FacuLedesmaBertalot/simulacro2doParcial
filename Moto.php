<?php

class Moto{

    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcIncrAnual;
    private $activo;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrAnual, $activo)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcIncrAnual = $porcIncrAnual;
        $this->activo = $activo;
    }

    // Getters
    public function getCodigo() {
        return $this->codigo;
    }
    public function getCosto() {
        return $this->costo;
    }
    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }
    public function getPorcIncrAnual() {
        return $this->porcIncrAnual;
    }
    public function getActivo() {
        return $this->activo;
    }

    // Setters
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
    public function setCosto($costo) {
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setPorcIncrAnual($porcIncrAnual) {
        $this->porcIncrAnual = $porcIncrAnual;
    }
    public function setActivo($activo) {
        $this->activo = $activo;
    }


    
















    // __toString
    public function __toString()
    {
        $estado = $this->getActivo() ? "Activo" : "Dado de Baja";

        return "\nCódigo: " .$this->getCodigo(). 
        ".\nCosto: " .$this->getCosto().
        ".\nAño de Fabricación: " .$this->getAnioFabricacion().
        ".\nDescripción: " .$this->getDescripcion().
        ".\nPorcentaje de Incremento Anual: " .$this->getPorcIncrAnual().
        ".\nActivo: " .$estado.
        ".\n";

    }


}