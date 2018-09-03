<?php
session_start();
if (!empty($_SESSION['id_users'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Inicio de Sesion</title>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <link href="js/jquery-ui.min.css" rel="stylesheet">
    <!-- Google Fonts -->

    <link href="css/icons/cyrillic-ext.css" rel="stylesheet" type="text/css">
    <link href="css/icons/Material+Icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/app.min.css">
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div id="resultado" name="resultado" class="ui-widget"></div>

    <div id="form-login" class="login-box">
        <div class="logo">
            <a href="javascript:void(0);" id="h3">Procesos <b>FORMULARIOS</b></a>
        </div>
        <div style="border-radius: 10px; margin-bottom: 5px; " class="card" id="_error">

            <div class="body">
                <!-- Nav tabs -->
              <h2 style="text-align: center; margin-top: 5px">Inicio de Sesion </h2>

                <!-- Tab panes -->
                <form id="frmLogin" name="frmLogin">
                            <div class="msg">Administrador</div>
                            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>

                                <div class="form-line">
                                    <input type="text" hidden id="ad" name="ad" value="Admin">
                                    <input type="text" class="form-control" required value="" id="User" name="User" placeholder="usuario1" autofocus autocomplete="off">
                                </div>
                            </div>
                            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                                <div class="form-line">
                                    <input type="password" class="form-control" required value="" id="Password" name="Password" placeholder="password" autocomplete="off">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-8 p-t-5">

                                </div>
                                <div class="col-xs-4">
                                    <button class="btn btn-block bg-pink waves-effect" type="submit" id="btnEnviar" name="btnEnviar" value="Login">Login</button>
                                </div>
                            </div>

                        </form>


            </div>

        </div>
        <p style="color: white" class="right"> &copy; <script>document.write(new Date().getFullYear())</script> - Prueba Php</p>
        <span style="color: white">Usuario: usuario1 - Contraseña password</span>

    </div>
    <script>

        $("#frmLogin").submit(function(e){
            e.preventDefault();

            var User = $("#User").val();
            var Password = $("#Password").val();

            $.ajax({
                method: "POST",
                url: "../Controller/LoginCtlr.php?action=Login",
                data: { User: User, Password: Password}
            })

            .done(function( msg ) {
                if(msg == "1"){

                    window.location.href = "index.php";
                }else{
                    $("#resultado").html(msg);
                }
            });

        });

    </script>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>
    <script src="js/bootstrap-notify.min.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>

<script type="text/javascript">

    /*--------------------------------------
     Bootstrap Notify Notifications
     ---------------------------------------*/

    function not(res) {
        var from = 'bottom';
        var align = 'center';
        var icon = "";
        var type = 'inverse';
        var animIn = 'animated fadeInUp';
        var animOut = 'animated fadeOutDown';
        $.notify({
            icon: icon,
            title: 'Error!',
            message: res,
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 15, // Keep this as default
                y: 15  // Unless there'll be alignment issues as this value is targeted in CSS
            },
            spacing: 10,
            z_index: 1031,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            template:   '<div data-notify="container" class="alert alert-dismissible alert-{0} alert--notify" role="alert">' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +

            '</div>'
        });

    }

</script>

</body>

</html>
