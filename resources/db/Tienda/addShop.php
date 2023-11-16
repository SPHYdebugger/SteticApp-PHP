<?php
include '..\headerPost.php';

include 'arrayShops.php';
?>
<div class="container" style="margin-top: 150px ; text-align: center; margin-bottom: 100px">


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que se hayan enviado datos
    if (isset($_POST['id']) && isset($_POST['city'])) {
        // Obtener los datos del formulario
        $id = $_POST['id'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $map = $_POST['map'];



        $nuevaTienda = new Tienda($id,$city,$address,$telephone,$email,$map);

        // Agrega el nuevo objeto al array de objetos
        array_push($tiendaJson, $nuevaTienda);


        ?>

        <h2>Tienda registrado con éxito</h2>
        <p>Id: <?php echo $nuevaTienda->getId(); ?></p>
        <p>Ciudad: <?php echo $nuevaTienda->getCiudad(); ?></p>
        <p>Dirección: <?php echo $nuevaTienda->getDireccion(); ?></p>
        <p>Teléfono: <?php echo $nuevaTienda->getTelefono(); ?></p>
        <p>email: <?php echo $nuevaTienda->getEmail(); ?></p>
        <p>Mapa: <?php echo $nuevaTienda->getMapaGoogleMaps(); ?></p>


        <?php
        $tamaño = count($tiendaJson);

        // Guardar el array en un archivo JSON
        file_put_contents('dataShops.json', json_encode($tiendaJson));
        echo "</BR>"."Número de tiendas en memoria: " . $tamaño;
    } else {
        ?>
        <p>Error: Debes completar todos los campos del formulario</p>
        <?php
    }
}

?>
</br>
<a href="..\..\..\tiendas.php" class="btn btn-primary my-2">Volver a Tiendas</a>

</div>
<?php

require('..\..\..\footer.php');
?>



