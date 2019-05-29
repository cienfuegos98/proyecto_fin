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
$perfil = "<a href='index.php'><img  src='./img/imgperfiles/user.png' height='40' width='40' class='rounded-circle hoverable img-responsive'></a>";
$plantilla->assign('perfil', $perfil);

if (isset($_POST['iniciar'])) {
    $con = new BD();
    $nombre = $_POST['usuario'];
    $pass = $_POST['pass'];

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


    $con->cerrar();
} else {
//Recogemos el error si se intenta conectar por url
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        $plantilla->assign('error', $error);
    }
}
$plantilla->assign('error2', '');
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

    $foto = $_FILES['foto'];
    $destino = "./img/imgperfiles/user.png";
    if ($_FILES['foto']['name'] != '') {
        $destino = "./img/imgperfiles/";
        $origen = $foto['tmp_name'];
        $destino = $destino . $foto['name'];
        move_uploaded_file($origen, $destino);
    }

    if ($con->compruebaUser($user) == true && $con->compruebaEmail($email) == true) {
        $cons = "INSERT INTO `usuarios` VALUES('','$user','$pass', '$destino')";
        $con->run($cons);

        $q = "SELECT * FROM `usuarios` WHERE `user` = '$user'";
        $u = $con->selection($cons);
        //var_dump($u);
        $user_id = $u['uid'];

        $c = "INSERT INTO `jugadores` VALUES('$user_id','$nombreC','$email','$direccion','$cp','$telefono','$fecha','','')";
        $con->run($c);
        $plantilla->assign('error2', '');
    } else if ($con->compruebaEmail($email) == false) {
        $error2 = "Este email ya esta en uso, prueba otro";
        $plantilla->assign('error2', $error2);
    } else if ($con->compruebaUser($user) == false) {
        $error2 = "Este usuario ya esta en uso, prueba con: " . $user . "11, " . $user . "22, " . $user . "33, " . $user . "44...";
        $plantilla->assign('error2', $error2);
    }
}

$plantilla->display("login.tpl");
