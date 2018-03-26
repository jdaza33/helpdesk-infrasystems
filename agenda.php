<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
  header("location: index.php");
  exit;
}

$usuario=$_SESSION['usuario'];
$id=$_SESSION['id'];
$id_admin_cliente=$_SESSION['id_admin_cliente'];
$rol=$_SESSION['rol'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Agenda - Helpdesk</title>

    <?php
    include("util.php");
    echo $head2;
    ?>
</head>

<body class="theme-cyan" onload="insertarPerfil('<?php echo $id_admin_cliente ?>'); return false;">
    <?php
    include("util.php");
    echo $loader;
    ?>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Nav -->
    <?php
    include("util.php");
    echo $nav;
    ?>
    <!-- Fin Nav -->
    

    <!-- #Menu -->
    <?php
    include("util.php");
    echo $menu;
    ?>
    <!-- #Fin enu -->
    

    <section class="content" >
        <div class="container-fluid">
        <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                AGENDA
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="" data-toggle='modal' data-target='#modalNuevoEvento'>Nuevo Evento</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalNuevoEvento" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="smallModalLabel">Crear Evento</h3>
                    </div>
                    <div class="modal-body" id="modalFormNuevaCotizacion">
                        <h5 class="card-inside-title">Nombre del Evento</h5>
                        <div class="form-group">
                            <div class="form-line">
                                <input id="nombre" class="form-control" placeholder="Introduzca un nombre para el evento" maxlength="20">
                            </div>
                        </div>
                        <h5 class="card-inside-title">Descripción Corta del Evento</h5>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="3" id="descripcion" class="form-control no-resize" placeholder="Describa aqui la situacion actual del problema..." maxlength="50"></textarea>
                            </div>
                        </div>
                        <h5 class="card-inside-title">Periodo</h5>
                        <div class="row clearfix">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <p>Fecha Inicio</p>
                                        <input type="text" class="form-control" id="fecha_inicio" placeholder="YYYY-MM-DD HH:mm" data-mask="0000-00-00 00:00" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <p>Fecha Fin</p>
                                        <input type="text" class="form-control" id="fecha_fin" placeholder="YYYY-MM-DD HH:mm" data-mask="0000-00-00 00:00" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-inside-title">Otros Datos</h5>
                        <div class="row clearfix">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <div class="form-line">
                                        <p>URL</p>
                                        <input type="url" class="form-control" id="enlace" placeholder="Introduzca la url del evento (Opcional)" maxlength="80">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <p>Color de Evento</p>
                                        <input type="color" id="color" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" >CERRAR</button>
                        <button type="button" id="btnNuevoEvento" class="btn btn-link waves-effect">SOLICITAR</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("util.php");
        echo $modalPerfil;
        ?>

    </section>



    <!-- #JS -->
    <?php
    include("util.php");
    echo $finalBody2;
    ?>
    
      
   
    <!-- #JS -->

    <script>
        activarMenu('menuAgenda');
    </script>
</body>

</html>