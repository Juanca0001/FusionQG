<?php
class PayPalService {

    private $clientId;
    private $secret;
    private $baseUrl;

    /**
     * Constructor:
     * Carga credenciales desde variables de entorno.
     */
    public function __construct() {
        $this->clientId = $_ENV['PAYPAL_CLIENT_ID'];
        $this->secret = $_ENV['PAYPAL_CLIENT_SECRET'];
        $this->baseUrl = $_ENV['PAYPAL_BASE_URL'];
    }

    /**
     * Obtiene el access token OAuth2 necesario para
     * poder hacer llamadas autenticadas a PayPal.
     */
    private function getAccessToken() {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . "/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Autenticación básica: clientId:secret
        curl_setopt($ch, CURLOPT_USERPWD, $this->clientId . ":" . $this->secret);

        // Body requerido por PayPal
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return $response->access_token;
    }

    /**
     * Crea una orden en PayPal
     * @param float $amount
     * @return object $response
     */
    public function createOrder($amount) {

        $accessToken = $this->getAccessToken();

        $data = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => "USD",
                    "value" => number_format($amount, 2, '.', '')
                ]
            ]],
            "application_context" => [
                "return_url" => $_ENV['APP_URL'] . "/donation/success",
                "cancel_url" => $_ENV['APP_URL'] . "/donation/cancel"
            ]
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->baseUrl . "/v2/checkout/orders");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer $accessToken"
        ]);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return $response;
    }
}
