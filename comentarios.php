<?php

session_start();
require_once "Smarty.class.php";
setlocale(LC_ALL, "es_ES");
spl_autoload_register(function($clase) {
    include $clase . '.php';
});
$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";
if (empty($_SESSION['usuario']['nombre']) && empty($_SESSION['usuario']['pass'])) {
    header("Location:index.php?error=Debes iniciar sesion para leer y escribir comentarios");
} else {
    $con = new BD();
    $user = $_SESSION['usuario']['nombre'];
    $valores = "SELECT * FROM usuarios WHERE user = '$user'";
    $datosU = $con->selection($valores);
    $uid = $datosU[0]['uid'];
    print_r($uid);
    $fecha = date("Y") . "-" . date("m") . "-" . date("d");
    $hora = date("H") . ":" . date("i");
    if (isset($_POST['enviar'])) {
        $comentario = $_POST['comentario'];
        $asunto = $_POST['asunto'];
        $busqueda = $_POST['busqueda'];
        $insert = "INSERT INTO `comentarios` VALUES('','$comentario','$asunto','$fecha','$hora','$busqueda','$uid')";
        $con->run($insert);
    }
    $foto = $datosU[0]['foto'];
    $email = $datosU[0]['email'];
    $fecha_nac = $datosU[0]['fecha_nacimiento'];
    $pass = $datosU[0]['pass'];
    $nombreC = $datosU[0]['nombre_completo'];
    $direccion = $datosU[0]['direccion'];
    $plantilla->assign('email', $email);
    $plantilla->assign('nombre', $user);
    $plantilla->assign('fecha', $fecha_nac);
    $plantilla->assign('direccion', $direccion);
    $plantilla->assign('nombreC', $nombreC);
    $plantilla->assign('pass', $pass);
    $perfil = "<img src='" . $foto . "' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
    $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";
    $plantilla->assign('foto_modal', $foto_modal);
    $plantilla->assign('perfil', $perfil);
    $plantilla->assign('email', $email);
    $plantilla->assign('nombre', $_SESSION['usuario']['nombre']);
    $c = "SELECT `foto`, users.`user`,com.cid,com.uid ,com.comentario, com.asunto, com.fecha, com.hora, com.busqueda "
            . "FROM usuarios as users "
            . "JOIN comentarios as com "
            . "ON users.`uid` = com.uid";
    $datos = $con->selection($c);
    $fotoperfil = "<img src = '" . $foto . "' height = '60' width = '60' class = 'rounded-circle hoverable img-responsive float-left'>";
    $plantilla->assign('fotoperfil', $fotoperfil);
    $comentarios = '';
    if (empty($datos)) {
        $comentarios = 'Todavía no hay comentarios, escribe tu el primero!';
    } else {
        foreach ($datos as $valores) {
            $cid = $valores['cid'];
            $usuario = $valores['user'];
            if ($usuario === $_SESSION['usuario']['nombre']) {
                $posicion = "float-right";
                $text = "text-right";
            } else {
                $posicion = "float-left";
                $text = "text-left";
            }
            $fotoperfil = "<img src = '" . $valores['foto'] . "' height = '50' width = '50' class = 'rounded-circle hoverable img-responsive $posicion'>";
            $comentarios .= "<div class = 'mensaje'>";
            $comentarios .= $fotoperfil . "<h5 style = 'margin-left:20px; margin-right: 20px; margin-top: 20px;' class = 'mt-0 font-weight-bold blue-text $posicion'>" . $valores['user'] . "</h5>";
            $comentarios .= "<p style='margin-left: 50px; margin-right: 50px;margin-top: 20px;'>" . date('d/m/Y', strtotime($valores['fecha'])) . " " . $valores['hora'] . "</p><br>";
            $comentarios .= "<p style='margin-left: 50px; margin-right: 50px;'>" . $valores['asunto'] . "<br>";
            $comentarios .= $valores['comentario'] . "<br>";
            $comentarios .= $valores['busqueda'] . "(prueba)</p><br>";
            if ($uid == $valores['uid']) {
                $comentarios .= " <form action='comentarios.php' method ='post'>
                                <input class='eliminar' type='submit' src='img/multiplicar.png' name='eliminar' value='Eliminar'>
                                <input type='hidden' name='hidden_cid' value='" . $cid . "'>
                            </form>";
            } else {
                $comentarios .= "";
            }
            $comentarios .= "</div>";
        }
    }
    if (isset($_POST ['eliminar'])) {
        $cid = $_POST['hidden_cid'];
        $del = "DELETE FROM comentarios WHERE cid = $cid";
        $con->run($del);
    }
    $plantilla->assign('comentarios', $comentarios);
}
if (isset($_POST ['desconectar'])) {
    session_destroy();
    $plantilla->assign('perfil', '');
    $plantilla->assign('nombre', '');
    $plantilla->assign('email', '');
}
$con->cerrar();
$plantilla->display("comentarios.tpl");
?>

