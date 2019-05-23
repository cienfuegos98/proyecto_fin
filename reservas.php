<?php

require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();

if (empty($_SESSION['usuario']) && empty($_SESSION['pabellon'])) {
    header("Location:index.php?error=Debes iniciar sesion");
} else {

    $con = new BD();
    if ($_SESSION['tipo'] == "pabellon") {
        $name = $_SESSION['pabellon']['nombre'];
        $pabs = "SELECT * FROM pabellones WHERE user_pab = '$name'";
        $datospab = $con->selection($pabs);

        $pass = $_SESSION['pabellon']['pass'];
        $nombreC = $datospab[0]['nombre'];
        $direccion = $datospab[0]['direccion'];
        $pid = $datospab[0]['pid'];
        $nombrePab = $datospab[0]['nombre'];
        $foto = $datospab[0]['foto'];

        $contenidoModal = " User: $name <br> Password : $pass <br> Nombre completo: $nombreC<br>Dirección: $direccion";

        $perfil = "<img src='" . $foto . "' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
        $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

        $plantilla->assign('contenidoModal', $contenidoModal);

        $cons = "SELECT * FROM reservas WHERE pid = '$pid' ORDER BY fecha_reserva ASC";
        $datosRe = $con->selection($cons);

        $tabla = "<table class='tablaRes'>";
        $tabla .= "<tr>";

        $tabla .= "<td>";
        $tabla .= "ID Reserva";
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= "Día de la reserva";
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= "Hora de la reserva";
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= 'Nombre completo del usuario';
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= 'Fecha de la solicitud';
        $tabla .= "</td>";


        $tabla .= "</tr>";
        foreach ($datosRe as $valores) {
            $tabla .= "<tr>";
            $tabla .= "<td>";
            $tabla .= $valores['rid'];
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $valores['fecha_reserva'];
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $valores['hora'];
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $nombreC;
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $valores['fecha_actual'];
            $tabla .= "</td>";

            $tabla .= "</tr>";
        }

        $tabla .= "</table>";


        $plantilla->assign('tabla', $tabla);
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

        $cons = "SELECT * FROM reservas WHERE uid = '$uid' ORDER BY fecha_reserva ASC";
        $datosRe = $con->selection($cons);

        $tabla = "<table class='tablaRes'>";
        $tabla .= "<tr>";

        $tabla .= "<td>";
        $tabla .= "ID Reserva";
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= "Día de la reserva";
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= "Hora de la reserva";
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= 'Nombre completo del usuario';
        $tabla .= "</td>";
        $tabla .= "<td>";
        $tabla .= 'Fecha de la solicitud';
        $tabla .= "</td>";


        $tabla .= "</tr>";
        foreach ($datosRe as $valores) {
            $tabla .= "<tr>";
            $tabla .= "<td>";
            $tabla .= $valores['rid'];
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $valores['fecha_reserva'];
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $valores['hora'];
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $nombreC;
            $tabla .= "</td>";
            $tabla .= "<td>";
            $tabla .= $valores['fecha_actual'];
            $tabla .= "</td>";

            $tabla .= "</tr>";
        }

        $tabla .= "</table>";


        $plantilla->assign('tabla', $tabla);
        $plantilla->assign('contenidoModal', $contenidoModal);
        $plantilla->assign('email', $email);
        $plantilla->assign('nombre', $user);
        $plantilla->assign('fecha', $fecha_nac);
        $plantilla->assign('direccion', $direccion);
        $plantilla->assign('nombreC', $nombreC);
        $plantilla->assign('pass', $pass);
    }
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

$con->cerrar();
$plantilla->display("reservas.tpl");
?>



