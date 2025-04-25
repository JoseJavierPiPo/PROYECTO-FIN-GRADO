<?php 
 $lo = "localhost";
 $db = "cazadores_bd";
 $user = "root";
 $pass = "";
 $conn = mysqli_connect("$lo","$user","$pass","$db");


 if(!$conn){
    die("". mysqli_connect_error());
 }
 else{
    mysqli_select_db($conn, $db);
 }



 ?>