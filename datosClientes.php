<?php

include 'Clases/Cliente.php';


$clientes = array(
    new Cliente('3654789R','Juan Pérez', 'juan@email.com'),
    new Cliente('3265474W','María López', 'maria@email.com'),
    new Cliente('9874521X','Carlos Sánchez', 'carlos@email.com')
);

// Guardar el array nuevamente en el archivo JSON
file_put_contents('datos.json', json_encode($clientes));

?>



