<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Foro</title>
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

        <script>
            function dis(valor) {
                if (valor.value === '--Seleccionar--') {
                    $('#botoncomentario').attr("disabled", true);
                } else {
                    $('#botoncomentario').attr("disabled", false);
                }
            }
        </script>
    </head>
    <body>
        <div>
            <nav  class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark header">
                <div class="container enlacesNav">
                    <!-- Brand -->
                    <a class="navbar-brand" >
                        <img src="img/logoNegativo.png" class="logo">
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
        <section class="portadaForo text-center w-100 row mx-0">
            <h2 class="col-12 text-center h1-responsive font-weight-bold text-center my-5 pat white-text">Foro</h2>
            <p class="subtitulo white-text text-center mx-auto mb-5">Aqui os adjuntamos nuestros proyectos tanto web como corporativos, realizados desde la creación de la empresa
                hasta la actualidad y nuestras 4 mejores ventas ordenadas por el precio.</p>
            <div class="row">
                <!--listadoMensajes-->
            </div>
        </section>
        <div id="contenidoPrincipal">

            <section class='separadorGrande'></section>
            <div class="row flex mx-auto">
                <div id="filtrado" class="col-xl-3 col-md-3 col-lg-3 col-sm-12 col-xs-12 float-right">
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
                <div id="bloqueMensajes" class="col-xl-8 col-md-8 col-lg-8 col-sm-12 col-xs-12" >
                    {$comentarios}
                </div>

                <hr class="linea col-12 text-center"/>
                <div class="media mt-3 col-10 mx-auto shadow-textarea">
                    <div class="mx-3">{$fotoperfil}</div>
                    <div class="media-body">
                        <h5 class="mt-0 font-weight-bold blue-text">{$nombre}</h5>
                        <!--Disabled option-->
                        <form action="comentarios.php" method="POST" id="formcomentario">
                            {if ($tipo == 'user')}
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
                            {/if}
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
        </div>
        <section class="separadorGrande"></section>
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
                        <form method = 'POST' action = 'pabellones.php' >
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
            {literal}
                <script src="js/jquery.validate.js"></script>
                <script>
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
                </script>
            {/literal}
    </body>

</html>
