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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermercado Julio</title>

    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../../utilidades/css/categorias.css">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center mb-4">Mi Supermercado 🛒</h1>

       <!-- Botón para ir a nueva_categoria.php -->
<div class="d-flex justify-content-end mb-3">
    <a href="nueva_categoria.php" class="btn btn-success">
        ➕ Agregar Categoría
    </a>
</div>


        <!-- Tabla de categorías -->
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
                    <?php if (!empty($categorias)): ?>
                        <?php foreach ($categorias as $cat): ?>
                            <tr>
                                <td class="text-center"><?= htmlspecialchars($cat['id_categoria']) ?></td>
                                <td><?= htmlspecialchars($cat['nombre']) ?></td>
                                <td><?= htmlspecialchars($cat['descripcion']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="text-center text-muted fst-italic">
                                No hay categorías registradas
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    <

    