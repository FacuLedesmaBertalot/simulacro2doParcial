<?php

include_once 'Cliente.php';
include_once 'Empresa.php';
include_once 'Moto.php';
include_once 'MotoImportada.php';
include_once 'MotoNacional.php';
include_once 'Venta.php';

function mostrarDatosColeccion($unaColeccion) {
    echo " --- Motos --- " . "\n";
    foreach ($unaColeccion as $unElemento) {
        echo $unElemento . "\n";
    }
    echo " --- Motos --- " . "\n";
}


$objCliente1 = new Cliente("Juan", "Aldavo", true, "DNI", 41524735);
$objCliente2 = new Cliente("Lucia", "Jerem", false, "DNI", 40587632);

$objMoto1 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, null);
$objMoto4 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);
$objEmpresa = new Empresa("Alta Gama", "Av Argenetina 123", [$objMoto1, $objMoto2, $objMoto3, $objMoto4],[$objCliente1, $objCliente2], []);




// Invoco al metodo registrarVenta
$resp = $objEmpresa->registrarVenta([11, 12, 13, 14] , $objCliente1);

if ($resp > 0) {                                                         
    echo "La venta pudo realizarse, el importe Total: $" .$resp. ".\n";
} else {
    echo "La venta no pudo realizarse.\n";
}

$resp = $objEmpresa->registrarVenta([13,14] , $objCliente2);
if ($resp > 0) {                                                         
    echo "La venta pudo realizarse, el importe Total: $" .$resp. ".\n";
} else {
    echo "La venta no pudo realizarse.\n";
};

$resp = $objEmpresa->registrarVenta([14, 2] , $objCliente2);
if ($resp > 0) {                                                         
    echo "La venta pudo realizarse, el importe Total: $" .$resp. ".\n";
} else {
    echo "La venta no pudo realizarse.\n";
}

// Punto 7: Invocar al método informarVentasImportadas() y visualizar el resultado
$ventasImportadas = $objEmpresa->informarVentasImportadas();
echo "Ventas con Motos Importadas:\n";
foreach ($ventasImportadas as $venta) {
    if ($ventasImportadas > 0) {
        echo "Ninguna.\n";
    } else {
        echo mostrarDatosColeccion($venta) . "\n";
    }

}


// Punto 8: Invocar al método informarSumaVentasNacionales() y visualizar el resultado
echo "Total Ventas Nacionales: " . $objEmpresa->informarSumaVentasNacionales() . "\n";




// Punto 9: Realizar un echo de la variable Empresa creada en 2
echo $objEmpresa;


?>

