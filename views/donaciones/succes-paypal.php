<?php
require 'config/db.php';

$id = intval($_GET['id']);
$orderID = $_GET['orderID'];

$stmt = $pdo->prepare("
    UPDATE donaciones 
    SET estado = 'completada', referencia_pago = :ref 
    WHERE id = :id AND estado = 'pendiente'
");

$stmt->execute([
    ':ref' => $orderID,
    ':id' => $id
]);

echo "¡Gracias por tu donación!";
