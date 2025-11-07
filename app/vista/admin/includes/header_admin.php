<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Administración</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar {
      height: 100vh;
      background-color: #007bff;
      color: white;
      padding: 20px;
    }
    .sidebar a {
      color: white;
      text-decoration: none;
      display: block;
      margin: 10px 0;
      padding: 10px;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background-color: #0056b3;
    }
    .main {
      padding: 30px;
    }
  </style>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 sidebar">
      <h3 class="mb-4">🛍️ Supermercado Julio</h3>
      <p>👤 <?= htmlspecialchars($_SESSION['admin_nombre']) ?></p>
      <hr>
      <a href="dashboard.php">🏠 Inicio</a>
      <a href="productos.php">🧃 Productos</a>
      <a href="configura_categoria.php">📦 Categorías</a>
      <a href="ofertas.php">🔥 Ofertas</a>
      <a href="logout.php" class="text-danger">🚪 Cerrar sesión</a>
    </nav>
    <main class="col-md-9 col-lg-10 main">
