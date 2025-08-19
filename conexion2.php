<?php
$host = "localhost";
$User = "root";
$pass = "";

$db = "mezcaleria";

$conexion = mysqli_connect($host, $User, $pass, $db);

if(!$conexion){
    echo "Conexion fallida";
}