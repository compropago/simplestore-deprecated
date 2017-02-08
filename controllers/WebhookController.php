<?php 
require_once __DIR__ . '/../vendor/autoload.php';

use CompropagoSdk\Factory\Factory;
use CompropagoSdk\Client;

class WebhookController
{
    public function __construct()
    {
        $this->webhook();
    }

    private function webhook()
    {
        $request = @file_get_contents('php://input');
        $config = json_decode(file_get_contents(__DIR__ . '/../compropago.json'));

        if(!$resp_webhook = Factory::getInstanceOf('CpOrderInfo', $request)){
            die('Invalid Request');
        }

        $publickey     = $config->public_key;
        $privatekey    = $config->private_key;
        $live          = $config->mode;

        try{
            $client = new Client($publickey, $privatekey, $live );

            if($resp_webhook->id == "ch_00000-000-0000-000000"){
                die("Probando el WebHook?, Ruta correcta.");
            }

            $response = $client->api->verifyOrder($resp_webhook->id);

            switch ($response->type){
                case 'charge.success':
                    // TODO: Actions on success payment
                    break;
                case 'charge.pending':
                    // TODO: Actions on pending payment
                    break;
                case 'charge.declined':
                    // TODO: Actions on declined payment
                    break;
                case 'charge.expired':
                    // TODO: Actions on expired payment
                    break;
                case 'charge.deleted':
                    // TODO: Actions on deleted payment
                    break;
                case 'charge.canceled':
                    // TODO: Actions on canceled payment
                    break;
                default:
                    die('Invalid Response type');
            }
        }catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

new WebhookController();