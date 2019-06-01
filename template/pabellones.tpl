<!DOCTYPE html>
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

            #exampleModal3{
                font-size: 20px;
            }


        </style>
    </head>
    {if ($tipo == 'user')}
        <body {$load}>
        {/if}
        {if ($tipo == 'pabellon')}
        <body>
        {/if}
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
                        <a data-toggle="modal" data-target="#exampleModal">{$perfil}</a>
                    </ul>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            {$loginNav}
                            <li class="nav-item active">
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
                    {$listadoPabellones}
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
                                <button type="submit"  class="btn btn-primary" name="aceptarBorrar" >ACEPTAR</button>
                            </form>
                            <button type="submit"  class="btn btn-primary" name="cancelar" class="close" data-dismiss="modal" aria-label="Close">CANCELAR</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---------------- Modal -------------------->
        <!---------------- Modal -------------------->

        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel" style="margin-left:30%">RECORDATORIO</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="padding-left:10%; padding-right:10%; ">
                        <div class="row justify-content-center" id="textoRec"></div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-expander/1.7.0/jquery.expander.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-expander/1.7.0/jquery.expander.js"></script>
        {literal}
            <script type="text/javascript">
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
            function alerta(fecha, hora) {

                $('#exampleModal3').modal('show');
                document.getElementById("textoRec").innerHTML = "Le recordamos que tiene una reserva hoy, dia " + fecha + " a las " + hora + ":00. <br> \n\
       Esperamos que disfrute su partido y que deje un comentario en el foro de ello.<br> GRACIAS!";
                $('#fecha').value = fecha;
                $('#hora').value = hora;
            }

            </script>
        {/literal}
    </body>

</html>
