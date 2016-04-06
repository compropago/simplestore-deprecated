# Compropago Simplestore v1.0.0

## Descripción
Compropago simplestore es un ejemplo de la implementación nativa de el [php-sdk](https://github.com/compropago/compropago-php)
de Compropago, en la cual se muestra el proseso claro de checkout y sus pasos.

## Requerimientos
* [Compropago php-sdk >= 1.1.0][compropago-link]
* [Composer][composer-link]
* [PHP >= 5.5](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)
* [PHP cURL extension](http://php.net/manual/en/book.curl.php)

## Estructura

### Librerias utilizadas
| Libreria           | Metodo de instalación       | Pakage               | Enlaces                 |
|--------------------|-----------------------------|----------------------|-------------------------| 
| Compropago php-sk  | [Composer][composer-link]   | `compropago/php-sdk` | [LINK][compropago-link] |
| Skeleton framework | Sourcecode                  |                      | [LINK][skeleton-link]   |
| JQuery             | Sourcecode                  |                      | [LINK][jquery-link]     |


### Estructura de carpetas

#### Carpeta *assets*
Contiene todo el codigo de estilos CSS, librerias JS y las imegenes que se ocupan para darle presentacion al `Simplestore`.
Aquí es donde se encutran tambien las librerias de Skeleton y Jquery.
##### Subcarpetas
* css
* img
* js

#### Carpeta *src*
Contiene todo el codigo PHP que se encarga de controlar el proceso de Checkout, junto con las configuraciones necesarias
para su funcionamiento.
##### Subcarpetas
* Simplestore
  * Controllers
  * Libraries
  * Utils
  
#### Carpeta *views*
Contiene a `index.php` que es el archivo prinsipal de `Compropago Simplestore`. 

#### Anotaciones importantes
`Compropago Simplestore` usa como dependencia `compropago/php-sdk` por lo cual el codigo de esta dependencia no se encuntra
visible dentro de estos archivos, es descargado por el gestor de dependencias de `composer` al instalar Compropago Simplestore

## Instalación
`Compropago Simplestore` debe ser instalado mediante composer, esto permitira tener una experiencia `Out of the box` de esta
herramienta. Para poder instalarlo en su sitio, debe asegurarse de tener el gestor de composer instalado en su equipo, una vez
asegurada la existencia de la instalación de composer, en una terminal de sistema debera ejecutar los siguientes comandos.

```
$ composer require compropago/simplestore
$ composer dumpautoload -o
```

Esto generara en la ruta donde este posicionada su terminal la siguiente estructura.

```
/ vendor
|--> composer
|--> compropago
|  |--> php-sdk
|  |--> simplestore
|--> autoload.php
/ composer.json
/ composer.lock
```

Dentro de nueva estructura generada hay 2 carpetas importantes:
* `vendor/compropago/php-sdk/`: contiene todos los archivos y librerias de los servicios del SDK de Compropago.
* `vendor/compropago/simplestore/`: contiene la estructura ya mencionada de Compropago Simplestore


## Configuración
Una vez instalado `Compropago Simplestore` debe proceder a configurarlo, para esto es necesario que edite los 2 archivos 
contenidos dentro de `vendor/compropago/simplestore/src/Simplestore/Libraries/`, **compropagoConfig.php** y **displayConfig.php**

#### compropagoConfig.php
Aqui se encuentran las confguraciones relacionadas con el SDK, que le permitiran tener acceso a los servicios correspondientes
de compropago, lo unico que debe de hacer, es reemplazar las llaves publica y privada por aquellas que le son proporcionadas
en su [panel de configuración Compropago][compropago-config-link]

```php
$compropagoConfig = array(
    # Llave publica generada por compropago
    'publickey'=>'pk_test_XXXXXXXXXXXXXXXXX',
    # Llave privada gerada por compropago
    'privatekey'=>'sk_test_XXXXXXXXXXXXXXXXX',
    # Estas generando pruebas? si no es asi cambia el valor a 'true'
    'live'=>false
);
```

#### displayConfig.php
En este archivo se encuentran las configurariones visuales del listado de proveedores.

```php
# Desea ocultar los logos de los proveedores? cambie el valor a 'no'
$comproData['showlogo'] = "yes";
# Ingrese una descripcion para la seccion de proveedores
$comproData['description'] = "";
# Ingrese las instrucciones que considere pertinentes para la seleccion de proveedores
$comproData['instrucciones'] = "Seleccione la tienda de conveniencia en la cual desea realizar su pago";
```

Una vez configurados estor archivos tendra a `Compropago Simplestore` funcionando y listao para usarse.

## Recomendaciones finales
Para acceder al checkout del `Compropago Simplestore` debera de acceder al archivo `index.php` por algunos de 
los siguientes 2 metodos

##### Tag iframe
```html
<iframe src="path/index.php"></iframe>
```

##### Redirección mediante headers u otro metodo de redirección
```php
<?php
  header("Location: path/index.php");
?>
```

En ambos casos `path` hace referencia a la dirección absoluta o relativa donde esta continido el archivo index.php de 
`Compropago Simplestore`


[compropago-config-link]: https://compropago.com/panel/configuracion
[compropago-link]: https://packagist.org/packages/compropago/php-sdk
[composer-link]: https://getcomposer.org/
[skeleton-link]: http://getskeleton.com/
[jquery-link]: https://jquery.com/
