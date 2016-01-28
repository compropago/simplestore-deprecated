<?php
/*
* Copyright 2016 Compropago. 
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
/**
 * @author Rolando Lucio <rolando@compropago.com>
 */
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'template/head.php';?>
  </head>

  <body>

   <?php include 'template/header.php';?>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">ComproPago PHP SDK</h1>
        <p class="lead blog-description">Ejemplos, CookBook y Guías Practicas</p>
        <p><img alt="Si no ve est" src="../vendor/compropago/php-sdk/assets/images/logo.png"></p>
        <p><i>Si no ve el Logo de ComproPago no tiene instalado el SDK o instalo en una ruta diferente</i></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">Check out por Pasos</h2>
            <p>Ejemplo común de proceso de checkout</p>
            
          	<h3>Paso 2: Creación y Recibo de la Orden</h3>
              <div>
			    <?php 
			     		
				    //dependiendo de su flujo tambien recibe el no. de orden o lo genera en este paso
			    	$orderId =uniqid(); // identificador único de la operación
			    	
			    	/**
			    	 * Obtenemos la tienda y total del Paso 1
			    	 */
					$orderTotal= $_POST['orderTotal'];
					$compropagoProvider=$_POST['compropagoProvider'];
					
					//El nombre que aparece como descripción el recibo
					$orderName ='No. Orden:'. $orderId;

					/**
					 * Icluimos nuestro archivo Config para poder operar El SDK
					 *
					 */
					 
					include 'config.php';
					
					/**
					 * Uso de servicios De SDK
					 * Para poder usar los servicios instanciar Compropago\Service con el objeto creado para client
					 * (en el config.php para esté caso)
					 *
					 */
					 
					$compropagoService= new Compropago\Service($compropagoClient);
					
					
					// Se acompletan los parámetros requeridos para realizar la orden
			        $compropagoParams = array(
			        		'order_id'           =>  $orderId,             // string para identificar la orden
			        		'order_price'        => $orderTotal,                  // float con el monto de la operación
			        		'order_name'         => $orderName,         // nombre para la orden
			        		'customer_name'      => 'Nombre del cliente',         // nombre del cliente
			        		'customer_email'     => 'test@compropago.com',     // email del cliente
			        		'payment_type'       =>  $compropagoProvider                     // identificador de la tienda donde realizar el pago
			        );
			        //Obtenemos el JSON de la respuesta
			        $compropagoData = $compropagoService->placeOrder($compropagoParams);
					        
				?>
				<h4>Detalles de la orden</h4>
				<?php 
				/***
				 * Colocamos el Link del CSS del SDK, en produción utilizar entre tag <head>
				 */
				?>
			    <link rel="stylesheet" type="text/css" href="../vendor/compropago/php-sdk/assets/css/compropago.css">
			    
				<?php
					        //llamamos al controlador para mostrar el recibo de compropago y le pasamos la respuesta  
					        Compropago\Controllers\Views::loadView('iframe',$compropagoData);
			  		
					?>
				
			    
			    </div>
          </div><!-- /.blog-post -->

          

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <?php  include 'template/sidebar.php'; ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

   <?php include 'template/footer.php'; ?>
  
  </body>
</html>
