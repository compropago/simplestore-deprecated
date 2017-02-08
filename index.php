<!DOCTYPE html>
<?php 
require_once __DIR__ . '/vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

use CompropagoSdk\Client;
use CompropagoSdk\Factory\Factory;

$config = json_decode(file_get_contents("compropago.json"));

$client = new Client($config->public_key, $config->private_key, $config->mode);
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Simple Store</title>

    <link rel="stylesheet" href="assets/milligram/dist/milligram.min.css">
    <link rel="stylesheet" href="assets/normalize.css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="assets/jquery/dist/jquery.min.js"></script>
</head>
<body>
    
    <main class="container">
        <div class="row">
            <div class="column">
                <h1>Simplestore PHP SDK</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <form id="order-form" method="post" action="controllers/GenerateOrderController.php">
                    <label>Order ID</label>
                    <input id="order_id" name="order_id" placeholder="SKU" type="text"><br>
                    
                    <label>Order Name</label>
                    <input id="order_name" name="order_name" placeholder="Productos" type="text"><br>
                    
                    <label>Order Price</label>
                    <input id="order_price" type="text" name="order_price" placeholder="0000.00"><br>
                    
                    <label>Customer Name</label>
                    <input id="customer_name" type="text" name="customer_name" placeholder="Javier Moreno"><br>

                    <label>Customer Email</label>
                    <input id="customer_email" type="email" name="customer_email" placeholder="asd@asd.com"><br>
                    
                    <label>Payment Type</label>
                    <?php 
                        $providers = $client->api->listProviders();
                        foreach ($providers as $provider) {
                    ?>
                    <label class="cp-provider" data-provider="<?php echo $provider->internal_name; ?>">
                        <img src="<?php echo $provider->image_medium; ?>" alt="<?php echo $provider->name; ?>">
                    </label>
                    <?php
                        }
                    ?>
                    <input type="hidden" name="payment_type" id="payment_type"><br>
                    
                    <br>
                    <button id="send-form" class="button expand" type="button">Submit</button>
                </form>
            </div>
        </div>
    </main>

    <script src="js/actions.js"></script>
</body>
</html>