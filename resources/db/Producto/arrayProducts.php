
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Clases\Producto.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Producto\dataProducts.json');

// Decodificar el contenido JSON en un array de datos PHP
$data = json_decode($jsonData);

// Iniciar un array donde almacenaremos objetos Productos
$productosJson = [];

foreach ($data as $item) {
    $producto = new Producto($item->id, $item->nombre, $item->descripcion, $item->precio);
    // Agregar el objeto a productosJson
    $productosJson[] = $producto;
}


