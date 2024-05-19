<?php

class Venta {

    private $objMotos;

    public function __construct($objMotos)
    {
        $this->objMotos = $objMotos;
    }

    // Getter
    public function getObjMotos() {
        return $this->objMotos;
    }

    // Setter
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



    //__toString
    public function __toString()
    {
        $cadena = "";
        $motos = $this->getObjMotos();

        for($i = 0 ; $i < count($motos) ; $i++) {
            $cadena = $cadena ."Moto n° " .$i. ":\n".$motos[$i]."\n---\n";
        }
        return $cadena;
    }


}