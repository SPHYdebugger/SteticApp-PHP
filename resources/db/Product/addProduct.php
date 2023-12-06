<?php
include '..\headerPost.php';

include 'arrayProducts.php';
?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se hayan enviado datos
    if (isset($_POST['id']) && isset($_POST['name'])) {
        // Obtener los datos del formulario
        $id = $_POST['id'];
        $nombre = $_POST['name'];
        $descripcion = $_POST['description'];
        $precio = $_POST['price'];

        // Crear un nuevo objeto Product

        $newProduct = new Product($id,$nombre, $descripcion,$precio);

        // Agrega el nuevo objeto al array de objetos
        $productsJson[] = $newProduct;


        ?>

        <h2>Producto registrado con éxito</h2>
        <p>ID del producto: <?php echo $newProduct->getId(); ?></p>
        <p>Nombre del producto: <?php echo $newProduct->getNombre(); ?></p>
        <p>Descripción del producto: <?php echo $newProduct->getDescripcion(); ?></p>
        <p>Precio del producto: <?php echo $newProduct->getPrecio(); ?></p>


        <?php
        $tamaño = count($productsJson);

        // Guardar el array en un archivo JSON
        file_put_contents('dataProducts.json', json_encode($productsJson));
        echo "</BR>"."Número de productos en memoria: " . $tamaño;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\products.php" class="btn btn-primary my-2">Volver a productos</a>

</div>
<?php

require('../../../includes/footer.php');
?>



