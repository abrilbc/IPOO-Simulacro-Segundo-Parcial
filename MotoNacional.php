<?php 
class MotoNacional extends Moto{
    private $porc_desc_nacional;
    public function __construct($codigo, $costo, $anio_fabricacion, $descripcion, $porc_inc_anual, $activa, $porc_desc_nacional) {
        parent::__construct($codigo, $costo, $anio_fabricacion, $descripcion, $porc_inc_anual, $activa);
        $this->porc_desc_nacional = $porc_desc_nacional;
    }
    public function getPorcDescNacional()
    {
        return $this->porc_desc_nacional;
    }
    public function setPorcDescNacional($porc_desc_nacional)
    {
        $this->porc_desc_nacional = $porc_desc_nacional;
    }
    public function darPrecioVenta() {
        $precioVenta = parent::darPrecioVenta();

        $descuentoNacional = ($this->getPorcDescNacional() / 100) * $precioVenta;
        $precioFinal = $precioVenta - $descuentoNacional;
        return $precioFinal;
    }
    public function __toString() {
       $cadena = parent::__toString();
       $cadena .= "\nPorcentaje de Descuento Nacional: " . $this->getPorcDescNacional() . "%";
       return $cadena;
    }
}