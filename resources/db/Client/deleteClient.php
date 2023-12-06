<?php
require 'arrayClients.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteClient'])) {
    // Obtener el DNI del cliente que se va a borrar del post
    $DNIToDelete = $_POST['deleteClient'];

    // Buscar el cliente en $clientesJson que nos viene de arrayClientes
    foreach ($clientsJson as $key => $client) {
        //cuando coincida el DNI, borramos ese registro
        if ($client->getDNI() === $DNIToDelete) {
            unset($clientsJson[$key]);
            $clientsJson = array_values($clientsJson);
            //volvemos a poner los datos en el archivo dataBuys.json
            file_put_contents('dataClients.json', json_encode($clientsJson));
            //y volvemos a cargar la página de clientes actualizada
            header('Location: ..\..\..\clients.php');
            exit();
        }
    }
}

