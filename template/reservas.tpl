<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jQuery UI Datepicker - Display inline</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
                        <a data-toggle="modal" data-target="#exampleModal">{$perfil}</a>
                    </ul>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="reservas.php">Mis reservas
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
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
        <br><br><br><br>
        <div id="contenidoPrincipal">
            <h2 class="h1-responsive font-weight-bold text-center pat">RESERVAS</h2>
            <!-- Section description -->
            <p class=" text-center mx-auto mb-5">
                Lorem ipsum dolor sit amet consectetur adipiscing elit imperdiet ridiculus ad suspendisse auctor, facilisi blandit hendrerit uidiculus sagittis duis penatibus magnis id ut curabitur lectus.
            </p>
            <!--Aqui solo mostraré habilitados las horas que no esten cogidas de ese día-->
        </div>
        {$tabla}
        {if ($tipo == 'pabellon')}
            <div class="col-md-6 mb-4">
                <!-- Main heading -->
                <h3 class="h3 mb-3">Material Design for Bootstrap</h3>
                <form name="registro" id="registro-form" method="POST" action="reservas.php" enctype="multipart/form-data">
                    <span for="form2" >¿Quieres una foto de perfil?</span>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                   value="{$foto}" aria-describedby="inputGroupFileAddon01" name="foto">
                            <label class="custom-file-label" for="inputGroupFile01">Escoge tu foto de perfil</label>
                        </div>
                    </div>
                    <div class="md-form">
                        <input type="text" id="pabellon" class="form-control" name="pabellon" value="{$nombrePab}">
                        <label for="form3">Pabellon</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="direccion" class="form-control" name="direccion" value="{$direccion}">
                        <label for="form4">Direccion</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="ciudad" class="form-control" name="ciudad" value="{$ciudad}">
                        <label for="form2">Ciudad</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="cod_postal" class="form-control" name="cod_postal" value="{$cod_postal}">
                        <label for="form5">Código Postal</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="telefono" class="form-control" name="telefono" value="{$telefono}">
                        <label for="form5">Teléfono</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="horario" class="form-control" name="horario" value="{$horario}">
                        <label for="form5">Horario</label>
                    </div>
                    <div class="md-form">

                        <textarea id="descripcion" class="md-textarea form-control" rows="8" name="descripcion">{$descripcion}</textarea>
                        <label for="form2">Descripción</label>
                    </div>
                    <div class="md-form">
                        <textarea id="caracteristicas" class="md-textarea  form-control" name="caracteristicas" rows="8"> {$caracteristicas}</textarea>

                        <label for="form2">Características</label>
                    </div>
                    <div class="md-form">
                        <textarea id="otros_servicios" class="md-textarea  form-control" name="otros_servicios" {$otros_servicios}></textarea>

                        <label for="form2">Otros servicios</label>
                    </div>
                    <div class="md-form">
                        <textarea id="accesibilidad" class="md-textarea  form-control" name="accesibilidad">{$accesibilidad}</textarea>

                        <label for="form2">Accesibilidad</label>
                    </div>
                    <div class="md-form">
                        <input type="text" id="tarifa" class="form-control" name="tarifa" value="{$tarifa}">
                        <label for="form2">Tarifa</label>
                    </div>
                    <span for="form2" >¿Quieres cambiar tu imagen corporativa?</span>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                   value="{$imagen_web}"aria-describedby="inputGroupFileAddon01" name="imegen_web">
                            <label class="custom-file-label" for="inputGroupFile01">Escoge tu foto de perfil</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar datos"/>
                    </div>
                </form>
            </div>
        {/if}
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
    </body>
</html>