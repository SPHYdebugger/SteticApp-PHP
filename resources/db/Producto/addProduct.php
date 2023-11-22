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

        // Crear un nuevo objeto Producto

        $nuevoProducto = new Producto($id,$nombre, $descripcion,$precio);

        // Agrega el nuevo objeto al array de objetos
        $productosJson[] = $nuevoProducto;


        ?>

        <h2>Producto registrado con éxito</h2>
        <p>ID del producto: <?php echo $nuevoProducto->getId(); ?></p>
        <p>Nombre del producto: <?php echo $nuevoProducto->getNombre(); ?></p>
        <p>Descripción del producto: <?php echo $nuevoProducto->getDescripcion(); ?></p>
        <p>Precio del producto: <?php echo $nuevoProducto->getPrecio(); ?></p>


        <?php
        $tamaño = count($productosJson);

        // Guardar el array en un archivo JSON
        file_put_contents('dataProducts.json', json_encode($productosJson));
        echo "</BR>"."Número de productos en memoria: " . $tamaño;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\productos.php" class="btn btn-primary my-2">Volver a productos</a>

</div>
<?php

require('..\..\..\footer.php');
?>



