
<?php
include 'C:\xampp\htdocs\Stetic100\Classes\Product.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\xampp\htdocs\Stetic100\resources\db\Product\dataProducts.json');

// Decodificar el contenido JSON en un array de datos PHP
$data = json_decode($jsonData);

// Iniciar un array donde almacenaremos objetos Productos
$productsJson = [];

foreach ($data as $item) {
    $product = new Product($item->id, $item->nombre, $item->descripcion, $item->precio);
    // Agregar el objeto a productosJson
    $productsJson[] = $product;
}


