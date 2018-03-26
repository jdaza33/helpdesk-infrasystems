<?php

$produccion=true;

if($produccion==false){
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("BD", "helpdesk-infrasystem");
    define("CHARSET", "utf8");
}else{
    define("HOST", "localhost");
    define("USER", "infrasys_root");
    define("PASS", "admin");
    define("BD", "infrasys_helpdeskk");
    define("CHARSET", "utf8");
}


?>