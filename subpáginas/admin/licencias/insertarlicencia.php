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
    $id_licencia = $_POST['id_licencia'];
    $tipo_licencia = $_POST['tipo_licencia'];
    $descripcion = $_POST['descripcion'];
    $vigencia = $_POST['vigencia'];
    $precio = $_POST['precio'];

    insertarlicencia($conn, $id_licencia, $tipo_licencia, $descripcion, $vigencia, $precio);
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
            justify-content: center;
            padding: 2rem;
        }

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
            padding: 2rem;
            margin: 2rem auto;
            max-width: 800px;
            width: 100%;
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
    <a href="../licencias_admin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="container">
        <div class="form-container">
                    <h1 class="form-title">Insertar Licencia</h1>
                    
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

                    <form method="POST" action="insertarlicencia.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_licencia" class="form-label">ID de la Licencia a Registrar</label>
                                    <input type="number" class="form-control" name="id_licencia" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipo_licencia" class="form-label">Tipo de Licencia</label>
                                    <select class="form-control" name="tipo_licencia" required>
                                        <option value="" disabled selected>Selecciona un Tipo de Licencia</option>
                                        <option value="Anual">Anual</option>
                                        <option value="Federativa">Federativa</option>
                                        <option value="Especial">Especial</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="vigencia" class="form-label">Vigencia en Años</label>
                                    <input type="number" class="form-control" name="vigencia" required>
                                    <p>1 año para Anual, 1-3 para federativas</p>
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" class="form-control" name="precio" required placeholder="€">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-gold">
                            <i class="fas fa-plus-circle me-2"></i>INSERTAR LICENCIA
                        </button>
                    </form>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>