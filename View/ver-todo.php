<?php
session_start();
require ("../Model/Formulario.php");
require ("../Controller/functions.php");

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
    <title>Registros</title>
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
                        <a href="ver-todo.php"><strong> Ver Todos </strong></a>|
                    </h4>
                </div>

            </div>
        </header>
        <div class="container relative animatedParent animateOnce pull-up-lg">
            <div class="animated fadeInUpShort my-3 mb-5">
                <div class="row">

                    <div class="col-md-12" style="background-color: #fff; padding: 30px; border-radius: 12px;">
                        <h2>Procesos Creados</h2>

                                <div class="card no-b">


                                        <div class="row justify-content-end" style="margin-bottom: 15px">
                                            <div class="col">
                                                <ul id="myTab4" role="tablist" class="nav nav-tabs card-header-tabs nav-material nav-material-white float-right">
                                                    <li class="nav-item">
                                                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#v-pills-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Tabla</a>
                                                    </li>
                                                </ul>
                                            </div>

                                    </div>
                                    <div class="card-body no-p">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="v-pills-tab1" role="tabpanel" aria-labelledby="v-pills-tab1">
                                                <div class="table-responsive">
                                                    <table class="table table-hover earning-box">
                                                        <thead class="no-b">
                                                        <tr>
                                                            <th class="text-center">Proceso N°</th>
                                                            <th>Descripción</th>
                                                            <th>Sede</th>
                                                            <th>Prespuesto</th>
                                                            <th>Fecha</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $Formulario = Formulario::getAll();
                                                        foreach ($Formulario as $datosp) {
                                                            ?>
                                                            <tr>
                                                                <td class="w-10">
                                                                    <?php echo $datosp->getNumPro(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $datosp->getDescripcion(); ?>
                                                                </td>
                                                                <td><?php echo $datosp->getSede(); ?></td>
                                                                <td>
                                                                   $  <?php echo bcdiv(intval($datosp->getPresupuesto())/$usd,'1',2); ?> USD</td>
                                                                <td><?php echo $datosp->getFecha(); ?></td>
                                                                <td>
                                                                    <a href="update.php?id=<?php echo $datosp->getId(); ?>" class="btn-fab btn-fab-sm btn-primary text-white"  tooltip="Editar">
                                                                        <i class="icon-edit"></i>
                                                                    </a>
                                                                    &nbsp;
                                                                    <a href="ver.php?id=<?php echo $datosp->getId(); ?>" class="btn-fab btn-fab-sm btn-warning text-white" tooltip="Ver">
                                                                        <i class="icon-eye"></i>
                                                                    </a></td>
                                                            </tr>
                                                            <?php
                                                        }

                                                       ?>

                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>


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
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="assets/js/vue.js"></script>
<script src="assets/js/js.js"></script>

</body>

</html>