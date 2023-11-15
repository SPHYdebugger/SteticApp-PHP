<?php
include '..\headerPost.php';

include 'arrayClientes.php';
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

        // Crear un nuevo objeto Cliente

        $nuevoCliente = new Cliente($DNI,$nombre, $email);

        // Agrega el nuevo objeto al array de objetos
        array_push($clientesJson, $nuevoCliente);


        ?>

        <h2>Cliente registrado con éxito</h2>
        <p>ID del cliente: <?php echo $nuevoCliente->getDNI(); ?></p>
        <p>Nombre del cliente: <?php echo $nuevoCliente->getNombre(); ?></p>
        <p>Email del cliente: <?php echo $nuevoCliente->getEmail(); ?></p>


        <?php
        $tamaño = count($clientesJson);

        // Guardar el array en un archivo JSON
        file_put_contents('datosClientes.json', json_encode($clientesJson));
        echo "</BR>"."El tamaño del array es: " . $tamaño;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\clientes.php" class="btn btn-primary my-2">Volver a clientes</a>

</div>
<?php

require('..\..\footer.php');
?>



