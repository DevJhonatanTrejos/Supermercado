<?php
require_once("../../config/conexion.php");
Class categoriasMdl{

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    
    public function consultarCategorias() {

        $sql = $this->conexion->query ("SELECT * from categorias");
        
        return $sql->fetch_all(MYSQLI_ASSOC);
    }

}


?>