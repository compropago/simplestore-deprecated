<?php
/**
 * Formulario principal
 * @version 1.0.0
 * @since 1.0.0
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */

error_reporting(E_ALL);
ini_set("display_errors", 1);

# Llamada a la auto carga de clases
require_once __DIR__ . "/../vendor/autoload.php";


/**
 * Inlcusion de la configuracion general de servicios de compropago.
 * Antes de comezar, asegurese re configurar correctamente este archivo con sus datos.
 */
include_once __DIR__ . "/../src/Simplestore/Libraries/compropagoConfig.php";


/**
 * Inicializacion de los servicios de compropago
 */
$compropagoClient = new \Compropago\Sdk\Client($compropagoConfig);
$compropagoService = new \Compropago\Sdk\Service($compropagoClient);

/**
 * Inlcucion de la configuiracion para la carga de los proveedores.
 * Este archivo puede configurarlo si desa cambiar alguna opcion, como mostrar o no los logos entre otros.
 */
include_once __DIR__ . "/../src/Simplestore/Libraries/displayConfig.php";


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Store Example Ajax</title>

    <!-- CARGA DE LOS ESTILOS GENERALES DE COMPROPAGO, SIMPLE STORE AJAX Y SKELETON  <getskeleton.com/> -->
    <link rel="stylesheet" href="../assets/css/skeleton.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/main-style.css">
    <link rel="stylesheet" href="../vendor/compropago/php-sdk/assets/css/compropago.css">

    <!-- INCLUCION DE LOS EVENTOS DE CONTROL DE SIMPLE STORE AJAX -->
    <script src="../assets/js/jquery-2.2.0.min.js"></script>
    <script src="../assets/js/serialize.js"></script>
    <script src="../assets/js/main-actions.js"></script> <!-- ARCHIVO PRINCIPAL -->
</head>
<body>

<main>

    <div class="container">

        <div class="row">
            <div class="twelve columns">
                <h1>Simple Store Ajax - Checkout</h1>
                <hr>
            </div>
        </div>


        <!-- IMAGEN DE CARGA -->


        <section id="load-img" style="text-align: center; display: none;">
            <div class="row">
                <div class="twelve columns">
                    <img src="../assets/img/hex-loader2.gif" alt="Cargando...">
                </div>
            </div>
        </section>


        <!-- SECCION DE MENSAJES  (NO MODIFICAR)  -->


        <section id="display-status" style="display: none;">
            <div class="alert-box" id="text-stats"></div>
            <br>
        </section>


        <!-- FORMULARIO DE COMPRA (NO MODIFICAR) -->


        <section id="checkout">
            <form id="form-data">
                <div class="row">
                    <div class="twelve columns">
                        <label for="order_id">Order ID</label>
                        <input type="text" class="u-full-width" name="order_id" id="order_id" placeholder="xx-xx-xx or number">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve columns">
                        <label for="order_name">Producto</label>
                        <input type="text" class="u-full-width" name="order_name" id="order_name" placeholder="MacBook Pro">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve columns">
                        <label for="order_price">Precio</label>
                        <input type="number" class="u-full-width" name="order_price" id="prder_price" placeholder="15000.00">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve columns">
                        <label for="customer_name">Nombre del cliente</label>
                        <input type="text" class="u-full-width" name="customer_name" id="customer_name" placeholder="Javier Aguilar">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve columns">
                        <label for="customer_email">Correo del cliente</label>
                        <input type="email" class="u-full-width" name="customer_email" id="customer_email" placeholder="javier@prueba.com">
                    </div>
                </div>

                <div class="row">
                    <div class="twelve columns">
                        <!-- CARGA DE PROVEEDORES -->
                        <?php \Compropago\Sdk\Controllers\Views::loadView('providers',$comproData) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="twelve columns">
                        <input id="set-cheackout" type="button" value="Generar Orden" class="button-primary u-full-width">
                    </div>
                </div>
            </form>
        </section>


        <!-- SECCION DE DESPLIEGUE DE RECIVO (NO MODIFICAR) -->


        <section id="recibo" style="display: none;">

            <div class="row">
                <div class="twelve columns">

                    <div id="compropagoWrapper">
                        <hr class="compropagoHr">

                        <!-- DESPLIEGUE DEL RECIVO -->
                        <div class="compropagoDivFrame" id="compropagodContainer" style="width: 100%;"></div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="twelve columns" style="text-align: center">
                    <!-- BOTON DE REDIRECCION FINAL
                    La URL de redireccion debe ser modificada a su gusto en el archivo assets/js/main-actions.js
                    en la variable 'redirectURL'
                    -->
                    <a href="#" id="final-redirect" class="button">Regresar</a>
                </div>
            </div>

        </section>

    </div>

</main>


</body>
</html>
