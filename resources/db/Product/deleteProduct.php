<?php
require 'arrayProducts.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['deleteProduct'])) {
    // Obtener el id del producto que se va a borrar del post
    $idToDelete = $_POST['deleteProduct'];

    // Buscar el producto en $productosJson
    foreach ($productsJson as $key => $product) {
        //Cuando coincida el id se borra ese registro
        if ($product->getId() === $idToDelete) {
            unset($productsJson[$key]);
            // se actualiza productosJosn sin ese registro
            $productsJson = array_values($productsJson);
            file_put_contents('dataProducts.json', json_encode($productsJson));
            //Se vuelve a cargar la página actualizada
            header('Location: ..\..\..\products.php');
            exit();
        }
    }
}

