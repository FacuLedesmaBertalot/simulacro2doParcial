<?php

class Venta {

    private $objCliente;
    private $objMotos;

    public function __construct($objCliente, $objMotos)
    {
        $this->objCliente = $objCliente;
        $this->objMotos = $objMotos;
    }

    // Getters
    public function getObjCliente() {
        return $this->objCliente;
    }
    public function getObjMotos() {
        return $this->objMotos;
    }

    // Setters
    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }
    public function setObjMotos($objMotos) {
        $this->objMotos = $objMotos;
    }

    
    // Método que retorna la sumatoria del precio venta de cada una de las motos nacionales vinculadas a la venta
    public function retornarTotalVentaNacional() {
        $total = 0;
        $arrayMotos = $this->getObjMotos();

        foreach ($arrayMotos as $moto) {

            if (is_a($moto, 'MotoNacional')) {
                $total += $moto->darPrecioVenta();
            } 
        }
        return $total;
    }

    // Método que retorna una colección de motos importadas vinculadas a la venta. Si la venta solo se corresponde con motos Nacionales la colección retornada debe ser vacía
    public function retornarMotosImportadas() {

        $motosImportadas = [];
        $arrayMotos = $this->getObjMotos();

        foreach ($arrayMotos as $moto) {
            if (!is_a($moto, 'MotoNacional')) {
                $motosImportadas[] = $moto;
            }
        }
        return $motosImportadas;
    }



}