<?php
//Base de datos

require '../../includes/config/database.php';
$db = conectarDB();

//Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Array con mensajes de errores
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

//Ejecutar el código después de que el usuario envíe el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $numero = "1Hola";
    $numero2 = 1;

    //Sanitizar
    $resultado = filter_var($numero,FILTER_SANITIZE_NUMBER_INT);

    $resultado = filter_var($numero2,FILTER_VALIDATE_INT);

    exit;

    $titulo =mysqli_real_escape_string($db,$_POST['titulo']);
    $precio =mysqli_real_escape_string($db,$_POST['precio']);
    $descripcion =mysqli_real_escape_string($db,$_POST['descripcion']);
    $habitaciones =mysqli_real_escape_string($db,$_POST['habitaciones']);
    $wc =mysqli_real_escape_string($db,$_POST['wc']);
    $estacionamiento =mysqli_real_escape_string($db,$_POST['estacionamiento']);
    $vendedorId =mysqli_real_escape_string($db,$_POST['vendedor']);
    $creado = date('Y/m/d');

    if (!$titulo) {
        $errores[] = "Debes añadir un título.";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio.";
    }
    if (strlen(!$descripcion) > 50) {
        $errores[] = "La descripción es obligatoria. Debe tener al menos 50 caracteres.";
    }
    if (!$habitaciones) {
        $errores[] = "El número de habitaciones es obligatorio.";
    }
    if (!$wc) {
        $errores[] = "El número de baños es obligatorio.";
    }
    if (!$estacionamiento) {
        $errores[] = "El número de estacionamientos es obligatorio.";
    }
    if (!$vendedorId) {
        $errores[] = "Elige un vendedor.";
    }

    //Revisar que el array de errores está vacío

    if (empty($errores)) {
        //Insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,
        wc,estacionamiento,creado,vendedorID) VALUES ('$titulo','$precio','$descripcion','$habitaciones',
        '$wc','$estacionamiento','$creado','$vendedorId')";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar al usuario para evitar que dupliquen entradas
            header("Location: /admin");
        }
    }
}

require '../../includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

        </fieldset>
        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej. 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños:</label>
            <input type="number" id="wc" name="wc" placeholder="Ej. 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej. 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">

        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor">
                <option value="''">-- Seleccione --</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : '' ; ?>     value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " ". $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>