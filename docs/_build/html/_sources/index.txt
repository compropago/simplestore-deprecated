.. compropago documentation master file, created by
   sphinx-quickstart on Tue Jan 26 21:14:16 2016.
   You can adapt this file completely to your liking, but it should at least
   contain the root `toctree` directive.

Compropago, PHP API client (PHP-SDK)
====================================

.. toctree::
   :maxdepth: 2

Descripción
-----------
La librería de ComproPago-PHP le permite interactuar con el API de ComproPago en su aplicación.  También cuenta con los métodos necesarios para facilitarle su desarrollo por medio de los servicios y vistas más utilizados (SDK). 

Con ComproPago puede recibir pagos en OXXO, 7Eleven y muchas tiendas más en todo México.

`Registrarse en ComproPago <https://compropago.com>`_

--------------------------------

Índice de Contenidos
====================

* :ref:`genindex`
* :ref:`modindex`
* :ref:`search`



Requerimientos
==============
* `PHP >= 5.3 <http://www.php.net/>`_
* `PHP JSON extension <http://php.net/manual/en/book.json.php>`_
* `PHP cURL extension <http://php.net/manual/en/book.curl.php>`_

Instalación ComproPago SDK
==========================

Instalación usando Composer
---------------------------


La manera recomenda de instalar la SDK de ComproPago es por medio de `Composer <http://getcomposer.org>`_.

- `Cómo instalar Composer? <https://getcomposer.org/doc/00-intro.md>`_

Para instalar la última versión **Estable de la SDK**, ejecuta el comando de Composer:

.. code::

   composer require compropago/php-sdk
 
Posteriormente o en caso de erro de carga de archivos, volvemos a crear el autoload:
   
::

   composer dumpautoload -o

  
O agregando manualmente al archivo composer.json

.. code-block:: bash

   "require": { 
         "compropago/php-sdk":"^1.0"
      }



:: 

   composer install


Después de la instalación para poder hacer uso de la librería es **necesario incluir** el autoloader de Composer:
  
.. code-block:: php

    require 'vendor/autoload.php';


Para actualizar el SDK de ComproPago a la última versión estable ejecutar:

.. code-block:: bash

   composer update

   
