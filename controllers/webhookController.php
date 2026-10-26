<?php
class WebhookController {

    /**
     * Recibe notificaciones automáticas de PayPal
     */
    public function paypal() {

        $payload = file_get_contents("php://input");
        $event = json_decode($payload);

        // Verificamos tipo de evento
        if ($event->event_type === "PAYMENT.CAPTURE.COMPLETED") {

            $captureId = $event->resource->id;
            $orderId = $event->resource
                             ->supplementary_data
                             ->related_ids
                             ->order_id;

            $donationModel = new Donation();
            $donationModel->markCompleted($orderId, $captureId);
        }

        http_response_code(200);
    }
}
