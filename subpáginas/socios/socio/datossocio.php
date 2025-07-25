<?php
session_start();
include_once("../../../php/funciones.php");

// Verificar variables de sesión
$nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
$dni = isset($_SESSION['DNI']) ? $_SESSION['DNI'] : '';
$rol = isset($_SESSION['ROL']) ? $_SESSION['ROL'] : '';

// Verificar si el usuario es administrador
if ($rol !== 'Socio') {
    header("Location: ../login.php");
    exit();
}

if ($nombre && $dni) {
    $rol = isset($_SESSION['ROL'])? $_SESSION['ROL'] : '';
    $nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
    $a1 = isset($_SESSION['Apellido1']) ? $_SESSION['Apellido1'] : '';
    $a2 = isset($_SESSION['Apellido2']) ? $_SESSION['Apellido2'] : '';
    $id_socio = isset($_SESSION['ID_Socio']) ? $_SESSION['ID_Socio'] : '';
    $fecha_alta = isset($_SESSION['Fecha_Alta'])? $_SESSION['Fecha_Alta'] : '';
    $fecha_nacimiento = isset($_SESSION['Fecha_Nacimiento']) ? $_SESSION['Fecha_Nacimiento'] : '';
    $localidad = isset($_SESSION['Localidad']) ? $_SESSION['Localidad'] : '';
    $domicilio = isset($_SESSION['Domicilio']) ? $_SESSION['Domicilio'] : '';
    $codigo_postal = isset($_SESSION['Codigo_Postal']) ? $_SESSION['Codigo_Postal'] : '';
    $telefono = isset($_SESSION['Telefono']) ? $_SESSION['Telefono'] : '';
    $estado = isset($_SESSION['Estado']) ? $_SESSION['Estado'] : '';
    $email = isset($_SESSION['Email']) ? $_SESSION['Email'] : '';
    $fecha_baja = isset($_SESSION['Fecha_Baja'])? $_SESSION['Fecha_Baja'] : '';
    mostrarvalores($conn, $nombre, $dni);
}

if ($id_socio) {
    $id_socio = isset ($_SESSION['ID_Socio'])? $_SESSION['ID_Socio'] : '';
    $id_licencia = isset ($_SESSION['ID_Licencia'])? $_SESSION['ID_Licencia'] : '';
    $fecha_expedicion = isset ($_SESSION['Fecha_Expedicion'])? $_SESSION['Fecha_Expedicion'] : '';
    $fecha_caducidad = isset ($_SESSION['Fecha_Caducidad'])? $_SESSION['Fecha_Caducidad'] : '';
    $numero_licencia = isset ($_SESSION['Numero_Licencia'])? $_SESSION['Numero_Licencia'] : '';
    $numero_licencia_federativa = isset ($_SESSION['Numero_Licencia_federativa'])? $_SESSION['Numero_Licencia_federativa'] : '';
    $estado = isset ($_SESSION['Estado'])? $_SESSION['Estado'] : '';
    mostrarvalores2($conn, $id_socio);

    mostrarvalores3($conn, $id_socio);
    $nombre_modalidad = isset ($_SESSION['Nombre_Modalidad'])? $_SESSION['Nombre_Modalidad'] : '';
    $descripcion = isset ($_SESSION['Descripcion'])? $_SESSION['Descripcion'] : '';
    $temporada_inicio = isset ($_SESSION['Temporada_Inicio'])? $_SESSION['Temporada_Inicio'] : '';
    $temporada_fin = isset ($_SESSION['Temporada_Fin'])? $_SESSION['Temporada_Fin'] : '';
    $tipo_caza = isset ($_SESSION["Tipo_Caza"])? $_SESSION["Tipo_Caza"] : '';
    $arma_predominante = isset ($_SESSION["Arma_Predominante"])? $_SESSION["Arma_Predominante"] : '';
    $requiere_permiso_especial = isset ($_SESSION["Requiere_Permiso_Especial"])? $_SESSION["Requiere_Permiso_Especial"] : '';
    $fecha_registro = isset ($_SESSION["Fecha_Registro"])? $_SESSION["Fecha_Registro"] : '';

    mostrarpagos($conn,$id_socio);
    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S. Cazadores LOS PIPORROS</title>

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

    /* Estilos base */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--color-fondo);
        color: var(--color-texto);
        overflow-x: hidden;
    }

    /* Header */
    .parallax-header {
        background: url('https://wallpaperaccess.com/full/412761.jpg') fixed center/cover;
        height: 60vh;
        position: relative;
    }

    .parallax-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.6);
    }

    .header-content {
        position: relative;
        z-index: 2;
    }

    .logo-img {
        max-width: 150px;
        filter: drop-shadow(0 0 5px rgba(212, 175, 55, 0.7));
    }

    .nombre-sociedad {
        text-align: center;
        width: 100%;
        display: block;
    }

    /* Navbar */
    .navbar-custom {
        background-color: rgba(0, 0, 0, 0.9) !important;
        border-top: 1px solid var(--color-oro);
        border-bottom: 1px solid var(--color-oro);
    }

    .navbar-custom .nav-link {
        color: white;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 0.5rem 1rem;
        transition: all 0.3s;
        display: flex;
        align-items: center;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .active > .nav-link {
        color: var(--color-oro);
    }

    /* Dropdown */
    .dropdown-menu {
        background-color: rgba(0, 0, 0, 0.95) !important;
        border: 1px solid var(--color-oro);
    }

    .dropdown-item {
        color: var(--color-texto) !important;
        padding: 0.5rem 1.5rem;
        border-bottom: 1px solid #333;
        display: flex;
        align-items: center;
        background-color: transparent !important;
    }

    .dropdown-item:hover {
        background-color: rgba(212, 175, 55, 0.1) !important;
        color: var(--color-oro) !important;
    }

    /* Iconos */
    .icon-nav,
    .dropdown-menu .icon-nav {
        color: var(--color-oro);
        font-size: 1rem;
        width: 1.5em;
    }

    .icon-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 1.5em;
        margin-right: 0.5rem;
    }

    .icon-card {
        font-size: 3em;
        margin-bottom: 0.5rem;
        color: var(--color-oro);
    }

    .icon-list {
        margin-right: 0.5rem;
        color: var(--color-oro);
    }

    .icon-info {
        color: var(--color-oro);
        width: 25px;
        margin-right: 10px;
    }

    .dashboard-icon {
        font-size: 2.5rem;
        color: var(--color-oro);
        margin-bottom: 1rem;
    }

    /* Botones */
    .btn-gold {
        background-color: var(--color-oro);
        color: #000;
        font-weight: 600;
        border: none;
        transition: all 0.3s;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-gold:hover {
        background-color: var(--color-oro-claro);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
    }

    .back-button:hover {
        background-color: var(--color-oro-claro);
        transform: translateX(-5px);
    }

    .back-button i {
        font-size: 1.1em;
    }

    /* Footer */
    .footer {
        background-color: #000;
        border-top: 1px solid var(--color-oro);
        padding: 2rem 0;
        margin-top: 3rem;
    }

    .text-gold {
        color: var(--color-oro);
        margin-bottom: 1rem;
        text-align: center;
    }

    .footer p {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.5rem;
    }

    .social-section {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 0.5rem;
    }

    .social-icons a {
        color: var(--color-oro);
        font-size: 1.5rem;
        transition: all 0.3s;
    }

    .social-icons a:hover {
        color: var(--color-oro-claro);
        transform: translateY(-3px);
    }

    .copyright {
        margin-top: 1.5rem;
        text-align: center;
        font-weight: 600;
        color: var(--color-oro);
        font-size: 1.1em;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Dashboard Cards */
    .dashboard-card {
        background-color: rgba(0, 0, 0, 0.8);
        border: 1px solid var(--color-oro);
        border-radius: 10px;
        transition: transform 0.3s ease;
        height: 100%;
        margin-bottom: 20px;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
    }

    .card-header {
        border-bottom: 1px solid var(--color-oro);
        padding: 1.5rem;
        background-color: rgba(0, 0, 0, 0.9);
        border-radius: 10px 10px 0 0;
    }

    .dashboard-title {
        color: var(--color-oro);
        font-size: 1.5rem;
        margin-bottom: 0;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* Items */
    .licencia-item, 
    .modalidad-item, 
    .pago-item {
        border-bottom: 1px solid var(--color-oro-oscuro);
        padding: 1rem 0;
    }

    .licencia-item:last-child, 
    .modalidad-item:last-child, 
    .pago-item:last-child {
        border-bottom: none;
    }

    h4 {
        color: var(--color-oro);
        font-size: 1.2rem;
        margin-bottom: 1rem;
        text-align: center;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .parallax-header {
            background-attachment: scroll;
            height: 50vh;
        }
    }

    @media (max-width: 768px) {
        .header-content {
            text-align: center;
        }
        
        .logo-img {
            max-width: 120px;
        }
        
        .navbar-custom .nav-link {
            padding: 0.5rem 0.75rem;
        }
        
        .back-button {
            top: 10px;
            left: 10px;
            padding: 8px 15px;
            font-size: 0.9em;
        }
        
        .col-md-4 {
            margin-bottom: 20px;
        }
    }

</style>

</head>
<body>
    

    <!-- Header con efecto parallax -->
    <header class="parallax-header d-flex align-items-center">
        <div class="parallax-overlay"></div>
        <div class="container header-content">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="index.php"><img src="../../../fotos/logosociedad.png" alt="Logo Los Piporros" class="logo-img mb-4"></a>
                    <h1 class="display-4 fw-bold mb-3">SOCIEDAD DE CAZADORES</h1>
                    <h2 class="h3 nombre-sociedad">LOS PIPORROS</h2>
                </div>
            </div>
        </div>
    </header>

    
    <!-- Contenido principal -->
<div class="container mt-5">
    <!-- Sección de información personal modificada -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark border-gold mb-4">
                <div class="card-header bg-black text-gold">
                    <h3><i class="fas fa-user-circle me-2"></i>Información Personal</h3>
                </div>
                <div class="card-body text-white">
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-id-card icon-info"></i>ID: <?php echo $id_socio; ?></p>
                            <p><i class="fas fa-address-card icon-info"></i>DNI: <?php echo $dni; ?></p>
                            <p><i class="fas fa-user icon-info"></i>Nombre: <?php echo $nombre; ?></p>
                            <p><i class="fas fa-users icon-info"></i>Apellidos: <?php echo "$a1 $a2"; ?></p>
                            <p><i class="fas fa-birthday-cake icon-info"></i>Fecha Nacimiento: <?php echo $fecha_nacimiento; ?></p>
                            <p><i class="fas fa-map-marker-alt icon-info"></i>Localidad: <?php echo $localidad; ?></p>
                            <p><i class="fas fa-home icon-info"></i>Domicilio: <?php echo $domicilio; ?></p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-mail-bulk icon-info"></i>Código Postal: <?php echo $codigo_postal; ?></p>
                            <p><i class="fas fa-phone icon-info"></i>Teléfono: <?php echo $telefono; ?></p>
                            <p><i class="fas fa-envelope icon-info"></i>Email: <?php echo $email; ?></p>
                            <p><i class="fas fa-calendar-plus icon-info"></i>Fecha Alta: <?php echo $fecha_alta; ?></p>
                            <p><i class="fas fa-calendar-minus icon-info"></i>Fecha Baja: <?php echo $fecha_baja; ?></p>
                            <p><i class="fas fa-user-shield icon-info"></i>Estado: <?php echo $estado; ?></p>
                            <p><i class="fas fa-user-tag icon-info"></i>ROL: <?php echo $rol; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Licencias -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark border-gold mb-4">
                <div class="card-header bg-black text-gold">
                    <h3><i class="fas fa-id-card me-2"></i>Licencias</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Número de Licencia</th>
                                    <th>Licencia Federativa</th>
                                    <th>Fecha Expedición</th>
                                    <th>Fecha Caducidad</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo isset($numero_licencia) ? $numero_licencia : 'No disponible'; ?></td>
                                    <td><?php echo isset($numero_licencia_federativa) ? $numero_licencia_federativa : 'No disponible'; ?></td>
                                    <td><?php echo isset($fecha_expedicion) ? $fecha_expedicion : 'No disponible'; ?></td>
                                    <td><?php echo isset($fecha_caducidad) ? $fecha_caducidad : 'No disponible'; ?></td>
                                    <td><span class="badge bg-<?php echo isset($estado) ? ($estado == 'Activo' ? 'success' : 'danger') : 'secondary'; ?>"><?php echo isset($estado) ? $estado : 'No disponible'; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Modalidades -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark border-gold mb-4">
                <div class="card-header bg-black text-gold">
                    <h3><i class="fas fa-bullseye me-2"></i>Modalidades de Caza</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Modalidad</th>
                                    <th>Tipo de Caza</th>
                                    <th>Temporada</th>
                                    <th>Arma Predominante</th>
                                    <th>Permiso Especial</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo isset($nombre_modalidad) ? $nombre_modalidad : 'No disponible'; ?></td>
                                    <td><?php echo isset($tipo_caza) ? $tipo_caza : 'No disponible'; ?></td>
                                    <td><?php echo (isset($temporada_inicio) && isset($temporada_fin)) ? ($temporada_inicio.' - '.$temporada_fin) : 'No disponible'; ?></td>
                                    <td><?php echo isset($arma_predominante) ? $arma_predominante : 'No disponible'; ?></td>
                                    <td><?php echo isset($permiso_especial) ? $permiso_especial : 'No disponible'; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Pagos -->
    <div class="row">
        <div class="col-12">
            <div class="card bg-dark border-gold mb-4">
                <div class="card-header bg-black text-gold">
                    <h3><i class="fas fa-money-bill-wave me-2"></i>Estado de Pagos</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>Concepto</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Fecha de Pago</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo isset($_SESSION["Concepto"]) ? $_SESSION["Concepto"] : 'No disponible'; ?></td>
                                    <td><?php echo isset($_SESSION["Descripcion"]) ? $_SESSION["Descripcion"] : 'No disponible'; ?></td>
                                    <td><?php echo isset($_SESSION["Monto"]) ? $_SESSION["Monto"] . '€' : 'No disponible'; ?></td>
                                    <td><?php echo isset($_SESSION["Fecha_Pago"]) ? $_SESSION["Fecha_Pago"] : 'No disponible'; ?></td>
                                    <td><span class="badge bg-<?php echo isset($_SESSION["Estado_Pago"]) && $_SESSION["Estado_Pago"] == 'Pagado' ? 'success' : 'danger'; ?>"><?php echo isset($_SESSION["Estado_Pago"]) ? $_SESSION["Estado_Pago"] : 'Pendiente'; ?></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



    <!-- Botón Volver -->
    <a href="../areaprivadasocio.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <a href="https://aceuchal.com/"><img src="../../../fotos/logo-aceuchal1-1.png" class="img-fluid" style="max-height: 50px;"></a>
                </div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <h5 class="text-gold">CONTACTO</h5>
                    <p><span class="icon-wrapper"><i class="fas fa-phone icon-list"></i></span>924 680 033</p>
                    <p><span class="icon-wrapper"><i class="fas fa-envelope icon-list"></i></span>cazadorespiporros@hotmail.com</p>
                </div>
                <div class="col-md-4 social-section">
                    <h5 class="text-gold">SÍGUENOS</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <p class="copyright">Sociedad de Cazadores LOS PIPORROS &copy; 2005-2023</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Botones JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Efecto parallax
        document.addEventListener('DOMContentLoaded', function() {
            const parallaxHeader = document.querySelector('.parallax-header');
            const headerHeight = parallaxHeader.offsetHeight;
            
            window.addEventListener('scroll', function() {
                const scrollPosition = window.pageYOffset;
                const limit = headerHeight;
                
                if (scrollPosition <= limit) {
                    parallaxHeader.style.backgroundPositionY = scrollPosition * 0.5 + 'px';
                }
            });
            
            // Submenús en dropdown
            const dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');
            
            dropdownSubmenus.forEach(function(item) {
                item.addEventListener('mouseenter', function() {
                    this.querySelector('.dropdown-menu').classList.add('show');
                });
                
                item.addEventListener('mouseleave', function() {
                    this.querySelector('.dropdown-menu').classList.remove('show');
                });
            });
        });
    </script>
</body>
</html>





