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
            
          	<h3>Paso 1: Revisión de Cart y selección</h3>
              <div>
			    <?php 
			     	/**
			    	 * Para el ejemplo mandaremos el total de la orden en input hidden con el sig valor
			    	 * este valor normalmente se origina en su proceso anterior de compra (Cart)
			    	 */    
					        $orderTotal= 1234.56;
					        
				?>
				<h4>Revise su orden</h4>
				<pre style="background-color: #F0F0F0; padding:20px;">El usuario normalmente aquí revisa su orden y esta flujo es anterior a usar compropago</pre>
				
				<table class="table">
				<tr>
					<td>Producto</td>
					<td>Cantidad</td>
					<td>Total</td>
				</tr>
				<tr>
					<td>Un Producto </td>
					<td>1</td>
					<td><?php echo $orderTotal;?></td>
				</tr>
				</table>
					        
			    <h4>Seleccione su Forma de Pago</h4>
			    <pre style="background-color: #F0F0F0; padding:20px;">Dependiendo de su flujo esté puede ser un paso adicional </pre>
			    <p>Algún otro método de pago...</p>
			    <?php
			    
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
			    
			    
			    /****************************************************
			    * GENERACIÓN DE VISTA
			    * 
			    * Parámetros para configurar como se desplegaran la selecciòn
			    * 
			    * NOTA: El formato de la vista solo genera el INPUT para ser usado en dentro del formulario de
			    * orden dentro del, proces. si se desea utizar diferente personalizar la respuesta JSON de 
			    * $compropagoService->getProviders();
			    *************************************************/
			    
				$compropagoData['providers']=$compropagoService->getProviders(); //obtenemos el listado
				$compropagoData['showlogo']='yes';                              //(yes|no) logos o select
				$compropagoData['description']='Con ComproPago puede realizar su pago OXXO, 7Eleven y muchas tiendas más en todo México';  // Título a mostrar
				$compropagoData['instrucciones']='Seleccione una Tienda:';    // texto de instrucciones
				
				/*** El nombre del input generado : compropagoProvider ****/
				/***
				 * Colocamos el Link del CSS del SDK, en produción utilizar entre tag <head>
				 */
				?>
			    <link rel="stylesheet" type="text/css" href="../vendor/compropago/php-sdk/assets/css/compropago.css">
			    
			    <p>
				    <strong>Compropago</strong> <br>
				    <form action="checkout2.php" method="post">
				    	<?php
					        //llamamos al controlador para mostrar el template 
					        Compropago\Controllers\Views::loadView('providers',$compropagoData);
			  		
					    ?>
			  			  
			  		<input type="hidden" name="orderTotal" value="<?php echo $orderTotal;?>">	  
			  		<input type="submit" value="Generar Orden">	  
				    </form>
				 </p>
			    
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
