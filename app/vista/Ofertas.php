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

    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            color: #222;
        }

        .titulo-ofertas {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            margin: 30px auto;
            width: 80%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .titulo-ofertas strong {
            font-size: 1.8rem;
            letter-spacing: 1px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            padding: 12px;
            text-align: center;
        }

        td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f2f8ff;
        }

        .no-datos {
            text-align: center;
            color: #777;
            padding: 15px;
        }

        .container {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <h1>Mi Supermercado 🛒</h1>

    <div class="titulo-ofertas">
        <strong>CONOCE LAS OFERTAS DE LA SEMANA</strong>
    </div>

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

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio de Oferta</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ofertas)): ?>
                    <?php foreach ($ofertas as $cat): ?>
                        <tr>
                            <td><?= htmlspecialchars($cat['id_categoria']) ?></td>
                            <td><?= htmlspecialchars($cat['nombre']) ?></td>
                            <td><?= htmlspecialchars($cat['descripcion']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="no-datos">No hay ofertas registradas</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
