<?php

class Venta {

    private $objMotos;
    private $precioFinal;

    public function __construct($objMotos, $precioFinal)
    {
        $this->objMotos = $objMotos;
        $this->precioFinal = $precioFinal;
    }

    // Getters
    public function getObjMotos() {
        return $this->objMotos;
    }
    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    // Setters
    public function setObjMotos($objMotos) {
        $this->objMotos = $objMotos;
    }
    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }


        // Método que incorpora una moto a la venta 
        public function incorporarMoto($objMoto) {

            if ($objMoto->getActivo()) {
                $colMotosCopia = $this->getObjMotos();
                array_push($colMotosCopia, $objMoto);
                $this->setObjMotos($colMotosCopia);
    
                $precioMoto = $objMoto->darPrecioVenta();
                $precioFinalCopia = $this->getPrecioFinal();
                $precioFinalCopia = $precioFinalCopia + $precioMoto;
                $this->setPrecioFinal($precioFinalCopia);
            }
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



    //__toString
    public function __toString()
    {
        $cadena = "";
        $motos = $this->getObjMotos();

        for($i = 0 ; $i < count($motos) ; $i++) {
            $cadena = $cadena ."Moto n° " .($i+1). ":\n".$motos[$i]."\n---\n";
        }
        return $cadena;
    }


}