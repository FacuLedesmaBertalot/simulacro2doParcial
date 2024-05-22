<?php

class MotoNacional extends Moto{

    private $descuento;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcIncrAnual, $activo, $descuento = 15)
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
        
        if ($precioVenta != -1) {
            $precioVenta = $precioVenta - ($precioVenta * $descuento / 100);
        }
    
        return $precioVenta;
    }



    // __toString
    public function __toString()
    {
        $cadena = parent:: __toString();
        $cadena .= "\nDescuento: %" .$this->getDescuento().
        ".\n";
        return $cadena;
    }


}