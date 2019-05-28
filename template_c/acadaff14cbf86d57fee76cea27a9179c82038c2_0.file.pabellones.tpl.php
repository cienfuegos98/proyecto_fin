<?php
/* Smarty version 3.1.33, created on 2019-05-28 17:23:23
  from 'C:\xxx\htdocs\proyecto_fin\template\pabellones.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ced526b68ff57_59746114',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acadaff14cbf86d57fee76cea27a9179c82038c2' => 
    array (
      0 => 'C:\\xxx\\htdocs\\proyecto_fin\\template\\pabellones.tpl',
      1 => 1559057002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ced526b68ff57_59746114 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=deºvice-width, initial-scale=1, shrink-to-fit=no">
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
            html,
            body,
            header,
            .view {
                height: 100%;
            }
            
            html, body
            {
                height: 100%;
            }

            #contenidoPrincipal{
                margin-left: 10%;
                margin-right: 10%;
            }
            .fototxt{
                text-align: center;
                padding-top: 4%;
                padding-right : 4%;
                padding-left : 4%;
                padding-bottom : 1%;
            }
            .pabellon{
                margin-bottom: 1.5rem!important;
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
                            <?php echo $_smarty_tpl->tpl_vars['loginNav']->value;?>

                            <li class="nav-item active">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="reservas.php">
                                   <?php if (($_smarty_tpl->tpl_vars['tipo']->value == 'pabellon')) {?>Reservas<?php }?>
                                     <?php if (($_smarty_tpl->tpl_vars['tipo']->value == 'user')) {?>Mis Reservas<?php }?>
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <?php echo $_smarty_tpl->tpl_vars['foroNav']->value;?>

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
                <h2 class="h1-responsive font-weight-bold text-center my-5 pat">Pabellones</h2>
                <p class="subtitulo grey-text text-center mx-auto mb-5">Aqui os adjuntamos nuestros proyectos tanto web como corporativos, realizados desde la creación de la empresa
                    hasta la actualidad y nuestras 4 mejores ventas ordenadas por el precio.</p>
                <div class="row">
                    <?php echo $_smarty_tpl->tpl_vars['listadoPabellones']->value;?>

                </div>
            </section>
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
                            <input type = 'submit' type='submit' class='btn btn-primary' name = 'modificar' value = 'modificar'>
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
  
        <!---------------- Modal -------------------->
        <!---------------- Modal -------------------->
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
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-expander/1.7.0/jquery.expander.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-expander/1.7.0/jquery.expander.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript">
            $(document).ready(function () {
                $('div.expandable p').expander({
                    slicePoint: 250, // si eliminamos por defecto es 100 caracteres
                    expandText: '[Leer más...]', // por defecto es 'read more...'
                    collapseTimer: 40000, // tiempo de para cerrar la expanción si desea poner 0 para no cerrar
                    userCollapseText: '[Ocultar]' // por defecto es 'read less...'
                });
                $('.enlace').click(function () {
                    var id_form = $(this).parent().attr('id');
                    $('#' + id_form).submit();
                });
                $('#enlace_borrar').click(function () {
                    $('#exampleModal').modal('hide');
                });
               
            });

        <?php echo '</script'; ?>
>

    </body>

</html>
<?php }
}
