
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Clases\Cliente.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Cliente\datosClientes.json');

// Decodificar el contenido JSON en un array de datos PHP
$data = json_decode($jsonData);

// Iniciar un array donde almacenaremos objetos Cliente
$clientesJson = [];

foreach ($data as $item) {
    $cliente = new Cliente($item->DNI, $item->nombre, $item->email);
    // LLenamos el array con los datos JSON
    $clientesJson[] = $cliente;
}

