<?php
require 'arrayShops.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteShop'])) {
    // Obtener el id del tienda que se va a borrar
    $idABorrar = $_POST['deleteShop'];

    // Buscar y eliminar el producto en $productosJson
    foreach ($productosJson as $key => $producto) {
        if ($producto->getId() === $idABorrar) {
            unset($productosJson[$key]);
            $productosJson = array_values($productosJson);
            file_put_contents('dataShops.json', json_encode($productosJson));
            header('Location: ..\..\..\productos.php');
            exit();
        }
    }
}

