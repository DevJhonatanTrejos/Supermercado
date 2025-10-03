<?php
$conexion = new mysqli("localhost", "root", "", "facturacion_bd");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$result = $conexion->query("SELECT * FROM contacs ORDER BY id DESC");
?>

<h2>Mensajes recibidos</h2>
<table border="1" cellpadding="8">
   <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Asunto</th>
    <th>Mensaje</th>
    <th>Teléfono</th>
   </tr>
   <?php 
    while ($row = $result->fetch_assoc()) { 
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['asunto']) ?></td>
        <td><?= nl2br(htmlspecialchars($row['mensaje'])) ?></td>
        <td><?= $row['phone'] ?></td>
      </tr>
<?php } ?>

</table>