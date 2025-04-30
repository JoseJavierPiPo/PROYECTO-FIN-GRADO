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
                $row = mysqli_fetch_assoc($result1);
                $_SESSION['dni'] = $row['DNI'];
                unset($_SESSION['error']);
                echo "<script>window.location.href = '../areaprivada.php';</script>";
                exit();
            }
        }
    }
    
}

// ... existing code ...


function mostrarinformacionusuario($conn, $dni) {
    $sql = "SELECT * FROM socios WHERE DNI = '$dni'";
    $result = mysqli_query($conn, $sql);

    if($row = mysqli_fetch_assoc($result)){
        // Almacenar datos en variables de sesión
        $_SESSION['usuario'] = $row['Nombre'];
        $_SESSION['apellido1'] = $row['Apellido1'];
        $_SESSION['apellido2'] = $row['Apellido2'];
        $_SESSION['dni'] = $row['DNI'];
        $_SESSION['id_socio'] = $row['ID_Socio'];
        $_SESSION['fecha_alta'] = $row['Fecha_Alta'];
        $_SESSION['rol'] = isset($row['Rol']) ? $row['Rol'] : '';
        $_SESSION['estado'] = $row['Estado'];
        $_SESSION['antiguedad'] = isset($row['Antiguedad']) ? $row['Antiguedad'] : '';
        
    }
}

// ADMINISTRADOR - FUNCION
// Commented out logout code for reference
/*
session_start();
session_destroy();
header('Location: login.php');
exit();
*/
?>