<?php

class Tienda
{
    private $id;
    private $ciudad;

    private $direccion;
    private $telefono;
    private $email;

    private $mapaGoogleMaps;

    public function __construct($id,$ciudad, $direccion, $telefono,$email, $mapaGoogleMaps)
    {
        $this->id = $id;
        $this->ciudad = $ciudad;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->mapaGoogleMaps = $mapaGoogleMaps;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function getMapaGoogleMaps()
    {
        return $this->mapaGoogleMaps;
    }
}

