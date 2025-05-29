<?php
session_start();
include_once("../../../php/funciones.php");

// Verificar variables de sesión y rol
if (!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'Admin') {
    header("Location: ../../login.php");
    exit();
}

// Procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_socio = $_POST['id_socio'];
    $id_licencia = $_POST['id_licencia'];
    
    renovarlicencia($conn, $id_socio, $id_licencia);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Licencia - S. Cazadores LOS PIPORROS</title>
    <!-- CSS consolidado -->
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

        /* Estilos unificados para formularios */
        .form-container {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 1000px;
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
            color: var(--color-texto) !important;
            margin-bottom: 1rem;
            text-align: center;
            width: 100%;
        }

        .form-control::placeholder {
            color: var(--color-texto);
            opacity: 0.7;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: var(--color-oro-claro);
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
            color: var(--color-texto) !important;
        }

        select.form-control {
            background-color: #000000;
            cursor: pointer;
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

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: var(--color-oro-claro);
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
        }

        .form-label {
            color: var(--color-oro);
            font-weight: 500;
            text-align: center;
            display: block;
            margin-bottom: 0.5rem;
        }

        /* Botones */
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
        }

        /* Alertas */
        .alert {
            text-align: center;
            width: 100%;
            max-width: 600px;
            margin: 1rem auto;
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

        /* Panel de búsqueda */
        .search-panel {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 1.5rem;
            margin: 0 auto 2rem;
            max-width: 1000px;
        }

        .search-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        /* Tabla de resultados */
        .results-container {
            background-color: #000000;
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem auto;
            max-width: 1200px;
            overflow-x: auto;
        }

        /* Estilos para la tabla */
        .table {
            width: 100%;
            margin: 0 auto;
            background-color: #000000;
            border-collapse: separate;
            border-spacing: 0;
            color: white;
        }

        .table thead th {
            background-color: var(--color-oro);
            color: #000000;
            border: none;
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        .table tbody td {
            background-color: #000000;
            color: white;
            padding: 0.75rem;
            text-align: center;
            border-bottom: 1px solid var(--color-oro);
        }

        /* Alineación específica para columnas */
        .table td[data-type="number"],
        .table th[data-type="number"] {
            text-align: right;
        }

        .table td[data-type="text"],
        .table th[data-type="text"] {
            text-align: left;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .search-grid {
                grid-template-columns: 1fr;
            }
            
            .form-container, .search-panel {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <a href="../licencias_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="container">
        <h1 class="form-title">Renovar Licencia a Socio</h1>
        
        <!-- Mostrar mensajes una sola vez -->
          
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

        <div class="search-panel">
            <form action="renovarlicencia.php" method="POST">
                <div class="search-grid">
                    <div class="mb-3">
                        <label for="id_socio" class="form-label">ID Socio</label>
                        <input type="number" class="form-control" name="id_socio" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_licencia" class="form-label">ID Licencia</label>
                        <input type="number" class="form-control" name="id_licencia" required>
                    </div>
                </div>  
                
                <button type="submit" class="btn-gold">
                    <i class="fas fa-id-card"></i> Renovar Licencia
                </button>
            </form>
        </div>

        <div class="results-container">
            <?php
            filtrolicencias($conn);
            filtrolicenciassocio($conn);
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>