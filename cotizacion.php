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
    <title>Cotizacion - Helpdesk</title>
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
                            COTIZACIONES
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="" data-toggle='modal' data-target='#modalNuevaCotizacion'>Nueva Cotización</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="15%">Nro. Solicitud</th>
                                        <th>Fecha|Hora</th>
                                        <th>Descripcion</th>
                                        <th>Urgencia</th>
                                        <th width="15%">Estado</th>
                                        <th width="10%">Evento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <div id="facturaPdf" hidden="hidden">
                                </div>
                                <div id="editor"></div>
                                <?php
                                    include("php/conexion.php");

                                    $sql="SELECT * FROM cotizacion WHERE id_usuario='$id'";
                                    $result = $db->query($sql);
                                    
                                    if ($result->num_rows > 0) {   
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>".$row['nro_solicitud']."</td>";
                                            echo "<td>".$row['fecha_cotizacion']."</td>";
                                            echo "<td>".$row['descripcion_cotizacion']."</td>";
                                            echo "<td>".$row['urgencia']."</td>";
                                            if($row['estado_cotizacion']=='A'){
                                                /*echo "  <td>
                                                    <button type='button' class='btn bg-danger btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                    </td>
                                                ";*/
                                                echo "<td><span class='label label-danger'>Anulado</span></td>";
                                            }else if($row['estado_cotizacion']=='P'){
                                                /*echo "  <td>
                                                    <button type='button' class='btn bg-warning btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                    </td>
                                                ";*/
                                                echo "<td><span class='label label-warning'>Pendiente</span></td>";
                                            }else{
                                                /*echo "  <td>
                                                <button type='button' class='btn bg-success btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                </td>
                                                ";*/
                                                echo "<td><span class='label label-success'>Cancelado</span></td>";
                                            }
                                            echo "<td><button type='button' class='btn bg-primary btn-block btn-xs waves-effect' id='btnPdf' onclick='construirCotizacion(".$row['id_usuario'].",".$row['nro_solicitud']."); return false;' >Ver PDF</button></td>";
                                            #echo "<td> <a id='btnPdf' ><span class='label label-info'>PDF</span></a></td>";
                                            
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

    <div class="modal fade" id="modalNuevaCotizacion" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="smallModalLabel">Solicitar Cotización</h3>
                </div>
                <div class="modal-body" id="modalFormNuevaCotizacion">
                    <h5 class="card-inside-title">Descripción del Problema</h5>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea rows="6" id="descripcion" class="form-control no-resize" placeholder="Describa aqui la situacion actual del problema..."></textarea>
                        </div>
                    </div>
                    <br>
                    <h5 class="card-inside-title">Urgencia del Problema</h5>
                    <select class="form-control show-tick" id="urgencia">
                        <option>Baja</option>
                        <option>Media</option>
                        <option>Alta</option>
                    </select>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" id="btnCerrarNuevaCotizacion">CERRAR</button>
                    <button type="button" id="btnNuevaCotizacion" class="btn btn-link waves-effect">SOLICITAR</button>
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
    <script src="js/pages/forms/advanced-form-elements.js"></script>
    <script src="js/pages/ui/modals.js"></script>
    
    <!--<script src="js/pages/forms/basic-form-elements.js"></script>-->
    <!-- #JS -->

    <script>
        activarMenu('menuCotizacion');
        //activarSubMenu('subMenuSoporteLista');
    </script>
    
</body>

</html>