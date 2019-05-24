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
        <script type="text/javascript">
            $(function () {

                //traduccion del calendario
                $.datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: '< Ant',
                    nextText: 'Sig >',
                    currentText: 'Hoy',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'SÃ¡bado'],
                    dayNamesShort: ['Dom', 'Lun', 'Mar', 'MiÃ©', 'Juv', 'Vie', 'SÃ¡b'],
                    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'SÃ¡'],
                    weekHeader: 'Sm',
                    dateFormat: 'yy/mm/dd',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                };
                $.datepicker.setDefaults($.datepicker.regional['es']);
                var disabledDates = ['13/05/2019', '10/05/2019']; //Este array lo recogere desde PHP; es un array de las fechas que el usuario y ha reservado

                //opciones del datepicker
                $("#datepicker").datepicker({
                    minDate: '0', //quita los dias anteriores del dia actual	
                    showButtonPanel: true, //boton de HOY
                    beforeShowDay: function (date) {
                        var string = $.datepicker.formatDate('dd/mm/yy', date);
                        return [disabledDates.indexOf(string) === -1];
                        aux = 0;
                    }, //elimino los dias del array que le paso
                    onSelect: function (date) {
                        var fecha = document.getElementById("datepicker").value;
                        alert(fecha);
                        var data = {'fecha': fecha};

                        $.ajax({
                            type: "post",
                            url: 'index3.php',
                            data: data,
                            success: function (response) {
                                alert(response);
                                $('#respuesta').html(response);
                            }
                        });
                        return false;
                    }
                });
            });
        </script>

    <head>
        <meta charset = "UTF-8">
        <title>datepicker</title>
    </head>
    <body>
        <div>HOLA QUE TAL</div>
        <div id="datepicker"></div>
        <div id="id"></div>
        <div id="respuesta"></div>
    </body>
</html>



