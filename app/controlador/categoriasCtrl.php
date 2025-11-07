<?php
require_once __DIR__ . '/../modelo/categoriasMdl.php';

class categoriasCtrl {

    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new CategoriasMdl($conexion);
    }

    public function consultarCategoriasCtrl() {
        return $this->modelo->consultarCategorias();
    }

    public function consultarCategoriasIdCtrl($id) {
        return $this->modelo->consultarCategoriasIdMdl($id);
    }

    public function insertarCategoriasCtrl($nombre, $descripcion) {
        return $this->modelo->insertarCategorias($nombre, $descripcion);
    }
}
?>
