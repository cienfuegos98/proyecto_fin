<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sobre Nosotros</title>
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

            #contenidoPrincipal{
                margin-left: 10%;
                margin-right: 10%;
            }
            #enlace_borrar{
                color: #4285f4;
                font-size: 15px;
            }

            #enlace_borrar:hover{
                color:  #4285b1;
                font-size: 17px;
            }
            .nosotrosContent{
                background-color: blue;
            }

        </style>

    </head>
    <body>
        <div>
            <nav  class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark header">
                <div class="container enlacesNav">
                    <!-- Brand -->
                    <a class="navbar-brand" >
                        <img src="img/logoNegativo.png" class="logo">
                    </a>

                    <!-- Collapse -->

                    <button id="hamburguesa" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                    </button>
                    <ul id='imgperfil'  class="nav navbar-nav navbar-right">
                        <a data-toggle="modal" data-target="#exampleModal">{$perfil}</a>

                    </ul>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left -->

                        <ul class="navbar-nav mr-auto">

                            {$loginNav}

                            <li class="nav-item ">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            {if ($tipo != '')}
                                <li class="nav-item ">
                                    <a class="nav-link" href="reservas.php">
                                        Administración
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            {/if}
                            {$foroNav}
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
            <div id="contenidoPrincipal">
                <div class="row tituloPricipal">
                    <div class="fotito col-lg-5">
                        <div class=" view overlay rounded z-depth-2 mb-lg-0">
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
                <div class="row " >

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
                    <div class="  col-lg-5">

                        <!-- Featured image -->
                        <div class="view overlay rounded z-depth-2 mb-lg-0">
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
                    <div class="text-center" style="margin-top:5%">{$foto_modal}</div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">
                        {$contenidoModal}
                    </div>
                    <div class="modal-footer" style="justify-content: center">
                        <form method = 'POST' action = 'pabellones.php'>
                            <a class='btn btn-primary' href = 'reservas.php' >Modificar</a>
                            <input type = 'submit' type='submit' class='btn btn-primary' name = 'desconectar' value = 'desconectar'>
                            {if ($tipo != 'pabellon')}
                                <div class="text-center" >
                                    <a data-toggle="modal" data-target="#exampleModal2" id="enlace_borrar">Eliminar cuenta</a>
                                </div>
                            {/if}
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
            <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="js/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="js/mdb.min.js"></script>
            <!-- Initializations -->
            <script type="text/javascript">
                // Animations initialization
                new WOW().init();
            </script>
            <script>
                $('#enlace_borrar').click(function () {
                    $('#exampleModal').modal('hide');
                });
            </script>
    </body>

</html>
