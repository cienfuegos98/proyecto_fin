<?php

require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();
if ($_SESSION['usuario'] && !$_SESSION['pabellon']) {
    header("location:pabellones.php");
}
if ($_SESSION['pabellon'] && !$_SESSION['usuario']) {
    header("location:reservas.php");
}

$error = '';
$plantilla->assign('error', $error);
$perfil = "<a href='index.php'><img  src='./img/user.png' height='40' width='40' class='rounded-circle hoverable img-responsive'></a>";
$plantilla->assign('perfil', $perfil);

if (isset($_POST['iniciar'])) {
    $con = new BD();
    $nombre = $_POST['usuario'];
    $pass = $_POST['pass'];
//Si no estan vacios o estan correctos, continuamos al listado de productos, si no se cumple -> error.
    if (!empty($nombre) && !empty($pass)) {
        if ($con->compruebaUsuario($nombre, $pass) == true) {
            $_SESSION['usuario']['nombre'] = $nombre;
            $_SESSION['usuario']['pass'] = $pass;
            $_SESSION['tipo'] = "user";
            header("Location:pabellones.php");
        } else if ($con->compruebaPabellon($nombre, $pass) == true) {
            $_SESSION['pabellon']['nombre'] = $nombre;
            $_SESSION['pabellon']['pass'] = $pass;
            $_SESSION['tipo'] = "pabellon";
            header("Location:reservas.php");
        } else {
            $error = "Usuario o contraseña desconocidos";
            $plantilla->assign('error', $error);
            $plantilla->display("login.tpl");
        }
    }

    $con->cerrar();
} else {
//Recogemos el error si se intenta conectar por url
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        $plantilla->assign('error', $error);
        $plantilla->display("login.tpl");
    }
}

///////REGISTRO////////////
if (isset($_POST['registrarse'])) {
    $con = new BD();
    $user = $_POST['usuario'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $nombreC = $_POST['nombreC'];
    $direccion = $_POST['direccion'];
    $cp = $_POST['cp'];
    $telefono = $_POST['tlf'];
    $fecha = $_POST['fecha_nac'];
    $fecha_nac = date("Y-m-d", strtotime($fecha));

//Guardo en unas variables el fichero y el tipo de fichero.
    $foto = $_FILES['foto'];
    $destino = "./img/imgperfiles/";
    $origen = $foto['tmp_name'];
    $destino = $destino . $foto['name'];
//Muevo de origen a destino el fichero.
    move_uploaded_file($origen, $destino);
    try {
        $c = "INSERT INTO `usuarios` VALUES('','$user','$pass','$email','$nombreC','$direccion','$cp','$telefono','$destino','$fecha')";
        $con->run($c);
    } catch (Exception $ex) {
        $error = "Ups! Parece que ese nombre de usuario ya esta en manos de otra persona<br>."
                . "Prueba con $user 123, $user 123, $user 456, $user 111";
    }
    $plantilla->assign('error', $error);
}

$plantilla->display("login.tpl");





