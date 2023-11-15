
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Clases\Producto.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Producto\dataProducts.json');

// Decodificar el contenido JSON en una estructura de datos PHP (array de objetos stdClass)
$data = json_decode($jsonData);

// Inicializar un array donde almacenaremos objetos Cliente
$productosJson = [];

foreach ($data as $item) {
    $prducto = new Producto($item->id, $item->nombre, $item->descripcion, $item->precio);
    // Agregar el objeto a la matriz
    $productosJson[] = $prducto;
}


