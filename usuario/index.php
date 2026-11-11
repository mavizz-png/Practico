<?php
require __DIR__ . '/../config/auth.php';
requerirLogin();
// Página provisoria: el Práctico 2 solo exige demostrar la redirección.
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Mi cuenta</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="container py-5">
  <h1>Hola, <?= h($_SESSION['nombre']) ?></h1>
  <p>Sección de usuario (en construcción).</p>
  <a href="../index.html" class="btn btn-dark">Ir a la biblioteca</a>
  <a href="../logout.php" class="btn btn-outline-secondary">Cerrar sesión</a>
</body></html>
