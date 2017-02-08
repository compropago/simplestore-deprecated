<?php
require_once __DIR__ . '/../vendor/autoload.php';

use CompropagoSdk\Client;
use CompropagoSdk\Factory\Factory;

class GenerateOrderController
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
        $this->init();
    }

    private function init()
    {
        try {
            $order_info = [
                'order_id' => $this->data['order_id'],
                'order_name' => $this->data['order_name'],
                'order_price' => $this->data['order_price'],
                'customer_name' => $this->data['customer_name'],
                'customer_email' => $this->data['customer_email'],
                'payment_type' => $this->data['payment_type']
            ];

            $order = Factory::getInstanceOf('PlaceOrderInfo', $order_info);

            $config = json_decode(file_get_contents(__DIR__ . '/../compropago.json'));

            $client = new Client($config->public_key, $config->private_key, $config->mode);
            $new_order = $client->api->placeOrder($order);

            if (!empty($new_order->id)) {
                header('Location: ../views/success.php?id='.$new_order->id);
            } else {
                $message = base64_encode('Ocurrio un error al generar la orden');
                header('Location: ../views/error.php?m=' . $message);
            }
        } catch (Exception $e) {
            $message = base64_encode($e->getMessage());
            header('Location: ../views/error.php?m=' . $message);
        }
    }
}

if ($_POST) {
    new GenerateOrderController($_POST);
} else {
    $message = base64_encode('No se pudo procesar la orden.');
    header('Location: ../views/error.php?m=' . $message);
}