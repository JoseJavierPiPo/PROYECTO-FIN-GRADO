<?php
session_start();
include_once("../../../php/funciones.php");

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
    $nombresocio = $_POST['nombre_socio'];
    
    asignarlicenciasocio1($conn, $id_socio, $nombresocio);
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
        :root {
            --color-oro: #D4AF37;
            --color-oro-claro: #e8c252;
            --color-oro-oscuro: #b8972e;
            --color-fondo: #111;
            --color-fondo-claro: #222;
            --color-texto: #eee;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-fondo);
            color: var(--color-texto);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 3rem;
            margin: 2rem auto;
            max-width: 1000px;
            width: 100%;
        }

        .row {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .mb-3 {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 2rem;
            width: 100%;
            text-align: center;
        }

        .form-title {
            color: var(--color-oro);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-label {
            color: var(--color-oro);
            font-weight: 500;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            display: block;
            width: 100%;
        }

        .form-control {
            width: 100%;
            max-width: 800px;
            margin: 0 auto 1.5rem;
            text-align: center;
            padding: 1rem;
            font-size: 1.2rem;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro);
            color: var(--color-texto);
        }

        select.form-control {
            height: auto;
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

        select.form-control option:hover,
        select.form-control option:checked {
            background-color: var(--color-oro);
            color: var(--color-fondo);
        }

        .btn-gold {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            padding: 1rem 3rem;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: auto;
            min-width: 400px;
            margin: 2rem auto;
            font-size: 1.2rem;
            height: 60px;
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

        .alert {
            text-align: center;
            width: 100%;
            max-width: 600px;
            margin: 1rem auto 1.5rem;
            border: 1px solid var(--color-oro);
            background-color: rgba(0, 0, 0, 0.8);
            color: var(--color-texto);
            padding: 1rem;
            border-radius: 5px;
        }

        .alert-error {
            border-color: #dc3545;
            background-color: rgba(220, 53, 69, 0.1);
        }

        .alert-correcto {
            border-color: #198754;
            background-color: rgba(25, 135, 84, 0.1);
        }

        .col-md-8 {
            width: 100%;
            max-width: 900px;
        }
    </style>
</head>
<body>
    <!-- Botón de volver -->
    <a href="../licencias_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="container">
        <div class="form-container">
                    <h1 class="form-title">Inserta los datos del Socio</h1>
                    
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

                    <form method="POST" action="asignarlicenciasocio.php">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="id_socio" class="form-label">ID de Socio</label>
                                    <input type="number" class="form-control" name="id_socio" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nombre_socio" class="form-label">Nombre de Socio</label>
                                    <input type="text" class="form-control" name="nombre_socio" required>
                                </div>
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-gold">
                                        <i class="fas fa-plus-circle me-2"></i>BUSCAR AL SOCIO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>