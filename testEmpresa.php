<?php
include_once 'Cliente.php';
include_once 'Moto.php';
include_once 'MotoImportada.php';
include_once 'MotoNacional.php';
include_once 'Venta.php';
include_once 'Empresa.php';

$objCliente1 = new Cliente("Brisa", "Celayes", false, "DNI", 45390428);
$objCliente2 = new Cliente("Bruno", "Lima", true, "DNI", 40512542);

$objMoto11 = new MotoNacional(11, 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto12 = new MotoNacional(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto13 = new MotoNacional(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false, 0);
$objMoto14 = new MotoImportada(14, 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);


$empresa = new Empresa("Alta Gama", "Av. Argentina 123", [$objCliente1, $objCliente2], [$objMoto11, $objMoto12, $objMoto13, $objMoto14], []);
//Registro las ventas y visualizo el resultado
$precioPrimerVenta = $empresa->registrarVenta([11, 12, 13, 14], $objCliente2);
if ($precioPrimerVenta > 0) {
    echo "Venta 1: Realizada con éxito.\n";
    echo "Precio: " . $precioPrimerVenta . "\n\n";
} elseif ($precioPrimerVenta == -1) {
    echo "Venta 1: No realizada.\n";
}

$precioSegundaVenta = $empresa->registrarVenta([13, 14], $objCliente2);
if ($precioSegundaVenta > 0) {
    echo "Venta 2: Realizada con éxito.\n";
    echo "Precio: " . $precioSegundaVenta . "\n\n";
} elseif ($precioSegundaVenta == -1) {
    echo "Venta 2: No realizada.\n\n";
}

$precioTercerVenta = $empresa->registrarVenta([14, 2], $objCliente2);
if ($precioTercerVenta > 0) {
    echo "Venta 3: Realizada con éxito.\n";
    echo "Precio: " . $precioTercerVenta . "\n\n";
} elseif ($precioTercerVenta == -1) {
    echo "Venta 3: No realizada.";
}

echo "\n\n|----------------------------------------------------------------|\n\n\n";
//Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
$ventasImportadas = $empresa->informarVentasImportadas();
foreach ($ventasImportadas as $i => $venta) {
    echo "\n\n---> Venta de Moto Importada N° " . ($i+1) . ": \n";
    echo $venta;
}

//Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido
$sumaVentasNacionales = $empresa->informarSumaVentasNacionales();
echo "\n\n\nSuma Total de las ventas de Motos Nacionales: $" . $sumaVentasNacionales;
echo "\n\n|----------------------------------------------------------------|\n\n\n\n";
echo "EMPRESA:\n";
echo $empresa;
