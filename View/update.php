<?php
session_start();
require ("../Model/Formulario.php");
require ("../Controller/functions.php");
$id = $_GET["id"];
if (empty($_SESSION['id_users'])){
    header("Location: login.php");
}else
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@6.6.2/dist/sweetalert2.min.css">
    <title>Inicio</title>
    <script>$con = <?php echo Formulario::numero(); ?></script>
    <!-- CSS -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/app.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .inl{
            display: inline;
        }
        ._center{
            text-align:center
        }
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }

        body{overflow-x: hidden;

        }
        label.error { float: none; color: red; padding-left: .5em; vertical-align: middle; font-size: 12px; }
    </style>
</head>
<body class="light" style="overflow-x: hidden;">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="app">

    <div class="page">
        <header class="blue lighten-2 relative shadow pb-5">
            <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar">
                <div class="relative">

                </div>
                <!--Top Menu Start -->
                <div class="navbar-custom-menu" id="vaar">
                    <ul class="nav navbar-nav">

                        <!-- Notifications -->
                        <li class="dropdown custom-dropdown user user-menu notifications-menu">
                            <a  href="../Controller/LoginCtlr.php?action=CerrarSession" class="nav-link">
                                Cerrar Sesión
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="container text-white pb-5" id="home">
                <div class="mb-4">
                    <h4>
                        <i class="icon-box"></i>

                        |<a href="index.php"> Tablero Principal </a>|
                        <a href="ver-todo.php"> Ver Todos </a>|
                    </h4>
                </div>

            </div>
        </header>
        <div class="container relative animatedParent animateOnce pull-up-lg">
            <div class="animated fadeInUpShort my-3 mb-5">
                <div class="row" >
                    <?php
                    $Formulario = Formulario::getAll();
                    foreach ($Formulario as $datosp) {
                        $var = $datosp->getId();
                        if ($var==$id){
                            ?>
                            <div class="col-sm-12" >
                                <div class="" id="">
                                    <div class="card my-3 shadow no-b r-0">
                                        <div class="card-header white">
                                            <div class="row">

                                                <div class="col-md-6 text-center" id="">
                                                    <!--h6 class="">Precio Actual Dolar: {{dolar}}</h6-->
                                                    <h6>Proceso # <?php echo $datosp->getNumPro(); ?></h6>
                                                </div><div class="col-md-6 text-center" id="">
                                                    <!--h6 class="">Precio Actual Dolar: {{dolar}}</h6-->
                                                    <h6>Editar Formulario</h6>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form class="needs-validation" id="formularioupdt">
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label >Descripcion</label>
                                                        <textarea rows="6" type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Describe el Proceso" required><?php echo $datosp->getDescripcion(); ?></textarea>

                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Sede </label>
                                                        <select class="custom-select select2"  id="sede">
                                                            <option value="<?php echo $datosp->getSede(); ?>" selected><?php echo $datosp->getSede(); ?></option>
                                                            <option value="Bogotá">Bogotá</option>
                                                            <option value="México">México</option>
                                                            <option value="Perú">Perú</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="presupuesto">Presupuesto</label>
                                                        <input type="text" class="form-control" name="presupuesto" id="presupuesto" placeholder="" required value="<?php echo $datosp->getPresupuesto(); ?>">
                                                        <input type="text" hidden id="id" value="<?php echo $datosp->getId(); ?>">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="presupuesto">Fecha</label>
                                                        <input type="text" class="date-time-picker form-control" id="fecha" name="fecha" value="<?php echo $datosp->getFecha(); ?>"/>

                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Actualizar</label>
                                                        <button class="btn btn-block btn-primary" id="btnUpdate" type="button" name="btnEnviar">Enviar</button>

                                                    </div>

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>



</div>

</div>
<!--/#app -->
<script src="assets/js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@6.6.2/dist/sweetalert2.min.js"></script>
<script src="assets/js/jquery.validate.js"></script>
<script src="assets/js/js.js"></script>
<script src="js/bootstrap-notify.min.js"></script>
<script type="text/javascript">

    /*--------------------------------------
     Bootstrap Notify Notifications
     ---------------------------------------*/

    function not(res,men) {
        var from = 'bottom';
        var align = 'center';
        var icon = "";
        var type = 'inverse';
        var animIn = 'animated fadeInUp';
        var animOut = 'animated fadeOutDown';
        $.notify({
            icon: icon,
            title: men,
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