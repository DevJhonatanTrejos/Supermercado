<?php
require_once __DIR__ . '/../modelo/productosMdl.php';

class ProductosCtrl {
    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new ProductosMdl($conexion);
    }

    public function obtenerProductosCtrl() {
        return $this->modelo->obtenerProductos();
    }
    
    public function consultarProductosPorCategoriaCtrl($id_categoria) {
        return $this->modelo->consultarProductosPorCategoriaMdl($id_categoria);
    }
}
?>