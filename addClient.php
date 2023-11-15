<?php

include 'datos.json';

include 'arrayClientes.php';

?>
<div class="container" style="margin-top: 150px">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se hayan enviado datos
    if (isset($_POST['firstName']) && isset($_POST['email'])) {
        // Obtener los datos del formulario
        $DNI = $_POST['DNI'];
        $nombre = $_POST['firstName'];
        $email = $_POST['email'];

        // Crear un nuevo objeto Cliente con ID autogenerado

        $nuevoCliente = new Cliente($DNI,$nombre, $email);

        // Agrega el nuevo objeto al array de objetos
        array_push($clientesJson, $nuevoCliente);

        // Puedes guardar el objeto $nuevoCliente en una base de datos o en una lista de clientes, según tus necesidades
        // En este ejemplo, simplemente se crea el objeto, pero debes ajustar tu lógica de almacenamiento.
        ?>
        <h2>Cliente registrado con éxito</h2>
        <p>ID del cliente: <?php echo $nuevoCliente->getDNI(); ?></p>
        <p>Nombre del cliente: <?php echo $nuevoCliente->getNombre(); ?></p>
        <p>Email del cliente: <?php echo $nuevoCliente->getEmail(); ?></p>


        <?php
        $tamaño = count($clientesJson);

        // Guardar el array en un archivo JSON
        file_put_contents('datos.json', json_encode($clientesJson));
        echo "</BR>"."El tamaño del array es: " . $tamaño;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
<a href="clientes.php" class="btn btn-primary my-2">Volver a clientes</a>

<?php

require("footer.php");
?>



