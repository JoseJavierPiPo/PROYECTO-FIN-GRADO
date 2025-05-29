<?php 
$lo = getenv('MYSQL_HOST') ?: 'db';  
$db = getenv('MYSQL_DATABASE') ?: 'cazadores_bd';
$user = getenv('MYSQL_USER') ?: 'user';
$pass = getenv('MYSQL_PASSWORD') ?: 'password';

$conn = mysqli_connect($lo, $user, $pass, $db);
$conn  -> set_charset("utf8");
if (!$conn) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Establecer el conjunto de caracteres
mysqli_set_charset($conn, "utf8");
?>
