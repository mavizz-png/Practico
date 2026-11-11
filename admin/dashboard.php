<?php
require __DIR__ . '/../config/db.php';
require __DIR__ . '/../config/auth.php';
requerirAdmin();   // Protección: solo administradores
$totalUsuarios = $pdo->query('SELECT COUNT(*) FROM usuarios')->fetchColumn();
$totalArticulos = $pdo->query('SELECT COUNT(*) FROM articulos')->fetchColumn();
?>
