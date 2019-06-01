<?php
/* Smarty version 3.1.33, created on 2019-06-01 01:38:32
  from 'C:\xampp\htdocs\proyecto_fin\template\calendario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf1baf8d99319_30374030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b95795ee8ffaf9ef010d72538171db164339488' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto_fin\\template\\calendario.tpl',
      1 => 1559344133,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf1baf8d99319_30374030 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery UI Datepicker - Display inline</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.min.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="./img/loading.gif" sizes="16x16">
        <link href="css/style.css" rel="stylesheet">
        <?php echo '<script'; ?>
 type="text/javascript">
            
                $(function () {

                    //traducción del calendario
                    $.datepicker.regional['es'] = {
                        closeText: 'Cerrar',
                        prevText: '< Ant',
                        nextText: 'Sig >',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        dateFormat: 'yy/mm/dd',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    };
                    $.datepicker.setDefaults($.datepicker.regional['es']);
                    var disabledDates = ['13/05/2019', '10/05/2019']; //Este array lo recogere desde PHP; es un array de las fechas que el usuario y ha reservado

                    //opciones del datepicker
                    $("#datepicker").datepicker({
                        minDate: '0', //quita los dias anteriores del dia actual	
                        showButtonPanel: true, //boton de HOY
                        beforeShowDay: function (date) {
                            var string = $.datepicker.formatDate('dd/mm/yy', date);
                            return [disabledDates.indexOf(string) == -1]
                        }, //elimino los dias del array que le paso
                        onSelect: function (date) {
                            var fecha = document.getElementById("datepicker").value;
                            var data = {'fecha': fecha};
                            $.ajax({
                                type: "post",
                                url: 'index3.php',
                                data: data,
                                success: function (response) {

                                    $('#respuesta').html(response);
                                }
                            });
                            return false;
                        }
                    });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>

                function getval(sel) {

                    var data = {
                        'hora': sel.value
                    };
                    $.ajax({
                        type: "post",
                        url: 'index3.php',
                        data: data,
                        success: function (response) {
                            $('#respuesta2').html(response);
                        }
                    });
                    return false;
                }
                function dis(valor) {
                    if (valor.value === '--Selecciona hora--') {
                        $('#a_modal').attr("disabled", true);
                    } else {
                        $('#a_modal').attr("disabled", false);
                    }
                }
            <?php echo '</script'; ?>
>

        
        <style>
            #contenidoPrincipal{
                margin-left: 15%;
                margin-right: 15%;
            }
            #enlace_borrar{
                color: #4285f4;
                font-size: 15px;
            }

            #enlace_borrar:hover{
                color:  #4285b1;
                font-size: 17px;
            }
        </style>
    </head>
    <body>
        <div>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark top-nav-collapse">
                <div class="container">
                    <a class="navbar-brand" href="" target="_blank">
                        <strong>FUTMATCH</strong>
                    </a>
                    <button id = "hamburguesa" class="navbar-toggler float-left" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul id='imgperfil'  class="nav navbar-nav navbar-right">
                        <a data-toggle="modal" data-target="#exampleModal"><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</a>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <br><br><br><br>
        <div id="contenidoPrincipal">
            <h2 class="h1-responsive font-weight-bold text-center pat">Nuestra historia</h2>
            <!-- Section description -->
            <p class=" text-center mx-auto mb-5">
                Todo comenzó tras años trabajando, se nos ocurrio la idea de crear nuestra propia empresa 
                de desarollo y diseño con nuestr   a propia identidad, capaz de amoldrse 
                a nuestros clientes y hacer sus sueños realidad.
                Nuestros sueños son tus sueños.
            </p>

            <!--Aqui solo mostraré habilitados las horas que no esten cogidas de ese día-->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                    <div class = 'view zoom'>
                        <div id="datepicker"></div>
                        <div id="respuesta"></div>
                        <div id="respuesta2"></div>
                        <button disabled href="calendario.php" data-toggle="modal" id="a_modal" class="btn btn-primary" data-target="#exampleModal2" >PROCEDER A LA RESERVA</button>
                        <!--<a id="a_modal" class="btn btn-primary">PROCEDER A LA RESERVA</a>-->
                    </div>
                </div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['imagen']->value;?>
"/>
            </div>
            <div><?php echo $_smarty_tpl->tpl_vars['nombrePab']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['direccionP']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['cod_postal']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['telefono']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['horario']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['otros_servicios']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['accesibilidad']->value;?>
</div>
            <div><?php echo $_smarty_tpl->tpl_vars['tarifa']->value;?>
</div>

        </div>

        <!---------------- Modal -------------------->
        <!---------------- Modal -------------------->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="margin-left:40%">MI PERFIL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%"><?php echo $_smarty_tpl->tpl_vars['foto_modal']->value;?>
</div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">
                        User: <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>

                        <br>
                        Email: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>

                        <br>
                        Password <?php echo $_smarty_tpl->tpl_vars['pass']->value;?>

                        <br>
                        Nombre completo: <?php echo $_smarty_tpl->tpl_vars['nombreC']->value;?>

                        <br>
                        Fecha de Nacimiento: <?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>

                        <br>
                        Dirección: <?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>


                    </div>
                    <div class="modal-footer" style="justify-content: center">
                        <form method = 'POST' action = 'pabellones.php'>
                            <input type = 'submit' type='submit' class='btn btn-primary' name = 'desconectar' value = 'desconectar'>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--MODAL DE CONFIRMACION-->
        <div class="modal fade show" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel" style="margin-left:30%">TUS PREFERENCIAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%">Estas seguro de que quieres reservar?</div>
                    <div class="modal-body text-center">
                        <div class="row justify-content-center w-20">
                            <div class=" float-left">Fecha de la reserva:<br>Hora de la reserva: 
                            </div>
                            <div class="float-right"><?php echo $_smarty_tpl->tpl_vars['fecha_reserva']->value;?>
 <br><?php echo $_smarty_tpl->tpl_vars['hora_reserva']->value;?>
</div>
                            En el pabellon: <?php echo $_smarty_tpl->tpl_vars['nombrePab']->value;?>
;
                        </div>
                        <div class="modal-footer" style="justify-content: center">
                            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                <input name="cmd" type="hidden" value="_cart" />
                                <input name="upload" type="hidden" value="1" />
                                <input name="business" type="hidden" value="pgmcastillo98-facilitator@gmail.com" />
                                <input name="shopping_url" type="hidden" value="http://localhost/proyecto_fin/reservas.php" />
                                <input name="currency_code" type="hidden" value="EUR" />
                                <input name="return" type="hidden" value="http://localhost/proyecto_fin/reservas.php" />
                                <input name="notify_url" type="hidden" value="http://localhost/proyecto_fin/reservas.php" />
                                <input name="rm" type="hidden" value="2" />
                                <input type="submit" class="btn btn-primary" name="paypal" alt="Realice pagos con PayPal: es rápido, gratis y seguro" value="REALIZAR PAGO">
                                <?php echo $_smarty_tpl->tpl_vars['hiddenPay']->value;?>

                            </form>
                            <form action="calendario.php" method='post'>
                                <input type="submit"  class="btn btn-primary" name="cancelar" value="CANCELAR">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="margin-left:40%">MI PERFIL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%"><?php echo $_smarty_tpl->tpl_vars['foto_modal']->value;?>
</div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">
                        <?php echo $_smarty_tpl->tpl_vars['contenidoModal']->value;?>

                    </div>
                    <div class="modal-footer" style="justify-content: center">
                        <form method = 'POST' action = 'pabellones.php'>
                            <a class='btn btn-primary' href = 'reservas.php' >Modificar</a>
                            <input type = 'submit' type='submit' class='btn btn-primary' name = 'desconectar' value = 'desconectar'>
                            <div class="text-center" >
                                <a data-toggle="modal" data-target="#exampleModal2" id="enlace_borrar">Eliminar cuenta</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL DE CONFIRMACION-->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel" style="margin-left:30%">TUS PREFERENCIAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%">Estas seguro de que quieres borrar tu cuenta?
                        Despues de ello no podrás acceder con tu usuario a nuestra web y tendrás que volver a registrarte.</div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">
                        <div class="row justify-content-center">

                            <form action="pabellones.php" method='post'>
                                <button type="submit"  class="btn btn-primary" name="aceptar" >ACEPTAR </button>
                            </form>
                            <button type="submit"  class="btn btn-primary" name="cancelar" class="close" data-dismiss="modal" aria-label="Close">CANCELAR</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <!---------------- Modal -------------------->
        <!---------------- Modal -------------------->
        <?php echo '<script'; ?>
 type="text/javascript" src="js/popper.min.js"><?php echo '</script'; ?>
>
        <!-- Bootstrap core JavaScript -->
        <?php echo '<script'; ?>
 type="text/javascript" src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
        <!-- MDB core JavaScript -->
        <?php echo '<script'; ?>
 type="text/javascript" src="js/mdb.min.js"><?php echo '</script'; ?>
>
        <!-- Initializations -->
        <?php echo '<script'; ?>
 type="text/javascript">
            // Animations initialization
            new WOW().init();
        <?php echo '</script'; ?>
>

    </body>
</html><?php }
}
