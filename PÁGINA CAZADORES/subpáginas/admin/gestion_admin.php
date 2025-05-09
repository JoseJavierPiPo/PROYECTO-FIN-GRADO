<?php
session_start();
include_once("../../php/funciones.php");

// Verificar variables de sesión
$nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
$dni = isset($_SESSION['DNI']) ? $_SESSION['DNI'] : '';
$rol = isset($_SESSION['ROL']) ? $_SESSION['ROL'] : '';

// Verificar si el usuario es administrador
if ($rol !== 'Admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Socios - S. Cazadores LOS PIPORROS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
    :root {
    --color-oro: #D4AF37;
    --color-oro-claro: #e8c252;
    --color-oro-oscuro: #b8972e;
    --color-fondo: #111;
    --color-fondo-claro: #222;
    --color-texto: #eee;
}

/* Estructura Base */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--color-fondo);
    color: var(--color-texto);
    min-height: 100vh;
    display: flex;
    flex-direction: column;
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

/* Navegación */
.navbar-custom {
    background-color: rgba(0, 0, 0, 0.9) !important;
    border: 1px solid var(--color-oro);
    border-width: 1px 0;
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

.navbar-custom .icon-nav {
    color: var(--color-oro);
    font-size: 1rem;
    width: 1.5em;
}

/* Dropdown */
/* Corrección del menú desplegable */

/* Estilos para los iconos en el menú desplegable */
.dropdown-menu .icon-nav,
.dropdown-menu .icon-wrapper i {
    color: var(--color-oro) !important;
}

.dropdown-submenu .dropdown-menu .icon-nav,
.dropdown-submenu .dropdown-menu .icon-wrapper i {
    color: var(--color-oro) !important;
}

/* Aseguramos que los iconos mantengan el color oro incluso al hacer hover */
.dropdown-item:hover .icon-nav,
.dropdown-item:hover .icon-wrapper i {
    color: var(--color-oro) !important;
}
.dropdown-menu {
    background-color: rgba(0, 0, 0, 0.95) !important;
    border: 1px solid var(--color-oro);
}

.dropdown-item {
    color: var(--color-oro) !important;
    padding: 0.5rem 1.5rem;
    border-bottom: 1px solid #333;
    display: flex;
    align-items: center;
    background-color: transparent !important;
}

.dropdown-item i {
    color: var(--color-oro) !important;
}

.dropdown-item:hover {
    background-color: rgba(212, 175, 55, 0.1) !important;
    color: var(--color-oro-claro) !important;
}

.dropdown-submenu .dropdown-item i {
    color: var(--color-oro) !important;
}

.dropdown-item:hover {
    background-color: rgba(212, 175, 55, 0.1) !important;
    color: var(--color-oro) !important;
}

/* Contenido Principal */
.gestion-container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
    flex: 1;
}

.gestion-title {
    color: var(--color-oro);
    text-align: center;
    margin-bottom: 40px;
    font-size: 2.5em;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.gestion-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 2rem;
    padding: 2rem;
    margin: 0 auto;
    max-width: 1400px;
}

.gestion-card {
    background-color: rgba(0, 0, 0, 0.8);
    border: 1px solid var(--color-oro);
    border-radius: 10px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    min-height: 350px;
}

.gestion-icon {
    font-size: 3.5em;
    color: var(--color-oro) !important;
    margin-bottom: 1.5rem;
}

.gestion-card h3 {
    color: var(--color-oro);
    font-size: 1.5em;
    margin-bottom: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.gestion-card p {
    color: var(--color-texto);
    margin-bottom: 1.5rem;
    font-size: 1em;
    line-height: 1.5;
}

/* Botones */
.btn-gold {
    background-color: var(--color-oro);
    color: var(--color-fondo);
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 5px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    width: 100%;
    max-width: 200px;
    margin: 0 auto;
    display: block;
    text-align: center;
    position: relative;
    bottom: 1rem;
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

/* Footer */
.footer {
    background-color: #000;
    border-top: 1px solid var(--color-oro);
    padding: 2rem 0;
}

.text-gold {
    color: var(--color-oro);
    text-align: center;
    margin-bottom: 1rem;
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

/* Media Queries */
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
    
    .gestion-grid {
        grid-template-columns: 1fr;
        padding: 1rem;
    }
    
    .gestion-card {
        height: auto;
        min-height: 280px;
    }
    
    .navbar-custom .nav-link {
        padding: 0.5rem 0.75rem;
    }
}
</style>
<body>
    <!-- Header con efecto parallax -->
    <header class="parallax-header d-flex align-items-center">
        <div class="parallax-overlay"></div>
        <div class="container header-content">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="../../index.html"><img src="../../fotos/logo-aceuchal1-1.png" alt="Logo Los Piporros" class="logo-img mb-4"></a>
                    <h1 class="display-4 fw-bold mb-3">GESTIÓN DE SOCIOS - ÁREA PRIVADA</h1>
                    <h2 class="h3 nombre-sociedad">LOS PIPORROS</h2>
                </div>
            </div>
        </div>
    </header>

    <!-- Menú de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../../historia.html">
                            <span class="icon-wrapper"><i class="fas fa-landmark icon-nav"></i></span>
                            HISTORIA
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="galeriaDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-camera icon-nav"></i></span>
                            GALERÍA
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-images icon-nav"></i></span>
                                    BATIDAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2012-2013</a></li>
                                    <li><a class="dropdown-item" href="#">2013-2014</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-deer icon-nav"></i></span>
                                    RECECHOS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2013-2014</a></li>
                                    <li><a class="dropdown-item" href="#">2015-2016</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-calendar-alt icon-nav"></i></span>
                                    TEMPORADAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2013-2014</a></li>
                                    <li><a class="dropdown-item" href="#">2015-2016</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-calendar-day icon-nav"></i></span>
                                    JORNADAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2013-2014</a></li>
                                    <li><a class="dropdown-item" href="#">2015-2016</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="documentacionDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-file-alt icon-nav"></i></span>
                            DOCUMENTACIÓN
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-file-signature icon-nav"></i></span>
                                ACTAS
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-book icon-nav"></i></span>
                                ESTATUTOS
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-file-contract icon-nav"></i></span>
                                AUTORIZACIONES
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-gun icon-nav"></i></span>
                                ARMAS
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-gavel icon-nav"></i></span>
                                NORMATIVA
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-user-plus icon-nav"></i></span>
                                INSCRIPCIÓN SOCIOS
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="../PROYECTO PÁGINA/subpáginas/login.php" id="areaPrivadaDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-lock icon-nav"></i></span>
                             ÁREA PRIVADA 
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="./subpáginas/login.php">
                                    <span class="icon-wrapper"><i class="bi bi-folder-fill"></i></span>
                                     ÁREA PRIVADA
                                </a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-handshake icon-nav"></i></span>
                                    ACUERDOS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">
                                        <span class="icon-wrapper"><i class="fas fa-vote-yea icon-nav"></i></span>
                                        ELECCIONES
                                    </a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-calculator icon-nav"></i></span>
                                    CUENTAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2023-2024</a></li>
                                    <li><a class="dropdown-item" href="#">2022-2023</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">
                                    <span class="icon-wrapper"><i class="fas fa-map-marked-alt icon-nav"></i></span>
                                    COTOS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">ELECCIONES</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="datosInteresDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-info-circle icon-nav"></i></span>
                            DATOS DE INTERÉS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-map-marker-alt icon-nav"></i></span>
                                DIRECCIONES
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-shield-alt icon-nav"></i></span>
                                ZONAS DE SEGURIDAD
                            </a></li>
                            <li><a class="dropdown-item" href="#">
                                <span class="icon-wrapper"><i class="fas fa-id-card icon-nav"></i></span>
                                LICENCIAS +65
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="icon-wrapper"><i class="fas fa-envelope icon-nav"></i></span>
                            CONTACTO
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Botón de volver y contenido existente -->
    <a href="areaprivadaadmin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="gestion-container">
        <h1 class="gestion-title">Gestión de Socios</h1>
        
        <div class="gestion-grid">
            <div class="gestion-card">
                <i class="fas fa-user-plus gestion-icon"></i>
                <h3>Alta de Socios</h3>
                <p>Registrar nuevos socios en el sistema</p>
                <a href="gestion/alta_socios.php" class="btn btn-gold">Gestionar Altas</a>
            </div>

            <div class="gestion-card">
                <i class="fas fa-user-minus gestion-icon"></i>
                <h3>Baja de Socios</h3>
                <p>Procesar bajas de socios existentes</p>
                <a href="gestion/baja_socios.php" class="btn btn-gold">Gestionar Bajas</a>
            </div>

            <div class="gestion-card">
                <i class="fas fa-user-edit gestion-icon"></i>
                <h3>Modificar Socios</h3>
                <p>Actualizar información de socios</p>
                <a href="gestion/modificar_socios.php" class="btn btn-gold">Modificar Datos</a>
            </div>

            <div class="gestion-card">
                <i class="fas fa-users gestion-icon"></i>
                <h3>Filtrar Socios</h3>
                <p>Realiza una busqueda y filtra todos los socios</p>
                <a href="./gestion/filtrar_socio.php" class="btn btn-gold">Ver Listado</a>
            </div>
            
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <a href="https://aceuchal.com/"><img src="../../fotos/logo-aceuchal1-1.png" class="img-fluid" style="max-height: 50px;"></a>
                </div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <h5 class="text-gold">CONTACTO</h5>
                    <p><span class="icon-wrapper"><i class="fas fa-phone icon-list"></i></span>924 680 033</p>
                    <p><span class="icon-wrapper"><i class="fas fa-envelope icon-list"></i></span>info@sociotral.com</p>
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
    <!-- Scripts de Bootstrap -->
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
        });
    </script>
</body>
</html>

