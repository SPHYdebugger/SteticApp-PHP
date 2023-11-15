
<?php
include 'C:\Users\sanph\PhpstormProjects\Stetic100\Clases\Cliente.php';

// Leer el contenido del archivo JSON
$jsonData = file_get_contents('C:\Users\sanph\PhpstormProjects\Stetic100\resources\db\Cliente\datosClientes.json');

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
