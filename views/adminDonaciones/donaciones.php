<?php
require 'auth.php';
require '../config/db.php';

// Obtener donaciones
$stmt = $pdo->query("
    SELECT id, nombre, email, monto, estado, referencia_pago, created_at
    FROM donaciones
    ORDER BY created_at DESC
");
$donaciones = $stmt->fetchAll();

// Total recaudado
$totalStmt = $pdo->query("
    SELECT SUM(monto) as total 
    FROM donaciones 
    WHERE estado = 'completada'
");
$total = $totalStmt->fetch()['total'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel Admin - Donaciones</title>
    <style>
        body { font-family: Arial; background:#f4f6f8; }
        table { width:100%; border-collapse: collapse; background:#fff; }
        th, td { padding:10px; border-bottom:1px solid #ddd; }
        th { background:#0d6efd; color:white; }
        .pendiente { color:orange; font-weight:bold; }
        .completada { color:green; font-weight:bold; }
        .fallida { color:red; font-weight:bold; }
        .box { background:white; padding:15px; margin-bottom:15px; }
    </style>
</head>
<body>

<h1>Panel de Donaciones</h1>

<div class="box">
    <strong>Total recaudado:</strong> $<?= number_format($total,2); ?>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Donante</th>
            <th>Email</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Referencia</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donaciones as $d): ?>
        <tr>
            <td><?= $d['id']; ?></td>
            <td><?= htmlspecialchars($d['nombre']); ?></td>
            <td><?= htmlspecialchars($d['email']); ?></td>
            <td>$<?= number_format($d['monto'],2); ?></td>
            <td class="<?= $d['estado']; ?>"><?= ucfirst($d['estado']); ?></td>
            <td><?= $d['referencia_pago'] ?? '-'; ?></td>
            <td><?= $d['created_at']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
