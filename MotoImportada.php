<?php
class MotoImportada extends Moto{
    private $paisOrigen;
    private $importe_impuestosImportacion;
    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $porc_inc_anual, $activa, $paisOrigen, $importe_impuestosImportacion) {
        parent::__construct($codigo, $costo, $anio_fabricacion, $descripcion, $porc_inc_anual, $activa);
        $this->paisOrigen = $paisOrigen;
        $this->importe_impuestosImportacion = $importe_impuestosImportacion;
    }
    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }
    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }
    public function getImpuestosImportacion()
    {
        return $this->importe_impuestosImportacion;
    }
    public function setImpuestosImportacion($importe_impuestosImportacion)
    {
        $this->importe_impuestosImportacion = $importe_impuestosImportacion;
    }
    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();
        $copiaImpuestoImportacion = $this->getImpuestosImportacion();
        $precioFinal = $precioVenta + $copiaImpuestoImportacion;

        return $precioFinal;
    }
    public function __toString() {
        $cadena = parent::__toString();
        $cadena .=   "\nPais de Origen: " . $this->getPaisOrigen() . 
                    "\nImporte de los Impuestos de Exportación: " . $this->getImpuestosImportacion();
        return $cadena;
     }
}