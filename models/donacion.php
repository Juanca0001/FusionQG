<?php
class Donation {

    /**
     * Guarda una donación en estado pendiente
     */
    public function create($name, $email, $amount, $orderId) {

        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO donations
            (donor_name, donor_email, amount, paypal_order_id, status)
            VALUES (?, ?, ?, ?, 'pending')
        ");

        $stmt->execute([$name, $email, $amount, $orderId]);
    }

    /**
     * Marca la donación como completada
     */
    public function markCompleted($orderId, $captureId) {

        $db = Database::connect();

        $stmt = $db->prepare("
            UPDATE donations
            SET status='completed',
                paypal_capture_id=?,
                updated_at=NOW()
            WHERE paypal_order_id=?
        ");

        $stmt->execute([$captureId, $orderId]);
    }
}
