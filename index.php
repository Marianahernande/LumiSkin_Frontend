<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estética | Belleza que se siente</title>

    <!-- Fuente elegante -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="./assets/style/estilos.css">

</head>
<body>
    <header>
        <div style="display: flex;align-items: center;">
            <div class="circulo">
                <img src="/img/logo.png" alt="Belleza"> 
                
            </div>
             <p style="font-family: Imperial Script, cursive; font-size: 40px; font-weight: 600;">Dahlia Beauté</p>
        </div>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
        <div>
            <a href="/auth/login.html" class="header-btn1">Iniciar sesion</a>
            <a href="/auth/registrarse.html" class="header-btn">Registrarse</a>
        </div>
        
    </header>

        <!-- Barra de progreso de scroll -->
        <div class="scroll-progress"></div>
    </header>

    <!-- Hero -->
    <section id="hero">


        <!-- Fondo con gradiente animado -->
        <div class="hero-background"></div>
    
        <!-- Ola decorativa -->
        <div class="fondo-ola">
            <svg viewBox="0 0 500 600" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="waveGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" style="stop-color:#FFCDEA;stop-opacity:1" />
                        <stop offset="100%" style="stop-color:#C188CF;stop-opacity:0.8" />
                    </linearGradient>
                </defs>
                <path fill="url(#waveGradient)" d="M500,0 
                                       L500,600 
                                       L0,600 
                                       C 70,550 130,510 90,460 
                                       C 45,390 25,340 75,280 
                                       C 135,210 165,170 105,120 
                                       C 55,70 30,35 0,0 
                                       L500,0 
                                       Z"></path>
            </svg>
        </div>

        

        <!-- Contenido principal -->
        <div class="contenido-hero">
            <div class="texto-hero">
                
                <h1>
                    <span class="word">Belleza que</span>
                    <span class="word"> se siente</span>
                </h1>
                <p class="hero-description">Descubre tratamientos exclusivos diseñados con la más alta tecnología y profesionales expertos para realzar tu belleza natural y transformar tu confianza.</p>
                
                <div class="hero-features">
                    <div class="feature-item">
                        <span class="feature-icon">🏆</span>
                        <span>Profesionales Certificados</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">🌿</span>
                        <span>Productos Naturales</span>
                    </div>
                    <div class="feature-item">
                        <span class="feature-icon">⭐</span>
                        <span>Resultados Garantizados</span>
                        <span>✨ Experiencia Premium de Belleza</span>
                      
                    </div>
                </div>

                <div class="hero-buttons">
                    <a href="#contacto" class="btn-hero btn-primary">
                        <span>Reservar cita ahora</span>
                        <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="#servicios" class="btn-hero btn-secondary">
                        Ver servicios →
                    </a>
                </div>
            </div>
        </div>

       

    </section>

    <!-- Servicios -->
    <section id="servicios">
        <div class="container">
            <h2>Nuestros Servicios</h2>
            <p class="subtitulo">Descubre nuestros tratamientos premium diseñados para ti</p>
            
            <div class="grid-servicios">
                <div class="servicio-card">
                    <div class="icono">✨</div>
                    <h3>Facial Avanzado</h3>
                    <p>Tratamientos faciales personalizados con tecnología de última generación para una piel radiante.</p>
                    <a href="#contacto" class="link-btn">Más info →</a>
                </div>

                <div class="servicio-card">
                    <div class="icono">💆</div>
                    <h3>Masajes Relajantes</h3>
                    <p>Masajes terapéuticos que relajan tensiones y revitalizan tu cuerpo y mente.</p>
                    <a href="#contacto" class="link-btn">Más info →</a>
                </div>

                <div class="servicio-card">
                    <div class="icono">💅</div>
                    <h3>Manicura Premium</h3>
                    <p>Diseños exclusivos y tratamientos de uñas con los mejores productos del mercado.</p>
                    <a href="#contacto" class="link-btn">Más info →</a>
                </div>

                <div class="servicio-card">
                    <div class="icono">💇</div>
                    <h3>Estilismo Capilar</h3>
                    <p>Cortes, coloración y tratamientos capilares realizados por profesionales expertos.</p>
                    <a href="#contacto" class="link-btn">Más info →</a>
                </div>

                <div class="servicio-card">
                    <div class="icono">🧖</div>
                    <h3>Depilación Láser</h3>
                    <p>Depilación permanente con tecnología láser de última generación, segura y efectiva.</p>
                    <a href="#contacto" class="link-btn">Más info →</a>
                </div>

                <div class="servicio-card">
                    <div class="icono">✨</div>
                    <h3>Maquillaje Profesional</h3>
                    <p>Maquillaje artístico para eventos especiales realizados por artistas profesionales.</p>
                    <a href="#contacto" class="link-btn">Más info →</a>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Contacto -->
    <section id="contacto">
        <div class="container">
            <h2>Contáctanos</h2>
            <div class="contacto-content">
                <div class="contacto-info">
                    <h3>¿Listo para tu transformación?</h3>
                    <p>Estamos aquí para ayudarte a sentirte bella y confiada.</p>
                    
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div>
                            <h4>Ubicación</h4>
                            <p>Calle Principal 123, Centro Comercial</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div>
                            <h4>Teléfono</h4>
                            <p>+1 (555) 123-4567</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">✉️</div>
                        <div>
                            <h4>Email</h4>
                            <p>info@estetica.com</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">⏰</div>
                        <div>
                            <h4>Horarios</h4>
                            <p>Lunes a Viernes: 9am - 7pm<br>Sábados: 10am - 5pm</p>
                        </div>
                    </div>
                </div>

                <form class="contacto-form" id="formulario">
                    <input type="text" placeholder="Tu nombre" required>
                    <input type="email" placeholder="Tu email" required>
                    <input type="tel" placeholder="Tu teléfono" required>
                    <select required>
                        <option value="">Selecciona un servicio</option>
                        <option value="facial">Facial Avanzado</option>
                        <option value="masaje">Masajes Relajantes</option>
                        <option value="manicura">Manicura Premium</option>
                        <option value="cabello">Estilismo Capilar</option>
                        <option value="laser">Depilación Láser</option>
                        <option value="maquillaje">Maquillaje Profesional</option>
                    </select>
                    <textarea placeholder="Cuéntanos qué buscas..." required></textarea>
                    <button type="submit" class="btn-enviar">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Estética</h4>
                    <p>Tu destino para belleza y bienestar integral.</p>
                </div>
                <div class="footer-section">
                    <h4>Enlaces</h4>
                    <ul>
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#tratamientos">Tratamientos</a></li>
                        <li><a href="#galeria">Galería</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Síguenos</h4>
                    <div class="social-links">
                        <a href="#">Instagram</a>
                        <a href="#">Facebook</a>
                        <a href="#">TikTok</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Estética Premium. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1
    /jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.ripples@0.6.3/dist/jquery.ripples.min.js"></script>
    
    <!-- Three.js para efectos 3D -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    
    <!-- GSAP para animaciones avanzadas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    
    <!-- Particles.js para efectos de partículas avanzadas -->
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>
    
    <script src="script.js"></script>

</body>
</html>