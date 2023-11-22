<?php
require 'arrayShops.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteShop'])) {
    // Obtener el id del tienda que se va a borrar del post
    $idABorrar = $_POST['deleteShop'];

    // Buscar el producto en $productosJson
    foreach ($tiendasJson as $key => $tienda) {
        if ($tienda->getId() === $idABorrar) {
            unset($tiendasJson[$key]);
            $tiendasJson = array_values($tiendasJson);
            file_put_contents('dataShops.json', json_encode($tiendasJson));
            header('Location: ../../../tiendas.php');
            exit();
        }
    }
}

