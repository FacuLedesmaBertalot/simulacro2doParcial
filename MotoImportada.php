<?php

class MotoImportada extends Moto{

    private $paisOrigen;
    private $impuestoDeImportacion;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrAnual, $activo, $paisOrigen, $impuestoDeImportacion)
    {
        parent:: __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrAnual, $activo);

        $this->paisOrigen = $paisOrigen;
        $this->impuestoDeImportacion = $impuestoDeImportacion;
    }

    // Getters
    public function getPaisOrigen() {
        return $this->paisOrigen;
    }
    public function getImpuestoDeImportacion() {
        return $this->impuestoDeImportacion;
    }

    // Setters
    public function setPaisOrigen($paisOrigen) {
        $this->paisOrigen = $paisOrigen;
    }
    public function setImpuestoDeImportacion($impuestoDeImportacion) {
        $this->impuestoDeImportacion = $impuestoDeImportacion;
    }

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        if ($precioVenta != -1) {
            $precioVenta = $precioVenta + $this->getImpuestoDeImportacion();
        }         

        return $precioVenta;
    }


    // __toString
    public function __toString()
    {
        $cadena = parent:: __toString();
        $cadena .= "\nPaís de Origen: " .$this->getPaisOrigen().
        ".\nImpuesto de Importación: " .$this->getImpuestoDeImportacion().
        ".\n";
        return $cadena;
    }

}