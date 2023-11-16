
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Clases\Tienda.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Tienda\dataShops.json');

// Decodificar el contenido JSON en una estructura de datos PHP (array de objetos stdClass)
$data = json_decode($jsonData);

// Inicializar un array donde almacenaremos objetos Cliente
$tiendasJson = [];

foreach ($data as $item) {
    $tienda = new Tienda($item->id, $item->ciudad, $item->direccion, $item->telefono,$item->email,$item->mapaGoogleMaps);
    // Agregar el objeto a la matriz
    $tiendasJson[] = $tienda;
}


