<?php

session_start();
require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

$con = new BD();

if (empty($_SESSION['usuario']) && empty($_SESSION['pabellon'])) {
    $loginNav = "<li class='nav-item '>
                    <a class='nav-link' href='index.php'>Login
                        <span class='sr-only'>(current)</span>
                    </a>
                 </li>";
    $foroNav = '';
    $perfil = "<a href='index.php'><img  src='./img/user.png' height='40' width='40' class='rounded-circle hoverable img-responsive'></a>";
} else {

    $foroNav = "<li class='nav-item '>
                    <a class='nav-link' href='comentarios.php'>Foro
                        <span class='sr-only'>(current)</span>
                    </a>
                 </li>";

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

        $contenidoModal = " User: $name <br> Password : $pass <br> Nombre completo: $nombreC<br>Dirección: $direccion";

        $perfil = "<img src='" . $foto . "' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
        $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

        $plantilla->assign('contenidoModal', $contenidoModal);
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
    }

    $plantilla->assign('contenidoModal', $contenidoModal);
    $plantilla->assign('foto_modal', $foto_modal);
    $loginNav = "";
}
$plantilla->assign('perfil', $perfil);
$plantilla->assign('foroNav', $foroNav);
$plantilla->assign('loginNav', $loginNav);

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

$c = "SELECT * FROM pabellones";
$datos = $con->selection($c);

$listadoPabellones = '';

foreach ($datos as $pabellones) {
    $pid = $pabellones['pid'];
    if ($_SESSION['tipo'] == 'user') {
        $action = "action='calendario.php'";
    } else if ($pid == $pid_pab) {
        $action = "action='reservas.php'";
    } else {
        $action = "";
    }
    $listadoPabellones .= "
            <div class = 'col-lg-6 col-md-6 mb-lg-0 mb-4 pabellon'>
            <div class = 'card collection-card z-depth-1-half'>
            <div class = 'view zoom'>
            <form $action method='post' id='form_" . $pid . "'>
                <input type='hidden' name='pid'  value='" . $pid . "'>
                <a class='enlace'>
                <img style='width:100%' src = '" . $pabellones['foto'] . "' class='img-fluid img-pabellon' alt = 'Imagen del" . $pabellones['nombre'] . "' >
                </a>
            </form>            
            <div class = 'stripe dark'>
            <a>
            <div class='expandable fototxt'>
            <h3>" . $pabellones['nombre'] . "</h3>
            <p>" . $pabellones['descripcion'] . "</p>
            </div>
            </a>
            </div>
            </div>
            </div>
            </div>";
}
$con->cerrar();

$plantilla->assign('listadoPabellones', $listadoPabellones);
$plantilla->display("pabellones.tpl");
?>