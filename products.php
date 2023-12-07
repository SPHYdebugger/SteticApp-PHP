<?php
require("includes/header.php");
require 'resources\db\Product\arrayProducts.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resources\db\Product\deleteProduct.php'])) {}

?>

    <main role="main" >

        <div class="container" style="margin-top: 150px">
            <?php
            if(isset($_SESSION['usuario_logado'])) { ?>
                <a href="addProduct.php" class="btn btn-primary my-2">Registrar un producto</a>
            <?php }?>
            <h2 style="text-align: center;">LISTA DE PRODUCTOS</h2>
            <table class="table container" style="margin-top: 50px">
                <div class="container d-flex justify-content-center">
                    <tr>
                        <th>ID PRODUCTO</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th>PRECIO</th>
                        <?php if(isset($_SESSION['usuario_logado'])) { ?>
                            <th>BORRAR</th>
                        <?php } ?>
                    </tr>

                    <?php
                    $index = 0;
                    foreach ($productsJson as $product) : ?>
                        <tr>
                            <td><?php echo $product->getId(); ?></td>
                            <td><?php echo $product->getNombre(); ?></td>
                            <td><?php echo $product->getDescripcion(); ?></td>
                            <td><?php echo $product->getPrecio(); ?> €</td>
                            <?php
                            if (isset($_SESSION['usuario_logado'])) { ?>
                                <td>
                                    <?php
                                    switch ($index % 2) {
                                        case 0: // Si el índice es par
                                            ?>
                                            <form method="post" action="resources/db/Product/deleteProduct.php">
                                                <input type="hidden" name="deleteProduct" value="<?php echo $product->getId(); ?>">
                                                <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                                            </form>
                                            <?php
                                            break;
                                        case 1: // Si el índice es impar
                                            ?>
                                            <form method="post" action="resources/db/Product/deleteProduct.php">
                                                <input type="hidden" name="deleteProduct" value="<?php echo $product->getId(); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm my-2">BORRAR</button>
                                            </form>
                                            <?php
                                            break;
                                    }
                                    ?>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php
                        $index++;
                    endforeach;
                    ?>

                </div>

            </table>

        </div>

        <div class="d-flex justify-content-center">
            <a href="index.php" class="btn btn-primary my-2">Volver a inicio</a>
        </div>

    </main>

<?php
include("includes/footer.php");
?>