<?php

require_once "Smarty.class.php";

spl_autoload_register(function($clase) {
    include $clase . '.php';
});

$plantilla = new Smarty();
$plantilla->template_dir = "./template";
$plantilla->compile_dir = "./template_c";

session_start();
$tipo = $_SESSION['tipo'];
if (empty($_SESSION['usuario'])) {
    header("Location:index.php?error=Debes iniciar sesion");
} else {
    $foroNav = "<li class='nav-item '>
                    <a class='nav-link' href='comentarios.php'>Foro
                        <span class='sr-only'>(current)</span>
                    </a>
                 </li>";
    if (isset($_SESSION['tipo'])) {
        $tipo = $_SESSION['tipo'];
        $plantilla->assign('tipo', $tipo);
    }
    $con = new BD();
    if ($_SESSION['tipo'] == "pabellon") {
        $name = $_SESSION['usuario']['nombre'];
        $pass = $_SESSION['usuario']['pass'];

        $c = "SELECT * FROM `pabellones` as p JOIN `usuarios` as u ON u.uid = p.pid WHERE `user` = '$name'";
        $datospab = $con->selection($c);

        $nombreC = $datospab[0]['nombre'];
        $pid = $datospab[0]['pid'];

        $nombrePab = $datospab[0]['nombre'];
        $direccion = $datospab[0]['direccion'];
        $ciudad = $datospab[0]['ciudad'];
        $cod_postal = $datospab[0]['cod_postal'];
        $telefono = $datospab[0]['telefono'];
        $horario = $datospab[0]['horario'];
        $descripcion = $datospab[0]['descripcion'];
        $caracteristicas = $datospab[0]['caracteristicas'];
        $otros_servicios = $datospab[0]['otros_servicios'];
        $accesibilidad = $datospab[0]['accesibilidad'];
        $tarifa = $datospab[0]['tarifa'];
        $foto = $datospab[0]['foto'];
        $imagen_web = $datospab[0]['imagen_web'];

        $plantilla->assign('nombrePab', $nombrePab);
        $plantilla->assign('direccion', $direccion);
        $plantilla->assign('ciudad', $ciudad);
        $plantilla->assign('cod_postal', $cod_postal);
        $plantilla->assign('telefono', $telefono);
        $plantilla->assign('descripcion', $descripcion);
        $plantilla->assign('caracteristicas', $caracteristicas);
        $plantilla->assign('otros_servicios', $otros_servicios);
        $plantilla->assign('accesibilidad', $accesibilidad);
        $plantilla->assign('tarifa', $tarifa);
        $plantilla->assign('foto', $foto);
        $plantilla->assign('imagen_web', $imagen_web);
        $plantilla->assign('horario', $horario);

        $contenidoModal = " User: $name <br> Password : $pass <br> Nombre completo: $nombreC<br>Dirección: $direccion";

        $perfil = "<img src='$foto' height='40' width='40' class='rounded-circle hoverable img-responsive'>";
        $foto_modal = "<img src='" . $foto . "' height='120' width='120'  class='rounded-circle hoverable img-responsive'>";

        $plantilla->assign('contenidoModal', $contenidoModal);

        $cons = "SELECT r.*, j.nombre_completo 
        FROM `reservas` as r
        INNER JOIN `jugadores` as j ON r.uid = j.uid
        WHERE pid = '$pid'
        ORDER BY fecha_reserva ASC, hora ASC";
        $datosRe = $con->selection($cons);

        if ($datosRe != null) {

            $tabla = "<table class = 'tablaRes'>";
            $tabla .= "<tr>";

            $tabla .= headerTable();

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
                $tabla .= $valores['hora'] . ":00";
                $tabla .= "</td>";
                $tabla .= "<td>";
                $tabla .= $valores['nombre_completo'];
                $tabla .= "</td>";
                $tabla .= "<td>";
                $tabla .= $valores['fecha_actual_reserva'];
                $tabla .= "</td>";
                $tabla .= "<td>";
                $tabla .= "<form method = 'POST' action = 'reservas.php'>"
                        . "<input type = 'hidden' name = 'rid_borrar' value = '" . $valores['rid'] . "' > "
                        . "<input type = 'hidden' name = 'uid' value = '" . $valores['uid'] . "' > "
                        . "<input type = 'submit' class = 'btn btn-primary' name = 'eliminar' value = 'Eliminar reserva'>"
                        . "</form>";
                $tabla .= "</td>";
                $tabla .= "</tr>";
            }

            $tabla .= "</table>";
            $plantilla->assign('tabla', $tabla);
        } else {
            $plantilla->assign('tabla', '');
        }


        if (isset($_POST['actualizar'])) {
            $con = new BD();
            $pabellon = $_POST['pabellon'];
            $direccion = $_POST['direccion'];
            $ciudad = $_POST['ciudad'];
            $cod_postal = $_POST['cod_postal'];
            $telefono = $_POST['telefono'];
            $horario = $_POST['horario'];
            $descripcion = $_POST['descripcion'];
            $caracteristicas = $_POST['caracteristicas'];
            $otros_servicios = $_POST['otros_servicios'];
            $accesibilidad = $_POST['accesibilidad'];
            $tarifa = $_POST['tarifa'];

            $destino = "./img/imgperfiles/";

            if ($_FILES['foto']['name'] != '') {
                $foto_perfil = $_FILES['foto'];
                $origen = $foto_perfil['tmp_name'];
                $destino_f_perfil = $destino . $foto_perfil['name'];
                move_uploaded_file($origen, $destino_f_perfil);
            } else {
                $destino_f_perfil = $foto;
            }

            if ($_FILES['imagen_web']['name'] != '') {
                $imagen = $_FILES['imagen_web'];
                $origen = $imagen['tmp_name'];
                $destino_img = $destino . $imagen['name'];
                move_uploaded_file($origen, $destino_img);
            } else {
                $destino_img = $imagen_web;
            }

            $insert = "UPDATE usuarios SET "
                    . "foto  = '$destino_f_perfil' "
                    . "WHERE uid = '$pid'";

            $con->run($insert);
            var_dump($insert);
            $insert = "UPDATE pabellones SET "
                    . "nombre  = '$pabellon', "
                    . "direccion = '$direccion', "
                    . "ciudad = '$ciudad', "
                    . "cod_postal = '$cod_postal', "
                    . "telefono = '$telefono', "
                    . "horario = '$horario', "
                    . "descripcion = '$descripcion', "
                    . "caracteristicas = '$caracteristicas', "
                    . "otros_servicios = '$otros_servicios', "
                    . "accesibilidad = '$accesibilidad', "
                    . "tarifa = '$tarifa', "
                    . "imagen_web  = '$destino_img' "
                    . "WHERE pid = '$pid'";

            $con->run($insert);
            header("location:reservas.php");
        }

        if (isset($_POST ['eliminar'])) {
            $rid_borrar = $_POST['rid_borrar'];
            $del = "DELETE FROM reservas WHERE rid = '" . $rid_borrar . "'";
            $con->run($del);

//            $destinatario = "pgmcastillo98@hotmail.com";
//            $asunto = "Este mensaje es de prueba";
//            $cuerpo = ' 
//<html> 
//<head> 
//   <title>Prueba de correo</title> 
//</head> 
//<body> 
//<h1>Hola amigos!</h1> 
//<p> 
//<b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
//</p> 
//</body> 
//</html> 
//';
//
//            $headers = "MIME-Version: 1.0\r\n";
//            $headers .= "Content-type: text / html;
            //charset = iso-8859-1\r\n";
//
////dirección del remitente 
//            $headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n";
//
////dirección de respuesta, si queremos que sea distinta que la del remitente 
//            $headers .= "Reply-To: mariano@desarrolloweb.com\r\n";
//
////ruta del mensaje desde origen a destino 
//            $headers .= "Return-path: holahola@desarrolloweb.com\r\n";
//
////direcciones que recibián copia 
//            $headers .= "Cc: maria@desarrolloweb.com\r\n";
//
////direcciones que recibirán copia oculta 
//            $headers .= "Bcc: pepe@pepe.com, juan@juan.com\r\n";
//            if (mail($destinatario, $asunto, $cuerpo, $headers)) {
//                print "<p></p>";
//            } else {
//                print "<p>error</p>";
//            }
            header("location:reservas.php");
        }
    } else if ($_SESSION['tipo'] == "user") {
        $user = $_SESSION['usuario']['nombre'];
        $pass = $_SESSION['usuario']['pass'];
        $c = "SELECT * FROM `jugadores` as j JOIN `usuarios` as u ON j.uid = u.uid WHERE `user` = '$user' ";
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

        $cons = "SELECT r.*, p.nombre FROM `reservas` as r INNER JOIN pabellones p ON p.pid = r.pid ORDER BY fecha_reserva ASC, hora ASC";
        $datosRe = $con->selection($cons);

        if ($datosRe != null) {
            $tabla = "<table class = 'tablaRes'>";
            $tabla .= "<tr>";
            $tabla .= headerTable();
            $tabla .= "</tr>";

            foreach ($datosRe as $valores) {
                if (calcular_fecha($valores['fecha_reserva'], date("Y-m-d")) > 0 || (calcular_fecha($valores['fecha_reserva'], date("Y-m-d")) == 0 && $valores['hora'] > date("H"))) {
                    $tabla .= "<tr>";
                    $tabla .= "<td>";
                    $tabla .= $valores['rid'];
                    $tabla .= "</td>";

                    $tabla .= "<td>";
                    $tabla .= $valores['fecha_reserva'];
                    $tabla .= "</td>";

                    $tabla .= "<td>";
                    $tabla .= $valores['hora'] . ':00';
                    $tabla .= "</td>";
                    $tabla .= "<td>";
                    $tabla .= $nombreC;
                    $tabla .= "</td>";
                    $tabla .= "<td>";
                    $tabla .= $valores['fecha_actual_reserva'];
                    $tabla .= "</td>";
                    $tabla .= "<td>";
                    $tabla .= $valores['nombre'];
                    $tabla .= "</td>";
                    $tabla .= "<td>";
                    $tabla .= $valores['precio'];
                    $tabla .= "</td>";


                    if (calcular_fecha($valores['fecha_reserva'], date("Y-m-d")) > 0) {
                        $tabla .= "<td> ";
                        $tabla .= "<form method = 'POST' action = 'reservas.php'>"
                                . "<input type = 'hidden' name = 'rid_borrar' value = '" . $valores['rid'] . "' > "
                                . "<input type = 'submit' class = 'btn btn-primary' name = 'eliminar' value = 'Eliminar reserva'>"
                                . "</form>";
                        $tabla .= "</td>";

                        $tabla .= "</tr>";
                    } else if (calcular_fecha($valores['fecha_reserva'], date("Y-m-d")) == 0) {
                        if ($valores['hora'] > date("H")) {
                            $tabla .= "<td>";
                            $tabla .= "<form method = 'POST' action = 'reservas.php'>"
                                    . "<input type = 'hidden' name = 'rid_borrar' value = '" . $valores['rid'] . "' > "
                                    . "<input type = 'submit' class = 'btn btn-primary' name = 'eliminar' value = 'Eliminar reserva'>"
                                    . "</form>";
                            $tabla .= "</td>";

                            $tabla .= "</tr>";
                        }
                    }
                }
            }

            $tabla .= "</table>";
            $plantilla->assign('tabla', $tabla);
        } else {
            $plantilla->assign('tabla', '');
        }

        if (isset($_POST ['eliminar'])) {
            $rid_borrar = $_POST['rid_borrar'];
            $del = "DELETE FROM reservas WHERE rid = '" . $rid_borrar . "'";
            $con->run($del);
            header("location:reservas.php");
        }

        $plantilla->assign('contenidoModal', $contenidoModal);

        if ($_POST) {
            if ($_POST['payment_status'] == 'Completed' && $_POST['payer_status'] == 'VERIFIED') {
                $coste = $_POST['mc_gross_1'];
                $pid = $_POST['item_number1'];

                $fecha_pago = $_POST['payment_date'];
                $fecha_d_pago = date("Y-m-d", strtotime($fecha_pago));
                $fecha_reserva = $_SESSION['fecha'];
                $hora_reserva = $_SESSION['hora'];
                $precio = $_SESSION['precioReserva'];
                $fecha_d_reserva = date("Y-m-d", strtotime($fecha_reserva));

                $uid = $_SESSION['usuario']['id'];

                $ins = "INSERT INTO `reservas` "
                        . "VALUES('','$fecha_d_reserva',$hora_reserva,$uid,$pid,'$fecha_d_pago', '$precio')";
                $con->run($ins);
                header("location:reservas.php");
            }
        }
    }

    if (isset($_POST ['desconectar'])) {
        session_destroy();
        header("Location:index.php");
    }
}

$plantilla->assign('perfil', $perfil);
$plantilla->assign('foto_modal', $foto_modal);
$plantilla->assign('foroNav', $foroNav);

$con->cerrar();
$plantilla->display("reservas.tpl"
);

function headerTable() {
    $tabla = "<td>";
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
    $tabla .= "<td>";
    $tabla .= 'Pabellón';
    $tabla .= "</td>";
    $tabla .= "<td>";
    $tabla .= 'Precio';
    $tabla .= "</td>";
    return $tabla;
}

function calcular_fecha(
$fecha_i, $fecha_f) {
    $dias = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
    $dias = floor($dias);
    return $dias;
}

?>