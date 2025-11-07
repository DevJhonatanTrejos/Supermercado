<?php
session_start();
require_once __DIR__ . '/../../../config/conexion.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario']);
    $clave = trim($_POST['clave']);

    // 🔹 Consulta segura
    $stmt = $conexion->prepare("SELECT * FROM usuarios_admin WHERE usuario = ? AND clave = MD5(?)");
    $stmt->bind_param("ss", $usuario, $clave);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $admin = $resultado->fetch_assoc();
        $_SESSION['admin_id'] = $admin['id_admin'];
        $_SESSION['admin_nombre'] = $admin['nombre'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador | Supermercado Julio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #007bff, #00c6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }
        .login-box h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .btn-login {
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
        }
        .btn-login:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 10px;
        }
        .volver {
            display: block;
            margin-top: 15px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Administrador</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
            </div>
            <div class="mb-3">
                <input type="password" name="clave" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-login">Iniciar sesión</button>
        </form>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <a href="../../vista/index.php" class="volver">← Volver al inicio</a>
    </div>
</body>
</html>
