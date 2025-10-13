<?php
class ProductosMdl {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerProductos() {
        $sql = "SELECT id_producto, nombre, descripcion, precio, imagen_url FROM productos";
        $resultado = $this->conexion->query($sql);

        if (!$resultado) {
            die("Error en la consulta: " . $this->conexion->error);
        }

        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
}
?>