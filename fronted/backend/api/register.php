<?php
header("Access-Control-Allow-Origin: http://localhost:5173"); // URL del frontend
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');
require_once '../config/database.php'; 

// Recibe los datos enviados mediante POST
$data = json_decode(file_get_contents('php://input'), true);

// Validaciones básicas
if (empty($data['email']) || empty($data['password']) || empty($data['confirmPassword'])) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}

if ($data['password'] !== $data['confirmPassword']) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match']);
    exit;
}

// Verificar si el usuario ya existe
$query = "SELECT id FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 's', $data['email']); // 's' es para string
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo json_encode(['success' => false, 'message' => 'Email already registered']);
    exit;
}

// Hash de la contraseña
$hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

// Insertar nuevo usuario
$query = "INSERT INTO users (email, password) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $data['email'], $hashedPassword); // 'ss' es para 2 parámetros string
if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['success' => true, 'message' => 'Registration successful']);
} else {
    echo json_encode(['success' => false, 'message' => 'Registration failed']);
}

// Cerrar la conexión
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
