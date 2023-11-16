<?php
require 'arrayClientes.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteClient'])) {
    // Obtener el DNI del cliente que se va a borrar
    $DNIABorrar = $_POST['deleteClient'];

    // Buscar y eliminar el cliente en $clientesJson
    foreach ($clientesJson as $key => $cliente) {
        if ($cliente->getDNI() === $DNIABorrar) {
            unset($clientesJson[$key]);
            $clientesJson = array_values($clientesJson);
            file_put_contents('datosClientes.json', json_encode($clientesJson));
            header('Location: ..\..\..\clientes.php');
            exit();
        }
    }
}

