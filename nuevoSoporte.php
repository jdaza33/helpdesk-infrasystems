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
    <title>Nuevo Soporte - Helpdesk</title>

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
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>REGISTRAR SOPORTE</h2>
                    </div>
                    <div class="body">
                        <form2 id="wizard_horizontal" method="POST">
                            <h2>Datos del Problema</h2>
                            <fieldset>
                                <h2 class="card-inside-title">Categoria</h2>
                                <div class="demo-radio-button">
                                    <?php
                                        include("php/conexion.php");

                                        $sql="SELECT * FROM item_categoria";
                                        $result = $db->query($sql);
                                        
                                        $i=0;
                                        if ($result->num_rows > 0) {   
                                            while($row = $result->fetch_assoc()){
                                                $i=$i+1;
                                                echo "<input name='categoria' value='".$row['nombre']."' type='radio' class='with-gap radio-col-cyan' id='radio_".$i."'/>";
                                                echo "<label for='radio_".$i."'>".$row['nombre']."</label>";
                                            }
                                        }
                                    ?>
                                </div>
                                <br>
                                <div class="demo-radio-button" id="subcategoria">
                                    
                                    
                                </div>

                                <h2 class="card-inside-title">Prioridad</h2>
                                <div class="demo-radio-button" id="tipo">
                                    <input name='tipo' value='Critico' type='radio' class='with-gap radio-col-cyan' id='radio3_1'/>
                                    <label for='radio3_1'>Critico</label>
                                    <input name='tipo' value='Grave' type='radio' class='with-gap radio-col-cyan' id='radio3_2'/>
                                    <label for='radio3_2'>Grave</label>
                                    <input name='tipo' value='Leve' type='radio' class='with-gap radio-col-cyan' id='radio3_3'/>
                                    <label for='radio3_3'>Leve</label>
                                </div>

                                
                            </fieldset>

                            <h2>Descripcion del Problema</h2>
                            <fieldset>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <h2 class="card-inside-title">Imagenes del Problema</h2>
                                        <form action="php/subir.php" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                            <div class="dz-message">
                                                <div class="drag-icon-cph">
                                                    <i class="material-icons">touch_app</i>
                                                </div>
                                                <h3>Suba sus imagenes</h3>
                                            </div>
                                            <div class="fallback">
                                                <input name="file" id="img" type="file" multiple />
                                            </div>
                                        </form>
                                    </div>

                                    
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <h2 class="card-inside-title">Detalles del Problema</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea rows="11" id="descripcion" class="form-control no-resize" placeholder="Describa aqui la situacion actual del problema..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </fieldset>

                            <h2>Conexion Remota</h2>
                            <fieldset>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="user_remoto" placeholder="ID para conexión remota" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control"  id="pass_remoto" placeholder="Clave para conexión remota" />
                                    </div>
                                </div>
                                <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                                <label for="acceptTerms-2">Acepto los términos y condiciones del servicio.</label>
                            </div>
                                
                            </fieldset>
                        </form2>
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
    <script src="js/pages/forms/form-wizard.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>
    
    <!--<script src="js/pages/forms/basic-form-elements.js"></script>
    -->
    <!-- #JS -->

    <script>
        activarMenu('menuSoporte');
        activarSubMenu('subMenuSoporteNuevo');
    </script>
    
</body>

</html>