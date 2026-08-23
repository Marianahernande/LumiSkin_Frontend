<?php require_once __DIR__ . '/botones.php'; ?>

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

                <!-- Invocación modular de los botones del Hero -->
        <?php renderBotonesHero(); ?>
            </div>
        </div>



    </section>