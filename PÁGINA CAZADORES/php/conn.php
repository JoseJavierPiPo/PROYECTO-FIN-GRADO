<?php 
$lo = "localhost";
$db = "cazadores_bd";
$user = "root";
$pass = "";


$conn = mysqli_connect($lo, $user, $pass, $db);

if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
} else {
}
?>
