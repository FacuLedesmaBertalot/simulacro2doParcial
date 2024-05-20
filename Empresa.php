<?php

class Empresa
{


    // Atributos
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $objVentas;


    public function __construct($denominacion, $direccion, $colMotos, $colClientes, $objVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colMotos = $colMotos;
        $this->colClientes = $colClientes;
        $this->objVentas = $objVentas;
    }


    // Getters
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getColMotos()
    {
        return $this->colMotos;
    }
    public function getColClientes()
    {
        return $this->colClientes;
    }
    public function getObjVentas()
    {
        return $this->objVentas;
    }

    // Setters
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function setColMotos($colMotos)
    {
        $this->colMotos = $colMotos;
    }
    public function setColClientes($colClientes)
    {
        $this->colClientes = $colClientes;
    }
    public function setObjVentas($objVentas)
    {
        $this->objVentas = $objVentas;
    }


        /**
    * Metodo registrarVenta($colCodigosMoto, $objCliente) metodo que recibe por parametro una coleccion de codigos de motos, la cual es recorrida, y por cada elemento de la coleccion la instancia Venta que debe ser creada. Recordar que no todos los clientes ni todas las motos, estan disponibles para registrar una venta en un momento determinado.
    * El metodo debe setear los variables instancias de venta que corresponda y retornar el importe final de la venta.
    * 
    * @param array $colCodigosMoto
    * @param Cliente $objCliente
    * @return float
    */
    public function registrarVenta($colCodigosMoto, $objCliente) {

        $importeFinal = 0;

        if ($objCliente->getEstado() == true ) {
            $motosAVender = [];
            $copiaColVentas = $this->getObjVentas();
            $nuevaVenta = new Venta($motosAVender, 0);

            foreach ($colCodigosMoto as $unCodigoMoto) {
                $unObjMoto = $this->retornarMoto($unCodigoMoto);

                if ($unObjMoto != null) {
                    $nuevaVenta->incorporarMoto($unObjMoto);
                }
            }
            if (count($nuevaVenta->getObjMotos()) > 0) {
                array_push($copiaColVentas, $nuevaVenta);
                $this->setObjVentas($copiaColVentas);
                $importeFinal = $nuevaVenta->getPrecioFinal();
            }
        }
        return $importeFinal;
    }

        // Método que recorre la colección de motos de la Empresa y retorna la referencia al objeto Moto cuyo código coincide con el recibido por parámetro
        public function retornarMoto($codigoMoto) {
            //boolean $motoEncontrada
            //int $i
            //array $motoObtenida
            $motoObtenida = null;
            $i = 0;
            $motoEncontrada = false;
            $colMotos = $this->getColMotos();
    
            while ($i < count($colMotos) && !$motoEncontrada) {
    
                if ($colMotos[$i]->getCodigo() == $codigoMoto) {
                    $motoObtenida = $colMotos[$i];
                    $motoEncontrada = true;
                }
                $i++;
            }
            return $motoObtenida;
        }


    // Método que recorre la colección de ventas realizadas por la empresa y retorna el importe total de ventas Nacionales realizadas por la empresa
    public function informarSumaVentasNacionales()
    {

        $total = 0;
        $ventas = $this->getObjVentas();

        foreach ($ventas as $venta) {
            $total += $venta->retornarTotalVentaNacional();
        }
        return $total;
    }


    // Método que recorre la colección de ventas realizadas por la empresa y retorna una colección de ventas de motos importadas. Si en la venta al menos una de las motos es importada la venta debe ser informada
    public function informarVentasImportadas()
    {
        $ventasImportadas = [];
        $ventas = $this->getObjVentas();

        foreach ($ventas as $venta) {
            $motosImportadas = $venta->retornarMotosImportadas();
            if (!empty($motosImportadas)) {

                $ventasImportadas[] = $venta;
            }
        }
        return $ventasImportadas;
    }

        // Retornar cadena
        public function retornarCadenaDesdeColeccion($coleccion) {
            $cadena = "";
            foreach ($coleccion as $unElementoCol) {
                $cadena .= " " . $unElementoCol . "\n";
            }
            return $cadena;
        }
        // __toString
        public function __toString()
        {
            $cadena = "\nDenominacion: " .$this->getDenominacion(). "\n";
            $cadena = $cadena ."\nDireccion: " .$this->getDireccion(). "\n";
    
            $cadena = $cadena ."\n------- Coleccion de Clientes: -------\n" . $this->retornarCadenaDesdeColeccion($this->getColClientes())."\n";
            $cadena = $cadena ."\n------- Coleccion de Motos: -------\n" . $this->retornarCadenaDesdeColeccion($this->getColMotos())."\n";
            $cadena = $cadena ."\n------- Coleccion de Ventas: -------\n" . $this->retornarCadenaDesdeColeccion($this->getObjVentas())."\n";
    
            return $cadena;
        }
        
    }

