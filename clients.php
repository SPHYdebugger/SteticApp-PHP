<?php
require("includes/header.php");
require ('resources\db\Client\arrayClients.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resources\db\Client\deleteClient.php'])) {}

?>

<main role="main" >

    <div class="container" style="margin-top: 150px">
        <?php
        if(isset($_SESSION['usuario_logado'])) { ?>
            <div class="d-flex justify-content-center">
            <a href="addClient.php" class="btn btn-primary my-2">Registrar un cliente</a>
            </div>
        <?php }?>
        <h2 style="text-align: center;">LISTA DE CLIENTES</h2>
        <table class="table container" style="margin-top: 50px">
            <div class="container d-flex justify-content-center">
                <tr>
                    <th>DNI CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <?php if(isset($_SESSION['usuario_logado'])) { ?>
                    <th>BORRAR</th>
                    <?php } ?>
                </tr>
                <?php

                $index = 0;
                $clientsCount = count($clientsJson);

                do {
                    $client = $clientsJson[$index];
                ?>
                                <tr>
                                    <td><?php echo $client->getDNI(); ?></td>
                                    <td><?php echo $client->getNombre(); ?></td>
                                    <td><?php echo $client->getEmail(); ?></td>
                                    <?php
                                    if (isset($_SESSION['usuario_logado'])) { ?>
                                        <td>
                                            <form method="post" action="resources/db/Client/deleteClient.php">
                                                <input type="hidden" name="deleteClient" value="<?php echo $client->getDNI(); ?>">
                                                <button type="submit" class="btn btn-primary btn-sm my-2">BORRAR</button>
                                            </form>
                                        </td>
                                    <?php } ?>
                                </tr>
                    <?php
                    $index++;
                } while ($index < $clientsCount);
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