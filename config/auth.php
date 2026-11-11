<?php
// Funciones de sesión y control de acceso
if (session_status() === PHP_SESSION_NONE) session_start();

const ROL_ADMIN = 1;
const ROL_USUARIO = 2;

function estaLogueado(): bool {
    return isset($_SESSION['id_usuario']);
}

function esAdmin(): bool {
    return estaLogueado() && ($_SESSION['id_rol'] ?? 0) === ROL_ADMIN;
}

// Llamar al inicio de cada página administrativa
function requerirAdmin(): void {
    if (!esAdmin()) {
        header('Location: ../login.php?error=acceso');
        exit;
    }
}

function requerirLogin(): void {
    if (!estaLogueado()) {
        header('Location: ../login.php?error=acceso');
        exit;
    }
}

function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
