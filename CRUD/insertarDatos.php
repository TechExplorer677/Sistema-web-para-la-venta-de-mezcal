<?php

include("../Views/conexion.php");
$marca = $_POST['MarcaP'];
$cantidad = $_POST['cantidadP'];
$Fecha = $_POST['fechaP'];
$porcentaje = $_POST['porcentajeP'];
$tipo = $_POST['tipoP'];
$volumen = $_POST['volumenP'];
$precio = $_POST['precio'];
$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$sql = "INSERT INTO producto(categoriaId, Marca_producto, Cantidad_existentes, año_elaboracion, porcentaje_alcohol, volumen, precio_producto, imagen ) VALUES ('$tipo','$marca','$cantidad','$Fecha','$porcentaje','$volumen','$precio', '$imagen')";


$resultado = mysqli_query($conexion, $sql);

if($resultado==true){
    header("location:../Views/inventario.php");
}else{
    echo"Datos no insertados";
} 