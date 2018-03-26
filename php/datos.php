<?php

$produccion=true;

if($produccion==false){
    $zonaHoraria="America/Caracas";
    $rutaSubida="../clientes/";
    $rutaBajada="clientes/";
}else{
    $zonaHoraria="America/Bogota";
    $rutaSubida=$_SERVER['DOCUMENT_ROOT']."/clientes/";
    
    //$rutaBajada="/home2/infrasystems/clientes.infrasystems.co/clientes/";
    $rutaBajada="http://clientes.infrasystems.co/clientes/";
    //$rutaBajada=$_SERVER['DOCUMENT_ROOT']."/clientes/";
}

?>