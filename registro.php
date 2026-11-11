<?php
require __DIR__ . '/config/db.php';
require __DIR__ . '/config/auth.php';

$error = $ok = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nombre === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
        $error = 'Completá todos los campos (contraseña de al menos 6 caracteres).';
    } else {
        $stmt = $pdo->prepare('SELECT 1 FROM usuarios WHERE email = ?');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $error = 'Ese email ya está registrado.';
        } else {
            // Todo registro público es rol Usuario
            $pdo->prepare('INSERT INTO usuarios (nombre, email, password_hash, id_rol) VALUES (?,?,?,?)')
                ->execute([$nombre, $email, password_hash($password, PASSWORD_DEFAULT), ROL_USUARIO]);
            $ok = 'Cuenta creada. Ya podés iniciar sesión.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Biblioteca</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5" style="max-width:420px">
  <h1 class="h3 text-center mb-4">Crear cuenta</h1>
  <div class="card shadow-sm"><div class="card-body p-4">
    <?php if ($error): ?><div class="alert alert-danger"><?= h($error) ?></div><?php endif; ?>
    <?php if ($ok): ?><div class="alert alert-success"><?= h($ok) ?> <a href="login.php">Ir al login</a></div><?php endif; ?>
    <form method="post">
      <div class="mb-3"><label class="form-label">Nombre</label>
        <input name="nombre" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required></div>
      <div class="mb-3"><label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" minlength="6" required></div>
      <button class="btn btn-dark w-100">Registrarme</button>
    </form>
    <p class="text-center mt-3 mb-0 small"><a href="login.php">Ya tengo cuenta</a></p>
  </div></div>
</div>
</body>
</html>
