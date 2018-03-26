<?php
$cliente=$_GET['cliente'];
$nombreCliente="";
$nitCliente="";
$email="";
$direccion="";
$telefono="";

include("../conexion.php");

$sql="SELECT * FROM cliente WHERE id='$cliente'";
$result = $db->query($sql);

if ($result->num_rows > 0) {   
    while($row = $result->fetch_assoc()){
        $nombreCliente = $row['nombre']." ".$row['apellido'];
        $nitCliente = $row['identificacion'];
        $email = $row['email'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Factura</title>
    <link rel="stylesheet" href="style.css" media="all" />
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="logo.png">
        </div>
        <h1>INFRASYSTEMS</h1>
        <div id="company" class="clearfix">
            <div>Infrasystems</div>
            <div>Colombia</div>
            <div><a href="mailto:sales@infrasystems.co">infrasystems.co</a></div>
        </div>
        <div id="project">
            <div><span>Cliente</span> <?php echo $nombreCliente ?></div>
            <div><span>Nro. NIT</span> <?php echo $nitCliente ?></div>
            <div><span>Dirección</span> <?php echo $direccion ?></div>
            <div><span>Email</span> <a href="mailto:"<?php echo $nombreCliente ?>""><?php echo $email ?></a></div>
            <div><span>Telefono</span> <?php echo $telefono ?></div>
            <div><span>Fecha</span> <?php echo $_GET['fecha'] ?> </div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>#Orden</th>    
                    <th class="service">Servicio</th>
                    <th class="desc">Descripcion</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="qty"><?php echo $_GET['orden'] ?></td>
                    <td class="service"><?php echo $_GET['servicio'] ?></td>
                    <td class="desc"><?php echo $_GET['descripcion'] ?></td>
                    <td class="unit">
                        <?php 
                        if ($_GET['estado']=="P"){
                            echo "Pendiente";
                        }else if  ($_GET['estado']=="A"){
                            echo "Anulado";
                        }else{
                            echo "Cancelado";
                        }
                        ?>
                    </td>
                    <td class="unit"><?php echo $_GET['tipo_factura'] ?></td>
                </tr>
                <tr>
                    <td colspan="4">SUBTOTAL</td>
                    <td class="total"><?php echo $_GET['base'] ?></td>
                </tr>
                <tr>
                    <td colspan="4">IVA 19%</td>
                    <td class="total"><?php echo $_GET['iva'] ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="grand total">TOTAL A PAGAR</td>
                    <td class="grand total"><?php echo $_GET['total'] ?></td>
                </tr>
            </tbody>
        </table>
        <!--<div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>-->
    </main>
    <!--<footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>-->
</body>

</html>