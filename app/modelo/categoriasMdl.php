<?php
require_once("../../config/conexion.php");
Class categoriasMdl{

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    
    public function consultarCategorias() {

        $sql = $this->conexion->query ("SELECT * from categoria");
        
        return $sql->fetch_all(MYSQLI_ASSOC);
    }

}


?>