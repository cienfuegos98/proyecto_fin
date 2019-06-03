<?php

error_reporting(0);
require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();


if (isset($_POST['horaElegida'])) {
    $hora = $_POST['horaElegida'];
    print $hora;
}


if (empty($_SESSION['usuario'])) {
    header("Location:index.php?error=Debes iniciar sesion");
} else {

    $con = new BD();
    if (isset($_POST['pid'])) {
        $pid = $_POST['pid'];
        $_SESSION['pabellon']['pid'] = $pid;
    }

    $fecha_reserva = $_SESSION['fecha'];
    $hora_reserva = $_SESSION['hora'];

    $plantilla->assign('fecha_reserva', $fecha_reserva);
    $plantilla->assign('hora_reserva', $hora_reserva);
    $id_pab = $_SESSION['pabellon']['pid'];
    $cons = "SELECT * FROM pabellones WHERE pid = '$id_pab'";
    $datosPab = $con->selection($cons);

    $nombrePab = $datosPab[0]['nombre'];
    $direccionP = $datosPab[0]['direccion'];
    $ciudad = $datosPab[0]['ciudad'];
    $cod_postal = $datosPab[0]['cod_postal'];
    $telefono = $datosPab[0]['telefono'];
    $horario = $datosPab[0]['horario'];
    $descripcion = $datosPab[0]['descripcion'];
    $caracteristicas = $datosPab[0]['caracteristicas'];
    $otros_servicios = $datosPab[0]['otros_servicios'];
    $accesibilidad = $datosPab[0]['accesibilidad'];
    $tarifa = $datosPab[0]['tarifa'];
    $imagen = $datosPab[0]['imagen_web'];

    $plantilla->assign('nombrePab', $nombrePab);
    $plantilla->assign('direccionP', $direccionP);
    $plantilla->assign('ciudad', $ciudad);
    $plantilla->assign('cod_postal', $cod_postal);
    $plantilla->assign('telefono', $telefono);
    $plantilla->assign('horario', $horario);
    $plantilla->assign('descripcion', $descripcion);
    $plantilla->assign('otros_servicios', $otros_servicios);
    $plantilla->assign('accesibilidad', $accesibilidad);
    $plantilla->assign('tarifa', $tarifa);
    $plantilla->assign('imagen', $imagen);

    $user = $_SESSION['usuario']['nombre'];
    $c = "SELECT * FROM `jugadores` as j JOIN `usuarios` as u ON j.uid = u.uid WHERE `user` = '$user'";

    $datos = $con->selection($c);

    $foto = $datos[0]['foto'];
    $email = $datos[0]['email'];
    $fecha_nac = $datos[0]['fecha_nacimiento'];
    $pass = $datos[0]['pass'];
    $nombreC = $datos[0]['nombre_completo'];

    $direccion = $datos[0]['direccion'];

    $perfil = "<img src='" . $foto . "' class='imgperfil rounded-circle hoverable img-responsive'>";
    $foto_modal = "<img src='" . $foto . "' class='imgmodal rounded-circle hoverable img-responsive'>";

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
    $_SESSION['precioReserva'] = $precio;
    $hiddenPay = "<input type = 'hidden' name = 'item_name_1' value = '$nombrePab'>"
            . "<input type = 'hidden' name = 'item_number_1' value = '$id_pab'>"
            . "<input type = 'hidden' name = 'amount_1' value = '$precio'>"
            . "<input name = 'quantity_1' type = 'hidden' value = '1' />";
    $plantilla->assign('hiddenPay', $hiddenPay);
}
$plantilla->assign('perfil', $perfil);
$plantilla->assign('foto_modal', $foto_modal);

if (isset($_POST ['desconectar'])) {
    session_destroy();
    header("Location:index.php");
}

$tipo = $_SESSION['tipo'];
$plantilla->assign('tipo', $tipo);


$con->cerrar();
$plantilla->display("calendario.tpl"
);

function calcular_edad($fecha_nacimiento) {
    $tiempo = strtotime($fecha_nacimiento);
    $ahora = time();
    $edad = ($ahora - $tiempo) / (60 * 60 * 24 * 365.25);
    $edad = floor($edad);
    return $edad;
}
?>



