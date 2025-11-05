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

    public function insertarCategorias($nombre, $descripcion) {
    $stmt = $this->conexion->prepare("
        INSERT INTO categorias (nombre, descripcion)
        VALUES (?, ?)
    ");
    $stmt->bind_param("ss", $nombre, $descripcion);
    $resultado = $stmt->execute();
    $stmt->close();
    return $resultado;
}

}


?>