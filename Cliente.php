<?php

class Cliente{
    // Atributos
    private $tipoDoc;
    private $numDoc;

    public function __construct($tipoDoc, $numDoc)
    {
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }

    // Getters
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getNumDoc(){
        return $this->numDoc;
    }

    // Setters
    public function setTipoDoc($tipoDoc) {
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }

    //__toString
    public function __toString()
    {
        return "Tipo de Documento: " .$this->getTipoDoc(). 
        ".\nNúmero de Documento: " .$this->getNumDoc().
        ".\n";
    }
}

?>