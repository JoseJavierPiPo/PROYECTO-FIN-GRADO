<?php
session_start();
include_once("../../php/funciones.php");

// Verificar variables de sesión
$nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
$dni = isset($_SESSION['DNI']) ? $_SESSION['DNI'] : '';
$rol = isset($_SESSION['ROL']) ? $_SESSION['ROL'] : '';

// Verificar si el usuario es administrador
if ($rol !== 'Socio') {
    header("Location: ../login.php");
    exit();
}


// Only call mostrarvalores if both nombre and dni are set
if ($nombre && $dni) {
    mostrarvalores($conn, $nombre, $dni);
}

// Get session values with proper checks
$rol = isset($_SESSION['ROL'])? $_SESSION['ROL'] : '';
$nombre = isset($_SESSION['Nombre']) ? $_SESSION['Nombre'] : '';
$a1 = isset($_SESSION['Apellido1']) ? $_SESSION['Apellido1'] : '';
$a2 = isset($_SESSION['Apellido2']) ? $_SESSION['Apellido2'] : '';
$id_socio = isset($_SESSION['ID_Socio']) ? $_SESSION['ID_Socio'] : '' ;
$fecha_alta = isset($_SESSION['Fecha_Alta'])? $_SESSION['Fecha_Alta'] : '';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Privada - S. Cazadores LOS PIPORROS</title>
    
    <!-- Bootstrap CSS primero -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome después -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tu CSS personalizado al final  <link rel="stylesheet" href="../../css/areaprivadaadmin.css"> --> 
    <link rel="stylesheet" href="../../css/areaprivadasocio.css">
   
    
</head>
<body>
    <!-- Header con efecto parallax -->
    <header class="parallax-header d-flex align-items-center">
        <div class="parallax-overlay"></div>
        <div class="container header-content">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="../../index.html">
                        <img src="../../fotos/logosociedad.png" alt="Logo Los Piporros" class="logo-img mb-4">
                    </a>
                    <h1 class="display-4 fw-bold mb-3">SOCIEDAD DE CAZADORES</h1>
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
                        <a class="nav-link dropdown-toggle" href="x" id="documentacionDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-file-alt icon-nav"></i></span>
                            DOCUMENTACIÓN
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../documentación.html#actas-content">
                                <span class="icon-wrapper"><i class="fas fa-file-signature icon-nav"></i></span>
                                ACTAS
                            </a></li>
                            <li><a class="dropdown-item" href="../../documentación.html#estatutos-content">
                                <span class="icon-wrapper"><i class="fas fa-book icon-nav"></i></span>
                                ESTATUTOS
                            </a></li>
                            <li><a class="dropdown-item" href="../../documentación.html#autorizaciones-content">
                                <span class="icon-wrapper"><i class="fas fa-file-contract icon-nav"></i></span>
                                AUTORIZACIONES
                            </a></li>
                            <li><a class="dropdown-item" href="../../documentación.html#armas-content">
                                <span class="icon-wrapper"><i class="fas fa-gun icon-nav"></i></span>
                                ARMAS
                            </a></li>
                            <li><a class="dropdown-item" href="../../documentación.html#normativa-content">
                                <span class="icon-wrapper"><i class="fas fa-gavel icon-nav"></i></span>
                                NORMATIVA
                            </a></li>
                            <li><a class="dropdown-item" href="../../documentación.html#inscripcion-content">
                                <span class="icon-wrapper"><i class="fas fa-user-plus icon-nav"></i></span>
                                INSCRIPCIÓN SOCIOS
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="areaPrivadaDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-lock icon-nav"></i></span>
                            ÁREA PRIVADA
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="../../subpáginas/login.php">
                                    <span class="icon-wrapper"><i class="fas fa-users-cog icon-nav"></i></span>
                                    ÁREA PRIVADA
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../subpáginas/admin/gestion_admin.php">
                                        <span class="icon-wrapper"><i class="fas fa-users icon-nav"></i></span>
                                        Gestión Socios
                                    </a></li>
                                    <li><a class="dropdown-item" href="../../subpáginas/admin/licencias_admin.php">
                                        <span class="icon-wrapper"><i class="fas fa-id-card icon-nav"></i></span>
                                        Gestión de Licencias
                                    </a></li>
                                    <li><a class="dropdown-item" href="../../subpáginas/admin/modalidades_admin.php">
                                        <span class="icon-wrapper"><i class="fas fa-bullseye icon-nav"></i></span>
                                        Modalidades de Caza
                                    </a></li>
                                    <li><a class="dropdown-item" href="panel_admin.php">
                                        <span class="icon-wrapper"><i class="fas fa-user-shield icon-nav"></i></span>
                                        Panel Admin
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
                            <li><a class="dropdown-item" href="../../documentos/cuadro limites zonas de seguridad y terrenos no cinegeticos.pdf">
                                <span class="icon-wrapper"><i class="fas fa-shield-alt icon-nav"></i></span>
                                ZONAS DE SEGURIDAD
                            </a></li>
                            <li><a class="dropdown-item" href="../../documentos/Licencia de caza mayores 65.pdf">
                                <span class="icon-wrapper"><i class="fas fa-id-card icon-nav"></i></span>
                                LICENCIAS +65
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../../contacto.html">
                            <span class="icon-wrapper"><i class="fas fa-envelope icon-nav"></i></span>
                            CONTACTO
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Contenido principal -->
    <div class="container my-5">
        <div class="row">
            <div class="container-fluid mt-5">
                <div class="row">
                    <!-- Perfil del Usuario (mitad superior) -->
                    <div class="col-12 mb-4">
                        <div class="user-info p-4">
                            <div class="row align-items-center">
                                <div class="col-md-3 text-center">
                                    <div class="user-avatar mb-3">
                                        <i class="fas fa-user fa-4x"></i> 
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h3>Información del Usuario</h3>
                                    <div class="row">    
                                        <div class="col-md-6">
                                            <p><i class="fas fa-id-card me-2"></i> ID: <?php echo "$id_socio"?></p>
                                            <p><i class="fas fa-user me-2"></i> Nombre: <?php echo "$nombre"?></p>
                                            <p><i class="fas fa-user-tag me-2"></i> Rol: <?php echo "$rol"?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><i class="fas fa-user me-2"></i> Apellidos: <?php echo "$a1 $a2"?></p>
                                            <p><i class="fas fa-calendar-alt me-2"></i> Antigüedad: <?php echo "$fecha_alta"?></p>
                                            <p><i class="fas fa-user-check me-2"></i> Estado: <?php echo isset($_SESSION["Estado"]) ? $_SESSION["Estado"] : "Activo" ?></p>
                                        </div>
                                    </div>
                                    <div class="text-end mt-3">
                                        <a href="../../php/cerrar_sesion.php" class="btn btn-gold">
                                            <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <!-- Tarjetas de Gestión (mitad inferior) -->
                    <div class="col-12">
                        <div class="row">
                            <!-- Tarjeta de Documentos -->
                            <div class="col-md-4">
                                <div class="dashboard-card text-center h-100">
                                    <i class="fas fa-file-alt dashboard-icon"></i>
                                    <h3 class="dashboard-title">Documentos</h3>
                                    <p>Accede a documentos importantes</p>
                                    <a href="#" class="btn btn-gold btn-sm">Ver Documentos</a>
                                </div>
                            </div>

                            <!-- Tarjeta de Acuerdos -->
                            <div class="col-md-4">
                                <div class="dashboard-card text-center h-100">
                                    <i class="fas fa-handshake dashboard-icon"></i>
                                    <h3 class="dashboard-title">DATOS DEL SOCIO</h3>
                                    <p>Consulta las novedades del socio</p>
                                    <a href="./socio/datossocio.php" class="btn btn-gold btn-sm">Ver Datos</a>
                                </div>
                            </div>

                            <!-- Tarjeta de Cuentas -->
                            <div class="col-md-4">
                                <div class="dashboard-card text-center h-100">
                                    <i class="fas fa-calculator dashboard-icon"></i>
                                    <h3 class="dashboard-title">Cuentas</h3>
                                    <p>Revisa el estado financiero</p>
                                    <a href="#" class="btn btn-gold btn-sm">Ver Cuentas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    
    <!-- Bootstrap JS -->
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