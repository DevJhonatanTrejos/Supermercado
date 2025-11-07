<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../config/conexion.php'; 
require_once __DIR__ . '/../controlador/productosCtrl.php';
require_once __DIR__ . '/../controlador/categoriasCtrl.php'; // ✅ importante: debes incluir este controlador

$id_categoria = isset($_GET['id_categoria']) ? intval($_GET['id_categoria']) : 0;

// Validar que el ID sea correcto
if ($id_categoria <= 0) {
    echo "<div class='alert alert-danger text-center mt-3'>⚠️ Categoría no válida.</div>";
    exit;
}

// ✅ Controladores
$controladorProductos = new ProductosCtrl($conexion); 
$productos = $controladorProductos->consultarProductosPorCategoriaCtrl($id_categoria);

$controladorCategorias = new CategoriasCtrl($conexion);
$category = $controladorCategorias->consultarCategoriasIdCtrl($id_categoria);

// Verifica si se encontró la categoría
if (!$category) {
    die("Categoría no encontrada");
}

// ✅ Variables con los datos de la categoría
$nombreCategoria = htmlspecialchars($category['nombre']);
$descripcionCategoria = htmlspecialchars($category['descripcion']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - <?= $nombreCategoria ?> | Supermercado Julio</title>

    <!-- Bootstrap 5 CDN -->
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
            <a href="http://localhost/xampp/Supermercado/app/vista/categorias.php">Categorías</a>
            <div style="display: inline-block; background-color: royalblue; padding: 10px;">
                <a href="#" style="color: white; text-decoration: none;"><?= $nombreCategoria ?></a>
            </div>
            <a href="http://localhost/xampp/Supermercado/app/vista/Ofertas.php">Ofertas</a>
            <a href="#">🛒 Ver carrito</a>
            <a href="#">Contacto</a>
        </nav>
    </header>

    <main class="productos container mt-4">
        <h2 class="text-primary mb-3">🛒 Categoría: <?= $nombreCategoria ?></h2>
        <p class="text-muted mb-4"><?= $descripcionCategoria ?></p>

        <div class="grid-productos">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                    <div class="producto card">
                        <img src="../../utilidades/img/productos/<?= htmlspecialchars($p['imagen_url']) ?>" 
                             class="card-img-top" 
                             alt="<?= htmlspecialchars($p['nombre']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($p['nombre']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($p['descripcion']) ?></p>
                            <p class="text-success fw-bold">$<?= number_format($p['precio'], 0, ',', '.') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-datos">No hay productos disponibles en esta categoría.</p>
            <?php endif; ?>
        </div>
    </main>
</body>   
</html>
