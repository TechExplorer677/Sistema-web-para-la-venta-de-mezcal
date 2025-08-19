<?php
session_start();
include 'conexion.php';

if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: index.php?error=El usuario es requerido");
    } elseif (empty($Clave)) {
        header("Location: index.php?error=La contraseña es requerida");
        exit();
    } else {
        $conexion = new Conexion();
        $conn = $conexion->conexion;

        $sql = "SELECT * FROM usuarios WHERE Usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $Usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            //para cuando las contraseñas estan encriptadas
            if (password_verify($Clave, $row['Clave'])) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['Role'] = $row['Role'];
                $_SESSION['Id'] = $row['Id'];
                header("Location: principal.php");
                exit();
            } else {
                header("Location: index.php?error=El usuario o la contraseña son incorrectas");
                exit();
            } 
        } else {
            header("Location: index.php?error=El usuario o la contraseña son incorrectas");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
