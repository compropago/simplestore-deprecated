<?php
/**
 * Variables para la configuracion del despliegue de proveedores
 * @version 1.0.0
 * @since 1.0.0
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */



/**
 * Configuraciones para despliegue de proveedores
 * @var array
 */
$comproData = array();



/**
 * Validacion de activacion del arreglo que contiene los datos para el listado de proveedores
 */

# La variable $compropagoService debe estar declarada antes de la inclucion de este archivo
if(isset($compropagoService)){
    # Campo de carga de proveedores NO MODIFICAR
    $comproData['providers'] = $compropagoService->getProviders();


    # Desea ocultar los logos de los proveedores? cambie el valor a 'no'
    $comproData['showlogo'] = "yes";

    # Ingrese una descripcion para la seccion de proveedores
    $comproData['description'] = "";

    # Ingrese las instrucciones que considere pertinentes para la seleccion de proveedores
    $comproData['instrucciones'] = "Seleccione la tienda de conveniencia en la cual desea realizar su pago";
}


