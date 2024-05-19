<?php

class Empresa{

    private $objVentas;

    public function __construct($objVentas)
    {
        $this->objVentas = $objVentas;
    }

    // Getter
    public function getObjVentas() {
        return $this->objVentas;
    }
    // Setter
    public function setObjVentas($objVentas) {
        $this->objVentas = $objVentas;
    }


    // Método que recorre la colección de ventas realizadas por la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa
    public function informarSumaVentasNacionales() {

        $total = 0;
        $ventas = $this->getObjVentas();

        foreach ($ventas as $venta) {
            $total += $venta->retornarTotalVentaNacional();
        }
        return $total;
    }


    // Método que recorre la colección de ventas realizadas por la empresa y retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada
    public function informarVentasImportadas() {
        $ventasImportadas = [];
        $ventas = $this->getObjVentas();

        foreach ($ventas as $venta) {
            if (count($venta->retornarMotosImportadas()) > 0) {

                array_push($ventasImportadas, $venta);
            }
        }
        return $ventasImportadas;
    }

}