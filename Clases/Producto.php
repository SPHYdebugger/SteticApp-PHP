<?php
class Producto implements JsonSerializable {
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;

    public function __construct($id,$nombre, $descripcion, $precio) {

        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function getDescripcion()
    {
        return $this->descripcion;
    }


    public function getPrecio()
    {
        return $this->precio;
    }


    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
        ];
    }
}

?>