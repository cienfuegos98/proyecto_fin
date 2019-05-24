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
if (empty($_SESSION['usuario']) && empty($_SESSION['pabellon'])) {
    header("Location:index.php?error=Debes iniciar sesion para leer y escribir comentarios");
} else {
    $con = new BD();
    if ($_SESSION['tipo'] == "pabellon") {
        $name = $_SESSION['pabellon']['nombre'];
        $pass = $_SESSION['pabellon']['pass'];

        $pabs = "SELECT * FROM pabellones WHERE user_pab = '$name'";
        $datospab = $con->selection($pabs);
        $nombreC = $datospab[0]['nombre'];
        $direccion = $datospab[0]['direccion'];
        $pid_pab = $datospab[0]['pid'];
        $nombrePab = $datospab[0]['nombre'];
        $foto = $datospab[0]['foto'];
        $pid = $datospab[0]['pid'];

        $contenidoModal = " User: $name <br> Password : $pass <br> Nombre completo: $nombreC<br>Dirección: $direccion";

        $perfil = "<img src='" . $foto . "' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
        $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

        $plantilla->assign('contenidoModal', $contenidoModal);
        $plantilla->assign('nombre', $name);

        if (isset($_POST['enviar'])) {
            $comentario = $_POST['comentario'];
            $asunto = $_POST['asunto'];
            $busqueda = $_POST['busqueda'];
            $insert = "INSERT INTO `comentarios` VALUES('','$comentario','$asunto','$fecha','$hora','$busqueda','', '$pid')";
            $con->run($insert);
        }
    } else if ($_SESSION['tipo'] == "user") {
        $user = $_SESSION['usuario']['nombre'];
        $pass = $_SESSION['usuario']['pass'];
        $c = "SELECT * FROM usuarios WHERE user = '$user'";
        $datos = $con->selection($c);

        $uid = $datos[0]['uid'];
        $foto = $datos[0]['foto'];
        $email = $datos[0]['email'];
        $fecha_nac = $datos[0]['fecha_nacimiento'];
        $nombreC = $datos[0]['nombre_completo'];
        $direccion = $datos[0]['direccion'];

        $perfil = "<img src='" . $foto . "' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
        $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

        $contenidoModal = " User: $user
                        <br>
                        Email: $email
                        <br>
                        Password : $pass
                        <br>
                        Nombre completo: $nombreC
                        <br>
                        Fecha de Nacimiento: $fecha_nac
                        <br>
                        Dirección: $direccion";
        $plantilla->assign('contenidoModal', $contenidoModal);
        $plantilla->assign('nombre', $user);

        $fecha = date("Y") . "-" . date("m") . "-" . date("d");
        $hora = date("H") . ":" . date("i");
        if (isset($_POST['enviar'])) {
            $comentario = $_POST['comentario'];
            $asunto = $_POST['asunto'];
            $busqueda = $_POST['busqueda'];
            $insert = "INSERT INTO `comentarios` VALUES('','$comentario','$asunto','$fecha','$hora','$busqueda','$uid')";
            $con->run($insert);
        }
    }
    $plantilla->assign('perfil', $perfil);
    $plantilla->assign('foto_modal', $foto_modal);



    $c = "SELECT * FROM comentarios as com "
            . "JOIN usuarios as users "
            . "ON users.`uid` = com.uid";
    $datos = $con->selection($c);

    $fotoperfil = "<img src = '" . $foto . "' height = '60' width = '60' class = 'rounded-circle hoverable img-responsive float-left'>";
    $plantilla->assign('fotoperfil', $fotoperfil);
    $comentarios = '';

    if (isset($_SESSION['pabellon'])) {
        $pid = $_SESSION['pabellon']['pid'];
    }

    if (isset($_SESSION['usuario'])) {
        $nombre = $_SESSION['usuario']['nombre'];
    }
    foreach ($datos as $valores) {
        $cid = $valores['cid'];
        $usuario = $valores['user'];
        if ($usuario == $nombre) {
            $posicion = "float-right";
            $text = "text-right";
        } else {
            $posicion = "float-left";
            $text = "text-left";
        }
        $fotoperfil = "<img src = '" . $valores['foto'] . "' height = '50' width = '50' class = 'rounded-circle hoverable img-responsive $posicion'>";
        $comentarios .= "<div class = 'mensaje $text'>";
        $comentarios .= $fotoperfil . "<h5 style = 'margin-left:20px; margin-right: 20px; margin-top: 20px!important;' class = 'mt-0 font-weight-bold blue-text $posicion'>" . $valores['user'] . "</h5>";
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

    if (isset($_POST ['eliminar'])) {
        $cid = $_POST['hidden_cid'];
        $del = "DELETE FROM comentarios WHERE cid = $cid";
        $con->run($del);
    }
    $plantilla->assign('comentarios', $comentarios);
}
if (isset($_POST ['desconectar'])) {
    session_destroy();
}
$con->cerrar();
$plantilla->display("comentarios.tpl");
?>

