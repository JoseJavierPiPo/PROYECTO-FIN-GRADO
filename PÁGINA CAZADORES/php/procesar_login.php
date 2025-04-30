<?php
session_start();
require_once 'conexion.php';
require_once 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    try {
        $conn = conectarDB();
        
        // Consulta preparada
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE dni = ? AND contrasena = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows > 0) {
            // Usuario autenticado correctamente
            $usuario = $resultado->fetch_assoc();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['nombre'];
            $_SESSION['usuario_rol'] = $usuario['rol'];
            
            // Redirigir al área privada
            header('Location: ../areaprivada.php');
            exit();
        } else {
            // Credenciales incorrectas
            $_SESSION['error'] = "Usuario o contraseña incorrectos";
            header('Location: ../subpáginas/login.php');
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "Error en el servidor. Por favor, inténtelo más tarde.";
        header('Location: ../subpáginas/login.php');
        exit();
    }
} else {
    // Si alguien intenta acceder directamente a este archivo
    header('Location: ../subpáginas/login.php');
    exit();
}
?>