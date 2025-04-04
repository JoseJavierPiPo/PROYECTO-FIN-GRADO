<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S. Cazadores LOS PIPORROS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/typography@0.5.9/dist/typography.min.css">
    <script src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <style>
        /* Reset y estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #fff;
            background-color: #000;
            overflow-x: hidden;
        }
        
        /* Efecto Parallax mejorado */
        .parallax-container {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }
        
        .parallax-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('jabali.jpg');
            background-size: cover;
            background-position: center;
            z-index: -1;
            opacity: 0.7;
            will-change: transform; /* Optimización para el parallax */
        }
        
        /* Contenedor principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }
        
        /* Encabezado */
        .site-header {
            position: relative;
            text-align: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .custom-header-media {
            position: absolute;
            width: 80%;
            height: 80%;
            overflow: hidden;
        }
        
        .custom-header-media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .site-branding {
            text-align: center;
            position: relative;
            z-index: 2;
            padding: 20px;
        }
        
        .custom-logo {
            max-width: 305px;
            height: auto;
            margin-bottom: 15px;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease;
        }
        
        .custom-logo:hover {
            transform: scale(1.05);
        }
        
        .site-title {
            font-size: 2.5rem;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }
        
        .site-title:hover {
            color: #c0a000;
        }
        
        .site-description {
            font-size: 1.5rem;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        /* Menú de navegación */
        nav {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px 0;
            margin-bottom: 30px;
            border-top: 1px solid #444;
            border-bottom: 1px solid #444;
            position: sticky;
            top: 0;
            z-index: 100;
            transition: all 0.3s ease;
        }
        
        nav.scrolled {
            background-color: rgba(0, 0, 0, 0.9);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        
        .nav-menu {
            display: flex;
            justify-content: center;
            list-style: none;
            flex-wrap: wrap;
        }
        
        .menu-item {
            margin: 0 15px;
            position: relative;
        }
        
        .menu-item a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            transition: all 0.3s;
            text-transform: uppercase;
            font-size: 0.9em;
            letter-spacing: 1px;
            display: block;
        }
        
        .menu-item a:hover {
            color: #c0a000;
        }
        
        /* Submenús */
        .sub-menu {
            display: none;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.9);
            min-width: 220px;
            z-index: 100;
            top: 100%;
            left: 0;
            border: 1px solid #444;
            border-radius: 0 0 5px 5px;
            padding: 10px 0;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s, transform 0.3s;
        }
        
        .sub-menu .sub-menu {
            left: 100%;
            top: 0;
            border-radius: 5px;
        }
        
        .menu-item:hover > .sub-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        .sub-menu .menu-item {
            margin: 0;
            padding: 5px 15px;
        }
        
        .sub-menu .menu-item a {
            padding: 8px 10px;
            white-space: nowrap;
        }
        
        /* Contenido principal */
        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 5px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        
        .main-content:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .content {
            flex: 1;
            min-width: 300px;
        }
        
        h2 {
            color: #c0a000;
            margin-bottom: 20px;
            font-size: 1.8em;
            border-bottom: 1px solid #444;
            padding-bottom: 10px;
            text-transform: uppercase;
        }
        
        p {
            margin-bottom: 15px;
            text-align: justify;
        }
        
        ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }
        
        li {
            margin-bottom: 8px;
        }
        
        /* Sidebar */
        .sidebar {
            width: 300px;
            background-color: rgba(20, 20, 20, 0.8);
            padding: 20px;
            border: 1px solid #444;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }
        
        .sidebar:hover {
            transform: translateY(-5px);
        }
        
        .sidebar-title {
            color: #c0a000;
            margin-bottom: 15px;
            font-size: 1.4em;
            text-transform: uppercase;
        }
        
        .sidebar-menu {
            list-style: none;
        }
        
        .sidebar-item {
            margin-bottom: 10px;
            transition: transform 0.2s ease;
        }
        
        .sidebar-item:hover {
            transform: translateX(5px);
        }
        
        .sidebar-link {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
            display: block;
            padding: 5px 0;
        }
        
        .sidebar-link:hover {
            color: #c0a000;
        }
        
        /* Área de búsqueda */
        .search-form {
            display: flex;
            max-width: 500px;
            margin-top: 15px;
        }
        
        .search-input {
            flex: 1;
            padding: 12px 20px;
            background-color: #333;
            border: 1px solid #444;
            color: #fff;
            border-radius: 5px 0 0 5px;
            font-size: 1rem;
            border-right: none;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            background-color: #444;
            outline: none;
            box-shadow: 0 0 0 2px rgba(192, 160, 0, 0.3);
        }
        
        .search-button {
            padding: 12px 20px;
            background-color: #c0a000;
            color: #000;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .search-button:hover {
            background-color: #e0c040;
        }
        
        /* Pie de página */
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            border-top: 1px solid #444;
            color: #777;
            font-size: 0.9em;
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        footer a {
            color: #c0a000;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        footer a:hover {
            color: #e0c040;
            text-decoration: underline;
        }
        
        /* Animaciones y efectos */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        
        /* Loader */
        .loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        
        .loader-spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #c0a000;
            border-top: 5px solid transparent;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Botón móvil */
        .mobile-menu-button {
            display: none;
            background: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 10px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .nav-menu {
                display: none;
                flex-direction: column;
                align-items: center;
            }
            
            .nav-menu.active {
                display: flex;
            }
            
            .mobile-menu-button {
                display: block;
                margin: 0 auto;
            }
            
            .menu-item {
                margin: 5px 0;
                width: 100%;
                text-align: center;
            }
            
            .sub-menu {
                position: static;
                display: none;
                width: 100%;
                background-color: transparent;
                border: none;
                padding-left: 15px;
                opacity: 1;
                transform: none;
            }
            
            .menu-item.active > .sub-menu {
                display: block;
            }
            
            .site-title {
                font-size: 2rem;
            }
            
            .site-description {
                font-size: 1.2rem;
                text-align: center;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .search-input {
                border-radius: 5px;
                border-right: 1px solid #444;
                margin-bottom: 10px;
            }
            
            .search-button {
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>
    <div id="root"></div>
    
    <!-- Loader -->
    <div class="loader" id="page-loader">
        <div class="loader-spinner"></div>
    </div>

    <script type="text/babel">
        // Componente App principal
        const App = () => {
            const [loading, setLoading] = React.useState(false);
            const [mobileMenuOpen, setMobileMenuOpen] = React.useState(false);
            const [activeMenuItem, setActiveMenuItem] = React.useState(null);
            
            // Función para simular carga
            const simulateLoading = (callback) => {
                setLoading(true);
                setTimeout(() => {
                    setLoading(false);
                    if (callback) callback();
                }, 800);
            };
            
            // Efecto para el scroll
            React.useEffect(() => {
                const handleScroll = () => {
                    const nav = document.querySelector('nav');
                    if (window.scrollY > 100) {
                        nav.classList.add('scrolled');
                    } else {
                        nav.classList.remove('scrolled');
                    }
                };
                
                window.addEventListener('scroll', handleScroll);
                
                // Efecto parallax
                const parallaxBg = document.querySelector('.parallax-bg');
                const header = document.querySelector('.site-header');
                const headerHeight = header.offsetHeight;
                
                const parallaxEffect = () => {
                    const scrollPosition = window.pageYOffset;
                    const limit = headerHeight;
                    
                    if (scrollPosition <= limit) {
                        parallaxBg.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
                    }
                };
                
                window.addEventListener('scroll', parallaxEffect);
                
                // Limpieza
                return () => {
                    window.removeEventListener('scroll', handleScroll);
                    window.removeEventListener('scroll', parallaxEffect);
                };
            }, []);
            
            // Manejador de clics de enlaces
            const handleLinkClick = (e, path) => {
                if (path !== '#') {
                    e.preventDefault();
                    simulateLoading(() => {
                        console.log(`Navegando a: ${path}`);
                        // Aquí iría la navegación real en una app React completa
                    });
                }
            };
            
            // Toggle menú móvil
            const toggleMobileMenu = () => {
                setMobileMenuOpen(!mobileMenuOpen);
            };
            
            // Toggle submenú
            const toggleSubmenu = (index) => {
                setActiveMenuItem(activeMenuItem === index ? null : index);
            };
            
            // Búsqueda
            const handleSearch = (e) => {
                e.preventDefault();
                const searchTerm = e.target.querySelector('.search-input').value;
                simulateLoading(() => {
                    alert(`Buscando: ${searchTerm}`);
                });
            };
            
            return (
                <>
                    {/* Header con efecto parallax */}
                    <div className="parallax-container">
                        <div className="parallax-bg"></div>
                        
                        <div className="site-header">
                            <div className="custom-header-media">
                                <img src="jabali.jpg" alt="Fondo de caza" />
                            </div>
                            
                            <div className="site-branding fade-in">
                                <a href="#" onClick={(e) => handleLinkClick(e, 'SOCIEDAD.html')}>
                                    <img src="logo-aceuchal1-1.png" alt="Logo S. Cazadores" className="custom-logo" />
                                </a>
                                <a href="#" onClick={(e) => handleLinkClick(e, 'SOCIEDAD.html')}>
                                    <h1 className="site-title">SOCIEDAD DE CAZADORES</h1>
                                </a>
                                <p className="site-description">LOS PIPORROS</p>
                            </div>
                        </div>
                    </div>
                    
                    {/* Contenido principal */}
                    <div className="container">
                        {/* Menú de navegación sticky */}
                        <nav className="main-navigation">
                            <button className="mobile-menu-button" onClick={toggleMobileMenu}>
                                ☰ Menú
                            </button>
                            <ul className={`nav-menu ${mobileMenuOpen ? 'active' : ''}`}>
                                <li className="menu-item">
                                    <a href="#" onClick={(e) => handleLinkClick(e, 'historia.html')}>HISTORIA</a>
                                </li>
                                <li className={`menu-item ${activeMenuItem === 1 ? 'active' : ''}`}>
                                    <a href="#" onClick={(e) => {
                                        handleLinkClick(e, 'galeria.html');
                                        if (window.innerWidth <= 768) toggleSubmenu(1);
                                    }}>GALERÍA FOTOGRÁFICA</a>
                                    <ul className="sub-menu">
                                        <div className="menu-item">
                                            <a href="#" onClick={(e) => handleLinkClick(e, 'batidas.php')}>BATIDAS</a>
                                            <ul className="sub-menu">
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'batidas-2012-2013.php')}>BATIDAS 2012-2013</a></div>
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'batidas-2013-2014.php')}>BATIDAS 2013-2014</a></div>
                                            </ul>
                                        </div>
                                        <div className="menu-item">
                                            <a href="#" onClick={(e) => handleLinkClick(e, 'recechos.php')}>RECECHOS</a>
                                            <ul className="sub-menu">
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'recechos-2013-2014.php')}>RECECHOS 2013-2014</a></div>
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'recechos-2015-2016.php')}>RECECHOS 2015-2016</a></div>
                                            </ul>
                                        </div>
                                    </ul>
                                </li>
                                <li className={`menu-item ${activeMenuItem === 2 ? 'active' : ''}`}>
                                    <a href="#" onClick={(e) => {
                                        handleLinkClick(e, '#');
                                        if (window.innerWidth <= 768) toggleSubmenu(2);
                                    }}>DOCUMENTACIÓN</a>
                                    <ul className="sub-menu">
                                        <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'armas.php')}>ARMAS</a></div>
                                        <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'normativa.php')}>NORMATIVA</a></div>
                                        <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'inscripcion.php')}>INSCRIPCIÓN NUEVOS SOCIOS Y AUTORIZADOS PARA LA CAZA</a></div>
                                    </ul>
                                </li>
                                <li className={`menu-item ${activeMenuItem === 3 ? 'active' : ''}`}>
                                    <a href="#" onClick={(e) => {
                                        handleLinkClick(e, '#');
                                        if (window.innerWidth <= 768) toggleSubmenu(3);
                                    }}>ÁREA PRIVADA</a>
                                    <ul className="sub-menu">
                                        <div className="menu-item">
                                            <a href="#" onClick={(e) => handleLinkClick(e, 'acuerdos.php')}>ACUERDOS Y OTROS</a>
                                            <ul className="sub-menu">
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'elecciones.php')}>ELECCIONES</a></div>
                                            </ul>
                                        </div>
                                        <div className="menu-item">
                                            <a href="#" onClick={(e) => handleLinkClick(e, 'cuentas.php')}>CUENTAS DE LA SOCIEDAD</a>
                                            <ul className="sub-menu">
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'cuentas-2023-2024.php')}>2023-2024</a></div>
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'cuentas-2022-2023.php')}>2022-2023</a></div>
                                            </ul>
                                        </div>
                                        <div className="menu-item">
                                            <a href="#" onClick={(e) => handleLinkClick(e, 'cotos.php')}>COTOS</a>
                                            <ul className="sub-menu">
                                                <div className="menu-item"><a href="#" onClick={(e) => handleLinkClick(e, 'elecciones-cotos.php')}>ELECCIONES</a></div>
                                            </ul>
                                        </div>
                                    </ul>
                                </li>
                                <li className="menu-item">
                                    <a href="#" onClick={(e) => handleLinkClick(e, 'contacto.php')}>CONTACTO</a>
                                </li>
                            </ul>
                        </nav>
                        
                        <div className="main-content fade-in">
                            <main className="content">
                                <h2>DOCUMENTACIÓN</h2>
                                <p>Accede a toda la documentación necesaria para los socios de la Sociedad de Cazadores Los Piporros. En esta sección encontrarás información relevante sobre normativas, requisitos, y procedimientos relacionados con la actividad cinegética en nuestro coto.</p>
                                
                                <p>La documentación está organizada en diferentes categorías para facilitar el acceso a la información que necesites. Puedes encontrar detalles sobre:</p>
                                
                                <ul>
                                    <li>Requisitos legales para la práctica de la caza</li>
                                    <li>Normativa específica de nuestro coto</li>
                                    <li>Documentación necesaria para nuevos socios</li>
                                    <li>Información sobre armas y su regulación</li>
                                    <li>Calendarios de caza y temporadas</li>
                                </ul>
                                
                                <p>Recuerda que es responsabilidad de cada socio conocer y cumplir con la normativa vigente. Si tienes dudas específicas, puedes contactar con la directiva a través de la sección de contacto.</p>
                            </main>
                            
                            <aside className="sidebar">
                                <h3 className="sidebar-title">HISTORIA</h3>
                                <ul className="sidebar-menu">
                                    <li className="sidebar-item"><a href="#" onClick={(e) => handleLinkClick(e, 'galeria.html')} className="sidebar-link">Galería fotográfica</a></li>
                                    <li className="sidebar-item"><a href="#" onClick={(e) => handleLinkClick(e, 'documentacion.html')} className="sidebar-link">Documentación</a></li>
                                    <li className="sidebar-item"><a href="#" onClick={(e) => handleLinkClick(e, 'area-privada.html')} className="sidebar-link">Área privada</a></li>
                                    <li className="sidebar-item"><a href="#" onClick={(e) => handleLinkClick(e, 'contacto.php')} className="sidebar-link">Contacto</a></li>
                                </ul>
                                <h2 className="sidebar-title">ENTRADAS</h2>
                                <p><strong>NADA ENCONTRADO</strong></p>
                                <form className="search-form" onSubmit={handleSearch}>
                                    <input type="text" className="search-input" placeholder="Buscar ..." />
                                    <button type="submit" className="search-button">Buscar</button>
                                </form>
                            </aside>
                        </div>
                        
                        <footer>
                            <span>Sociedad de Cazadores LOS PIPORROS &copy; {new Date().getFullYear()} </span>
                            <a href="https://aceuchal.com/" onClick={(e) => handleLinkClick(e, 'https://aceuchal.com/')}>Ayuntamiento</a> - 924 680 003 <a href="mailto:info@aceuchal.com">info@aceuchal.com</a>
                        </footer>
                    </div>
                </>
            );
        };

        // Renderizar la aplicación
        ReactDOM.render(<App />, document.getElementById('root'));
        
        // Mostrar el loader al inicio
        document.addEventListener('DOMContentLoaded', function() {
            const loader = document.getElementById('page-loader');
            loader.style.display = 'flex';
            
            setTimeout(() => {
                loader.style.display = 'none';
            }, 1000);
        });
    </script>
</body>
</html>