<?php
require 'config/db.php';
$env = parse_ini_file(__DIR__ . '/config/.env');

$id = intval($_GET['id']);

$stmt = $pdo->prepare("SELECT * FROM donaciones WHERE id = :id");
$stmt->execute([':id' => $id]);
$donacion = $stmt->fetch();

if (!$donacion || $donacion['estado'] !== 'pendiente') {
    die("Donación inválida");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Donar con PayPal</title>
    <script src="https://www.paypal.com/sdk/js?client-id=<?= $env['PAYPAL_CLIENT_ID']; ?>&currency=USD"></script>
</head>
<body>

<h2>Donar $<?= number_format($donacion['monto'],2); ?></h2>

<div id="paypal-button-container"></div>

<script>
paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: "<?= $donacion['monto']; ?>"
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            window.location.href = "paypal_success.php?orderID=" + data.orderID + "&id=<?= $donacion['id']; ?>";
        });
    },
    onCancel: function () {
        window.location.href = "paypal_cancel.php";
    }
}).render('#paypal-button-container');
</script>

</body>
</html>
