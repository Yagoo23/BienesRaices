<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
    ?>
<main class="contenedor seccion contenido-centrado">
    <h1>Construye una piscina en tu hogar</h1>
    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <source srcset="build/img/destacada2.jpg" type="image/jpeg">
        <img src="build/img/destacada2.jpg" alt="Imagen de la propiedad" loading="lazy">
    </picture>
    <p class="informacion-meta">Escrito el: <span>05/10/2023</span> por <span>Admin.</span></p>
    <div class="resumen-propiedad">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec odio nisl, semper non quam sit amet,
            egestas pulvinar nulla. Cras mattis lectus ac vulputate efficitur. Phasellus vitae suscipit magna.
            Quisque tincidunt in tortor sit amet eleifend. Nam faucibus leo quis justo vehicula aliquam vel ut
            ipsum. Nam nec ullamcorper ex. Nulla id neque faucibus, pulvinar turpis nec, congue diam.
            Pellentesque pharetra cursus dictum.</p>
        <p>Donec gravida libero in laoreet venenatis.Etiam id magna at justo placerat lacinia in nec tellus.
            Duis at arcu sit amet turpis consequat cursus. Quisque non porttitor ante. Proin mollis vel libero
            sit amet rhoncus. In accumsan purus at diam dapibus rhoncus. Morbi ultrices in ante et molestie.</p>
    </div>
</main>
<?php 
        incluirTemplate('footer');
    ?>