<?php
require ("header.php");
require 'resources\db\Cliente\arrayClientes.php';

// Verificar si se ha hecho clic en el botón de borrar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resources\db\Cliente\deleteClient.php'])) {

}
?>

<main role="main" >

    <div class="container" style="margin-top: 150px">
        <?php
        if(isset($_SESSION['usuario_logado'])) { ?>
        <a href="registrarCliente.php" class="btn btn-primary my-2">Registrar un cliente</a>
        <?php }?>
        <h2 style="text-align: center;">LISTA DE CLIENTES</h2>
        <table class="table container" style="margin-top: 50px">
            <div class="container d-flex justify-content-center">
                <tr>
                    <th>DNI CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>BORRAR</th>
                </tr>
                <?php
                foreach ($clientesJson as $cliente) : ?>
                    <tr>
                        <td><?php echo $cliente->getDNI(); ?></td>
                        <td><?php echo $cliente->getNombre(); ?></td>
                        <td><?php echo $cliente->getEmail(); ?></td>
                    <?php
                    if(isset($_SESSION['usuario_logado'])) { ?>
                        <td>
                            <form method="post" action="resources/db/Cliente/deleteClient.php">
                                <input type="hidden" name="deleteClient" value="<?php echo $cliente->getDNI(); ?>">
                                <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                            </form>
                        </td>
                    <?php }else {?>
                        <td>No permitido</td>
                    <?php }?>
                    </tr>
                <?php endforeach; ?>
            </div>

        </table>

    </div>



</main>

<?php
include("footer.php");
?>