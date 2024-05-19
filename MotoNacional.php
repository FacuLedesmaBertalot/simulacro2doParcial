<?php

class MotoNacional extends Moto{

    private $descuento;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrAnual, $activo, $descuento)
    {
        parent:: __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrAnual, $activo);

        $this->descuento = $descuento;
    }

    // Getter
    public function getDescuento() {
        return $this->descuento;
    }
    // Setter 
    public function setDescuento($descuento) {
        $this->descuento = $descuento;
    }


    // Método darPrecioVenta
    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $descuento = $this->getDescuento();
        $precioVenta = $precioVenta - ($precioVenta * $descuento / 100);

        return $precioVenta;
    }



    // __toString
    public function __toString()
    {
        return "\nDescuento: %" .$this->getDescuento().
        ".\n";
    }


}