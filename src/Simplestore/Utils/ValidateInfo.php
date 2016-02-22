<?php
/**
 * Validaciones generales de datos de entrada
 * @version 1.0.0
 * @since 1.0.0
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */

namespace Compropago\Simplestore\Utils;

use Compropago\Sdk\Client;
use Compropago\Sdk\Service;
use Compropago\Sdk\Utils\Store;

class ValidateInfo
{
    /**
     * Validaciones que se ejecutan dentro de la vista para la carga de proveedores
     * @param array $data - Informacion recolectada de formulario sin proveedor seleccionado
     * @return bool
     * @throws \Exception
     */
    public static function validate(array $data)
    {
        self::cleanData($data);

        extract($data);

        if(isset($order_id) && isset($order_price) && isset($order_name) && isset($customer_name) && isset($customer_email)){
            if(!empty($order_id) && !empty($order_price) && !empty($order_name) && !empty($customer_name) && !empty($customer_email)){
                if(is_numeric($order_price) && $order_price > 0){
                    if(preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/",$customer_email)){
                        return true;
                    }else{
                        throw new \Exception("El correo ingresado no es valido.");
                    }
                }else{
                    throw new \Exception("El monto de la compra no es valido.");
                }
            }else{
                throw new \Exception("La informacion se encuentra incompleta.");
            }
        }else{
            throw new \Exception("La informacion se encuentra incompleta.");
        }
    }


    /**
     * Validaciones que van dentro del controlador
     * @param array $data - Informacion recolectada de formulario con proveedor seleccionado
     * @param $providers - Listado de proveedores disponibles regresado de la funcion 'getProviders()' de la clase Compropago\Sdk\Service
     * @return bool
     * @throws \Exception
     */
    public static function controllerValidate(array $data, $providers)
    {
        self::cleanData($data);

        try{
            if(self::validate($data) && isset($data['compropagoProvider'])){
                $flag = false;

                foreach($providers as $service){
                    if($data['compropagoProvider'] == $service->internal_name){
                        $flag = true;
                        break;
                    }
                }

                if($flag){
                    return true;
                }else{
                    throw new \Exception("El proveedor indicado no es valido.");
                }
            }else{
                throw new \Exception("La informacion se encuentra incompleta.");
            }
        }catch(\Exception $e){
            throw new \Exception($e);
        }
    }


    /**
     * Verifica si las cofiguraciones generales son validas
     * @param Client $client
     * @param Service $service
     * @return bool
     * @throws \Compropago\Sdk\Exception
     * @throws \Exception
     */
    public static function validateConfig(Client &$client, Service &$service)
    {
        if(!$respose = $service->evalAuth()){
            throw new \Exception("ComproPago Error: Llaves no validas");
        }

        if(!Store::validateGateway($client)){
            throw new \Exception("ComproPago Error: La tienda no se encuentra en un modo de ejecución valido");
        }

        return true;
    }


    /**
     * Elimina posibles caracteres que afecten al proceso de compra.
     * @param array $data
     */
    private static function cleanData(array &$data)
    {
        foreach($data as $key => $value){
            $value = str_replace("\n","",$value);
            $value = str_replace("\t","",$value);

            $data[$key] = $value;
        }
    }
}