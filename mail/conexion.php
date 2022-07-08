<?php  
$servername = "localhost";
$database = "BDSuñay";
$username = "root";
$password = "";
// Crear CONEXION
$conn = mysqli_connect($servername, $username, $password, $database);
// Revisar CONEXION
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}
?>