<?php
include("conexion.php");

$op=$_GET['op'];

if($op==1){
    consultarCategoria();
}else if($op==2){
    
}else if($op==3){
    
}

function consultarCategoria(){

    include("conexion.php");

    $categoria=$_GET['categoria'];

    $sql2="SELECT id FROM item_categoria WHERE nombre='$categoria'";
    $result2 = $db->query($sql2);

    if ($result2->num_rows > 0) {   
        $row2 = $result2->fetch_array(MYSQLI_ASSOC);
        if($row2){

            $sql="SELECT * FROM item_subcategoria WHERE id_categoria=".$row2['id']."";
            $result = $db->query($sql);
            $i=0;
            echo "<h2 class='card-inside-title'>Sub-Categoria</h2>";
            if ($result->num_rows > 0) {   
                while($row = $result->fetch_assoc()){
                    $i=$i+1;
                    echo "<input name='subcategoria' value='".$row['nombre']."' type='radio' class='with-gap radio-col-cyan' id='radio2_".$i."'/>";
                    echo "<label for='radio2_".$i."'>".$row['nombre']."</label>";
                }
            }

        }
    }

    


}
?>