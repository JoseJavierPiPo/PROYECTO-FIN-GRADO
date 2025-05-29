<?php
session_start();
include_once("../../../../php/conn.php");  
include_once("../../../../php/funciones.php");

// Verificar variables de sesión
$nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
$dni = isset($_SESSION['DNI']) ? $_SESSION['DNI'] : '';
$rol = isset($_SESSION['ROL']) ? $_SESSION['ROL'] : '';

// Verificar si el usuario es administrador
if ($rol !== 'Admin') {
    header("Location: ../../login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_socio = $_POST['id_socio'];
    $id_modalidad = $_POST['id_modalidad'];
    borrarmodalidadasocio ($conn, $id_socio, $id_modalidad);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Modalidad - S. Cazadores LOS PIPORROS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variables globales */
        :root {
            --color-oro: #D4AF37;
            --color-oro-claro: #e8c252;
            --color-oro-oscuro: #b8972e;
            --color-fondo: #111;
            --color-fondo-claro: #222;
            --color-texto: #eee;
        }

        /* Estilos base */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-fondo);
            color: var(--color-texto);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        /* Contenedores */
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 3rem;
            margin: 2rem auto;
            max-width: 600px;
            width: 100%;
        }

        /* Grid del formulario */
        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        .col-md-6 {
            width: 100%;
            max-width: 300px;
        }

        /* Elementos del formulario */
        .form-title {
            color: var(--color-oro);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .mb-3 {
            width: 100%;
            margin-bottom: 2rem;
        }

        .form-label {
            color: var(--color-oro);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            display: block;
        }

        .form-control {
            text-align: center;
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro);
            color: var(--color-texto);
        }

        /* Estilos para el select */
        select.form-control {
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%23D4AF37' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 2.5rem;
        }

        select.form-control option {
            background-color: var(--color-fondo);
            color: var(--color-texto);
        }

        select.form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: var(--color-oro-claro);
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
        }

        /* Botones */
        .btn-gold {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: auto;
            min-width: 250px;
            margin: 2rem auto 1rem;
            display: block;
        }

        .btn-gold:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: var(--color-oro);
            color: var(--color-fondo);
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .back-button:hover {
            background-color: var(--color-oro-claro);
            color: var(--color-fondo);
        }

        /* Alertas */
        .alert {
            text-align: center;
            width: 100%;
            max-width: 400px;
            margin: 1rem auto 2rem;
            padding: 1rem;
            border: 1px solid var(--color-oro);
            background-color: rgba(0, 0, 0, 0.8);
            color: var(--color-texto);
            border-radius: 5px;
            font-weight: 500;
        }

        .alert-error {
            border-color: #dc3545;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .alert-correcto {
            border-color: #198754;
            background-color: rgba(25, 135, 84, 0.1);
        }
    </style>
</head>
<body>
    <!-- Botón de volver -->
    <a href="../../modalidades_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="container">
        <div class="form-container">
                    <h1 class="form-title">Borrar Modalidad de Socio</h1>
                    
                    <?php
                        if(isset($_SESSION['correcto'])) {
                            echo '<div class="alert alert-correcto">'.$_SESSION['correcto'].'</div>';
                            unset($_SESSION['correcto']);
                        }
                        if(isset($_SESSION['error'])) {
                                echo '<div class="alert alert-error">'.$_SESSION['error'].'</div>';
                                unset($_SESSION['error']);
                        }
                    ?>

                    <form method="POST" action="borrarasignacion.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                        <label for="id_modalidad" class="form-label">ID de la Modalidad</label>
                                        <input type="number" class="form-control" name="id_modalidad" required>
                                    </div>
                                <div class="mb-3">
                                    <label for="id_socio" class="form-label">ID del Socio</label>
                                    <input type="number" class="form-control" name="id_socio" required>
                                </div>
                        </div>
                        
                        <button type="submit" class="btn btn-gold">
                            <i class="fas fa-plus-circle me-2"></i>BORRAR MODALIDAD AL SOCIO
                        </button>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>