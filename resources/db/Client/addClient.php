<?php
include '..\headerPost.php';

include 'arrayClients.php';
?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se hayan enviado datos
    if (isset($_POST['firstName']) && isset($_POST['email'])) {
        // Obtener los datos del formulario
        $DNI = $_POST['DNI'];
        $nombre = $_POST['firstName'];
        $email = $_POST['email'];

        // Crear un nuevo objeto Client

        $newClient = new Client($DNI,$nombre, $email);

        // Agrega el nuevo objeto al array de objetos
        array_push($clientsJson, $newClient);


        ?>

        <h2>Cliente registrado con éxito</h2>
        <p>ID del cliente: <?php echo $newClient->getDNI(); ?></p>
        <p>Nombre del cliente: <?php echo $newClient->getNombre(); ?></p>
        <p>Email del cliente: <?php echo $newClient->getEmail(); ?></p>


        <?php
        $tamaño = count($clientsJson);

        // Guardar el array en un archivo JSON
        file_put_contents('dataClients.json', json_encode($clientsJson));
        echo "</BR>"."El tamaño del array es: " . $tamaño;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\clients.php" class="btn btn-primary my-2">Volver a clientes</a>

</div>
<?php

require('../../../includes/footer.php');
?>



