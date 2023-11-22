<?php
require ("header.php");
require 'resources\db\Producto\arrayProducts.php';

?>

    <main role="main" >

        <div class="container" style="margin-top: 150px">
            <?php
            if(isset($_SESSION['usuario_logado'])) { ?>
                <a href="registrarProducto.php" class="btn btn-primary my-2">Registrar un producto</a>
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
                    foreach ($productosJson as $producto) : ?>
                        <tr>
                            <td><?php echo $producto->getId(); ?></td>
                            <td><?php echo $producto->getNombre(); ?></td>
                            <td><?php echo $producto->getDescripcion(); ?></td>
                            <td><?php echo $producto->getPrecio(); ?> €</td>
                            <?php
                            if(isset($_SESSION['usuario_logado'])) { ?>
                                <td>
                                    <form method="post" action="resources/db/Producto/deleteProduct.php">
                                        <input type="hidden" name="deleteProduct" value="<?php echo $producto->getId(); ?>">
                                        <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                                    </form>
                                </td>
                            <?php }?>
                        </tr>
                    <?php endforeach; ?>
                </div>

            </table>

        </div>

        <div class="d-flex justify-content-center">
            <a href="index.php" class="btn btn-primary my-2">Volver a inicio</a>
        </div>

    </main>

<?php
include("footer.php");
?>