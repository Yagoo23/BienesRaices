<?php
require 'includes/config/database.php';
$db = conectarDB();
//Autenticar el usuario
$errores = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($db,  filter_var($email, FILTER_VALIDATE_EMAIL) );

    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El E-Mail es obligatorio o no es válido.";
    }
    if (!$password) {
        $errores[] = "La contraseña es obligatoria.";
    }
    if (empty($errores)) {
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        if ($resultado->num_rows) {
           // Revisar si el password es correcto
           $usuario = mysqli_fetch_assoc($resultado);
           //Verificar si el password es correcto o no
           $auth = password_verify($password,$usuario['password']);
           if($auth){
                //El usuario está autenticado
                 session_start();
                 //Llamar al array de la sesión
                 $_SESSION['usuario'] = $usuario['email'];
                 $_SESSION['login'] = true;

                 header('Location: /admin');
           }else{
            $errores[] = "La contraseña es incorrecta";
           }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}


//Incluye el header
require 'includes/funciones.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1 class="fw-300 centrar-texto">Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">E-Mail</label>
            <input type="email" name="email" placeholder="Tu E-mail" id="email">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu password" id="password">
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>

<?php
incluirTemplate('footer');
?>