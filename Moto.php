<?php

class Moto{
    private $codigo;
    private $costo;
    private $anio_fabricacion;
    private $descripcion;
    private $porc_inc_anual;
    private $activa;
    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $porc_inc_anual, $activa) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anio_fabricacion = $anio_fabricacion;
        $this->descripcion = $descripcion;
        $this->porc_inc_anual = $porc_inc_anual;
        $this->activa = $activa;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getCosto()
    {
        return $this->costo;
    }
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }
    public function getAnioFabricacion()
    {
        return $this->anio_fabricacion;
    }
    public function setAnioFabricacion($anio_fabricacion)
    {
        $this->anio_fabricacion = $anio_fabricacion;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getPorcIncAnual()
    {
        return $this->porc_inc_anual;
    }
    public function setPorcIncAnual($porc_inc_anual)
    {
        $this->porc_inc_anual = $porc_inc_anual;
    }
    public function getActiva()
    {
        return $this->activa;
    }
    public function setActiva($activa)
    {
        $this->activa = $activa;
    }
    public function darPrecioVenta() {
        $moto_costo = $this->getCosto();
        $edad_moto = date('Y') - $this->getAnioFabricacion();
        $porc_incremento = $this->getPorcIncAnual();
        $precio_venta = -1;
        if ($this->getActiva()) {
            $precio_venta = $moto_costo + ($moto_costo * ($edad_moto * $porc_incremento));
        }
        return $precio_venta;
    }
    public function __toString() {
        $condicionMoto = $this->getActiva();
        $cadena =   "\nCodigo Moto: " . $this->getCodigo() . 
                    "\nCosto: " . $this->getCosto() . 
                    "\nAño de Fabricación: " . $this->getAnioFabricacion() . 
                    "\nDescripción: " . $this->getDescripcion() . 
                    "\nPorcentaje de Incremento Anual: " . $this->getPorcIncAnual() . "%" .
                    "\nActiva: ";
        if ($condicionMoto == true) {
            $cadena .= "Si";
        } else {
            $cadena .= "No";
        }
        return $cadena;
    }
}