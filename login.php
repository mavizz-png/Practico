<?php
require __DIR__ . '/config/db.php';
require __DIR__ . '/config/auth.php';

// Si ya está logueado, redirigir según rol
if (estaLogueado()) {
    header('Location: ' . (esAdmin() ? 'admin/dashboard.php' : 'usuario/index.php'));
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
    $stmt->execute([$email]);
    $u = $stmt->fetch();

    if ($u && password_verify($password, $u['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['id_usuario'] = (int)$u['id_usuario'];
        $_SESSION['nombre'] = $u['nombre'];
        $_SESSION['id_rol'] = (int)$u['id_rol'];

        // Redirección según el rol
        if ($u['id_rol'] == ROL_ADMIN) {
            header('Location: admin/dashboard.php');
        } else {
            header('Location: usuario/index.php');
        }
        exit;
    }
    $error = 'Email o contraseña incorrectos.';
}
if (isset($_GET['error']) && $_GET['error'] === 'acceso') {
    $error = 'Debés iniciar sesión como administrador para acceder a esa sección.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión - Biblioteca</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:420px">
  <div class="text-center mb-4">
    <h1 class="h3"><i class="bi bi-book-half"></i> Biblioteca Digital</h1>
    <p class="text-secondary">Iniciar sesión</p>
  </div>
  <div class="card shadow-sm"><div class="card-body p-4">
    <?php if ($error): ?><div class="alert alert-danger"><?= h($error) ?></div><?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-dark w-100">Ingresar</button>
    </form>
    <p class="text-center mt-3 mb-0 small">¿No tenés cuenta? <a href="registro.php">Registrate</a></p>
    <p class="text-center mt-2 mb-0 small"><a href="index.php">Volver al inicio</a></p>
  </div></div>
</div>
</body>
</html>
