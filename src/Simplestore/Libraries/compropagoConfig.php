<?php
/**
 * Variable de configuracion de los modulos de Compropago.
 * Este archivo debe de ser editado con los datos correctos que le proporciona su cuenta en compropago
 * antes de proseguir con su utilizacion.
 * @version 1.0.0
 * @since 1.0.0
 * @author Eduardo Aguilar <eduardo.aguilar@compropago.com>
 */

define("CP_ST_VERSION", "1.0.1");

/**
 * @var array General Configurations for SDK
 */
$compropagoConfig = array(
    # Llave publica generada por compropago
    'publickey'=>'pk_test_8781245a88240f9cf',
    # Llave privada gerada por compropago
    'privatekey'=>'sk_test_56e31883637446b1b',
    # Estas generando pruebas? si no es asi cambia el valor a 'true'
    'live'=>false,
    # Definicion estatica de version, (No modificar),
    'contained' => 'plugin; cpst '. CP_ST_VERSION .' ;'
);
