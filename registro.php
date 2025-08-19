<?php
// Se utiliza para llamar al archivo que contiene la conexión a la base de datos
require 'conexion2.php';

// Validamos que el formulario y que el botón registro hayan sido presionados
if (isset($_POST['registro'])) {

    // Función para validar los datos del formulario
    function validate($data)
    {
        $data = trim($data); 
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Obtener los valores enviados por el formulario
    $usuario = validate($_POST['Usuario']);
    $contrasena = validate($_POST['Clave']);
    $nombre_completo = validate($_POST['nombre_completo']);

    // Verificar si el nombre de usuario ya existe
    $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El usuario ya existe
		$alertMessage = "El nombre de usuario ya existe";
        header("Location: registroform.php?alertMessage=" . urlencode($alertMessage));
        exit();
    } else {
        // Encriptar la contraseña
        $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

        // Asignar el rol 'user' a todos los nuevos registros
        $role = 'admin';

        // Insertamos los datos en la base de datos
        $sql = "INSERT INTO usuarios (Id, Role, Usuario, Clave, Nombre_Completo) VALUES (NULL, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ssss", $role, $usuario, $hashedPassword, $nombre_completo);

        if ($stmt->execute()) {
            // Inserción correcta
            $successMessage = "Cuenta creada exitosamente";
            header("Location: index.php?successMessage=" . urlencode($successMessage));
           
            exit();
        } else {
            // Inserción fallida
            echo "¡No se puede insertar la información!" . "<br>";
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }

    $stmt->close();
}
$conexion->close();
?>