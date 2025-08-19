<?php
// Recuperar el mensaje de alerta de la URL
$alertMessage = isset($_GET['alertMessage']) ? $_GET['alertMessage'] : '';

// Si hay un mensaje de alerta, mostrarlo en un script de alerta JavaScript
if (!empty($alertMessage)) {
    echo "<script>alert('$alertMessage');</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Página de registro</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stilosre.css">

</head>
<style>
    .info {
        background-color: white;
        color: red;
        font-weight: 600;
        padding: 5px;
        border-radius: 5px;
        display: none;
        /* Ocultar el mensaje por defecto */
    }
</style>
<script>
    window.onload = function () {
        var inputs = document.querySelectorAll('input'); // Seleccionar todos los campos de entrada

        inputs.forEach(function (input) {
            input.addEventListener('focus', function () {
                var info = this.parentNode.querySelector('.info'); // Obtener el mensaje de ayuda
                if (info) {
                    info.style.display = 'block'; // Mostrar el mensaje cuando el campo está en foco
                }
            });

            input.addEventListener('blur', function () {
                var info = this.parentNode.querySelector('.info'); // Obtener el mensaje de ayuda
                if (info) {
                    info.style.display = 'none'; // Ocultar el mensaje cuando el campo pierde el foco
                }
            });
        });
    };
</script>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Formulario de registro -->
                <form action="registro.php" method="POST">
                    <h2 class="mt-5 mb-4">Regístrate</h2>
                    <!-- Campo de entrada para el nombre de usuario -->
                    <div class="form-group">
                        <div class="info" >Solo se permiten letras y números</div>
                        <input type="text" class="form-control" name="Usuario" placeholder="Nombre de usuario"
                            required pattern="[a-zA-Z0-9]+">
                            
                    </div>
                    <!-- Campo de entrada para la contraseña -->
                    <div class="form-group">
                        <div class="info" >Debe contener al menos un número, una letra
                            mayúscula y una minúscula, y minimo 8 caracteres.</div>
                        <input type="password" class="form-control" name="Clave" placeholder="Contraseña"
                            required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                           
                    </div>
                    <!-- Campo de entrada para el nombre -->
                    <div class="form-group">
                        <div class="info">Solo se permiten letras</div>
                        <input type="text" class="form-control" name="nombre_completo" placeholder="Nombre" required pattern="[a-zA-Z\s]+">
                    </div>
                    <!-- Botón para enviar el formulario de registro -->
                    <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
                </form>
                <!-- Enlace para redirigir al formulario de inicio de sesión -->
                <p class="mt-3">¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html> 