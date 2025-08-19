<?php
include("../Views/conexion.php");
$id=$_GET['Id'];
$sql = "DELETE FROM producto WHERE Id_producto='$id'";
$query = mysqli_query($conexion,$sql);
if($query==true){
    header("location:../Views/inventario.php");
}
?> 