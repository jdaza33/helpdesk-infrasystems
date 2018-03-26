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
    <title>Usuario - Helpdesk</title>

    <?php
    include("util.php");
    echo $head;
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
    

    <section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            USUARIOS
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Identificacion</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th width="10%">Evento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include("php/conexion.php");
                                    
                                    $sql="SELECT * FROM cliente";
                                    $result = $db->query($sql);
                                    
                                    if ($result->num_rows > 0) {   
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>".$row['identificacion']."</td>";
                                            echo "<td>".$row['nombre']."</td>";
                                            echo "<td>".$row['apellido']."</td>";
                                            echo "<td>".$row['email']."</td>";
                                            echo "  <td>
                                                    <button type='button' class='btn bg-primary btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                    <button type='button' class='btn bg-info btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalClave' onclick='asignarIdUsuario(".$row['id']."); return false;'>Modificar</button>
                                                    </td>
                                                ";
                                            echo "</tr>";
                                        }
                                    }
                                    

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
    </div>

    <!-- Small Size -->
    <div class="modal fade" id="modalDatos" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Datos del Usuario</h4>
                </div>
                <div class="modal-body" id="modalDatosUsuario">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalClave" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="smallModalLabel">Cambiar Contraseña</h4>
                </div>
                <div class="modal-body" id="modalCambioClave">

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="newClave" placeholder="Nueva Contraseña" required>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCambioClave" class="btn btn-link waves-effect">APLICAR</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
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
    echo $finalBody;
    ?>
    <script src='js/pages/tables/jquery-datatable.js'></script>
    <script src="js/pages/ui/modals.js"></script>
    <!-- #JS -->

    <script>
        activarMenu('menuUsuario');
    </script>
    
</body>

</html>