<?php

require_once("config.php");

/*class conexion{

    public $db;

    public function __construct(){
        $this->db = new mysqli(HOST, USER, PASS, BD);

        if($this->db->connect_errno){
            echo "Fallo al conectar la bd".$this->db->connect_errno;
            return;
        }

        $this->db->set_charset(CHARSET);

    }

}*/

$db = new mysqli(HOST, USER, PASS, BD);
if ($db->connect_error) {
    die("La conexion falló: " . $db->connect_error);
   }
$db->set_charset(CHARSET);

?>