<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    ?>
<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog1.webp" type="image/webp">
                <source srcset="build/img/blog1.jpg" type="image/jpeg">
                <img src="build/img/blog1.jpg" alt="Texto de entrada Blog" loading="lazy">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Terraza en el techo de tu casa</h4>
                <p>Escrito el <span>29/09/2023</span> por <span>Admin.</span></p>
                <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                    ahorrando dinero.</p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog2.webp" type="image/webp">
                <source srcset="build/img/blog2.jpg" type="image/jpeg">
                <img src="build/img/blog2.jpg" alt="Texto de entrada Blog" loading="lazy">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Construye una piscina en tu hogar</h4>
                <p>Escrito el <span>29/09/2023</span> por <span>Admin.</span></p>
                <p>Guía práctica para la construcción de una piscina en la mejor zona de tu casa.</p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog3.webp" type="image/webp">
                <source srcset="build/img/blog3.jpg" type="image/jpeg">
                <img src="build/img/blog3.jpg" alt="Texto de entrada Blog" loading="lazy">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guía para la decoración de tu salón</h4>
                <p>Escrito el <span>29/09/2023</span> por <span>Admin.</span></p>
                <p>Maximiza el espacio en tu salón con esta guía, aprender a combinar muebles y colores para
                    darle vida a tu espacio.</p>
            </a>
        </div>
    </article>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="build/img/blog4.webp" type="image/webp">
                <source srcset="build/img/blog4.jpg" type="image/jpeg">
                <img src="build/img/blog4.jpg" alt="Texto de entrada Blog" loading="lazy">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="entrada.php">
                <h4>Guía para la decoración de tu dormitorio</h4>
                <p>Escrito el <span>29/09/2023</span> por <span>Admin.</span></p>
                <p>Maximiza el espacio en tu dormitorio con esta guía, aprender a combinar muebles y colores para
                    darle vida a tu espacio.</p>
            </a>
        </div>
    </article>
</main>
<?php 
        incluirTemplate('footer');
    ?>