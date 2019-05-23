<?php
/* Smarty version 3.1.33, created on 2019-05-23 17:15:57
  from 'C:\xxx\htdocs\proyecto_fin\template\comentarios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce6b92dcefde2_20382295',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '932faa9f5e548a90aff816f0298b2bdaace8c3d1' => 
    array (
      0 => 'C:\\xxx\\htdocs\\proyecto_fin\\template\\comentarios.tpl',
      1 => 1558624556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce6b92dcefde2_20382295 (Smarty_Internal_Template $_smarty_tpl) {
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
                margin-right: 10%;
                margin-left: 10%;
                border: 1px solid black;
            }

            .mensaje{
                padding: 3%;
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
                            <li class="nav-item active">
                                <a class="nav-link " href="comentarios.php">Foro
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

            <div class="media-body">


                <div id="bloqueMensajes">
                    <?php echo $_smarty_tpl->tpl_vars['comentarios']->value;?>

                </div>

                <div class="media mt-3 shadow-textarea">
                    <div style="margin-right:15px;"><?php echo $_smarty_tpl->tpl_vars['fotoperfil']->value;?>
</div>
                    <div class="media-body">
                        <h5 class="mt-0 font-weight-bold blue-text"><?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
</h5>
                        <!--Disabled option-->
                        <form action="comentarios.php" method="POST">
                            <div class="form-group" style="color:#757575">
                                <label >Filtrar por búsqueda: </label>
                                <select class="form-control " id="exampleSelect1" name="busqueda">
                                    <option value="">-Seleccionar-</option>
                                    <option value="general">General</option>
                                    <option value="equipo">Equipo</option>
                                    <option value="portero">Portero</option>
                                    <option value="defensa"> Defensa</option>
                                    <option value="ala">Ala</option>
                                    <option value="delantero">Delantero</option>
                                </select>
                            </div>
                            <div class="md-form">
                                <input type="text" id="form1" class="form-control" name="asunto">
                                <label for="form1">Asunto</label>
                            </div>
                            <div class="md-form">
                                <textarea id="form7" class="md-textarea form-control" rows="3" name="comentario"></textarea>
                                <label for="form7">Escribe tu comentario</label>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="enviar" value="Enviar comentario"/>
                            </div>
                        </form>
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
                                <?php echo $_smarty_tpl->tpl_vars['contenidoModal']->value;?>


                            </div>
                            <div class="modal-footer" style="justify-content: center">
                                <form method = 'POST' action = 'pabellones.php'>
                                    <input type = 'submit' type='submit' class='btn btn-primary' name = 'desconectar' value = 'desconectar'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------- Modal -------------------->
                <!---------------- Modal -------------------->
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


    </body>

</html>
<?php }
}
