<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S. Cazadores LOS PIPORROS - Área Privada</title>

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Variables globales */
        :root {
            --color-oro: #D4AF37;
            --color-oro-claro: #e8c252;
            --color-oro-oscuro: #b8972e;
            --color-fondo: #111;
            --color-fondo-claro: #222;
            --color-texto: #eee;
            --transition: all 0.3s;
            --border-radius: 5px;
            --box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }
    
        /* Estilos base */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-fondo);
            color: var(--color-texto);
            overflow-x: hidden;
        }
    
        /* Utilidades */
        .flex-center {
            display: flex;
            align-items: center;
        }
        
        .text-center {
            text-align: center;
        }
        
        .transition-all {
            transition: var(--transition);
        }
        
        .border-gold {
            border: 1px solid var(--color-oro);
        }
        
        .bg-dark-transparent {
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        /* Header con efecto parallax */
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
            max-width: 400px;
            filter: drop-shadow(0 0 5px rgba(212, 175, 55, 0.7));
        }
        
        /* Sistema de iconos */
        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 1.5em;
            margin-right: 1rem;
        }
        
        .icon-nav, .icon-title, .icon-list {
            color: var(--color-oro);
        }
        
        .icon-nav {
            font-size: 1rem;
            width: 1.5em;
            text-align: center;
        }
        
        .icon-title {
            font-size: 1.2em;
            margin-right: 1rem;
        }
        
        .icon-list {
            margin-right: 0.8rem;
        }
        
        /* Menú de navegación */
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
            transition: var(--transition);
            display: flex;
            align-items: center;
        }
        
        .navbar-custom .navbar-nav .nav-link:hover,
        .navbar-custom .navbar-nav .active > .nav-link,
        .dropdown-item:hover {
            color: var(--color-oro);
        }
        
        /* Dropdown styles */
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
            transition: var(--transition);
        }
        
        /* Contenido principal */
        .main-container {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .content-section, .login-form, .sidebar {
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--color-oro);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--box-shadow);
            margin-bottom: 2rem;
        }
        
        .section-title {
            color: var(--color-oro);
            margin-bottom: 1.5rem;
            font-size: 1.8em;
            border-bottom: 2px solid var(--color-oro);
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .content-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .content-item {
            background-color: rgba(0, 0, 0, 0.5);
            border: 1px solid var(--color-oro-oscuro);
            border-radius: 8px;
            padding: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .content-item:hover {
            transform: translateY(-5px);
        }
        
        .item-title {
            color: var(--color-oro);
            font-size: 1.2em;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        /* Formulario */
        .form-group {
            margin-bottom: 20px;
        }
        
        .login-form label {
            font-size: 1.2em;
            margin-bottom: 5px;
            display: block;
        }
        
        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            border: 1px solid #444;
            color: #fff;
            border-radius: var(--border-radius);
            font-size: 1em;
        }
        
        /* Botones */
        .btn-gold {
            background-color: var(--color-oro);
            color: #000;
            font-weight: 600;
            border: none;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px;
            font-size: 1.2em;
            border-radius: var(--border-radius);
            cursor: pointer;
        }
        
        .btn-gold:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        /* Sidebar */
        .sidebar-title {
            border-bottom: 1px solid var(--color-oro);
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
        }
        
        .sidebar-link {
            color: var(--color-texto);
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #333;
            transition: var(--transition);
        }
        
        .sidebar-link:hover {
            color: var(--color-oro);
            padding-left: 5px;
        }
        
        /* Footer */
        .footer {
            background-color: #000000;
            border-top: 1px solid var(--color-oro);
            padding: 2rem 0;
            margin-top: 3rem;
        }
        
        /* Ajustes para el contenido del footer */
        .footer .text-gold {
            margin-bottom: 1rem;
            text-align: center;
            color: var(--color-oro);
        }
        
        /* Ajuste para los iconos y texto de contacto */
        .footer p {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.5rem;
        }
        
        .footer p .icon-wrapper {
            margin-right: 0.3rem;
        }
        
        /* Centrado de la sección "SÍGUENOS" */
        .footer .social-section {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 0.5rem;
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
        
        /* Texto del copyright */
        .footer .copyright {
            margin-top: 1.5rem;
            text-align: center;
            font-weight: 600;
            color: var(--color-oro);
            font-size: 1.1em;
            text-transform: uppercase;
            letter-spacing: 1px;
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
        
        /* Mensaje de error */
        .error-message {
            background-color: rgba(0, 0, 0, 0.9);
            color: var(--color-oro);
            padding: 1.5rem;
            margin: 15px auto;
            border-radius: var(--border-radius);
            text-align: center;
            max-width: 400px;
            font-weight: 500;
            border: 1px solid var(--color-oro);
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            animation: fadeIn 0.3s ease-in-out;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.3);
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -60%);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .main-container {
                flex-direction: column;
            }
            
            .content-sidebar {
                width: 100%;
                margin-top: 2rem;
            }
    
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
                max-width: 200px;
            }
    
            .navbar-custom .navbar-nav .nav-link {
                padding: 0.5rem 0.75rem;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>
<body>
    <!-- Header con efecto parallax -->
    <header class="parallax-header d-flex align-items-center">
        <div class="parallax-overlay"></div>
        <div class="container header-content text-center">
            <div class="row">
                <div class="col-12">
                    <a href="../index.php"><img src="../fotos/logosociedad.png" alt="Logo Los Piporros" class="logo-img mb-4"></a>
                    <h1 class="display-4 fw-bold mb-3">SOCIEDAD DE CAZADORES</h1>
                    <h2 class="h3">LOS PIPORROS</h2>
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
                        <a class="nav-link dropdown-toggle" href="documentación.html" id="documentacionDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-file-alt icon-nav"></i></span>
                            DOCUMENTACIÓN
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="documentación.html#actas-content">
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
                        <a class="nav-link dropdown-toggle" href="#" id="areaPrivadaDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-lock icon-nav"></i></span>
                            ÁREA PRIVADA
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="./subpáginas/login.php">
                                    <span class="icon-wrapper"><i class="fas fa-users-cog icon-nav"></i></span>
                                    ÁREA PRIVADA
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./subpáginas/admin/gestion_admin.php">
                                        <span class="icon-wrapper"><i class="fas fa-users icon-nav"></i></span>
                                        Gestión Socios
                                    </a></li>
                                    <li><a class="dropdown-item" href="./subpáginas/admin/licencias_admin.php">
                                        <span class="icon-wrapper"><i class="fas fa-id-card icon-nav"></i></span>
                                        Gestión de Licencias
                                    </a></li>
                                    <li><a class="dropdown-item" href="./subpáginas/admin/modalidades_admin.php">
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
                        <a class="nav-link dropdown-toggle" href="../../documentación.html" id="datosInteresDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-info-circle icon-nav"></i></span>
                            DATOS DE INTERÉS
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./documentos/cuadro limites zonas de seguridad y terrenos no cinegeticos.pdf">
                                <span class="icon-wrapper"><i class="fas fa-shield-alt icon-nav"></i></span>
                                ZONAS DE SEGURIDAD
                            </a></li>
                            <li><a class="dropdown-item" href="./documentos/Licencia de caza mayores 65.pdf">
                                <span class="icon-wrapper"><i class="fas fa-id-card icon-nav"></i></span>
                                LICENCIAS +65
                            </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="./contacto.html">
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
            <main class="col-lg-8">
                <div class="content-section">

                                    
                        <div class="login-form">
                            <h2><span class="icon-wrapper"><i class="fas fa-lock icon-title"></i></span>Área Privada</h2>
                            
                            <?php  ?>
                            <?php if(isset($_SESSION["Error"])): ?>
                            <div class="error-message">
                                <?php
                                 echo $_SESSION["Error"]; 
                                 unset($_SESSION["Error"]);
                                ?>
                            </div>
                            <?php endif; ?>
                            
                            <form action="login.php" method="POST">
                                <div class="form-group">
                                    <label for="username"><i class="fas fa-user icon-list"></i>DNI</label>
                                    <input type="text" name="DNI" placeholder="Introduce tu numero de DNI" required>
                                </div>
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-key icon-list"></i>NOMBRE</label>
                                    <input type="password" name="Nombre" placeholder="Introduce tu Nombre" required>
                                </div>
                                <button type="submit" class="btn-gold"><i class="fas fa-sign-in-alt icon-btn"></i> Iniciar sesión</button>
                            </form>
                        </div>
                </div>
            </main>
            
            <aside class="col-lg-4">
                <div class="sidebar mb-4">
                    <h3 class="sidebar-title"><span class="icon-wrapper"><i class="fas fa-history icon-title"></i></span> HISTORIA</h3>
                    <ul class="sidebar-menu">
                        <li class="sidebar-item"><a href="#" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-camera icon-list"></i></span>Galería fotográfica</a></li>
                        <li class="sidebar-item"><a href="../documentación.html" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-file-alt icon-list"></i></span>Documentación</a></li>
                        <li class="sidebar-item"><a href="../subpáginas/login.php" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-lock icon-list"></i></span>Área privada</a></li>
                        <li class="sidebar-item"><a href="../contacto.html" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-envelope icon-list"></i></span>Contacto</a></li>
                    </ul>
                </div>
                
                <div class="sidebar mb-4">
                    <h3 class="sidebar-title"><span class="icon-wrapper"><i class="fas fa-bullhorn icon-title"></i></span> ÚLTIMAS ENTRADAS</h3>
                    <div class="alert alert-dark" role="alert">
                        <span class="icon-wrapper"><i class="fas fa-exclamation-circle icon-list"></i></span> NADA ENCONTRADO
                    </div>
                </div>
            </aside>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <a href="https://aceuchal.com/"><img src="../fotos/logo-aceuchal1-1.png" class="img-fluid" style="max-height: 50px;"></a>
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
    <?php
    include_once("../php/funciones.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["Nombre"];
        $dni = $_POST["DNI"];
    
        iniciosesion($conn, $nombre, $dni);

    }
    ?>
</body>
</html>