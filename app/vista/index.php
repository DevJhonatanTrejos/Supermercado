<?php
require_once __DIR__ . '/../../config/conexion.php';
require_once __DIR__ . '/../controlador/productosCtrl.php';

$ctrl = new ProductosCtrl($conexion);
$productos = $ctrl->obtenerProductosCtrl();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Julio</title>
    <link rel="stylesheet" href="../../utilidades/css/index.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../img/logo.png" alt="Logo Supermercado Julio">
            <h1>Supermercado Julio</h1>
        </div>
        <nav>
            <a href="#">Inicio</a>
            <a href="http://localhost/xampp/supermercado/Supermercado/app/vista/categorias.php">Categorías</a>
            <a href="http://localhost/xampp/supermercado/Supermercado/app/vista/Ofertas.php">Ofertas</a>
            <a href="#">Contacto</a>
        </nav>
    </header>

    <section class="banner">
        <img src="../../utilidades/img/app/banner.jpeg" alt="Banner del supermercado">
        <div class="texto-banner">
            <h2>¡Bienvenido a tu supermercado de confianza!</h2>
            <p>Calidad, frescura y buenos precios todos los días.</p>
        </div>
    </section>

    <main class="productos">
        <h2>🛒 Nuestros Productos</h2>
        <div class="grid-productos">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                    <div class="producto">
                        <img src="../../utilidades/img/productos/<?= htmlspecialchars($p['imagen_url']) ?>" alt="<?= htmlspecialchars($p['nombre']) ?>">
                        <h3><?= htmlspecialchars($p['nombre']) ?></h3>
                        <p><?= htmlspecialchars($p['descripcion']) ?></p>
                        <span class="precio">$<?= number_format($p['precio'], 0, ',', '.') ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-datos">No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>© <?= date('Y') ?> Supermercado Julio. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
