<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../config/conexion.php'; 
require_once __DIR__ . '/../controlador/ofertasCtrl.php';

$controlador = new OfertasCtrl($conexion); 
$ofertas = $controlador->consultarOfertasCtrl();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Julio - Ofertas</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../../utilidades/css/index.css">
    <link rel="stylesheet" href="../../utilidades/css/ofertas.css">

</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../../utilidades/img/app/logo.png" alt="Logo Supermercado Julio">
            <h1>Supermercado Julio</h1>
        </div>
        <nav>
            <a href="../vista/index.php">Inicio</a>
            <a href="../vista/categorias.php">Categorías</a>
            <div style="display: inline-block; background-color: royalblue; padding: 10px;">
                <a href="#" style="color: white; text-decoration: none;">Ofertas</a>
            </div>
            <a href="#">🛒 Ver carrito</a>
            <a href="#">Contacto</a>
        </nav>
    </header>

    <main>
        <div class="titulo-ofertas">
            🏷️ CONOCE LAS OFERTAS DE LA SEMANA
        </div>

        <div class="grid-productos">
            <?php if (!empty($ofertas)): ?>
                <?php foreach ($ofertas as $p): ?>
                    <div class="producto">
                        <div class="badge-descuento">
                            -<?= htmlspecialchars($p['porcentaje_descuento']) ?>%
                        </div>
                        <img src="../../utilidades/img/productos/<?= htmlspecialchars($p['imagen_producto']) ?>" 
                             alt="<?= htmlspecialchars($p['nombre_producto']) ?>">
                        <h3><?= htmlspecialchars($p['nombre_producto']) ?></h3>
                        <p><?= htmlspecialchars($p['descripcion_producto']) ?></p>

                        <span class="precio-original">$<?= number_format($p['precio_producto'], 0, ',', '.') ?></span>
                        <span class="precio-oferta">$<?= number_format($p['precio_oferta'], 0, ',', '.') ?></span>
                        
                        <div class="fecha-fin">
                            ⏰ Válido hasta: <?= date("d/m/Y", strtotime($p['fecha_fin_oferta'])) ?>
                        </div>

                        <!-- 🔹 Botón de añadir al carrito -->
                        <form action="../controlador/agregarCarrito.php" method="POST">
                            <input type="hidden" name="id_producto" value="<?= htmlspecialchars($p['id_producto']) ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" class="btn-carrito">🛒 Añadir al carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-datos">No hay ofertas disponibles en este momento.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
