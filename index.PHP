<?php
// Recuperar el mensaje de éxito de la URL
$successMessage = isset($_GET['successMessage']) ? $_GET['successMessage'] : '';
if (!empty($successMessage)) {
    echo "<script>alert('$successMessage');</script>";
}
?> 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="stilosiniciarsesion.css">
</head> 

<body>
    <form action="IniciarSesion.php" method="POST">
        <h1>Iniciar sesión</h1>
        <hr>
        <?php if (isset($_GET['error'])) : ?>
            <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <label>Usuario</label>
        <input type="text" name="Usuario" placeholder="Nombre de usuario" required>
        <label>Contraseña</label>
        <input type="password" name="Clave" placeholder="Contraseña" required>
        <hr>
        <button type="submit">Iniciar sesión</button>
        <a href="registroform.php">Crear Cuenta</a>
    </form>
</body>
 
</html>