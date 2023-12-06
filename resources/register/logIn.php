<?php
session_start();

$usuarios = array(
    'santi' => 'perez',
    'joaquin' => 'fanlo',
    'admin' => '1234',
    'miriam' => 'casal',
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['usuario'];
    $contrasena_ingresada = $_POST['contrasena'];

    // Verificar si el usuario existe en el array de usuarios
    if (isset($usuarios[$nombre_usuario]) && $usuarios[$nombre_usuario] === $contrasena_ingresada) {
        // si existe, establecer la sesión
        $_SESSION['usuario_logado'] = $nombre_usuario;
        header('Location: ..\..\index.php');
        exit();
    } else {
        $mensaje_error = 'Datos incorrectos';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
<h1>Iniciar Sesión</h1>
<?php if (isset($mensaje_error)) : ?>
    <p style="color: red;"><?php echo $mensaje_error; ?></p>
<?php endif; ?>
<form method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" required><br><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required><br><br>
    <button type="submit">Iniciar Sesión</button>
</form>
    <a href="../../index.php"><button>Cancelar</button></a>
</body>
</html>
