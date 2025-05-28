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

// Obtener datos de la licencia si existe en la sesión
$licencia = null;
if (isset($_SESSION['licencia_actual'])) {
    $licencia = $_SESSION['licencia_actual'];
} else if (isset($_SESSION["id_licencia"])) {
    $id_licencia = $_SESSION["id_licencia"];
    $sql = "SELECT * FROM licencias WHERE ID_Licencia = '$id_licencia'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $licencia = mysqli_fetch_assoc($result);
        $_SESSION['licencia_actual'] = $licencia; 
    }
}

// Si no hay licencia en la sesión, redirigir
if (!$licencia) {
    $_SESSION['error'] = "No se encontró la licencia especificada";
    header("Location: ../licencias_admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
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

        /* Estructuras principales */
        .form-container, .search-panel, .results-container {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 1.5rem;
            margin: 2rem auto;
        }

        .form-container { max-width: 800px; }
        .search-panel { max-width: 1000px; }

        .row {
            justify-content: center;
        }

        /* Tipografía y títulos */
        .form-title {
            color: var(--color-oro);
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2em;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Formularios y controles */
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--color-oro);
            color: var(--color-texto); 
            margin-bottom: 1rem;
            text-align: center;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: var(--color-oro-claro);
            box-shadow: 0 0 5px rgba(212, 175, 55, 0.5);
            color: var(--color-texto); 
        }

        .form-label {
            color: var(--color-oro);
            font-weight: 500;
            text-align: center;
            display: block;
        }

        select.form-control {
            background-color: #000;
            cursor: pointer;
            text-align-last: center;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        select.form-control option {
            background-color: #000;
        }

        /* Botones */
        .btn-gold, .back-button, .btn-action, .btn-actualizar {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-gold, .btn-actualizar {
            padding: 0.8rem 2rem;
            border-radius: 5px;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-actualizar {
            padding: 1rem 3rem;
            border-radius: 8px;
            letter-spacing: 2px;
            font-size: 1.1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            z-index: 1000;
        }

        .btn-action {
            padding: 0.6rem 1.5rem;
            border-radius: 5px;
            font-size: 0.9rem;
            min-width: 120px;
        }

        .btn-gold:hover, .back-button:hover, .btn-action:hover, .btn-actualizar:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(212, 175, 55, 0.3);
        }

        .btn-actualizar:active {
            transform: translateY(1px);
            box-shadow: 0 2px 4px rgba(212, 175, 55, 0.2);
        }

        /* Alertas */
        .alert {
            margin-bottom: 1.5rem;
            border: 1px solid var(--color-oro);
            background-color: rgba(0, 0, 0, 0.8);
        }

        .alert-error { border-color: #dc3545; background-color: rgba(220, 53, 69, 0.1); }
        .alert-correcto { border-color: #198754; background-color: rgba(25, 135, 84, 0.1); }

        /* Búsqueda avanzada */
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

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--color-oro);
        }

        .advanced-search {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(212, 175, 55, 0.3);
        }

        /* Tablas */
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
        }

        /* Estados */
        .estado-activo { color: #28a745; font-weight: 600; }
        .estado-inactivo { color: #dc3545; font-weight: 600; }
        .estado-suspendido { color: #ffc107; font-weight: 600; }

        /* Contenedores */
        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        /* Paginación */
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

        /* Responsive */
        @media (max-width: 992px) {
            .table thead { display: none; }
            
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

        @media (max-width: 768px) {
            .search-grid {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }

            .btn-action {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Botón de volver -->
    <a href="../licencias_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="main-container">
        <h1 class="form-title">Actualización de Licencias</h1>

        <!-- Contenedor de resultados -->
        <div class="results-container">
            
        <?php
            if (isset($_SESSION["id_licencia"])) {
                $id_licencia = $_SESSION["id_licencia"];
                editarlicencia2 ($conn, $id_licencia);
            }
        ?>

        </div>
        <!-- Panel de Datos -->
        <div class="search-panel">
            <form action="insertarlicencias2.php" method="POST">
                <input type="hidden" name="id_licencia" value="<?php echo isset($_SESSION['id_licencia']) ? $_SESSION['id_licencia'] : ''; ?>">
                <div class="search-grid">
                    <!-- Corregir los campos del formulario -->
                    <div class="search-group">
                        <label for="id_licencia" class="form-label">ID_Licencia</label>
                        <input type="text" class="form-control" value="<?php echo isset($licencia['ID_Licencia']) ? $licencia['ID_Licencia'] : ''; ?>" name="id_licencia" readonly>
                    </div>
                    <div class="search-group">
                        <label for="tipo_licencia" class="form-label">Tipo_Licencia</label>
                        <select class="form-control" name="tipo_licencia">
                            <option value="" disabled>Selecciona un Tipo de Licencia</option>
                            <option value="Anual" <?php echo (isset($licencia) && $licencia['Tipo_Licencia'] == 'Anual') ? 'selected' : ''; ?>>Anual</option>
                            <option value="Federativa" <?php echo (isset($licencia) && $licencia['Tipo_Licencia'] == 'Federativa') ? 'selected' : ''; ?>>Federativa</option>
                            <option value="Especial" <?php echo (isset($licencia) && $licencia['Tipo_Licencia'] == 'Especial') ? 'selected' : ''; ?>>Especial</option>
                        </select>
                    </div>
                    <div class="search-group">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" value="<?php echo isset($licencia['Descripcion']) ? $licencia['Descripcion'] : ''; ?>" name="descripcion">
                    </div>
                    <div class="search-group">
                        <label for="vigencia" class="form-label">Vigencia (años)</label>
                        <input type="number" class="form-control" value="<?php echo isset($licencia['Vigencia']) ? $licencia['Vigencia'] : ''; ?>" name="vigencia">
                    </div>
                    <div class="search-group">
                        <label for="precio" class="form-label">Precio (€)</label>
                        <input type="number" step="0.01" class="form-control" value="<?php echo isset($licencia['Precio']) ? $licencia['Precio'] : ''; ?>" name="precio">
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit" name="actualizar" class="btn-actualizar">ACTUALIZAR LICENCIA</button>
                </div>
            </form>
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
