<?php
class DonationController {

    /**
     * Muestra el formulario de donación
     */
    public function index() {
        require '../app/views/donations/index.php';
    }

    /**
     * Procesa el formulario
     */
    public function create() {

        // 1️⃣ Validar monto
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);

        if (!$amount || $amount < 1) {
            die("Monto inválido");
        }

        // 2️⃣ Crear orden en PayPal
        $paypal = new PayPalService();
        $order = $paypal->createOrder($amount);

        // 3️⃣ Guardar en base de datos
        $donationModel = new Donation();
        $donationModel->create(
            $_POST['name'] ?? null,
            $_POST['email'] ?? null,
            $amount,
            $order->id
        );

        // 4️⃣ Redirigir al usuario a PayPal
        foreach ($order->links as $link) {
            if ($link->rel === "approve") {
                header("Location: " . $link->href);
                exit;
            }
        }
    }

    public function success() {
        require '../app/views/donations/success.php';
    }

    public function cancel() {
        require '../app/views/donations/cancel.php';
    }
}
