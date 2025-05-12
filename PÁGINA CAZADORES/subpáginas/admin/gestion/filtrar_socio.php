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
            margin-top: 2rem;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
            color: var(--color-texto);
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
            background-color: rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(212, 175, 55, 0.1);
            transform: scale(1.01);
        }

        .table td {
            padding: 0.8rem;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
            color: var(--color-texto);
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

            .table tbody tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid var(--color-oro);
                border-radius: 5px;
            }

            .table td {
                display: block;
                text-align: right;
                padding: 0.5rem 1rem;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                font-weight: 600;
                text-transform: uppercase;
                color: var(--color-oro);
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
    <a href="../gestion_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="main-container">
        <h1 class="form-title">BÚSQUEDA DE SOCIOS</h1>
        
        <!-- Panel de búsqueda -->
        <div class="search-panel">
            <form action="../gestion/filtrar_socio.php" method="POST">
                <div class="search-grid">
                    <!-- Campos principales -->
                    <div class="search-group">
                        <label for="id" class="form-label">ID Socio</label>
                        <input type="number" class="form-control" name="id" placeholder="ID">
                    </div>
                    <div class="search-group">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" name="dni" maxlength="9" placeholder="DNI">
                    </div>
                    <div class="search-group">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="search-group">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" name="estado">
                        <option value="" disabled selected>Selecciona un Estado</option>
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                            <option value="suspendido">Suspendido</option>
                        </select>
                    </div>
                    <div class="search-group">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-control" name="rol">
                            <option value="" disabled selected>Selecciona un Socio</option>
                            <option value="Admin">Admin</option>
                            <option value="Socio">Socio</option>
                        </select>
                    </div>
                </div>

                <!-- Campos adicionales (inicialmente ocultos) -->
                <div class="advanced-search" id="advancedSearch" style="display: none;">
                    <div class="search-grid">
                        <div class="search-group">
                            <label for="apellido1" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" name="apellido1">
                        </div>
                        <div class="search-group">
                            <label for="apellido2" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" name="apellido2">
                        </div>
                        <div class="search-group">
                            <label for="fecha_nacimiento" class="form-label">Fecha Nacimiento</label>
                            <input type="date" class="form-control" name="fecha_nacimiento">
                        </div>
                        <div class="search-group">
                            <label for="localidad" class="form-label">Localidad</label>
                            <input type="text" class="form-control" name="localidad">
                        </div>
                        <div class="search-group">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" name="telefono">
                        </div>
                        <div class="search-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="search-group">
                            <label for="fecha_alta" class="form-label">Fecha Alta</label>
                            <input type="date" class="form-control" name="fecha_alta">
                        </div>
                        <div class="search-group">
                            <label for="fecha_baja" class="form-label">Fecha Baja</label>
                            <input type="date" class="form-control" name="fecha_baja">
                        </div>
                        <div class="search-group">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <input type="number" class="form-control" name="codigo_postal">
                        </div>
                        <div class="search-group">
                            <label for="domicilio" class="form-label">Domicilio</label>
                            <input type="text" class="form-control" name="domicilio">
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
             buscarsocios($conn);
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

