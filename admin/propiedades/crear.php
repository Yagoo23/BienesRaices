<?php
require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

$propiedad = new Propiedad;

//Consulta para obtener todos los vendedores

$vendedores = Vendedor::all();

//Array con mensajes de errores
$errores = Propiedad::getErrores();

//Ejecutar el código después de que el usuario envíe el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Crear una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);

    //Generar un nombre único
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Setear la imagen
    //Realiza un resize a la imagen con intervention
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    //Validar
    $errores = $propiedad->validar();

    //Sanitizar
    // $resultado = filter_var($numero,FILTER_SANITIZE_NUMBER_INT);

    // $resultado = filter_var($numero2,FILTER_VALIDATE_INT);

    // exit;

    // $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    // $precio = mysqli_real_escape_string($db, $_POST['precio']);
    // $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    // $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    // $wc = mysqli_real_escape_string($db, $_POST['wc']);
    // $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    // $vendedorID = mysqli_real_escape_string($db, $_POST['vendedor']);
    // $creado = date('Y/m/d');

    //Revisar que el array de errores está vacío

    if (empty($errores)) {
        // Crear la carpeta para subir imagenes
        if (!is_dir(CARPETAS_IMAGENES)) {
            mkdir(CARPETAS_IMAGENES);
        }

        //Guarda la imagen en el servidor
        $image->save(CARPETAS_IMAGENES . $nombreImagen);

        //Guarda en la base de datos
        $propiedad->guardar();
    }
}

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

    <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>