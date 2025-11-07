<?php
require_once __DIR__ . '/../modelo/ofertasMdl.php';

class ofertasCtrl {

    private $modelo;

    public function __construct($conexion) {
        $this->modelo = new ofertasMdl($conexion);
    }

    public function consultarOfertasCtrl() {
        return $this->modelo->consultarOfertasMdl();
    }
}
?>
