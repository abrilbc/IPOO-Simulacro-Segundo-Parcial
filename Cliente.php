<?php
class Cliente{
    private $nombre;
    private $apellido;
    private $clienteActivo;
    private $tipoDoc;
    private $nroDoc;
    public function __construct($nombre, $apellido, $clienteActivo, $tipoDoc, $nroDoc){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->clienteActivo = $clienteActivo;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }
    public function getclienteActivo()
    {
        return $this->clienteActivo;
    }
    public function setclienteActivo($clienteActivo): self
    {
        $this->clienteActivo = $clienteActivo;

        return $this;
    }
    public function getTipoDoc()
    {
        return $this->tipoDoc;
    }
    public function setTipoDoc($tipoDoc): self
    {
        $this->tipoDoc = $tipoDoc;

        return $this;
    }
    public function getNroDoc()
    {
        return $this->nroDoc;
    }
    public function setNroDoc($nroDoc): self
    {
        $this->nroDoc = $nroDoc;

        return $this;
    }
    public function __toString() {
        $mostrarCliente =   "\n---------------------------------------" .
                            "\nNombre y Apellido: " . $this->getNombre() . " " . $this->getApellido() .
                            "\nTipo Documento: " . $this->getTipoDoc() . 
                            "\nNúmero Documento: " . $this->getNroDoc() . 
                            "\nCliente Activo: ";
            if ($this->getclienteActivo()) {
                $mostrarCliente .= "Si";
            } else {
                $mostrarCliente .= "No";
            }
            $mostrarCliente .= "\n---------------------------------------";
            return $mostrarCliente;
    }
}