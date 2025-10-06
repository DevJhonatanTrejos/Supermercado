<?php
require_once("../modelo/categoriasMdl.php");

class CategoriasCtrl {

    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new CategoriasMdl($conexion);
    }

    public function consultarCategoriasCtrl() {
        $datos = $this->modelo->consultarCategorias();
        return $datos;
    }
}
?>