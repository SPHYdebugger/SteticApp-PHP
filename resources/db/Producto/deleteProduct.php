<?php
require 'arrayProducts.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
    // Obtener el id del producto que se va a borrar
    $idABorrar = $_POST['deleteProduct'];

    // Buscar y eliminar el producto en $productosJson
    foreach ($productosJson as $key => $producto) {
        if ($producto->getId() === $idABorrar) {
            unset($productosJson[$key]);
            $productosJson = array_values($productosJson);
            file_put_contents('dataProducts.json', json_encode($productosJson));
            header('Location: ..\..\..\productos.php');
            exit();
        }
    }
}

