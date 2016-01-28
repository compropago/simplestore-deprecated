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
            <h2 class="blog-post-title">Sample blog post</h2>
            <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
            <hr>
            <b>config.php</b>
            <pre><code>

			</code></pre>
            
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
            <h2>Heading</h2>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            <h3>Sub-heading</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <pre><code>Example code block</code></pre>
            <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
            <h3>Sub-heading</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
              <li>Nulla vitae elit libero, a pharetra augue.</li>
            </ul>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
            <ol>
              <li>Vestibulum id ligula porta felis euismod semper.</li>
              <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
              <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
            </ol>
            <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
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
