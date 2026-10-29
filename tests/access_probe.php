<?php
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit();
}
// Prueba aislada: no inicia sesión real ni abre la base de datos.
require dirname(__DIR__) . '/helpers/utils.php';
define('BASE_URL', 'http://localhost/academia/');

register_shutdown_function(function () {
    echo '\nSTATUS=' . (http_response_code() ?: 200);
});

$role = $argv[1] ?? 'guest';
$_SESSION = [];
if ($role !== 'guest') {
    $_SESSION['identity'] = (object) ['id' => 31, 'rol' => $role];
}
if ($role === 'legacy') {
    $_SESSION = ['admin' => true];
}
$_GET = ['id' => $argv[4] ?? 31];
$_POST = ['id' => $argv[4] ?? 31, 'rol' => 'admin'];
Utils::authorizeRoute($argv[2], $argv[3]);
echo 'ALLOWED;ROLE=' . ($_POST['rol'] ?? '');
