<?php
session_start();
include_once ("conn.php");

function iniciosesion($conn, $nombre, $dni){
    if(isset($_POST["DNI"]) && isset($_POST["Nombre"])){
        //ERRORES VARIABLES DE SESSION
        $nombreno = "El nombre no existe";
        $dnino = "El DNI no coincide con el nombre introducido";

        // Consulta para verificar si el usuario existe en la base de datos
        $sql = "SELECT * FROM socios WHERE Nombre = '$nombre'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            $_SESSION["Error"] = $nombreno;
        }else{
            $sql1 = "SELECT * FROM socios WHERE Nombre = '$nombre' AND DNI = '$dni' "; 
            $result1 = mysqli_query($conn, $sql1);
            
            if(mysqli_num_rows($result1) == 0){
                $_SESSION["Error"] = $dnino;
            }else{
                $row = mysqli_fetch_assoc($result1);
                $rol = $row['ROL']; 
                $_SESSION["Nombre"] = $nombre;
                $_SESSION["DNI"] = $dni;
                $_SESSION["ROL"] = $rol; 

                // Redirigir según el rol
                if ($rol === 'Admin') {
                    echo "<script>window.location.href = 'admin.php';</script>";
                } else {
                    header("Location: admin.php");
                }
                exit(); 
            }
        }
    } else {
        $_SESSION["Error"] = "Por favor, complete todos los campos.";
        header("Location: socio.php");
        exit(); // Detener la ejecución si no se envían los datos correctamente
    }
}

?>