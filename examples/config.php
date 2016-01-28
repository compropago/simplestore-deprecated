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

 
// incluimos el autoload generado por composer. si presenta no se incluyen correctamente(error 500) usar:
// composer dumpautoload -o
require dirname(__FILE__).'/../vendor/autoload.php';

$compropagoConfig= array(
	
		
		//Llave pública
		'publickey'=>'pk_test_TULLAVEPUBLICA',
		//Llave privada
		'privatekey'=>'sk_test_TULLAVEPRIVADA',
		//Esta probando?, utilice  'live'=>false
		'live'=>true

);
// Instancia del Client, su utiliza mayormente para el uso del SDK
$compropagoClient= new Compropago\Client($compropagoConfig);