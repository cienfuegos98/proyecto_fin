<!DOCTYPE html>
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
        <link href="https://fonts.googleapis.com/css?family=Pattaya" rel="stylesheet">
        <link rel="icon" type="image/png" href="./img/loading.gif" sizes="16x16">
        <style type="text/css">
            html,
            body,
            header,
            .view {
                height: 100%;
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

            .error {
                color:#FF0000;

            }
        </style>

    </head>
    <body>
        <nav  class="navbar fixed-top navbar-expand-lg bg-dark navbar-dark">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
                    <strong>FUTMATCH</strong>
                </a>

                <!-- Collapse -->
                <button id = "hamburguesa" class="navbar-toggler right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul id='imgperfil'  class="nav navbar-nav navbar-right">
                    {$perfil}
                </ul> 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
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
                    </ul>
                </div>
            </div>
        </nav>
        <div class="view full-page-intro" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg'); background-repeat: no-repeat; background-size: cover;">
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">
                <div class="container">
                    <div class="row wow fadeIn">
                        <div class="col-md-6 mb-4 white-text text-center text-md-left">
                            <h1 class="display-4 font-weight-bold">Learn Bootstrap 4 with MDB</h1>
                            <hr class="hr-light">
                            <p>
                                <strong>Best & free guide of responsive web design</strong>
                            </p>
                            <p class="d-md-block">
                                <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video and written versions
                                    available. Create your own, stunning website.</strong>
                            </p>
                        </div>
                        <div class="col-md-6 col-xl-5 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <form name="login" id="login-form" method="POST" action="index.php">
                                        <h2 class="dark-grey-text text-center">
                                            <strong>Inicio de sesión</strong>
                                        </h2>
                                        <span style="color:red">{$error}</span>
                                        <div class="md-form">
                                            <input type="text" id="usuario" class="form-control" name="usuario">
                                            <label for="form3">Usuario</label>
                                        </div>
                                        <div class="md-form">
                                            <input type="text" id="pass" class="form-control" name="pass">
                                            <label for="form2">Password</label>
                                        </div>
                                        <div class="text-center">
                                            <a id="olvidado-contraseña">¿Has olvidado tu contraseña?</a>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-primary" name="iniciar" value="Iniciar sesion"/>
                                        </div>
                                        <div class="text-center" >
                                            <span class="nuevo">¿Eres nuevo?</span> <a  id="olvidado-contraseña">Registrate ahora</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <main>
            <div class="container">
                <!--Section: Main info-->
                <section class="mt-5 wow fadeIn">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-6 mb-4">
                            <img src="https://mdbootstrap.com/img/Marketing/mdb-press-pack/mdb-main.jpg" class="img-fluid z-depth-1-half" alt="">
                        </div>
                        <div class="col-md-6 mb-4">
                            <!-- Main heading -->
                            <h3 class="h3 mb-3">Material Design for Bootstrap</h3>
                            <form name="registro" id="registro-form" method="POST" action="index.php" enctype="multipart/form-data">
                                <div class="md-form">
                                    <input type="text" id="usuario" class="form-control" name="usuario">
                                    <label for="form3">Usuario</label>
                                </div>
                                <div class="md-form">
                                    <input type="text" id="pass" class="form-control" name="pass">
                                    <label for="form4">Password</label>
                                </div>
                                <div class="md-form">
                                    <input type="email" id="email" class="form-control" name="email">
                                    <label for="form2">Email</label>
                                </div>
                                <div class="md-form">
                                    <input type="text" id="nombre_completo" class="form-control" name="nombreC">
                                    <label for="form5">Nombre Completo</label>
                                </div>
                                <div class="md-form">
                                    <input type="text" id="direccion" class="form-control" name="direccion">
                                    <label for="form5">Dirección</label>
                                </div>
                                <div class="md-form">
                                    <input type="text" id="cp" class="form-control" name="cp">
                                    <label for="form2">Código Postal</label>
                                </div>
                                <div class="md-form">
                                    <input type="text" id="telefono" class="form-control" name="tlf">
                                    <label for="form2">Teléfono</label>
                                </div>

                                <div class="md-form">
                                    <span for="form2">Fecha de nacimiento</span>
                                    <input type="date" id="fecha_nac" class="form-control" name="fecha_nac">
                                </div>
                                <span for="form2" >¿Quieres una foto de perfil?</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                               aria-describedby="inputGroupFileAddon01" name="foto">
                                        <label class="custom-file-label" for="inputGroupFile01">Escoge tu foto de perfil</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" name="registrarse" value="Registrarse"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <br><br> <br><br>
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
        {literal}
            <script src="js/jquery.validate.js"></script>
            <script>
            $(document).ready(function () {
                $("#registro-form").validate({
                    rules: {
                        usuario: {
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
                        tlf: {
                            required: true,
                            maxlength: 12,
                            minlength: 9
                        },
                        fecha_nac: {
                            date: true
                        }
                    },
                    messages: {
                        usuario: {
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
                            email: "Introduce un emailválido",
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
                            minlength: "Nombre demasiado corto"
                        },
                        cp: {
                            maxlength: 13,
                            minlength: "Nombre demasiado corto"
                        },
                        tlf: {
                            required: "Campo obligatorio",
                            maxlength: "Campo demasiado largo",
                            minlength: "Nombre demasiado corto"
                        },
                        fecha_nac: {
                            date: "Introduce fecha válida"
                        }
                    },
                    errorElement: "em"
                });
            });
            </script>
            <script>
                $(document).ready(function () {
                    $("#login-form").validate({
                        rules: {
                            usuario: {
                                required: true,
                                maxlength: 20,
                                minlength: 2
                            },
                            pass: {
                                required: true,
                                maxlength: 50,
                                minlength: 5
                            }
                        },
                        messages: {
                            usuario: {
                                required: "Campo obligatorio",
                                minlength: "Nombre demasiado corto",
                                maxlength: "Nombre demasiado largo"
                            },
                            pass: {
                                required: "Campo obligatorio",
                                minlength: "Campo demasiado corto",
                                maxlength: "Campo demasiado largo"
                            }
                        },
                        errorElement: "em"
                    });
                });
            </script>
        {/literal}
        
    </body>

</html>
