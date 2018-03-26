<?php
include("conexion.php");

$dato=$_POST['dato'];
$tabla=$_POST['tabla'];
$columna=$_POST['columna'];

$sql="SELECT * FROM ".$tabla." WHERE ".$columna."='$dato'";
$result = $db->query($sql);

$r['res']=true; 

if ($result->num_rows > 0) {   
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if($row){
        $r['res']=false; 
    }
}

echo json_encode($r);

?>