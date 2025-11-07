<?php include 'includes/header_admin.php'; ?>
  <h1 class="text-primary">Bienvenido, <?= htmlspecialchars($_SESSION['admin_nombre']) ?> 👋</h1>
  <p class="lead">Desde este panel puedes administrar el contenido del Supermercado Julio.</p>

  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <h5 class="card-title">🧃 Productos</h5>
          <p class="card-text">Gestiona el catálogo de productos disponibles.</p>
          <a href="productos.php" class="btn btn-primary">Ir a productos</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <h5 class="card-title">📦 Categorías</h5>
          <p class="card-text">Organiza los productos por categoría.</p>
          <a href="configura_categoria.php" class="btn btn-primary">Ir a categorías</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <h5 class="card-title">🔥 Ofertas</h5>
          <p class="card-text">Agrega y administra promociones.</p>
          <a href="ofertas.php" class="btn btn-primary">Ir a ofertas</a>
        </div>
      </div>
    </div>
  </div>
<?php include 'includes/footer_admin.php'; ?>
