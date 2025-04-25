<?php
$localhost = "localhost";
$user = "root";
$db = "cazadores_bd";
$password = "";
$conn = mysqli_connect("$localhost","$user","$password","$db");

if(!$conn){
    die("Error de conexión". mysqli_connect_error());
}



?>