<?php

require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();

$con = new BD();

$horasTotales = array();
$horasBloqueadas = array();

foreach (range(8, 23) as $h) {
    $horasTotales[] = $h; //todas las horas posibles
}

if (isset($_SESSION['pabellon']['pid'])) {
    $pid = $_SESSION['pabellon']['pid'];
}
if (isset($_POST['fecha'])) {
    $hora = date("G");
    $actual = date("Y-m-d");
    $fecha = date("Y-m-d", strtotime($_POST['fecha']));
    $_SESSION['fecha'] = $fecha;
    $s = "SELECT `hora` FROM `reservas` "
            . "WHERE `fecha_reserva` = '" . $fecha . "'"
            . "AND `pid` = '" . $pid . "'";
    $horasBloq = $con->selection($s); //horas reservadas
    foreach ($horasBloq as $horasB) {
        $horasBloqueadas[] = $horasB['hora'];
    }
    $select = '';
    $select .= "<select name ='horaElegida' id='selectHora' onchange='getval(this); dis(this)' class='custom-select'>";
    $select .= "<option>--Selecciona hora--</option>";
    foreach ($horasTotales as $h) {
        if ($fecha === $actual) {
            if ($hora >= $h) {
                $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
            } else {
                if (in_array($h, $horasBloqueadas) == true) {
                    $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
                } else {
                    $select .= "<option value='" . $h . "'id='hora' >" . $h . ":00</option> ";
                }
            }
        } else {
            if (in_array($h, $horasBloqueadas) == true) {
                $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
            } else {
                $select .= "<option value='" . $h . "'id='hora' >" . $h . ":00</option> ";
            }
        }
    }
    $select .= "</select>";

    print $select;
}

if (isset($_POST['hora'])) {
    $horaElegida = $_POST['hora'];
    $_SESSION['hora'] = $horaElegida;
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $pyr = '';
    $s = "SELECT pregunta FROM `jugadores` WHERE email = '" . $email . "'";
    if ($con->compruebaEmail($email) == false) {
        $pyr = $con->selection($s);
        $x = "getResp($('#respuestaP').val());return false;";
        $alert = $x;
        print "<input type='password' id='respuestaP' class='form-control' name='respuestaP'><label for='form3'>" . $pyr[0]['pregunta'] . "</label>"
                . " <button onclick = $alert  class = 'form-control' name = 'botonResp' >Enviar contraseña</button>"
                . "<input type = 'hidden' name = 'emailhidden' value = '$email' id='emailhidden'/>";
    } else {
        print "<span style = 'color:red'>Parece que este email no esta en nuestra base de datos</span>";
    }
    //pablozgz98@hotmail.com
}

if (isset($_POST['respuestaP'])) {
    $red = false;
    $resp = $_POST['respuestaP'];
    $email = $_POST['emailhidden'];
    if ($con->compruebaResp($resp, $email) == true) {
        print "<span style = 'color:green'>Hemos enviado un email a tu correo con tu contraseña, disculpa las molestias. </span>";
    } else {
        print "<span style = 'color:red'>Parece que esa no es la respuesta correcta</span>";
    }
}

if (isset($_POST['f'])) {
    $pid = $_SESSION['usuario']['id'];
    $hora = date("G");
    $actual = date("Y-m-d");
    $fecha = date("Y-m-d", strtotime($_POST['f']));
    $_SESSION['fecha'] = $fecha;
    $s = "SELECT `hora` FROM `reservas` "
            . "WHERE `fecha_reserva` = '" . $fecha . "' "
            . "AND `pid` = '" . $pid . "'";
    $horasBloq = $con->selection($s); //horas reservadas

    foreach ($horasBloq as $horasB) {
        $horasBloqueadas[] = $horasB['hora'];
    }
    var_dump($fecha);
    $select = '';
    $select .= "<select name ='horaE' id='selectHora' onchange='getval(this); dis(this);' class='custom-select'>";
    $select .= "<option>--Selecciona hora--</option>";
    foreach ($horasTotales as $h) {
        if ($fecha === $actual) {
            if ($hora >= $h) {
                $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
            } else {
                if (in_array($h, $horasBloqueadas) == true) {

                    $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
                } else {
                    $select .= "<option value='" . $h . "'id='hora' >" . $h . ":00</option> ";
                }
            }
        } else {
            if (in_array($h, $horasBloqueadas) == true) {
                $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
            } else {
                $select .= "<option value='" . $h . "'id='hora' >" . $h . ":00</option> ";
            }
        }
    }
    $select .= "</select>";

    print $select;
}

if (isset($_POST['horaE'])) {
    $horaElegida = $_POST['horaE'];
    $fecha_reserva = $_SESSION['fecha'];
    $fecha_d_reserva = date("Y-m-d", strtotime($fecha_reserva));
    $fecha_d_pago = date("Y-m-d");
    $uid = $_SESSION['usuario']['id'];

    $ins = "INSERT INTO `reservas` "
            . "VALUES('','$fecha_d_reserva',$horaElegida,$uid,$uid,'$fecha_d_pago', '-')";
    $con->run($ins);
}
?>