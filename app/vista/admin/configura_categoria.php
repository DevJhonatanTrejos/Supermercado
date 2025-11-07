<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../config/conexion.php'; 
require_once __DIR__ . '/../controlador/categoriasCtrl.php';

$controlador = new CategoriasCtrl($conexion); 
$categorias = $controlador->consultarCategoriasCtrl();
?>

<!DOCTYPE html>
<html lang="es">
     <link rel="stylesheet" href="../../utilidades/css/index.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Julio</title>

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
            <div style="display: inline-block; background-color: royalblue; padding: 10px;">
                <a href="#" style="color: white; text-decoration: none;">Categorías</a>
            </div>
            <a href="http://localhost/xampp/Supermercado/app/vista/Ofertas.php">Ofertas</a>
            <a href="#">Contacto</a>
        </nav>
    </header>
    <!--<section class="banner">
        <img src="../../utilidades/img/app/banner.jpeg" alt="Banner del supermercado">
        <div class="texto-banner">
            <h2>¡Bienvenido a tu supermercado de confianza!</h2>
            <p>Calidad, frescura y buenos precios todos los días.</p>
        </div>
    </section>
    -->
    <!--
    <div class="container mt-4">
        <h1 class="text-center mb-4">Mi Supermercado 🛒</h1>
        <div class="d-flex justify-content-end mb-3">
            <a href="nueva_categoria.php" class="btn btn-success">➕ Agregar Categoría</a>
        </div>
    </div>-->
<main class="productos">
        <h2>🛒 Categorías</h2>
        <div class="grid-productos">
            <?php if (!empty($categorias)): ?>
                <?php foreach ($categorias as $c): ?>
                    <div class="producto">
                        <img src="../../utilidades/img/categorias/<?= htmlspecialchars($c['imagen_url']) ?>" alt="<?= htmlspecialchars($c['nombre']) ?>">
                        <h3><?= htmlspecialchars($c['nombre']) ?></h3>
                        <p><?= htmlspecialchars($c['descripcion']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-datos">No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </main>

        <!-- Tabla de categorías -->
         <!-- 
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php // if (!empty($categorias)): ?>
                <?php //foreach ($categorias as $cat): ?>
                <tr>
                    <td class="text-center"><//?=  htmlspecialchars($cat['id_categoria']) ?></td>
                    <td><//?= htmlspecialchars($cat['nombre']) ?></td>
                    <td><//?= htmlspecialchars($cat['descripcion']) ?></td>
                </tr>
                <?php //endforeach; ?>
                <?php // else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted fst-italic"> No hay categorías registradas</td>
                </tr>
                <?php // endif; ?>
            </tbody>
        </table>
    </div>-->
</body>   
</html>
    