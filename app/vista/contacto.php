<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../../config/conexion.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Supermercado Julio</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../../utilidades/css/index.css">
</head>
<body>
    <!-- 🔹 Header -->
    <header class="header">
        <div class="logo">
            <img src="../../utilidades/img/app/logo.png" alt="Logo Supermercado Julio">
            <h1>Supermercado Julio</h1>
        </div>
        <nav>
            <a href="http://localhost/xampp/Supermercado/app/vista/index.php">Inicio</a>
            <a href="http://localhost/xampp/Supermercado/app/vista/categorias.php">Categorías</a>
            <a href="http://localhost/xampp/Supermercado/app/vista/Ofertas.php">Ofertas</a>
            <a href="#">🛒 Ver carrito</a>
            <div style="display: inline-block; background-color: royalblue; padding: 10px;">
                <a href="#" style="color: white; text-decoration: none;">Contacto</a>
            </div>
        </nav>
    </header>

    <!-- 🔹 Sección de contacto -->
    <main class="productos">
        <h2>📞 Contáctanos</h2>
        <p style="text-align:center; color:#555;">¿Tienes preguntas, sugerencias o necesitas ayuda? ¡Estamos para atenderte!</p>

        <div class="container mt-4" style="max-width: 700px;">
            <div class="card shadow-sm p-4">
                <form action="enviar_contacto.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="tunombre@ejemplo.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="asunto" class="form-label">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Motivo del mensaje" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe aquí tu mensaje..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar mensaje</button>
                </form>
            </div>
        </div>

        <!-- 🔹 Datos de contacto -->
        <div class="container mt-5 text-center">
            <h4>También puedes visitarnos o llamarnos</h4>
            <p>📍 Calle 123 #45-67, Pereira, Risaralda</p>
            <p>📧 contacto@supermercadojulio.com</p>
            <p>📞 +57 6 345 6789</p>
        </div>
    </main>

    <!-- 🔹 Footer -->
    <footer>
        <p>© <?= date('Y') ?> Supermercado Julio. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
