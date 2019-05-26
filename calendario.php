<?php

require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();

if (empty($_SESSION['usuario'])) {
    header("Location:index.php?error=Debes iniciar sesion");
} else {

    $con = new BD();
    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $_SESSION['pabellon']['pid'] = $pid;
    }
    $id_pab = $_SESSION['pabellon']['pid'];
    $cons = "SELECT * FROM pabellones WHERE pid = '$id_pab'";

    //TODOS LOS DATOS DEL PABELLON
    $datosPab = $con->selection($cons);
    $nombrePab = $datosPab[0]['nombre'];

    $user = $_SESSION['usuario']['nombre'];
    $c = "SELECT * FROM usuarios WHERE user = '$user'";
    $datos = $con->selection($c);

    $foto = $datos[0]['foto'];
    $email = $datos[0]['email'];
    $fecha_nac = $datos[0]['fecha_nacimiento'];
    $pass = $datos[0]['pass'];
    $nombreC = $datos[0]['nombre_completo'];
    $direccion = $datos[0]['direccion'];

    $perfil = "<img src='" . $foto . "' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
    $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

    $plantilla->assign('email', $email);
    $plantilla->assign('nombre', $user);
    $plantilla->assign('fecha', $fecha_nac);
    $plantilla->assign('direccion', $direccion);
    $plantilla->assign('nombreC', $nombreC);
    $plantilla->assign('pass', $pass);

    $edad = calcular_edad($fecha_nac);
    if ($edad >= 18) {
        $precio = 24;
    } else {
        $precio = 12;
    }

    $hiddenPay = "<input type='hidden' name='item_name_1' value='$nombrePab'>"
            . "<input type='hidden' name='item_number_1' value='p$pid'>"
            . "<input type='hidden' name='amount_1' value='$precio'>"
            . "<input name='quantity_1' type='hidden' value='1' />";
    $plantilla->assign('hiddenPay', $hiddenPay);
}
$plantilla->assign('perfil', $perfil);
$plantilla->assign('foto_modal', $foto_modal);

if (isset($_POST ['desconectar'])) {
    session_destroy();
    $plantilla->assign('nombre', '');
    $plantilla->assign('email', '');
    header("Location:index.php");
}

$tipo = $_SESSION['tipo'];
$plantilla->assign('tipo', $tipo);

if (isset($_POST['cancelar'])) {
    print '<h1>CANCELADO</h1>';
}


$con->cerrar();
$plantilla->display("calendario.tpl");

function calcular_edad($fecha_nacimiento) {
    $tiempo = strtotime($fecha_nacimiento);
    $ahora = time();
    $edad = ($ahora - $tiempo) / (60 * 60 * 24 * 365.25);
    $edad = floor($edad);
    return $edad;
}
?>



