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
            <img src="../../utilidades/img/app/logo.png" alt="Logo Supermercado Julio">
            <h1>Supermercado Julio</h1>
        </div>
        <nav>
            <a href="#">Inicio</a>
            <a href="http://localhost/xampp/Supermercado/app/vista/categorias.php">Categorías</a>
            <a href="http://localhost/xampp/Supermercado/app/vista/Ofertas.php">Ofertas</a>
            <a href="#">🛒 Ver carrito</a>
            <a href="http://localhost/xampp/Supermercado/app/vista/contacto.php">Contacto</a>
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

        <!-- 🔍 Buscador -->
        <div class="buscador">
            <input type="text" id="buscar" placeholder="Buscar producto por nombre o descripción...">
        </div>

        <div class="grid-productos" id="lista-productos">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                    <div class="producto" data-nombre="<?= strtolower(htmlspecialchars($p['nombre'])) ?>" data-descripcion="<?= strtolower(htmlspecialchars($p['descripcion'])) ?>">
                        <img src="../../utilidades/img/productos/<?= htmlspecialchars($p['imagen_url']) ?>" alt="<?= htmlspecialchars($p['nombre']) ?>">
                        <h3><?= htmlspecialchars($p['nombre']) ?></h3>
                        <p><?= htmlspecialchars($p['descripcion']) ?></p>
                        <span class="precio">$<?= number_format($p['precio'], 0, ',', '.') ?></span>

                        <!-- 🔹 Botón de añadir al carrito -->
                        <form action="../controlador/agregarCarrito.php" method="POST">
                            <input type="hidden" name="id_producto" value="<?= htmlspecialchars($p['id_producto']) ?>">
                            <input type="hidden" name="cantidad" value="1">
                            <button type="submit" class="btn-carrito">🛒 Añadir al carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-datos">No hay productos disponibles.</p>
            <?php endif; ?>
        </div>
    </main>

   <footer>
    <p>
        © <?= date('Y') ?> Supermercado Julio. Todos los derechos reservados. |
        <a href="http://localhost/xampp/Supermercado/app/vista/admin/login.php" style="color: #fff; text-decoration: underline;">
            Administrador
        </a>
    </p>
</footer>

    <!-- 🔍 Script buscador -->
    <script>
        const inputBuscar = document.getElementById("buscar");
        const productos = document.querySelectorAll(".producto");

        inputBuscar.addEventListener("keyup", () => {
            const filtro = inputBuscar.value.toLowerCase().trim();

            productos.forEach(prod => {
                const nombre = prod.dataset.nombre;
                const descripcion = prod.dataset.descripcion;
                if (nombre.includes(filtro) || descripcion.includes(filtro)) {
                    prod.style.display = "block";
                } else {
                    prod.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
