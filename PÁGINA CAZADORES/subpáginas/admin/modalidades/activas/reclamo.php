<?php
session_start();
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
perdizconreclamo($conn);

if (isset($_SESSION["ID_Modalidad"]) && $_SESSION["Nombre_Modalidad"] && $_SESSION["Descripcion"] && $_SESSION["Temporada_Inicio"] && $_SESSION["Temporada_Fin"] && $_SESSION["Tipo_Caza"] && $_SESSION["arma"] && $_SESSION["permiso"]) {
    $id_modalidad = $_SESSION["ID_Modalidad"];
    $nombre_modalidad = $_SESSION["Nombre_Modalidad"];
    $descripcion = $_SESSION["Descripcion"];
    $temporada_inicio = $_SESSION["Temporada_Inicio"];
    $temporada_fin = $_SESSION["Temporada_Fin"];
    $tipo_caza = $_SESSION["Tipo_Caza"];
    $arma_predominante = $_SESSION["arma"];
    $permiso_especial = $_SESSION["permiso"];

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
            padding: 2rem;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 2rem;
            width: 100%;
        }

        .row {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .col-md-6 {
            width: 100%;
            max-width: 400px;
        }

        .mb-3 {
            width: 100%;
            margin-bottom: 1.5rem;
        }

        .form-title {
            color: var(--color-oro);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
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
            width: auto;
            min-width: 200px;
            margin: 1rem auto;
            display: block;
        }

        /* Centrar los elementos del formulario */
        .form-label {
            text-align: center;
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-control {
            text-align: center;
        }

        /* Estilos para el select */
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro);
            color: var(--color-texto);
            margin-bottom: 1rem;
        }

        /* Estilos para las opciones del select */
        select.form-control option {
            background-color: var(--color-fondo);
            color: var(--color-texto);
        }
         /* Estilos adicionales para la información de la modalidad */
         .modalidad-info {
            padding: 2rem;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        .info-section {
            margin-bottom: 2rem;
            text-align: center;
        }

        .info-section h3 {
            color: var(--color-oro);
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-top: 2rem;
            justify-content: center;
            align-items: stretch;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .info-item {
            text-align: center;
            padding: 1.5rem;
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid var(--color-oro);
            border-radius: 8px;
            transition: transform 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .info-item:hover {
            transform: translateY(-5px);
        }

        .info-item i {
            font-size: 2rem;
            color: var(--color-oro);
            margin-bottom: 1rem;
        }

        .info-item h4 {
            color: var(--color-oro);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .info-item p {
            margin: 0.5rem 0;
            color: var(--color-texto);
        }

        /* Ajuste del contenedor para mejor visualización */
        .container {
            max-width: 1000px;
        }

        .form-container {
            padding: 3rem;
        }
        /* Estilos para cuando el select está abierto */
        select.form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: var(--color-oro-claro);
            color: var(--color-texto);
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
        }

        /* Estilos específicos para el fondo del menú desplegable */
        select.form-control option:hover,
        select.form-control option:checked {
            background-color: var(--color-oro);
            color: var(--color-fondo);
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
            color:var(--color-fondo)
        }
        /* Estilos para las alertas */
        /* Centrar las alertas */
        .alert {
            text-align: center;
            width: 100%;
            max-width: 600px;
            margin: 1rem auto;
            margin-bottom: 1.5rem;
            border: 1px solid var(--color-oro);
            background-color: rgba(0, 0, 0, 0.8);
            color: var(--color-texto);
            padding: 1rem;
            border-radius: 5px;
            text-align: center;
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
    <a href="../listarmodalidades.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="container">
        <div class="form-container">
            <h1 class="form-title">
                <i class="fas fa-dove"></i> PERDIZ CON RECLAMO
            </h1>
            
            <!-- Información de la modalidad -->
            <div class="modalidad-info">
                <div class="info-section">
                    <h3><i class="fas fa-info-circle"></i> Descripción</h3>
                    <p><?php echo $descripcion ?></p>
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <i class="fas fa-calendar-alt"></i>
                        <h4>Temporada</h4>
                        <p>Desde: <?php echo $temporada_inicio ?></p>
                        <p>Hasta: <?php echo $temporada_fin ?></p>
                    </div>

                    <div class="info-item">
                        <i class="fas fa-crosshairs"></i>
                        <h4>Tipo de Caza</h4>
                        <p><?php echo $tipo_caza ?></p>
                    </div>

                    <div class="info-item">
                        <i class="fas fa-gun"></i>
                        <h4>Arma Predominante</h4>
                        <p><?php echo $arma_predominante ?></p>
                    </div>

                    <div class="info-item">
                        <i class="fas fa-certificate"></i>
                        <h4>Permiso Especial</h4>
                        <p><?php echo $permiso_especial ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>