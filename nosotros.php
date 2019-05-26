<?php

session_start();
require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

if (empty($_SESSION['usuario'])) {
    $loginNav = "<li class='nav-item '>
                    <a class='nav-link' href='index.php'>Login
                        <span class='sr-only'>(current)</span>
                    </a>
                 </li>";
    $plantilla->assign('loginNav', $loginNav);
    $foroNav = '';
    $perfil = "<a href='index.php'><img src='./img/user.png' height='40' width='40' class='rounded-circle hoverable img-responsive'></a>";
} else {
    $con = new BD();
    $foroNav = "<li class='nav-item '>
                    <a class='nav-link' href='comentarios.php'>Foro
                        <span class='sr-only'>(current)</span>
                    </a>
                 </li>";
    if ($_SESSION['tipo'] == "pabellon") {
        $name = $_SESSION['usuario']['nombre'];
        $pass = $_SESSION['usuario']['pass'];

        $pabs = "SELECT * FROM `pabellones` as p JOIN `usuarios` as u ON p.pid = u.uid WHERE `user` = '$name'";
        $datospab = $con->selection($pabs);

        $nombreC = $datospab[0]['nombre'];
        $direccion = $datospab[0]['direccion'];
        $pid_pab = $datospab[0]['pid'];
        $nombrePab = $datospab[0]['nombre'];
        $foto = $datospab[0]['foto'];

        $contenidoModal = " User: $name <br> Password : $pass <br> Nombre completo: $nombreC<br>Dirección: $direccion";

        $perfil = "<img src='$foto' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
        $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

        $plantilla->assign('contenidoModal', $contenidoModal);
    } else if ($_SESSION['tipo'] == "user") {
        $user = $_SESSION['usuario']['nombre'];
        $pass = $_SESSION['usuario']['pass'];
        $c = "SELECT * FROM `jugadores` as j JOIN `usuarios` as u ON j.uid = u.uid WHERE `user` = '$user'";
        $datos = $con->selection($c);
        var_dump($datos);
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
    }
    $plantilla->assign('contenidoModal', $contenidoModal);
    $plantilla->assign('foto_modal', $foto_modal);
    $plantilla->assign('perfil', $perfil);
    $plantilla->assign('foroNav', $foroNav);
    $plantilla->assign('loginNav', '');


    if (isset($_POST ['desconectar'])) {
        $loginNav = "<li class = 'nav-item '>
            <a class = 'nav-link' href = 'index.php'>Login
            <span class = 'sr-only'>(current)</span>
            </a>
            </li>";
        $perfil = "<a href='index.php'><img src='./img/user.png' height='40' width='40' class='rounded-circle hoverable img-responsive'></a>";
        $plantilla->assign('perfil', $perfil);
        $plantilla->assign('loginNav', $loginNav);

        $plantilla->assign('foroNav', '');
        session_destroy();
    }
}

$plantilla->display("nosotros.tpl");
?>