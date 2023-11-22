<?php
require 'arrayProducts.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
    // Obtener el id del producto que se va a borrar del post
    $idABorrar = $_POST['deleteProduct'];

    // Buscar el producto en $productosJson
    foreach ($productosJson as $key => $producto) {
        //Cuando coincida el id se borra ese registro
        if ($producto->getId() === $idABorrar) {
            unset($productosJson[$key]);
            // se actualiza productosJosn sin ese registro
            $productosJson = array_values($productosJson);
            file_put_contents('dataProducts.json', json_encode($productosJson));
            //Se vuelve a cargar la página actualizada
            header('Location: ..\..\..\productos.php');
            exit();
        }
    }
}

