<?php
/* Smarty version 3.1.33, created on 2019-05-23 16:39:41
  from 'C:\xxx\htdocs\proyecto_fin\template\reservas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce6b0adb03ef4_26933689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da6f41665e5cde2ac4c8eee38e3dc3bd71afe8f3' => 
    array (
      0 => 'C:\\xxx\\htdocs\\proyecto_fin\\template\\reservas.tpl',
      1 => 1558622380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce6b0adb03ef4_26933689 (Smarty_Internal_Template $_smarty_tpl) {
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

        <style>
            #contenidoPrincipal{
                margin-left: 15%;
                margin-right: 15%;
            }

            .tablaRes tr td{
                border: 1px solid black;
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
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="reservas.php">Mis reservas
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="comentarios.php">Foro
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        </ul>
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
            <h2 class="h1-responsive font-weight-bold text-center pat">RESERVAS</h2>
            <!-- Section description -->
            <p class=" text-center mx-auto mb-5">
                Lorem ipsum dolor sit amet consectetur adipiscing elit imperdiet ridiculus ad suspendisse auctor, facilisi blandit hendrerit uidiculus sagittis duis penatibus magnis id ut curabitur lectus.
            </p>
            <!--Aqui solo mostraré habilitados las horas que no esten cogidas de ese día-->
        </div>
        <?php echo $_smarty_tpl->tpl_vars['tabla']->value;?>

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

        <!--MODAL DE CONFIRMACION
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel" style="margin-left:30%">TUS PREFERENCIAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%">Estas seguro de que quieres reservar?</div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">

                        <form action="reservas.php" method='post'>
                            <input type="submit"  class="btn btn-primary" name="cancelar" value="CANCELAR">
                            <input type="submit"  class="btn btn-primary" name="cancelar" value="CANCELAR">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
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
