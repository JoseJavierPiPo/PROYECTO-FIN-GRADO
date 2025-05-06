<?php
include_once("conn.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $dni = $_POST['username'];
    $contraseña = $_POST['password'];
    $usuariono = "Error : El usuario no existe";
    $contraseñano = "Error : La contraseña no es correcta para este usuario";

    function iniciosesion($conn, $dni, $contraseña, $usuariono, $contraseñano) {
        $sql = "SELECT * FROM socios WHERE DNI = '$dni'";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) == 0) {
            $_SESSION['error'] = $usuariono;
            exit();
        } else {
            $sql = "SELECT * FROM socios WHERE DNI = '$dni' AND Nombre = '$contraseña'";
            $result1 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result1) == 0) {
                $_SESSION['error'] = $contraseñano;
                exit();
            } else {
                unset($_SESSION['error']);
                echo "<script>window.location.href = '../subpáginas/areaprivadaadmin';</script>";
                exit();
            }
        }
    }
    
}

// ... existing code ...

// ADMINISTRADOR - FUNCION
// Commented out logout code for reference
/*
session_start();
session_destroy();
header('Location: login.php');
exit();
*/
?>