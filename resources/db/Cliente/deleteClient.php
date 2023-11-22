<?php
require 'arrayClientes.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteClient'])) {
    // Obtener el DNI del cliente que se va a borrar del post
    $DNIABorrar = $_POST['deleteClient'];

    // Buscar el cliente en $clientesJson que nos viene de arrayClientes
    foreach ($clientesJson as $key => $cliente) {
        //cuando coincida el DNI, borramos ese registro
        if ($cliente->getDNI() === $DNIABorrar) {
            unset($clientesJson[$key]);
            $clientesJson = array_values($clientesJson);
            //volvemos a poner los datos en el archivo datosClientes.json
            file_put_contents('datosClientes.json', json_encode($clientesJson));
            //y volvemos a cargar la página de clientes actualizada
            header('Location: ..\..\..\clientes.php');
            exit();
        }
    }
}

