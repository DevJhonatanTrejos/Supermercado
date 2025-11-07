<?php
require_once("../../config/conexion.php");
Class ofertasMdl{

    private $conexion;

    public function __construct($conexion){
        $this->conexion = $conexion;
    }
    
    public function consultarOfertasMdl() {

        $sql = $this->conexion->query ("SELECT producto.id_producto as id_producto,
                producto.descripcion as descripcion_producto,
                producto.nombre as nombre_producto,
                producto.precio as precio_producto,
                producto.imagen_url as imagen_producto,
                `titulo` as tutulo_oferta,
                `descuento_porcentaje` as porcentaje_descuento,
                `precio_oferta` as precio_oferta,
                `fecha_fin` as fecha_fin_oferta
                from ofertas 
                inner join
                producto ON
                producto.id_producto=ofertas.id_producto;");
        
        return $sql->fetch_all(MYSQLI_ASSOC);
    }

}


?>