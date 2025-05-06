<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Privada - S. Cazadores LOS PIPORROS</title>
    <link rel = "stylesheet" href="./css/areaprivada.css">
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


        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-fondo);
            color: var(--color-texto);
            overflow-x: hidden;
        }


        .parallax-header {
            background-image: url('https://wallpaperaccess.com/full/412761.jpg');
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 60vh;
            position: relative;
        }

        .parallax-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
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


        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.9) !important;
            border-top: 1px solid var(--color-oro);
            border-bottom: 1px solid var(--color-oro);
        }

        .navbar-custom .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1rem;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }

        .navbar-custom .navbar-nav .nav-link .icon-nav {
            color: var(--color-oro);
        }

        .navbar-custom .navbar-nav .nav-link:hover,
        .navbar-custom .navbar-nav .active > .nav-link {
            color: var(--color-oro);
        }


        .dropdown-menu {
            background-color: rgba(0, 0, 0, 0.95);
            border: 1px solid var(--color-oro);
        }

        .dropdown-item {
            color: var(--color-texto);
            padding: 0.5rem 1.5rem;
            border-bottom: 1px solid #333;
            display: flex;
            align-items: center;
        }

        .dropdown-item:hover {
            background-color: rgba(212, 175, 55, 0.1);
            color: var(--color-oro);
        }


        .dashboard-card {
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .dashboard-icon {
            font-size: 2.5em;
            color: var(--color-oro);
            margin-bottom: 15px;
        }

        .dashboard-title {
            color: var(--color-oro);
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        
        .user-info {
            background-color: rgba(0, 0, 0, 0.8);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            border-radius: 10px;
            --transition-speed: 0.3s;
            --border-color: var(--color-oro);
            --shadow-color: rgba(212, 175, 55, 0.3);
            --background-opacity: 0.8;
        }
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid var(--color-oro);
            margin: 0 auto 15px;
            font-size: 2.5rem;
            color: var(--color-oro);
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .user-details {
            text-align: left;
            padding: 10px 0;
        }

        .user-details p {
            font-size: 0.9rem;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .user-details i {
            color: var(--color-oro);
            width: 20px;
            text-align: center;
        }

        
        .btn-gold {
            background-color: var(--color-oro);
            color: var(--color-fondo);
            font-weight: 600;
            border: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 5px 0;
            padding: 8px 15px;
            font-size: 0.9rem;
        }

        .btn-gold:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 1.5em;
            margin-right: 0.5rem;
        }

        .icon-nav {
            color: var(--color-oro);
            text-align: center;
            font-size: 1rem;
            width: 1.5em;
        }

        .icon-card {
            color: var(--color-oro);
            text-align: center;
            font-size: 3em;
            margin-bottom: 0.5rem;
        }

        .icon-list {
            color: var(--color-oro);
            text-align: center;
        }


        .footer {
            background-color: rgba(0, 0, 0, 0.8);
            border-top: 1px solid var(--color-oro);
            padding: 2rem 0;
            margin-top: 3rem;
        }

        .social-icons a {
            color: var(--color-oro);
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            color: var(--color-oro-claro);
            transform: translateY(-3px);
        }

        @media (max-width: 992px) {
            .parallax-header {
                background-attachment: scroll;
                height: 50vh;
            }
            
            .content-main, 
            .content-sidebar {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .header-content {
                text-align: center;
            }
            
            .logo-img {
                max-width: 120px;
            }
            
            .card-column {
                width: 100%;
            }
            
            .navbar-custom .navbar-nav .nav-link {
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
                    <a href="index.html"><img src="../PROYECTO PÁGINA/fotos/logo-aceuchal1-1.png" alt="Logo Los Piporros" class="logo-img mb-4"></a>
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
                        <a class="nav-link" href="historia.html">
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
                        <a class="nav-link dropdown-toggle" href="x" id="areaPrivadaDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-lock icon-nav"></i></span>
                            ÁREA PRIVADA
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="../PROYECTO PÁGINA/subpáginas/login.php">
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

    <!-- Contenido Principal -->
    <div class="container my-5">
        <div class="row">
            <!-- Sidebar con información del usuario -->
            <div class="col-lg-3">
                <div class="user-info text-center">
                    <div class="user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h4 class="text-gold mb-2">
                        
                    </h4>
                    <p class="mb-2">
                     
                    </p>
                    
                    <!-- Añadir botón de Editar Perfil -->
                    <i><?php echo "$apellido1 $apellido2, $nombre "?></i><br>
                    <a href="#" class="btn btn-gold btn-sm mb-2">
                        <i class="fas fa-user-edit me-2"></i>Editar Perfil
                    </a>
                    
                    <!-- Añadir información de Socio -->
                    <div class="user-details mt-3">
                        <p><i class="fas fa-id-badge me-2"></i>Nº Socio: <?php echo "$id_socio"?></p>
                        <p><i class="fas fa-calendar-alt me-2"></i>Antigüedad: <?php echo "$antiguedad"?></p>
                    </div>
                    
                    <a href="./" class="btn btn-gold btn-sm">
                        <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
                    </a>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="col-lg-9">
                <div class="row">
                    <!-- Tarjeta de Documentos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="dashboard-card text-center">
                            <i class="fas fa-file-alt dashboard-icon"></i>
                            <h3 class="dashboard-title">Documentos</h3>
                            <p>Accede a documentos importantes</p>
                            <a href="#" class="btn btn-gold btn-sm">Ver Documentos</a>
                        </div>
                    </div>

                    <!-- Tarjeta de Acuerdos -->
                    <div class="col-md-6 col-lg-4">
                        <div class="dashboard-card text-center">
                            <i class="fas fa-handshake dashboard-icon"></i>
                            <h3 class="dashboard-title">Acuerdos</h3>
                            <p>Consulta los últimos acuerdos</p>
                            <a href="#" class="btn btn-gold btn-sm">Ver Acuerdos</a>
                        </div>
                    </div>

                    <!-- Tarjeta de Cuentas -->
                    <div class="col-md-6 col-lg-4">
                        <div class="dashboard-card tewxt-center">
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

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <a href="index.html"><img src="../PROYECTO PÁGINA/fotos/logo-aceuchal1-1.png" class="img-fluid" style="max-height: 50px;"></a>
                </div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <h5 class="text-gold mb-3">CONTACTO</h5>
                    <p><span class="icon-wrapper"><i class="fas fa-phone icon-list"></i></span> 924 680 033</p>
                    <p><span class="icon-wrapper"><i class="fas fa-envelope icon-list"></i></span> info@sociotral.com</p>
                </div>
                <div class="col-md-4 text-center text-md-end">
                    <h5 class="text-gold mb-3">SÍGUENOS</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="mb-0">Sociedad de Cazadores LOS PIPORROS &copy; 2005-2023</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

