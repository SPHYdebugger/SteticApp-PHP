
<?php
require ("header.php");

require 'arrayClientes.php';
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

                </tr>
                <?php
                foreach ($clientesJson as $cliente) : ?>
                    <tr>
                        <td><?php echo $cliente->getDNI(); ?></td>
                        <td><?php echo $cliente->getNombre(); ?></td>
                        <td><?php echo $cliente->getEmail(); ?></td>


                    </tr>
                <?php endforeach; ?>
            </div>

        </table>

    </div>



</main>

<?php
include ("footer.php");
?>


