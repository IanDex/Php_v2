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
    <title>Ver</title>
    <!-- CSS -->
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
                <div class="row">

                    <?php
                    $Formulario = Formulario::getAll();
                    foreach ($Formulario as $datosp) {
                        $var = $datosp->getId();
                        if ($var==$id){
                            ?>
                             <div class="">
                                <div class="card shadow my-3 no-b">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg avatar mr-3">
                                            </div>
                                            <div>
                                                <h6 class=""><?php echo $datosp->getNumPro(); ?></h6>
                                                <span>Numero de Proceso</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-around s-12">
                                            <span><i class="mr-2"></i>Descripcion </span>
                                            <strong><i class=" mr-2"></i><?php echo $datosp->getDescripcion(); ?></strong>
                                        </div>
                                    </div>
                                    <div class="card-body b-t">
                                        <div class="d-flex align-items-center justify-content-around my-3 s-12">
                                            <div class="card-body">
                                            <span class="text-primary">
                                                Sede
                                            </span>

                                            <strong class="ml-2 s-12 text-warning"><?php echo $datosp->getSede(); ?></strong><br>
                                            </div><div class="card-body">
                                            <span class="text-primary">
                                                Presupuesto
                                            </span>
                                            <strong class="ml-2 s-12 text-warning"> $  <?php echo bcdiv(intval($datosp->getPresupuesto())/$usd,'1',2); ?> USD</td></strong><br>
                                            </div><div class="card-body">
                                            <span class="text-primary">
                                                Fecha
                                            </span>
                                            <strong class="ml-2 s-12 text-warning"><?php echo $datosp->getFecha(); ?></strong><br>
                                            </div><div class="card-body">

                                            <a class="btn btn-info" href="update.php?id=<?php echo $datosp->getId(); ?>">Editar</></a>
                                            <a class="btn btn-warning" href="ver-todo.php">Volver</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <?php
                        }
                    }
                    ?>
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


</body>

</html>