<?php
require ("header.php");
require 'resources\db\Tienda\arrayShops.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['detailsShop'])) {
    // Obtener del post el id del tienda que se va a mostrar
    $idABuscar = $_POST['detailsShop'];

    // Buscar la tienda en $tiendasJson
    foreach ($tiendasJson as $key => $tienda) {
        if ($tienda->getId() === $idABuscar) {
            $tiendaMostrada = $tiendasJson[$key];
        }
    }
}
?>

<main role="main">

    <div class="container" style="margin-top: 150px; text-align: center;">
        <h2>DETALLES DE LA TIENDA</h2>
        <hr>
        <p>ID DE TIENDA: <?php echo $tiendaMostrada->getId(); ?></p>
        <p>CIUDAD: <?php echo $tiendaMostrada->getCiudad(); ?></p>
        <p>DIRECCIÓN: <?php echo $tiendaMostrada->getId(); ?></p>
        <p>TELEFONO: <?php echo $tiendaMostrada->getCiudad(); ?></p>
        <p>EMAIL: <?php echo $tiendaMostrada->getCiudad(); ?></p>
        <p>UBICACIÓN:</p></BR>
        <div style="margin-top: 20px;">
            <div style="margin-bottom: 20px;">
                <?php
                echo $tiendaMostrada->getMapaGoogleMaps();
                ?>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <a href="tiendas.php" class="btn btn-primary my-2">Volver a tiendas</a>
    </div>
</main>



<?php
include("footer.php");
?>


