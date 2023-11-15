
<?php
include 'Clases/Cliente.php';
include 'datos.json';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('datos.json');

// Decodificar el contenido JSON en una estructura de datos PHP (array de objetos stdClass)
$data = json_decode($jsonData);

// Inicializar un array donde almacenaremos objetos Cliente
$clientesJson = [];

foreach ($data as $item) {
    $cliente = new Cliente($item->DNI, $item->nombre, $item->email);
    // Agregar el objeto a la matriz
    $clientesJson[] = $cliente;
}

// Ahora, $clientes es un array de objetos Cliente
