<?php
include("../Views/conexion.php");
$id = $_POST['Id'];
$marca = $_POST['MarcaP'];
$cantidad = $_POST['cantidadP'];
$Fecha = $_POST['fechaP'];
$porcentaje = $_POST['porcentajeP'];
$tipo = $_POST['tipoP'];
$volumen = $_POST['volumenP'];
$precio = $_POST['precio'];
$imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

$sql = "UPDATE producto SET
categoriaId ='".$tipo."',
Marca_producto ='".$marca."',
Cantidad_existentes ='".$cantidad."',
año_elaboracion ='".$Fecha."',
porcentaje_alcohol ='".$porcentaje."',
volumen ='".$volumen."',
precio_producto ='".$precio."', imagen ='".$imagen."' WHERE Id_producto = '".$id."'";


if($resultado = $conexion->query($sql)){
    header("location:../Views/inventario.php");
}else{
    echo"Datos no insertados";
}

