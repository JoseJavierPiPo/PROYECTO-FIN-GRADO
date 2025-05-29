<?php
session_start();
include_once("../../../php/funciones.php");
include_once("../../../php/funcionesgsocios.php");

// Verificar variables de sesión
$nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
$dni = isset($_SESSION['DNI']) ? $_SESSION['DNI'] : '';
$rol = isset($_SESSION['ROL']) ? $_SESSION['ROL'] : '';

// Verificar si el usuario es administrador
if ($rol !== 'Admin') {
    header("Location: ../../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja de Socios - S. Cazadores LOS PIPORROS</title>
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
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 800px;
        }

        /* Centrar el contenedor del formulario */
        .row {
            justify-content: center;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro);
            color: var(--color-texto);
            margin-bottom: 1rem;
            text-align: center;
        }

        .form-label {
            color: var(--color-oro);
            font-weight: 500;
            text-align: center;
            display: block;
        }

        /* Estilo específico para el select */
        select.form-control {
            background-color: #000000;
            color: var(--color-texto);
            cursor: pointer;
            text-align: center;
            text-align-last: center;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        select.form-control option {
            background-color: #000000;
            color: var(--color-texto);
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

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro);
            color: var(--color-texto);
            margin-bottom: 1rem;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: var(--color-oro-claro);
            color: var(--color-texto);
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
        }

        .form-label {
            color: var(--color-oro);
            font-weight: 500;
        }

        .btn-gold {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
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
            margin-bottom: 1.5rem;
            border: 1px solid var(--color-oro);
            background-color: rgba(0, 0, 0, 0.8);
            color: var(--color-texto);
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
    <a href="../gestion_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="container">
        <div class="form-container">
            <h1 class="form-title">INTRODUCE LOS DATOS PARA MODIFICAR SOCIO</h1>
            
            <form action="../gestion/actualizar_socio.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="id_socio" class="form-label">ID DEL SOCIO</label>
                            <input type="number" class="form-control" name="id_socio" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-gold">BUSCAR SOCIO</button>
            </form>
    </div>

    <?php
    if(isset($_POST["id_socio"])) {
        $_SESSION["id_socio"] = $_POST["id_socio"];
        actualizarsocio1($conn, $_SESSION["id_socio"]);
    }
    if(isset($_SESSION["Error"])){
        echo '<div class="alert alert-error" role="alert">';
        echo $_SESSION["Error"];
        echo '</div>';
        unset($_SESSION["Error"]);
    }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>