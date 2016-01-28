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
            <h2 class="blog-post-title">Uso de Ejemplos</h2>
            Ejemplos:
            <ol class="list-unstyled">
              <li><a href="checkout.php">Proceso de Check Out</a></li>
             
            </ol>
            <hr>
            <p>Se requiere tener instalado por Composer el SDK en el nivel de folders superior a este (al nivel del archivo composer.json)</p>
             <pre>
             <code>
#para instalar
composer require compropago/php-sdk
             
#después actualizar autoload
composer dumpautoload -o
             </code>
             </pre>
             <p>Para poder ejecutar los ejemplos ingrese sus llaves en archivo de configuración</p>
            <b>config.php</b>
            <pre><code>
$compropagoConfig= array(	
		//Llave pública
		'publickey'=>'pk_test_TULLAVEPUBLICA',
		//Llave privada
		'privatekey'=>'sk_test_TULLAVEPRIVADA',
		//Esta probando?, utilice  'live'=>false
		'live'=>true 
);
			</code></pre>
            
           
            <h2>Ayuda y Soporte de ComproPago</h2>
            <blockquote>
              <p><strong>No dude en contactarnos</strong>, para aclarar dudas en como usar el SDK.</p>
            </blockquote>
            <ul>
				<li><a href="https://compropago.com/ayuda-y-soporte" target="blank">Centro de ayuda y soporte</a></li>
				<li><a href="https://compropago.com/integracion" target="blank">Solicitar Integración</a></li>
				<li><a href="https://compropago.com/ayuda-y-soporte/como-comenzar-a-usar-compropago" target="blank">Guía para Empezar a usar ComproPago</a></li>
				<li><a href="https://compropago.com/contacto" target="blank">Información de Contacto</a></li>
			</ul>
          </div><!-- /.blog-post -->

          

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="checkout.php">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

        <?php  include 'template/sidebar.php'; ?>

      </div><!-- /.row -->

    </div><!-- /.container -->

   <?php include 'template/footer.php'; ?>
  
  </body>
</html>
