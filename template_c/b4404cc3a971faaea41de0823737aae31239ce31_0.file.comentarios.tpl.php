<?php
/* Smarty version 3.1.33, created on 2019-05-31 23:51:16
  from 'C:\xampp\htdocs\proyecto_fin\template\comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf1a1d4ee3ff6_23232564',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4404cc3a971faaea41de0823737aae31239ce31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto_fin\\template\\comentarios.tpl',
      1 => 1559339475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cf1a1d4ee3ff6_23232564 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Material Design Bootstrap</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" type="image/png" href="./img/loading.gif" sizes="16x16">
        <style type="text/css">
            #contenidoPrincipal{
                padding-left: 10%;
                padding-right: 10%;
            }

            .media .avatar {
                width: 64px;
            }
            .shadow-textarea textarea.form-control::placeholder {
                font-weight: 300;
            }
            .shadow-textarea textarea.form-control {
                padding-left: 0.8rem;
            }
            #bloqueMensajes{
                margin-bottom: 10%;
                margin-right: 5%;

            }

            .mensaje{
                padding: 3%;
                margin-top:10px;
                margin-bottom: 10px;
            }

            .comentarioMio{
                background-color: #dcf8c6;
                border-radius: 1.625rem;
                margin-left: 18%;
                border: 1px solid #128c7e;
            }

            .comentarioOtro{
                background-color: #f7f1ea;
                border-radius: 1.625rem;
                margin-right: 18%;
                border: 1px solid #c4bdb4;

            }

            .separadorPeque{
                height: 20px;
            }
            #enlace_borrar{
                color: #4285f4;
                font-size: 15px;
            }

            #enlace_borrar:hover{
                color:  #4285b1;
                font-size: 17px;
            }
            .linea{
                border-color:#c4bdb4!important;
                margin-bottom: 5%;
                margin-top: -5%;
            }

        </style>
        <?php echo '<script'; ?>
>
            function dis(valor) {
                if (valor.value === '--Seleccionar--') {
                    $('#botoncomentario').attr("disabled", true);
                } else {
                    $('#botoncomentario').attr("disabled", false);
                }
            }
        <?php echo '</script'; ?>
>
    </head>
    <body>
        <div>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark top-nav-collapse">
                <div class="container">
                    <a class="navbar-brand" href="" >
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
                            <li class="nav-item ">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="reservas.php">
                                    Administración
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link " href="comentarios.php">Foro
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
        </div>
        <br>
        <div id="contenidoPrincipal">
            <section class="text-center my-5">
                <h2 class="h1-responsive font-weight-bold text-center my-5 pat">Foro</h2>
                <p class="subtitulo grey-text text-center mx-auto mb-5">Aqui os adjuntamos nuestros proyectos tanto web como corporativos, realizados desde la creación de la empresa
                    hasta la actualidad y nuestras 4 mejores ventas ordenadas por el precio.</p>
                <div class="row">
                    <!--listadoMensajes-->
                </div>
            </section>
            <div class="row flex mx-auto">
                <div id="bloqueMensajes" class="col-8">
                    <?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>

                </div>
                <div id="filtrado" class="col-3">
                    <h4 class="h4-responsive font-weight-bold pat my-4">Filtrar por: </h4>
                    <form action="comentarios.php" method="POST">
                        <!-- Group of default radios - option 1 -->
                        <div class="custom-control custom-radio my-2">
                            <input type="radio" value="sin" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" checked>
                            <label class="custom-control-label" for="defaultGroupExample1">Sin filtro</label>
                        </div>

                        <!-- Group of default radios - option 2 -->
                        <div class="custom-control custom-radio my-2">
                            <input type="radio" value="equipo" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample2">Equipo</label>
                        </div>

                        <!-- Group of default radios - option 3 -->
                        <div class="custom-control custom-radio my-2">
                            <input type="radio" value="portero" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample3">Portero</label>
                        </div>
                        <div class="custom-control custom-radio my-2">
                            <input type="radio" value="ala" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample4">Ala</label>
                        </div>
                        <div class="custom-control custom-radio my-2">
                            <input type="radio" value="defensa" class="custom-control-input" id="defaultGroupExample5" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample5">Defensa</label>
                        </div>
                        <div class="custom-control custom-radio my-2">
                            <input type="radio" value="delantero" class="custom-control-input" id="defaultGroupExample6" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample6">Delantero</label>
                        </div>
                        <input type="submit" name="filtrar" class="btn btn-primary" value="FILTRAR COMENTARIOS" class="my-4"/>
                    </form>
                </div>
            </div>
            <hr class="linea"/>
            <div class="media mt-3 shadow-textarea">
                <div style="margin-right:15px;"><?php echo $_smarty_tpl->tpl_vars['fotoperfil']->value;?>
</div>
                <div class="media-body">
                    <h5 class="mt-0 font-weight-bold blue-text"><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</h5>
                    <!--Disabled option-->
                    <form action="comentarios.php" method="POST" id="formcomentario">
                        <?php if (($_smarty_tpl->tpl_vars['tipo']->value == 'user')) {?>
                            <div class="form-group" style="color:#757575">
                                <label >Filtrar por búsqueda: </label>
                                <select class="form-control " id="exampleSelect1" name="busqueda" onchange="dis(this)">
                                    <option value="--Seleccionar--">--Seleccionar--</option>
                                    <option value="general">General</option>
                                    <option value="equipo">Equipo</option>
                                    <option value="portero">Portero</option>
                                    <option value="defensa"> Defensa</option>
                                    <option value="ala">Ala</option>
                                    <option value="delantero">Delantero</option>
                                </select>
                            </div>
                        <?php }?>
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control" id="asunto" name="asunto">
                            <label for="form1">Asunto</label>
                        </div>
                        <div class="md-form">
                            <textarea id="form7" class="md-textarea form-control" rows="3" id="comentario" name="comentario"></textarea>
                            <label for="form7">Escribe tu comentario</label>
                        </div>
                        <div class="text-center">
                            <input disabled type="submit" class="btn btn-primary" name="enviar" value="Enviar comentario" id="botoncomentario"/>
                        </div>
                    </form>
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
                        <form method = 'POST' action = 'pabellones.php' >
                            <a class='btn btn-primary' href = 'reservas.php' >Modificar</a>
                            <input type = 'submit' type='submit' class='btn btn-primary' name = 'desconectar' value = 'desconectar'>
                            <?php if (($_smarty_tpl->tpl_vars['tipo']->value != 'pabellon')) {?>
                                <div class="text-center" >
                                    <a data-toggle="modal" data-target="#exampleModal2" id="enlace_borrar">Eliminar cuenta</a>
                                </div>
                            <?php }?>
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
>
                $('#enlace_borrar').click(function () {
                    $('#exampleModal').modal('hide');
                });
            <?php echo '</script'; ?>
>
            
                <?php echo '<script'; ?>
 src="js/jquery.validate.js"><?php echo '</script'; ?>
>
                <?php echo '<script'; ?>
>
                $(document).ready(function () {
                    $("#formcomentario").validate({
                        rules: {
                            asunto: {
                                required: true,
                                maxlength: 30,
                                minlength: 2
                            },
                            comentario: {
                                required: true,
                                minlength: 3
                            }
                        },
                        messages: {
                            asunto: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto",
                                maxlength: "Campo demasiado largo"
                            },
                            comentario: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto",
                            }
                        },
                        errorElement: "em"
                    });
                });
                <?php echo '</script'; ?>
>
            
    </body>

</html>
<?php }
}
