<?php
/* Smarty version 3.1.33, created on 2019-06-03 21:32:11
  from 'C:\xampp\htdocs\proyecto_fin\template\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf575bbc60354_01949667',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b0d532dffa6224e7695478c105eca287a3642dc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto_fin\\template\\login.tpl',
      1 => 1559590331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf575bbc60354_01949667 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Login</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Pattaya" rel="stylesheet">
        <link rel="icon" type="image/png" href="./img/loading.gif" sizes="16x16">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <nav  class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark header">
            <div class="container enlacesNav">
                <!-- Brand -->
                <a class="navbar-brand" >
                    <img src="img/logoNegativo.png" class="logo">
                </a>

                <!-- Collapse -->
                <button id = "hamburguesa" class="navbar-toggler right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul id='imgperfil'  class="nav navbar-nav navbar-right">
                    <?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>

                </ul> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="pabellones.php">Pabellones
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="nosotros.php">Sobre Nosotros
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="view fondoLogin">
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row wow fadeIn">
                        <div class="col-md-6 mb-4 white-text text-center text-md-left">
                            <h1 class="display-4 font-weight-bold">Inicia sesión</h1>
                            <hr class="hr-light">
                            <p>
                                <strong>Los mejores pabellones en la palma de tu mano</strong>
                            </p>
                            <p class="d-md-block">
                                <strong>Aquí podrás comparar los mejores pabellones de Zaragoza de la forma más rápida
                                    y sin complicaciones.</strong><br>
                                <strong> Con un solo clic obtendrás tu reserva y olvidate de acudir o llamar para ello.</strong><br><br>
                            <h3 class=" font-weight-bold">FUTMACTH ES TU WEB</h3>
                            </p>
                        </div>
                        <div class="col-md-6 col-xl-5 mb-4">
                            <div class="card">
                                <div class="card-body"  style="padding:10% 10% 5% 10%;">
                                    <form name="login" id="login-form" method="POST" action="index.php">
                                        <h2 class="dark-grey-text text-center">
                                            <strong>Inicio de sesión</strong>
                                        </h2>
                                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span>
                                        <div class="md-form">
                                            <i class="fas fa-user prefix"></i>
                                            <input type="text" id="usuario" class="form-control" name="usuario">
                                            <label for="form3">Usuario</label>
                                        </div>
                                        <div class="md-form">
                                            <i class="fas fa-lock prefix"></i>
                                            <input type="password" id="pass" class="form-control" name="pass">
                                            <label for="inputValidationEx2">Password</label>
                                        </div>
                                        <div class="text-center">
                                            <a class="olvidado-contrasena" data-toggle="modal" data-target="#exampleModal">¿Has olvidado tu contraseña?</a>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" name="iniciar" value="Iniciar sesion"/>
                                        </div>
                                        <div class="text-center">
                                            <span class="nuevo" >¿Eres nuevo?</span> 
                                            <a  class="olvidado-contrasena" href="#" data-ancla="registro" class="ancla">Registrate ahora</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="container" >

            <!--Section: Main info-->
            <section class="mt-5 wow fadeIn">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-6 mb-4 imgregis d-none d-sm-block">
                        <img src="./img/imagenes/regi.jpg" class="img-fluid z-depth-1-half " alt="">
                    </div>
                    <div class="col-md-6 mb-4">
                        <h3 class="h3 mb-3">Regístrate aqui</h3>
                        <div id='registro'></div>
                        <span style="color:red"><?php echo $_smarty_tpl->tpl_vars['error2']->value;?>
</span>

                        <form name="registro" id="registro-form" method="POST" action="index.php" enctype="multipart/form-data">
                            <div class="md-form">
                                <input type="text" id="usuario" class="form-control" name="usuario">
                                <label for="form3">Usuario</label>
                            </div>
                            <div class="md-form">
                                <input type="text" id="pass" class="form-control" name="pass">
                                <label for="form4">Password</label>
                            </div>
                            <div class="md-form">
                                <input type="email" id="email" class="form-control" name="email">
                                <label for="form2">Email</label>
                            </div>
                            <div class="md-form">
                                <input type="text" id="nombre_completo" class="form-control" name="nombreC">
                                <label for="form5">Nombre Completo</label>
                            </div>
                            <div class="md-form">
                                <input type="text" id="direccion" class="form-control" name="direccion">
                                <label for="form5">Dirección</label>
                            </div>
                            <div class="md-form">
                                <input type="text" id="cp" class="form-control" name="cp">
                                <label for="form2">Código Postal</label>
                            </div>
                            <div class="md-form">
                                <input type="text" id="telefono" class="form-control" name="tlf">
                                <label for="form2">Teléfono</label>
                            </div>

                            <div class="md-form">
                                <span for="form2">Fecha de nacimiento</span>
                                <input type="date" id="fecha_nac" class="form-control" name="fecha_nac">
                            </div>

                            <span for="form2" >¿Quieres una foto de perfil?</span>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Subir foto</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                           aria-describedby="inputGroupFileAddon01" name="foto">
                                    <label class="custom-file-label" for="inputGroupFile01"></label>
                                </div>
                            </div>
                            <br>
                            <label class="custom-file" >Pregunta de seguridad</label>
                            <select name ='pregunta' id='pregunta' class='custom-select'>
                                <option value="Nombre de tu primer animal">Nombre de tu primer animal</option>
                                <option value="Nombre de tu serie preferida">Nombre de tu serie preferida</option>
                                <option value="Nombre de tu objeto preferido">Nombre de tu objeto preferido</option>
                            </select>
                            <div class="md-form">
                                <input type="text" id="respuesta" class="form-control" name="respuesta">
                                <label for="form5">Respuesta</label>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="registrarse" value="Registrarse"/>
                            </div>

                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title text-center col-12" id="exampleModalLabel">RECUPERAR CONTRASEÑA</h5>
                        <button type="button" class="close position-absolute text-right col-12 px-5" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%">Introduce tu email para que podamos enviarte tu contraseña y asegurarmos de que eres tu.</div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">
                        <div class="justify-content-center">

                            <div class="md-form">
                                <input type="text" id="emailAJAX" class="form-control" name="emailAJAX" value=''>
                                <label for="form3">Email</label>
                            </div>
                            <div class="md-form">
                                <div id="formresp"></div>
                                <div id='r' class='my-4'></div>
                            </div>
                            <div class="text-center" >
                                <button onclick ="valorEmail($('#emailAJAX').val());
                                        return false;" class="btn btn-primary " name="emailConfirm" >ACEPTAR</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br> 
        <!-- SCRIPTS -->
        
            <!-- JQuery -->
            <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.4.0.min.js"><?php echo '</script'; ?>
>
            <!-- Bootstrap tooltips -->
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

            <?php echo '<script'; ?>
 src="js/jquery.validate.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                $(document).ready(function () {
                    $("#registro-form").validate({
                        rules: {
                            usuario: {
                                required: true,
                                maxlength: 20,
                                minlength: 2
                            },
                            pass: {
                                required: true,
                                maxlength: 50,
                                minlength: 5
                            },
                            email: {
                                required: true,
                                email: true,
                                maxlength: 50
                            },
                            nombreC: {
                                required: true,
                                maxlength: 50,
                                minlength: 5
                            },
                            direccion: {
                                required: true,
                                maxlength: 100,
                                minlength: 5
                            },
                            cp: {
                                maxlength: 13,
                                minlength: 5
                            },
                            tlf: {
                                required: true,
                                maxlength: 12,
                                minlength: 9
                            },
                            fecha_nac: {
                                required: true,
                                date: true
                            }
                        },
                        messages: {
                            usuario: {
                                required: "Campo obligatorio",
                                minlength: "Nombre demasiado corto",
                                maxlength: "Nombre demasiado largo"
                            },
                            pass: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto",
                                maxlength: "Campo demasiado largo"
                            },
                            email: {
                                required: "Campo obligatorio",
                                email: "Introduce un email válido",
                                maxlength: "Campo demasiado largo"
                            },
                            nombreC: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Nombre demasiado corto"
                            },
                            direccion: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            cp: {
                                maxlength: 13,
                                minlength: "Campo demasiado corto"
                            },
                            tlf: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            fecha_nac: {
                                required: "Campo obligatorio",
                                date: "Introduce fecha válida"
                            }
                        },
                        errorElement: "em"
                    });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                $(document).ready(function () {
                    $("#login-form").validate({
                        rules: {
                            usuario: {
                                required: true,
                                maxlength: 20,
                                minlength: 2
                            },
                            pass: {
                                required: true,
                                maxlength: 50,
                                minlength: 5
                            }
                        },
                        messages: {
                            usuario: {
                                required: "Campo obligatorio",
                                minlength: "Nombre demasiado corto",
                                maxlength: "Nombre demasiado largo"
                            },
                            pass: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto",
                                maxlength: "Campo demasiado largo"
                            }
                        },
                        errorElement: "em"
                    });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                //Cuando cargue la página completamente
                $(document).ready(function () {
                    //Creamos un evento click para el enlace
                    $(".ancla").click(function (evento) {
                        //Anulamos la funcionalidad por defecto del evento
                        evento.preventDefault();
                        //Creamos el string del enlace ancla
                        var codigo = "#" + $(this).data("ancla");
                        //Funcionalidad de scroll lento para el enlace ancla en 3 segundos
                        $("html,body").animate({scrollTop: $(codigo).offset().top}, 1000);
                    });
                });
            <?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
                function getResp(r) {
                    var email = $('#emailhidden').val();
                    var data = {
                        'respuestaP': r,
                        'emailhidden': email
                    };
                    $.ajax({
                        type: "post",
                        url: 'index3.php',
                        data: data,
                        success: function (response) {
                            $('#r').html(response);
                        }
                    });
                    return false;
                }
                function valorEmail(correo) {


                    var data = {
                        'email': correo
                    };

                    $.ajax({
                        type: "post",
                        url: 'index3.php',
                        data: data,
                        success: function (response) {
                            $('#formresp').html(response);
                        }
                    });
                    return false;
                }
            <?php echo '</script'; ?>
>
        

    </body>

</html>
<?php }
}
