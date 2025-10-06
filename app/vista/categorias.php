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
     <link rel="stylesheet" href="../../utilidades/css/categorias.css">
</head>
<body>
    <h1>Mi Supermercado 🛒</h1>

    <table>
        <thead>
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
                        <td><?= htmlspecialchars($cat['id_categoria']) ?></td>
                        <td><?= htmlspecialchars($cat['nombre']) ?></td>
                        <td><?= htmlspecialchars($cat['descripcion']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="no-datos">No hay categorías registradas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
