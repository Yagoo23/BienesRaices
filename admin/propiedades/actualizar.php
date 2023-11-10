<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor;

use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();

//Validar por id válido
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: /admin');
}

//Obtener los datos de la propiedad
$propiedad = Propiedad::find($id);

$vendedores = Vendedor::all();
// $consulta = "SELECT * FROM propiedades where id=$id";
// $resultado = mysqli_query($db, $consulta);
// $propiedad = mysqli_fetch_assoc($resultado);

//Array con mensajes de errores
$errores = Propiedad::getErrores();

// $titulo = $propiedad['titulo'];
// $precio = $propiedad['precio'];
// $descripcion = $propiedad['descripcion'];
// $habitaciones = $propiedad['habitaciones'];
// $wc = $propiedad['wc'];
// $estacionamiento = $propiedad['estacionamiento'];
// $vendedorID = $propiedad['vendedorID'];
// $imagenPropiedad = $propiedad['imagen'];

//Ejecutar el código después de que el usuario envíe el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    //Validación
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
    // $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    // $creado = date('Y/m/d');

    //Subida de archivos
    //Generar un nombre único
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    //Revisar que el array de errores está vacío
    if (empty($errores)) {
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            //Almacenar la imagen
            $image->save(CARPETAS_IMAGENES . $nombreImagen);
        }
        $resultado = $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>