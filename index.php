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
    /* Estructura Base */
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
        max-width: 400px;
        filter: drop-shadow(0 0 5px rgba(212, 175, 55, 0.7));
    }

    .nombre-sociedad {
        text-align: center;
        width: 100%;
        display: block;
    }

    /* Navegación */
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

    /* Iconos en navbar y dropdown */
    .navbar-custom .icon-nav,
    .dropdown-menu .icon-nav {
        color: var(--color-oro);
        font-size: 1rem;
        width: 1.5em;
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

    /* Contenido principal */
    .main-content {
        background-color: rgba(0, 0, 0, 0.7);
        border: 1px solid #333;
        border-radius: 5px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }

    .section {
        padding: 2rem;
        border-bottom: 1px solid #333;
    }

    .section:last-child {
        border-bottom: none;
    }

    h2, h3 {
        color: var(--color-oro);
        font-weight: 700;
        text-transform: uppercase;
    }

    h2 {
        border-bottom: 2px solid var(--color-oro);
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
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

    /* Sidebar */
    .sidebar {
        background-color: rgba(20, 20, 20, 0.8);
        border: 1px solid #333;
        border-radius: 5px;
        padding: 1.5rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .sidebar-title {
        color: var(--color-oro);
        border-bottom: 1px solid var(--color-oro);
        padding-bottom: 0.5rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .sidebar-menu {
        list-style: none;
        padding-left: 0;
    }

    .sidebar-item {
        margin-bottom: 0.5rem;
    }

    .sidebar-link {
        color: var(--color-texto);
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #333;
        transition: all 0.3s;
    }

    .sidebar-link:hover {
        color: var(--color-oro);
        padding-left: 5px;
    }
    /* MINI CALENDARIO */
    #mini-calendario .datepicker-inline {
        width: 100%;
        max-width: 250px;  /* Reducido de 300px */
        margin: 0 auto;
        background: rgba(0, 0, 0, 0.8);
        padding: 10px;     /* Reducido de 15px */
        border-radius: 8px;
        border: 1px solid var(--color-oro);
    }

    #mini-calendario .datepicker table {
        width: 100%;
        background-color: var(--color-fondo);
    }

    #mini-calendario .datepicker table tr td,
    #mini-calendario .datepicker table tr th {
        color: var(--color-texto);
        background-color: var(--color-fondo);
        border: 1px solid var(--color-oro-oscuro);
        padding: 0.2rem;   /* Reducido de 0.3rem */
        font-size: 0.8rem; /* Reducido de 0.9rem */
    }

    #mini-calendario .datepicker table tr td.active {
        background-color: var(--color-oro) !important;
        color: var(--color-fondo) !important;
    }

    #mini-calendario .datepicker table tr td.today {
        background-color: rgba(212, 175, 55, 0.3) !important;
        color: var(--color-oro) !important;
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

    /* Sistema de iconos */
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

    /* Sistema de columnas */
    .content-main {
        flex: 0 0 auto;
        width: 66.66666667%;
    }

    .content-sidebar {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .card-column {
        flex: 0 0 auto;
        width: 50%;
        padding: 0 0.75rem;
        margin-bottom: 1.5rem;
    }

    /* Cards */
    .feature-card {
        background-color: var(--color-fondo);
        border: 1px solid var(--color-oro-oscuro);
        border-radius: 0.25rem;
        height: 100%;
        transition: all 0.3s;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .feature-card-body {
        padding: 1.5rem;
        text-align: center;
    }

    /* Responsive */
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
            max-width: 200px; 
        }
        
        .card-column {
            width: 100%;
        }
        
        .navbar-custom .nav-link {
            padding: 0.5rem 0.75rem;
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
                    <a href="index.php"><img src="./fotos/logosociedad.png" alt="Logo Los Piporros" class="logo-img mb-4"></a>
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
                        <a class="nav-link dropdown-toggle" href="./galeria.html" id="galeriaDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="icon-wrapper"><i class="fas fa-camera icon-nav"></i></span>
                            GALERÍA
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="./galeria.html">
                                    <span class="icon-wrapper"><i class="fas fa-images icon-nav"></i></span>
                                    BATIDAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./galeria.html">2012-2013</a></li>
                                    <li><a class="dropdown-item" href="./galeria.html">2013-2014</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="./galeria.html">
                                    <span class="icon-wrapper"><i class="fas fa-deer icon-nav"></i></span>
                                    RECECHOS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./galeria.html">2013-2014</a></li>
                                    <li><a class="dropdown-item" href="./galeria.html">2015-2016</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="./galeria.html">
                                    <span class="icon-wrapper"><i class="fas fa-calendar-alt icon-nav"></i></span>
                                    TEMPORADAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./galeria.html">2013-2014</a></li>
                                    <li><a class="dropdown-item" href="./galeria.html">2015-2016</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="./galeria.html">
                                    <span class="icon-wrapper"><i class="fas fa-calendar-day icon-nav"></i></span>
                                    JORNADAS
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./galeria.html">2013-2014</a></li>
                                    <li><a class="dropdown-item" href="./galeria.html">2015-2016</a></li>
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
                                    ÁREA PRIVADA ADMINISTRATIVA
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
                            <a class="dropdown-item" href="./subpáginas/socios/areaprivadasocio.php">
                                <span class="icon-wrapper"><i class="fas fa-users-cog icon-nav"></i></span>
                                ÁREA PRIVADA SOCIOS
                            </a>
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
    
    <!-- Contenido Principal -->
    <div class="container my-5">
        <div class="row">
            <main class="content-main">
                <div class="main-content">
                    <div class="section">
                        <h2><span class="icon-wrapper"><i class="fas fa-handshake icon-title"></i></span> Bienvenidos a la Sociedad de Cazadores Los Piporros</h2>
                        <p>Somos una sociedad deportiva dedicada a la práctica de la caza en nuestro territorio, respetando la tradición y el medio ambiente.</p>
                        <p>Nuestra organización tiene como objetivo principal fomentar la práctica de la caza responsable y sostenible, así como mantener las tradiciones cinegéticas locales.</p>
                        
                        <div class="row mt-4">
                            <div class="card-column">
                                <div class="feature-card">
                                    <div class="feature-card-body">
                                        <div class="icon-wrapper"><i class="fas fa-calendar-alt icon-card"></i></div>
                                        <h4 class="card-title">Eventos Anuales</h4>
                                        <p class="card-text">Participa en nuestras actividades programadas durante todo el año.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-column">
                                <div class="feature-card">
                                        <div class="feature-card-body">
                                            <a href="./documentos/normativa.doc"><div class="icon-wrapper"><i class="fas fa-book icon-card"></i></div></a>
                                            <h4 class="card-title">Normativa</h4>
                                            <p class="card-text">Consulta nuestra normativa y regulaciones para una caza responsable.</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section">
                        <h3><span class="icon-wrapper"><i class="fas fa-newspaper icon-title"></i></span> Noticias</h3>
                        <div class="alert alert-dark" role="alert">
                            <span class="icon-wrapper"><i class="fas fa-info-circle icon-list"></i></span> No hay noticias disponibles en este momento.
                        </div>
                        <a href="#" class="btn btn-gold mt-2"><span class="icon-wrapper"><i class="fas fa-list icon-btn"></i></span>Ver todas las noticias</a>
                    </div>
                    
                    <div class="section">
                        <h3><span class="icon-wrapper"><i class="fas fa-calendar-check icon-title"></i></span> Calendario</h3>
                        <div id="mini-calendario" class="mt-3"></div>
                        <a href="./documentos/CALENDARIO DE CAZA 24-25.pdf" class="btn btn-gold mt-2"><span class="icon-wrapper"><i class="fas fa-calendar-alt icon-btn"></i></span>Ver calendario completo</a>
                    </div>
                    
                
                </div>
            </main>
            
            <aside class="content-sidebar">
                <div class="sidebar mb-4">
                    <h3 class="sidebar-title"><span class="icon-wrapper"><i class="fas fa-history icon-title"></i></span> HISTORIA</h3>
                    <ul class="sidebar-menu">
                        <li class="sidebar-item"><a href="#" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-camera icon-list"></i></span>Galería fotográfica</a></li>
                        <li class="sidebar-item"><a href="./documentación.html" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-file-alt icon-list"></i></span>Documentación</a></li>
                        <li class="sidebar-item"><a href="./subpáginas/login.php" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-lock icon-list"></i></span>Área privada</a></li>
                        <li class="sidebar-item"><a href="./contacto.html" class="sidebar-link"><span class="icon-wrapper"><i class="fas fa-envelope icon-list"></i></span>Contacto</a></li>
                    </ul>
                </div>
                
                <div class="sidebar mb-4">
                    <h3 class="sidebar-title"><span class="icon-wrapper"><i class="fas fa-search icon-title"></i></span> BUSCAR</h3>
                    <form class="search-form">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-dark text-white border-secondary" placeholder="Buscar...">
                            <button class="btn btn-gold" type="submit"><span class="icon-wrapper"><i class="fas fa-search"></i></span></button>
                        </div>
                    </form>
                    
                    <h3 class="sidebar-title mt-4"><span class="icon-wrapper"><i class="fas fa-bullhorn icon-title"></i></span> ÚLTIMAS ENTRADAS</h3>
                    <div class="alert alert-dark" role="alert">
                        <span class="icon-wrapper"><i class="fas fa-exclamation-circle icon-list"></i></span> NADA ENCONTRADO
                    </div>
                </div>
                
                <div class="sidebar">
                    <h3 class="sidebar-title"><span class="icon-wrapper"><i class="fas fa-trophy icon-title"></i></span> TROFEOS</h3>
                    <img src="https://via.placeholder.com/300x200.png?text=TROFEOS" alt="Trofeos" class="img-fluid rounded mb-3">
                    <p>Galería de los mejores trofeos de la temporada.</p>
                    <a href="#" class="btn btn-gold btn-sm w-100"><span class="icon-wrapper"><i class="fas fa-eye icon-btn"></i></span>Ver más</a>
                </div>
            </aside>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <a href="https://aceuchal.com/"><img src="./fotos/logo-aceuchal1-1.png" class="img-fluid" style="max-height: 50px;"></a>
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
    

     <!-- Antes de Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        if ($.fn.datepicker) {
            $('#mini-calendario').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                todayHighlight: true,
                autoclose: true,
                defaultViewDate: { year: 2024, month: 0, day: 1 }
            });
        }
    });
    </script>

</body>
</html>