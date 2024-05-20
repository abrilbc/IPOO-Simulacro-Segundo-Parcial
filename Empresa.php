<?php
class Empresa{
    private $denominacion;
    private $direccion;
    private $colClientes;
    private $colMotos;
    private $colVentasRealizadas;
    public function __construct($denominacion, $direccion, $colClientes, $colMotos, $colVentasRealizadas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentasRealizadas = $colVentasRealizadas;
    }
    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getColClientes()
    {
        return $this->colClientes;
    }
    public function setColClientes($colClientes)
    {
        $this->colClientes = $colClientes;
    }
    public function getColMotos()
    {
        return $this->colMotos;
    }
    public function setColMotos($colMotos)
    {
        $this->colMotos = $colMotos;
    }
    public function getColVentasRealizadas()
    {
        return $this->colVentasRealizadas;
    }
    public function setColVentasRealizadas($colVentasRealizadas)
    {
        $this->colVentasRealizadas = $colVentasRealizadas;
    }
    public function retornarMoto($codigoMoto) {
        $colMotos = $this->getcolMotos();
        $indice = 0;
        $motoEncontrada = null;
        $encontrada = false;
        while (!($encontrada) && $indice < count($colMotos)) {
            $motoIndividual = $colMotos[$indice];
            if ($motoIndividual->getCodigo() == $codigoMoto) {
                $encontrada = true;
                $motoEncontrada = $motoIndividual;
            }
                $indice++;
        }
        return $motoEncontrada;
    }

public function registrarVenta($colCodigosMoto, $objCliente) {
    $precioFinal = -1;
    if ($objCliente->getclienteActivo()) {
        $colVentasCopia = $this->getcolVentasRealizadas();
        $numero_id = (count($colVentasCopia) + 1);
        $nueva_venta = new Venta($numero_id, date('Y-m-d'), $objCliente, [], 0);
        foreach ($colCodigosMoto as $codigo) {
            $unaMoto = $this->retornarMoto($codigo);
            if ($unaMoto != null) {
                $nueva_venta->incorporarMoto($unaMoto);
            }
        }
        if (count($nueva_venta->getColMotos()) > 0) {
        array_push($colVentasCopia, $nueva_venta);
        $this->setcolVentasRealizadas($colVentasCopia);
        $precioFinal = $nueva_venta->getPrecioFinal();
        }
    }
    return $precioFinal;
}
    public function retornarVentaXCliente($tipoDocum, $numDocum) {
        $ventasDelCliente = [];
        $coleccionVentas = $this->getcolVentasRealizadas();
        foreach ($coleccionVentas as $venta) {
            $objetoCliente = $venta->getObjCliente();
            if ($objetoCliente->getTipoDoc() == $tipoDocum && $objetoCliente->getNroDoc() == $numDocum) {
                $ventasDelCliente[] = $venta;
            }
        }
        return $ventasDelCliente;
    }

    public function informarSumaVentasNacionales() {
        $sumaTotal = 0;
        $copiaColVentasRealizadas = $this->getcolVentasRealizadas();
        foreach ($copiaColVentasRealizadas as $venta) {
            $venta_individualNacional = $venta->retornarTotalVentaNacional();
            $sumaTotal += $venta_individualNacional;
        }
        return $sumaTotal;
    }
    public function informarVentasImportadas() {
        $copiaColVentasRealizadas = $this->getcolVentasRealizadas();
        $ventas_importadasRealizadas = [];
        foreach ($copiaColVentasRealizadas as $venta) {
            $ventaMotosImportadas = $venta->retornarMotosImportadas();
            if (count($ventaMotosImportadas) != 0) {
                $ventas_importadasRealizadas[] = $venta;
            }
        }
        return $ventas_importadasRealizadas;
    }
    public function mostrarColClientes() {
        $cadena = "";
        foreach ($this->getcolClientes() as $indice => $cliente) {
            $cadena .=  "\n---------------------------------------" .
                                "\nCliente " . ($indice+1) . ": " . $cliente ;
        }
        return $cadena;
    }
    public function mostrarColMotos() {
        $cadena = "";
        foreach ($this->getcolMotos() as $indice => $moto) {
            $cadena .=  "\n---------------------------------------" .
                                "\nMoto " . ($indice+1) . ": " . $moto;
        }
        return $cadena;
    }
    public function mostrarVentasRealizadas() {
        $cadena = "";
        foreach ($this->getcolVentasRealizadas() as $indice => $venta) {
            $mostrarEmpresa .= $venta;
        }
    }
    public function __toString() {
        $mostrarEmpresa =   "\n---------------------------------------\n" . 
                            "INFORMACIÓN EMPRESA" .
                            "\nDenominación: " . $this->getDenominacion() . 
                            "\nDireccion: " . $this->getDireccion() . 
                            "\n---------------------------------------" .
                            "\nColeccion Clientes: " . $this->mostrarColClientes() . 
                            "\n---------------------------------------" .
                            "\n\nColeccion Motos: " . $this->mostrarColMotos() .
                            "\n---------------------------------------" .
                            "\n---> Coleccion Ventas: " . $this->mostrarVentasRealizadas();
        
        return $mostrarEmpresa;
    }
}