<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../config/conexion.php'; 
require_once __DIR__ . '/../controlador/categoriasCtrl.php';

$controlador = new categoriasCtrl($conexion); 
$categorias = $controlador->consultarCategoriasCtrl();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Julio</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../../utilidades/css/categorias.css">
    <link rel="stylesheet" href="../../utilidades/css/index.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="../../utilidades/img/app/logo.png" alt="Logo Supermercado Julio">
            <h1>Supermercado Julio</h1>
        </div>
        <nav>
            <a href="http://localhost/xampp/Supermercado/app/vista/index.php">Inicio</a>
            <div style="display: inline-block; background-color: royalblue; padding: 10px;">
                <a href="#" style="color: white; text-decoration: none;">Categorías</a>
            </div>
            <a href="http://localhost/xampp/Supermercado/app/vista/Ofertas.php">Ofertas</a>
            <a href="#">🛒 Ver carrito</a>
            <a href="#">Contacto</a>
        </nav>
    </header>

    <main class="productos">
        <h2>🛒 Categorías</h2>
        <div class="grid-productos">
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $c): ?>
                    <div class="producto" 
                         onclick="window.location.href='productos_categorias.php?id_categoria=<?= $c['id_categoria'] ?>'" 
                         style="cursor: pointer;">
                        <img src="../../utilidades/img/categorias/<?= htmlspecialchars($c['imagen_url']) ?>" 
                             alt="<?= htmlspecialchars($c['nombre']) ?>">
                        <h3><?= htmlspecialchars($c['nombre']) ?></h3>
                        <p><?= htmlspecialchars($c['descripcion']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-datos">No hay categorías disponibles.</p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
