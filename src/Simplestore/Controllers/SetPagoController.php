<?php
/**
 * Controlador principal para la generacion de pedidos
 * @version 1.0.0
 * @since 1.0.0
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */

namespace Compropago\Simplestore\Controllers;

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once __DIR__ . "/../../../vendor/autoload.php";

use Compropago\Sdk\Client;
use Compropago\Sdk\Service;
use Compropago\Simplestore\Utils\ValidateInfo;


class SetPagoController
{
    /**
     * @var array - Informacion a prosesar
     */
    private $data;
    /**
     * @var array - Arreglo que contendra la informacion de respuesta
     */
    private $response;

    /**
     * @var Client - Compropago object
     */
    private $compropagoClient;
    /**
     * @var Service - Compropago service object
     */
    private $compropagoService;


    /**
     * SetPagoIframeController constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->response = array(
            "stat" => false,
            "msg" => "",
            "resp" => null
        );

        $this->data = $data;

        $this->__init__();
    }


    /**
     * Inicializacion del proseso de compra
     */
    private function __init__()
    {
        try{
            $this->initServices();

            if(ValidateInfo::controllerValidate($this->data,$this->compropagoService->getProviders())){
                $this->createOrder();
            }else{
                throw new \Exception("Error de operacion.");
            }
        }catch(\Exception $e){

            echo "{$e->getMessage()}";
            $this->response['msg'] = $e->getMessage();
        }

        header("Content-Type: application/json");
        echo json_encode($this->response);
    }


    /**
     * Inicializacion de los servicios de compropago
     */
    private function initServices()
    {
        # Call to the config array
        include_once __DIR__ . "/../Libraries/compropagoConfig.php";

        $this->compropagoClient = new Client($compropagoConfig);
        $this->compropagoService = new Service($this->compropagoClient);
    }


    /**
     * Proseso principal de compra
     */
    private function createOrder()
    {
        # Data order
        $finaldata = array(
            "order_id" => $this->data['order_id'],
            "order_price" => $this->data['order_price'],
            "order_name" => $this->data['order_name'],
            "customer_name" => $this->data['customer_name'],
            "customer_email" => $this->data['customer_email'],
            "payment_type" => $this->data['compropagoProvider']
        );

        $this->response['resp'] = $this->compropagoService->placeOrder($finaldata);
        $this->response['stat'] = true;
        $this->response['customer_name'] = $this->data['customer_name'];
        $this->response['customer_email'] = $this->data['customer_email'];
    }
}


if($_POST){
    new SetPagoController($_POST);
}else{
    $response = array(
        "stat" => false,
        "msg" => "Error de peticion"
    );

    header("Content-Type: application/json");

    echo json_encode($response);
}