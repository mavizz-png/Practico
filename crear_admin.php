<?php
// EJECUTAR UNA SOLA VEZ desde el navegador: http://localhost/biblioteca/crear_admin.php
// Luego BORRAR este archivo.
require __DIR__ . '/config/db.php';

$email = 'admin@biblioteca.com';
$password = 'admin123';   // cambiala después

$stmt = $pdo->prepare('SELECT 1 FROM usuarios WHERE email = ?');
$stmt->execute([$email]);
if ($stmt->fetch()) {
    die('El administrador ya existe.');
}
$pdo->prepare('INSERT INTO usuarios (nombre, email, password_hash, id_rol) VALUES (?,?,?,1)')
    ->execute(['Administrador', $email, password_hash($password, PASSWORD_DEFAULT)]);
echo "Administrador creado: $email / $password. Ahora borrá este archivo.";
