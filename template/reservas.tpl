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
            #enlace_borrar{
                color: #4285f4;
                font - size: 15px;
            }

            #enlace_borrar:hover{
                color:  #4285b1;
                font - size: 17px;
            }
        </style>
        {literal}
            <script type="text/javascript">

                $(function () {

                    //traducción del calendario
                    $.datepicker.regional['es'] = {
                        closeText: 'Cerrar',
                        prevText: '< Ant',
                        nextText: 'Sig >',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        dateFormat: 'yy/mm/dd',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    };
                    $.datepicker.setDefaults($.datepicker.regional['es']);
                    //opciones del datepicker
                    var disabledDates = ['13/05/2019', '10/05/2019'];
                    $("#datepicker").datepicker({
                        minDate: '0', //quita los dias anteriores del dia actual	
                        showButtonPanel: true, //boton de HOY
                        beforeShowDay: function (date) {
                            var string = $.datepicker.formatDate('dd/mm/yy', date);
                            return [disabledDates.indexOf(string) == -1]
                        }, //elimino los dias del array que le paso
                        onSelect: function (date) {
                            var fecha = document.getElementById("datepicker").value;
                            var data = {'f': fecha};
                            $.ajax({
                                type: "post",
                                url: 'index3.php',
                                data: data,
                                success: function (response) {

                                    $('#respuesta').html(response);
                                }
                            });
                            return false;
                        }
                    });
                });
            </script>
            <script>

                function getval(sel) {

                    var data = {
                        'horaE': sel.value
                    };
                    $.ajax({
                        type: "post",
                        url: 'index3.php',
                        data: data,
                        success: function (response) {
                            $('#respuesta2').html(response);
                        }
                    });
                    return false;
                }
                function dis(valor) {
                    $('#buttoncancelar').attr("disabled", false);
                }
            </script>
        {/literal}
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
                            <li class="nav-item">
                                <a class="nav-link" href="pabellones.php">Pabellones
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="reservas.php">
                                    Administración
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
            <br>

        </div>
        <br><br>
        <section class="portadaAdm text-center w-100 row mx-0">
            <h2 class="col-12 text-center h1-responsive font-weight-bold text-center my-5 pat white-text">Administración</h2>
            <p class="subtitulo white-text text-center mx-auto mb-5">Aqui os adjuntamos nuestros proyectos tanto web como corporativos, realizados desde la creación de la empresa
                hasta la actualidad y nuestras 4 mejores ventas ordenadas por el precio.</p>
        </section>
        <br><br>
        <div class="col-sm-11 col-md-10 col-lg-8 mx-auto">
            {$tabla}
        </div>
        <section class="separadorGrande"></section>    


        {if ($tipo == 'pabellon')}
            <h2 class="text-center">Cancela las sesiones que quieras haciendo una reserva interna</h2>
            <div class="row">
                <div class="col-12"> 
                    <div class = 'mx-auto text-center'>
                        <div class="input-group date my-5" data-provide="datepicker" id="datepicker"></div>
                        <div id="respuesta"></div>
                        <div id="respuesta2"></div>
                        <button  href="calendario.php" data-toggle="modal" id="buttoncancelar" class="btn btn-primary mx-auto" data-target="#exampleModal3" >PROCEDER A LA RESERVA</button>
                    </div>
                </div>

            </div>
            <div class="col-sm-11 col-md-10 col-lg-8 mx-auto">  
                <br>

                <div class="card card-image accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo1">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                               aria-expanded="false" aria-controls="collapseTwo1">
                                <h5 class="mb-0"> ADMINISTRACIÓN DE DATOS  <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionEx1">
                            <div class="card-body">
                                <div class="col-md-12 mb-4" style="padding-left:10%;padding-right:10%;padding-top:2%;">
                                    <!-- Main heading -->
                                    <h3 class="h3 mb-3">Material Design for Bootstrap</h3>
                                    <form name="registro-form-pab" id="registro-form-pab" method="POST" action="reservas.php" enctype="multipart/form-data">
                                        <span for="form2" >¿Quieres una foto de perfil?</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Subir foto</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto">
                                                <label class="custom-file-label" for="inputGroupFile01"></label>
                                            </div>
                                        </div>
                                        <div class="md-form">
                                            <input type="password" id="pass" class="form-control" name="pass" value="{$pass}">
                                            <label for="form3">Password</label>
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

                                            <textarea id="descripcion" class="md-textarea form-control" rows="15" name="descripcion">{$descripcion}</textarea>
                                            <label for="form2">Descripción</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea id="caracteristicas" class="md-textarea  form-control" name="caracteristicas" rows="15"> {$caracteristicas}</textarea>

                                            <label for="form2">Características</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea id="otros_servicios" class="md-textarea  form-control"  name="otros_servicios"> {$otros_servicios}</textarea>

                                            <label for="form2">Otros servicios</label>
                                        </div>
                                        <div class="md-form">
                                            <textarea id="accesibilidad" class="md-textarea  form-control"  name="accesibilidad">{$accesibilidad}</textarea>

                                            <label for="form2">Accesibilidad</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="tarifa" class="form-control" name="tarifa" value="{$tarifa}">
                                            <label for="form2">Tarifa</label>
                                        </div>
                                        <span for="form2" >¿Quieres cambiar tu imagen corporativa?</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Subir imagen</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="imagen_web">
                                                <label class="custom-file-label" for="inputGroupFile01"></label>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" name="actualizar" value="Actualizar datos"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
        {if ($tipo == 'user')}
            <br>
            <div class="col-sm-11 col-md-10 col-lg-8 mx-auto">  
                <div class="card card-image accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo1">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                               aria-expanded="false" aria-controls="collapseTwo1">
                                <h5 class="mb-0"> ADMINISTRACIÓN DE DATOS  <i class="fas fa-angle-down rotate-icon"></i>
                                </h5>
                            </a>

                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1" data-parent="#accordionEx1">
                            <div class="card-body">
                                <div class="col-md-12 mb-4" style="padding-left:10%;padding-right:10%;padding-top:2%;">
                                    <!-- Main heading -->
                                    <h3 class="h3 mb-3">Mis datos</h3>
                                    <span style="color:red">{$error3}</span>
                                    <form name="registro-usuario" id="registro-usuario" method="POST" action="reservas.php" enctype="multipart/form-data">
                                        <span for="form2" >¿Quieres una foto de perfil?</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupFileAddon01">Subir foto</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="foto">
                                                <label class="custom-file-label" for="inputGroupFile01"></label>
                                            </div>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="user" class="form-control" name="user" value="{$user}">
                                            <label for="form3">User</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="password" id="pass" class="form-control" name="pass" value="{$pass}">
                                            <label for="form3">Password</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="nombreC" class="form-control" name="nombreC" value="{$nombreC}">
                                            <label for="form3">Nombre Completo</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="email" class="form-control" name="email" value="{$email}">
                                            <label for="form3">Email</label>
                                        </div>

                                        <div class="md-form">
                                            <input type="text" id="direccion" class="form-control" name="direccion" value="{$direccion}">
                                            <label for="form3">Dirección</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="cod_postal" class="form-control" name="cp" value="{$cod_postal}">
                                            <label for="form5">Código Postal</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="telefono" class="form-control" name="telefono" value="{$telefono}">
                                            <label for="form5">Teléfono</label>
                                        </div>
                                        <div class="md-form">
                                            <span for="form2">Fecha de nacimiento</span>
                                            <input type="date" id="fecha_nac" class="form-control" name="fecha_nac" value="{$fecha}">
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" name="actualizarUser" value="Actualizar datos"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}

        <section class="separadorGrande"></section>

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
                                <button type="submit"  class="btn btn-primary" name="aceptar" >ACEPTAR </button>
                            </form>
                            <button type="submit"  class="btn btn-primary" name="cancelar" class="close" data-dismiss="modal" aria-label="Close">CANCELAR</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade show" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel" style="margin-left:30%">TUS PREFERENCIAS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="text-center" style="margin-top:5%">¿Quiere cancelar estas horas?</div>
                    <div class="modal-body text-center">
                        <div class="row justify-content-center w-20">

                        </div>
                        <div class="modal-footer" style="justify-content: center">
                            <form action="reservas.php" method="post">
                                <input type="submit" class="btn btn-primary" name="aceptarCancelacion" value="ACEPTAR">
                                <input type="submit"  class="btn btn-primary" name="cancelar" value="CANCELAR">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        {literal}
            <script src="js/jquery.validate.js"></script>
            <script>
            $(document).ready(function () {
                $('#enlace_borrar').click(function () {
                    $('#exampleModal').modal('hide');
                });
            });
            </script>
            <script>
                $(document).ready(function () {
                    $("#registro-usuario").validate({
                        rules: {
                            user: {
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
                            telefono: {
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
                            user: {
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
                            telefono: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            fecha_nac: {
                                required: "Campo obligatorio",
                                date: "Introduce fecha válida"
                            },
                        },
                        errorElement: "em"
                    });
                });
            </script>
            <script>
                $(document).ready(function () {
                    $("#registro-form-pab").validate({
                        rules: {
                            pabellon: {
                                required: true,
                                maxlength: 100,
                                minlength: 5
                            },
                            pass: {
                                required: true,
                                maxlength: 50,
                                minlength: 5
                            },
                            direccion: {
                                required: true,
                                maxlength: 100,
                                minlength: 5
                            },
                            cod_postal: {
                                maxlength: 13,
                                minlength: 5
                            },
                            telefono: {
                                required: true,
                                maxlength: 11,
                                minlength: 9
                            },
                            ciudad: {
                                required: true,
                                maxlength: 30,
                                minlength: 3
                            },
                            horario: {
                                required: true,
                                maxlength: 100,
                                minlength: 9
                            },
                            descripcion: {
                                required: true,
                                minlength: 9
                            },
                            caracteristicas: {
                                required: true,
                                minlength: 9
                            },
                            otros_servicios: {
                                required: true,
                                minlength: 9
                            },
                            accesibilidad: {
                                maxlength: 255,
                                minlength: 9
                            },
                            tarifa: {
                                required: true,
                                maxlength: 255,
                                minlength: 5
                            }
                        },
                        messages: {
                            pabellon: {
                                required: "Campo obligatorio",
                                minlength: "Nombre demasiado corto",
                                maxlength: "Nombre demasiado largo"
                            },
                            pass: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto",
                                maxlength: "Campo demasiado largo"
                            },
                            direccion: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            cod_postal: {
                                maxlength: 13,
                                minlength: "Campo demasiado corto"
                            },
                            telefono: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            ciudad: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            horario: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            descripcion: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto"
                            },
                            caracteristicas: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto"
                            },
                            otros_servicios: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto"
                            },
                            accesibilidad: {
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            },
                            tarifa: {
                                required: "Campo obligatorio",
                                maxlength: "Campo demasiado largo",
                                minlength: "Campo demasiado corto"
                            }
                        },
                        errorElement: "em"
                    });
                });
            </script>
        {/literal}
    </body>
</html>