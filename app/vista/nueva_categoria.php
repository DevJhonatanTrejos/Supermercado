<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../../config/conexion.php'; 
require_once __DIR__ . '/../controlador/categoriasCtrl.php';

$controlador = new CategoriasCtrl($conexion); 

$mensaje = ''; // <-- Variable para mostrar el mensaje

if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);

    $resultado = $controlador->insertarCategoriasCtrl($nombre, $descripcion);

    if ($resultado) {
        $mensaje = "<div class='alert alert-success text-center mt-3'>✅ La categoría se ha guardado correctamente.</div>";
    } else {
        $mensaje = "<div class='alert alert-danger text-center mt-3'>❌ Error al insertar la categoría.</div>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Categoría | Supermercado Julio</title>

    <!-- ✅ Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin-top: 70px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="card">
            <h2 class="text-center mb-4 text-primary">🛒 Crear Nueva Categoría</h2>

            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Categoría</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="nombre" 
                        name="nombre" 
                        placeholder="Ejemplo: Bebidas, Lácteos, Aseo..." 
                        required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea 
                        class="form-control" 
                        id="descripcion" 
                        name="descripcion" 
                        rows="3" 
                        placeholder="Ejemplo: Productos de limpieza y cuidado del hogar" 
                        required></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="categorias.php" class="btn btn-secondary">⬅ Volver</a>
                    <button type="submit" class="btn btn-primary">Guardar Categoría</button>
                </div>
            </form>
        </div>
    </div>

</body>
<?= $mensaje ?>
</html>
