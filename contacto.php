<?php
    require 'includes/app.php';
    incluirTemplate('header');
    ?>
<main class="contenedor seccion">
    <h1>Contacto</h1>
    <picture>
        <source src="build/img/destacada3.webp" type="image/webp">
        <source src="build/img/destacada3.jpg" type="image/jpeg">
        <img src="build/img/destacada3.jpg" alt="Imagen contacto" loading="lazy">
    </picture>
    <h2>Llene el formulario de Contacto</h2>

    <form action="" class="formulario">
        <fieldset>
            <legend>Información personal</legend>
            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu nombre" id="nombre">
            <label for="email">E-Mail</label>
            <input type="email" placeholder="Tu E-Mail" id="email">
            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Tu teléfono" id="telefono">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje"></textarea>
        </fieldset>
        <fieldset>
            <legend>Información sobre la propiedad</legend>
            <label for="opciones">Vende o compra:</label>
            <select name="" id="opciones">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>
            <label for="presupuesto">Precio o presupuesto</label>
            <input type="number" min="0" placeholder="Tu precio o presupuesto" id="presupuesto">
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono">
                <label for="contactar-email">Email</label>
                <input name="contacto" type="radio" value="email" id="contactar-email">
            </div>
            <p>Si eligió teléfono,elija la fecha y la hora</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha">
            <label for="horaº">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00">
        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>
<?php 
        incluirTemplate('footer');
    ?>