<?php
/* Smarty version 3.1.33, created on 2019-05-24 22:29:42
  from 'C:\xampp\htdocs\proyecto_fin\template\nosotros.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ce85436171097_15393490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0dd1e6eb2f018077a8c51693ed93dd1bb1e57c8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyecto_fin\\template\\nosotros.tpl',
      1 => 1558729762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce85436171097_15393490 (Smarty_Internal_Template $_smarty_tpl) {
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
            html,
            body,
            header,
            .view {
                height: 100%;
            }

            @media (min-width: 800px) and (max-width: 850px) {
                html,
                body,
                header,
                .view {
                    height: 650px;
                }
            }

            #registrate-ahora{
                color: #4285f4;
                font-size: 12px;
            }

            #olvidado-contraseña{
                color: #4285f4;
                font-size: 12px;
            }

            #registrate-ahora:hover{
                color:  #4285b1;
                font-size: 14px;
            }

            #olvidado-contraseña:hover{
                color:  #4285b1;
                font-size: 14px;
            }
            .nuevo{
                font-size: 12px;
            }
            #contenidoPrincipal{
                margin-left: 10%;
                margin-right: 10%;
            }
        </style>

    </head>
    <body>
        <div>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark top-nav-collapse">
                <div class="container">

                    <!-- Brand -->
                    <a class="navbar-brand" href="" target="_blank">
                        <strong>FUTMATCH</strong>
                    </a>

                    <!-- Collapse -->

                    <button id="hamburguesa" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                    </button>
                    <ul id='imgperfil'  class="nav navbar-nav navbar-right">
                        <a data-toggle="modal" data-target="#exampleModal"><?php echo $_smarty_tpl->tpl_vars['perfil']->value;?>
</a>

                    </ul>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left -->

                        <ul class="navbar-nav mr-auto">

                            <?php echo $_smarty_tpl->tpl_vars['loginNav']->value;?>


                            <li class="nav-item ">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="reservas.php">Mis reservas
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <?php echo $_smarty_tpl->tpl_vars['foroNav']->value;?>

                            <li class="nav-item active">
                                <a class="nav-link" href="nosotros.php">Sobre Nosotros
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>


                        </ul>
                    </div>


                </div>
            </nav>
        </div>
        <br> <br>   <br> <br>
        <div id="contenidoPrincipal">
            <h2 class="h1-responsive font-weight-bold text-center pat">Nuestra historia</h2>
            <!-- Section description -->
            <p class=" text-center mx-auto mb-5">
                Todo comenzó tras años trabajando, se nos ocurrio la idea de crear nuestra propia empresa 
                de desarollo y diseño con nuestra propia identidad, capaz de amoldrse 
                a nuestros clientes y hacer sus sueños realidad.
                Nuestros sueños son tus sueños.
            </p>
        </div>
        <section class="nosotros my-5">
            <div id="contenidoPrincipal" class="nosotrosContent">
                <div class="row tituloPricipal">
                    <div class="fotito col-lg-5">
                        <div class=" view overlay rounded z-depth-2 mb-lg-0 mb-4">
                            <img class="img-fluid" src="./img/nosotros/foto1.jpg" alt="Sample image">
                        </div>

                    </div>
                    <div class="parrafito col-lg-7">
                        <h6 class="font-weight-bold mb-3"></h6>
                        <h3 class="font-weight-bold mb-3 pat">La idea</h3>

                        <p>Nuestra empresa NOOK se dedica al desarrollo y diseño de aplicaciones WEB para un gran número de empresas de todo el mundo. Nos encargamos, además, 
                            del diseño de productos de identidad corporativa tales como logos, invitaciones, etc... Esperamos que disfruteis de nuestra WEB y contacteis con nsootros cuando sea necesario.</p>


                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <hr class="my-5">

                <!-- Grid row -->
                <div class="row ">

                    <!-- Grid column -->
                    <div class="parrafito col-lg-7">

                        <!-- Category -->
                        <a href="#!" class="pink-text">

                        </a>
                        <!-- Post title -->
                        <h3 class="font-weight-bold mb-3 pat">Nuesta formación</h3>
                        <!-- Excerpt -->
                        <p class="fotito">Nuestra empresa NOOK se dedica al desarrollo y diseño de aplicaciones WEB para un gran número de empresas de todo el mundo. Nos encargamos,
                            además, del diseño de productos de identidad corporativa tales como logos, invitaciones, etc... 
                            Esperamos que disfruteis de nuestra WEB y contacteis con nsootros cuando sea necesario.</p>
                        <!-- Post data -->


                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-lg-5">

                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-2">
                            <img class="img-fluid" src="./img/nosotros/foto2.jpg" alt="Sample image">
                        </div>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

                <hr class="my-5">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class=" fotito col-lg-5">

                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
                            <img class="img-fluid" src="./img/nosotros/foto3.jpg" alt="Sample image">
                        </div>

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="parrafito col-lg-7">

                        <!-- Category -->
                        <a href="#!" class="indigo-text">
                        </a>
                        <!-- Post title -->
                        <h3 class="font-weight-bold mb-3 pat">Nuestros objetivos</h3>
                        <!-- Excerpt -->
                        <p>Nuestra empresa NOOK se dedica al desarrollo y diseño de aplicaciones WEB 
                            para un gran número de empresas de todo el mundo.
                            Nos encargamos, además, del diseño de productos de identidad corporativa tales como logos, invitaciones, etc...
                            Esperamos que disfruteis de nuestra WEB y contacteis con nsootros cuando sea necesario.</p>


                    </div>
                </div>
            </div>
        </section>
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
