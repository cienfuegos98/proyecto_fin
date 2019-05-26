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

if (isset($_POST['fecha'])) {
    $hora = date("G");
    $actual = date("Y/m/d");
    $fecha = $_POST['fecha'];
    $_SESSION['reserva'] = $fecha;

    $s = "SELECT `hora` FROM `reservas` WHERE `fecha_reserva` = '" . $fecha . "'";
    $horasBloq = $con->selection($s); //horas reservadas

    foreach ($horasBloq as $horasB) {
        $horasBloqueadas[] = $horasB['hora'];
    }

    $select = '';
    $select .= "<select name ='horaElegida'>";
    $select .= "<option>--Selecciona hora--</option>";
    foreach ($horasTotales as $h) {
        if ($fecha === $actual) {
            if ($hora > $h) {
                $select .= "<option value='" . $h . "'id='hora' disabled>" . $h . ":00</option> ";
            } else {
                $select .= "<option value='" . $h . "'id='hora' >" . $h . ":00</option> ";
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
?>