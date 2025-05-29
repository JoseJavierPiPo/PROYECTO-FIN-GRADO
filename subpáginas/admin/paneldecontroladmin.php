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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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
        max-width: 350px;
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
    /* Contenido principal */

    .gestion-container {
        max-width: 1200px;
        margin: 50px auto;
        padding: 20px;
        flex: 1;
    }
    .section-title {
        color: var(--color-oro);
        text-align: center;
        margin: 40px 0 20px;
        font-size: 1.8em;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-bottom: 2px solid var(--color-oro);
        padding-bottom: 10px;
    }
    
    .gestion-grid {
        margin-bottom: 40px;
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
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        padding: 2rem;
        margin: 0 auto;
        max-width: 1200px;
        justify-content: center;
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
            max-width: 200px;
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
                    <a href="index.php"><img src="../../fotos/logosociedad.png" alt="Logo Los Piporros" class="logo-img mb-4"></a>
                    <h1 class="display-4 fw-bold mb-3">SOCIEDAD DE CAZADORES</h1>
                    <h2 class="h3 nombre-sociedad">LOS PIPORROS</h2>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Contenido principal -->
    <a href="areaprivadaadmin.php" class="back-button">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <div class="gestion-container">
        <h1 class="gestion-title">PANEL DE ADMINISTRADOR (SE PODRAN EJECUTAR LAS FUNCIONES PROXIMAMENTE)</h1>
        
        <h2 class="section-title"></h2>
        <div class="gestion-grid">
            <div class="gestion-card">
                <i class="fas fa-plus-circle gestion-icon"></i>
                <h3>PAGOS SOCIEDAD</h3>
                <p>Revisa la cuenta de pagos de la sociedad</p>
                <a href="x" class="btn btn-gold">Revisar Pagos</a>
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