<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    ?>
<main class="contenedor seccion">
    <h1>Conoce sobre Nosotros</h1>
    <div class="contenido-nosotros">
        <div class="imagen">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img src="build/img/nosotros.jpg" alt="Sobre nosotros" loading="lazy">
            </picture>
        </div>
        <div class="texto-nosotros">
            <blockquote>25 años de experiencia</blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio nisl, semper non quam sit amet,
                egestas pulvinar nulla. Cras mattis lectus ac vulputate efficitur. Phasellus vitae suscipit magna.
                Quisque tincidunt in tortor sit amet eleifend. Nam faucibus leo quis justo vehicula aliquam vel ut
                ipsum. Nam nec ullamcorper ex. Nulla id neque faucibus, pulvinar turpis nec, congue diam.
                Pellentesque pharetra cursus dictum.</p>
            <p>Donec gravida libero in laoreet venenatis.Etiam id magna at justo placerat lacinia in nec tellus.
                Duis at arcu sit amet turpis consequat cursus. Quisque non porttitor ante. Proin mollis vel libero
                sit amet rhoncus. In accumsan purus at diam dapibus rhoncus. Morbi ultrices in ante et molestie.</p>
        </div>
    </div>
</main>
<section class="contenedor seccion">
    <h1>Más sobre nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla rutrum eros quis euismod.
                Donec iaculis lobortis enim, rutrum sodales lorem tincidunt sit amet</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla rutrum eros quis euismod.
                Donec iaculis lobortis enim, rutrum sodales lorem tincidunt sit amet</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla rutrum eros quis euismod.
                Donec iaculis lobortis enim, rutrum sodales lorem tincidunt sit amet</p>
        </div>
    </div>
</section>

<?php 
        incluirTemplate('footer');
    ?>


<!-- Para volver a cargar el css usar en terminal: npm run sass -->