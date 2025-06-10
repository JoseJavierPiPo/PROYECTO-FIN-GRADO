<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S. Cazadores LOS PIPORROS - Área de Pagos</title>

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

        .text-gold {
            color: var(--color-oro);
            text-align: center;
            margin-bottom: 1rem;
        }

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
            text-align: center;
        }

        .logo-img {
            max-width: 400px;
            filter: drop-shadow(0 0 5px rgba(212, 175, 55, 0.7));
        }

        .nombre-sociedad {
            display: block;
            width: 100%;
        }

        /* NAVBAR */
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
        .navbar-custom .icon-nav,
        .dropdown-menu .icon-nav {
            color: var(--color-oro);
            font-size: 1rem;
            width: 1.5em;
        }

        /* DROPDOWN */
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

        /* BOTÓN VOLVER */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: var(--color-oro);
            color: #000;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
            z-index: 10;
            transition: all 0.3s;
        }
        .back-button:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            color: #000;
        }

        /* CARDS */
        .dashboard-card, .payment-card {
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--color-oro);
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
        }
        .dashboard-card:hover,
        .payment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
        .payment-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .dashboard-icon, .payment-icon {
            font-size: 2.5em;
            color: var(--color-oro);
            margin-bottom: 15px;
        }
        .payment-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-oro);
            margin-bottom: 1rem;
        }
        .payment-description {
            flex-grow: 1;
            margin-bottom: 1.5rem;
        }

        /* BOTONES */
        .btn-gold, .btn-payment {
            background-color: var(--color-oro);
            color: #000;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        .btn-gold:hover, .btn-payment:hover {
            background-color: var(--color-oro-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* USUARIO */
        .user-info {
            background-color: rgba(0, 0, 0, 0.8);
            border: 2px solid var(--color-oro);
            border-radius: 15px;
            padding: 2rem;
        }
        .user-avatar {
            width: 120px;
            height: 120px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-avatar i {
            font-size: 80px;
            color: var(--color-oro);
        }
        .user-details {
            text-align: left;
            padding: 0;
            margin: 0;
        }
        .user-info h3 {
            color: var(--color-oro);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--color-oro);
        }
        .user-info i {
            color: var(--color-oro) !important;
            width: 24px;
            margin-right: 1rem;
            text-align: center;
        }

        /* ICONOS */
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
            color: var(--color-oro);
            margin-right: 0.5rem;
        }

        /* FOOTER */
        .footer {
            background-color: #000;
            border-top: 1px solid var(--color-oro);
            padding: 2rem 0;
            margin-top: 3rem;
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

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .parallax-header {
                background-attachment: scroll;
                height: 50vh;
            }
        }
        @media (max-width: 768px) {
            .parallax-header {
                height: 30vh;
            }
            .logo-img {
                max-width: 200px;
            }
            .payment-card {
                margin-bottom: 1.5rem;
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
        <a href="../../subpáginas/socios/areaprivadasocio.php" class="back-button">
            <i class="fas fa-arrow-left me-2"></i>Volver
        </a>
        <div class="container header-content">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="../../fotos/logosociedad.png" alt="Logo Los Piporros" class="logo-img mb-3">
                    <h1 class="display-5 fw-bold mb-2">SOCIEDAD DE CAZADORES</h1>
                    <h2 class="h4 nombre-sociedad">LOS PIPORROS</h2>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="main-content">
        <div class="container">
        <div class="text-center my-5">
            <h1 class="display-4 fw-bold text-gold">
                PAGOS
            </h1>
            
        </div>            
            <div class="row payment-cards justify-content-center">
                <!-- Tarjeta de Pago 1 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="payment-card">
                        <i class="fas fa-money-bill-wave payment-icon"></i>
                        <h3 class="payment-title">PRIMERA CUOTA</h3>
                        <p class="payment-description">Pago de la primera cuota anual de la sociedad. Incluye acceso a las instalaciones y eventos.</p>
                        <form action="../../vendor/pago/checkout.php" method="POST">
                            <button type="submit" class="btn btn-payment">
                                <i class="fas fa-credit-card me-2"></i>PAGAR AHORA
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Tarjeta de Pago 2 -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="payment-card">
                        <i class="fas fa-money-bill-trend-up payment-icon"></i>
                        <h3 class="payment-title">SEGUNDA CUOTA</h3>
                        <p class="payment-description">Pago de la segunda cuota anual. Completa tu membresía para el año en curso.</p>
                        <form action="../../vendor/pago/checkout2.php" method="POST">
                            <button type="submit" class="btn btn-payment">
                                <i class="fas fa-credit-card me-2"></i>PAGAR AHORA
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Tarjeta de Pago Total -->
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="payment-card">
                        <i class="fas fa-coins payment-icon"></i>
                        <h3 class="payment-title">PAGO COMPLETO</h3>
                        <p class="payment-description">Pago total anual con descuento. Incluye todas las ventajas de la membresía completa.</p>
                        <form action="../../vendor/pago/checkout3.php" method="POST">
                            <button type="submit" class="btn btn-payment">
                                <i class="fas fa-credit-card me-2"></i>PAGAR AHORA
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                    <a href="https://aceuchal.com/"><img src="../../fotos/logo-aceuchal1-1.png" class="img-fluid" style="max-height: 50px;"></a>
                </div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <h5 class="text-gold">CONTACTO</h5>
                    <p><i class="fas fa-phone me-2"></i>924 680 033</p>
                    <p><i class="fas fa-envelope me-2"></i>cazadorespiporros@hotmail.com</p>
                </div>
                <div class="col-md-4 text-center">
                    <h5 class="text-gold">SÍGUENOS</h5>
                    <div class="social-icons d-flex justify-content-center gap-3">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
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
        });
    </script>
</body>
</html>