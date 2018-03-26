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
    <title>Soporte - Helpdesk</title>

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
                            LISTA DE SOPORTE
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="15%">Nro. Caso</th>
                                        <th>Fecha</th>
                                        <th>Categoria</th>
                                        <th>Sub-Categoria</th>
                                        <th>Tipo</th>
                                        <th width="10%">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include("php/conexion.php");

                                    $sql="SELECT * FROM soporte WHERE id_cliente='$id_admin_cliente'";
                                    $result = $db->query($sql);
                                    
                                    if ($result->num_rows > 0) {   
                                        while($row = $result->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>".$row['nro']."</td>";
                                            echo "<td>".$row['fecha_solicitud']."</td>";
                                            echo "<td>".$row['categoria']."</td>";
                                            echo "<td>".$row['subcategoria']."</td>";
                                            echo "<td>".$row['tipo']."</td>";
                                            if($row['estado']=='G'){
                                                /*echo "  <td>
                                                    <button type='button' class='btn bg-danger btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                    </td>
                                                ";*/
                                                echo "<td><span class='label label-danger'>Gestionado</span></td>";
                                            }else if($row['estado']=='D'){
                                                /*echo "  <td>
                                                    <button type='button' class='btn bg-warning btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                    </td>
                                                ";*/
                                                echo "<td><span class='label label-danger'>En Desarrollo</span></td>";
                                            }else{
                                                /*echo "  <td>
                                                <button type='button' class='btn bg-success btn-block btn-xs waves-effect' data-toggle='modal' data-target='#modalDatos' onclick='mostrarDatosUsuario(".$row['id']."); return false;'>Mostrar</button>
                                                </td>
                                                ";*/
                                                echo "<td><span class='label label-danger'>Cerrado</span></td>";
                                            }
                                            
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
        activarMenu('menuSoporte');
        activarSubMenu('subMenuSoporteLista');
    </script>
    
</body>

</html>