<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Contáctenos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px #aaa;
      width: 350px;
    }
    input, textarea {
      display: block;
      margin: 10px 0;
      padding: 10px;
      width: 100%;
    }
    button {
      background: #28a745;
      color: #fff;
      border: none;
      padding: 10px;
      cursor: pointer;
      width: 100%;
    }
    button:hover {
      background: #1e7e34;
    }
  </style>
</head>
<body>

  <form action="guardar_contacto.php" method="POST">
    <h2>Formulario de Contacto</h2>
    <input type="text" name="name" placeholder="Tu nombre" required>
    <input type="email" name="email" placeholder="Tu correo" required>
    <input type="text" name="asunto" placeholder="Asunto" required>
    <input type="text" name="phone" placeholder="Teléfono" required>
    <textarea name="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>
    <button type="submit">Enviar</button>
  </form>

</body>
</html>
