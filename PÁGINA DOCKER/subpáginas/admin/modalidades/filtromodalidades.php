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
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .search-group {
            margin-bottom: 0.5rem;
        }

        .search-group .form-control {
            height: 35px;
            padding: 0.3rem 0.5rem;
            font-size: 0.9rem;
            margin-bottom: 0;
        }

        .search-group .form-label {
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }

        /* Estilos para los botones de acción */
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--color-oro);
        }

        .btn-action {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            padding: 0.6rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            min-width: 120px;
        }

        .btn-action:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
        }

        /* Estilos para la búsqueda avanzada */
        .advanced-search {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
        }

        /* Ajustes responsive */
        @media (max-width: 768px) {
            .search-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }

            .btn-action {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
        }
        .results-container {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem auto;
            max-width: 1200px;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.8);
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            border: none;
            padding: 1rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            vertical-align: middle;
        }

        .table tbody tr {
            background-color: rgba(0, 0, 0, 0.8) !important;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(212, 175, 55, 0.1) !important;
            transform: scale(1.01);
        }

        .table td {
            padding: 0.8rem;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            color: var(--color-texto) !important;
            background-color: transparent;
        }

        /* Estado de los socios */
        .estado-activo {
            color: #28a745;
            font-weight: 600;
        }

        .estado-inactivo {
            color: #dc3545;
            font-weight: 600;
        }

        .estado-suspendido {
            color: #ffc107;
            font-weight: 600;
        }

        /* Responsive para la tabla */
        @media (max-width: 992px) {
            .table thead {
                display: none;
            }

            .table {
            width: 100%;
            margin: 0 auto;
            background-color: #000000;
            border-collapse: separate;
            border-spacing: 0;
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
            vertical-align: middle;
        }

        .table tbody tr {
            background-color: #000000 !important;
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #1a1a1a !important;
            transform: scale(1.01);
        }

        .table td {
            padding: 0.8rem;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            color: #ffffff !important;
            background-color: #000000;
        }

        }

        /* Paginación si la necesitas */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
            gap: 0.5rem;
        }

        .pagination .page-item .page-link {
            background-color: var(--color-oro);
            border: none;
            color: var(--color-fondo);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .pagination .page-item .page-link:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--color-oro-claro);
            box-shadow: 0 0 10px rgba(212, 175, 55, 0.3);
        }
    </style>
</head>
<body>
    <!-- Botón de volver -->
    <a href="../modalidades_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="main-container">
        <h1 class="form-title">BÚSQUEDA DE MODALIDADES</h1>
        
        <!-- Panel de búsqueda -->
        <div class="search-panel">
            <form action="filtromodalidades.php" method="POST">
                <div class="search-grid">
                    <!-- Campos principales -->
                    <div class="search-group">
                        <label for="id" class="form-label">ID Modalidad</label>
                        <input type="number" class="form-control" name="id_modalidad" placeholder="ID_Modalidad">
                    </div>
                    <div class="search-group">
                        <label for="modalida" class="form-label">Nombre de Modalidad</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre Modalidad">
                    </div>
                    <div class="search-group">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
                    </div>

                    <div class="search-group">
                        <label for="estado" class="form-label">Selecciona un Estado</label>
                        <select class="form-control" name="estado">
                        <option value="" disabled selected>Selecciona un Estado</option>
                            <option value="Mayor">Mayor</option>
                            <option value="Menor">Menor</option>
                        </select>
                    </div>
                    
                </div>
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
                <!-- Campos adicionales (inicialmente ocultos) -->
                <div class="advanced-search" id="advancedSearch" style="display: none;">
                    <div class="search-grid">
                        <div class="search-group">
                            <label for="temporada_inicio" class="form-label">Temporada de Inicio</label>
                            <input type="date" class="form-control" name="temporada_inicio">
                        </div>
                        <div class="search-group">
                            <label for="temporada_fin" class="form-label">Temporada Fin</label>
                            <input type="date" class="form-control" name="temporada_fin">
                        </div>
                        <div class="search-group">
                            <label for="arma" class="form-label">Arma Predominante</label>
                            <input type="text" class="form-control" name="arma">
                        </div>
                        <div class="search-group">
                            <label for="permiso_especial" class="form-label">Permiso Especial</label>
                            <select class="form-control" name="permiso_especial">
                            <option value="" disabled selected>SELECCIONA PERMISO ESPECIAL</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn-action" onclick="toggleAdvancedSearch()">
                        <i class="fas fa-sliders-h"></i> Avanzada
                    </button>
                    <button type="submit" class="btn-action">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                    <button type="reset" class="btn-action">
                        <i class="fas fa-undo"></i> Limpiar
                    </button>
                </div>
            </form>
        </div>

        <!-- Contenedor de resultados -->
        <div class="results-container">
            
            <?php
             listarmodalidades ($conn)
            ?>
        </div>
    </div>

    <script>
        function toggleAdvancedSearch() {
            const advancedSearch = document.getElementById('advancedSearch');
            if (advancedSearch.style.display === 'none') {
                advancedSearch.style.display = 'block';
            } else {
                advancedSearch.style.display = 'none';
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



