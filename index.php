<?php

require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();
if ($_SESSION['usuario']) {
    header("location:pabellones.php");
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

            $c = "SELECT uid FROM `usuarios` WHERE user = '$nombre'";
            $datos = $con->selection($c);
            $id = $datos[0]['uid'];
            $_SESSION['usuario']['id'] = $id;
            $tipo = $con->compruebaTipo($id);
            $_SESSION['tipo'] = $tipo;
            header("Location:pabellones.php");
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
//    try {
    $cons = "INSERT INTO `usuarios` VALUES('','$user','$pass', '$destino')";
    $con->run($cons);
    //$user_id = $con->lastInsertId();
    $c = "INSERT INTO `jugadores` VALUES('$user_id','$nombreC','$email',$direccion','$cp','$telefono','$fecha','','')";
    //$con->run($c);
    //var_dump($c);
//    } catch (Exception $ex) {
//        $error = "Ups! Parece que ese nombre de usuario ya esta en manos de otra persona<br>."
//                . "Prueba con $user 123, $user 123, $user 456, $user 111";
//    }
    //$plantilla->assign('error', $error);
}

$plantilla->display("login.tpl");
