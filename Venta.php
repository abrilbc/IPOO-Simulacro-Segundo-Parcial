<?php
class Venta{
    private $numero;
    private $fecha;
    private $objCliente;
    private $colMotos;
    private $precioFinal;
    public function __construct($numero, $fecha, $objCliente, $colMotos, $precioFinal){
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = $precioFinal;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    public function getObjCliente()
    {
        return $this->objCliente;
    }
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }
    public function getColMotos()
    {
        return $this->colMotos;
    }
    public function setColMotos($colMotos)
    {
        $this->colMotos = $colMotos;
    }
    public function getPrecioFinal()
    {
        return $this->precioFinal;
    }
    public function setPrecioFinal($precioFinal)
    {
        $this->precioFinal = $precioFinal;
    }
    public function buscarMoto($objMoto) {
        $coleccionDeMotos = $this->getColMotos();
        $enColeccion = false;
        $i = 0;
        while (!($enColeccion) && $i < count($this->getColMotos())) {
            if ($objMoto->getCodigo() == $coleccionDeMotos[$i]->getCodigo()) {
                $enColeccion = true;
            }
        }
        return $enColeccion;
    }
    public function incorporarMoto($objMoto) {
        if ($objMoto !== null && $objMoto->getActiva()) {
            $colMotosCopia = $this->getColMotos();
            array_push($colMotosCopia, $objMoto);
            $this->setColMotos($colMotosCopia);
            //Setteo del precio de Venta de la moto
            $precioMoto = $objMoto->darPrecioVenta();
            $precioFinal = $this->getPrecioFinal();
            $precioFinal = $precioFinal + $precioMoto;
            $this->setPrecioFinal($precioFinal);
        }
    }
    public function retornarTotalVentaNacional() {
        $sumatoriaPrecioVenta = 0;
        $copiaColMotos = $this->getColMotos();
            foreach ($copiaColMotos as $moto) {
                if (is_a($moto, 'MotoNacional')) {
                    $precioMoto = $moto->darPrecioVenta();
                    $sumatoriaPrecioVenta += $precioMoto;
                }
            }
        return $sumatoriaPrecioVenta;
    }
    public function retornarMotosImportadas() {
        $copiaColMotos = $this->getColMotos();
        $arregloMotosImportadas = [];
        foreach ($copiaColMotos as $moto) {
            if (is_a($moto, 'MotoImportada')) {
                $arregloMotosImportadas[] = $moto;
            }
        }
        return $arregloMotosImportadas;
    }
    public function mostrarColMotosVenta() {
        $cadena = "";
        foreach ($this->getColMotos() as $moto) {
            $cadena .= "\n" . $moto;
        }
        return $cadena;
    }

    public function __toString() {
        $mostrarVenta = "\n---------------------------------------" .
                        "\n--> Número de Venta: " . $this->getNumero() . 
                        "\n---------------------------------------" .
                        "\nFecha de la Venta: " . $this->getFecha() . 
                        "\nCliente: " . $this->getObjCliente() .
                        "\nMotos Compradas: " . $this->mostrarColMotosVenta() . 
                        "\nPrecio Final: $" . $this->getPrecioFinal();
        return $mostrarVenta;   
    }
}