# Compropago Simplestore

## Descripción
Compropago simplestore es un ejemplo de la implementación nativa de el [php-sdk](https://github.com/compropago/compropago-php)
de Compropago, en la cual se muestra el proseso claro de checkout y sus pasos.

## Requerimientos
* [PHP >= 5.5](http://www.php.net/)
* [PHP JSON extension](http://php.net/manual/en/book.json.php)
* [PHP cURL extension](http://php.net/manual/en/book.curl.php)

## Estructura

### Librerias utilizadas
| Libreria            | Metodo de instalación       | Pakage               | Version | Enlaces                  |
|---------------------|-----------------------------|----------------------|---------|--------------------------| 
| Compropago php-sdk  | [Composer][composer-link]   | `compropago/php-sdk` | 3.0.3   | [LINK][compropago-link]  |
| Milligram framework | [Bower][bower-link]         | `milligram`          | 1.3.0   | [LINK][milligram-link]   |
| JQuery              | [Bower][bower-link]         | `jquery`             | 3.1.1   | [LINK][jquery-link]      |


### Estructura de carpetas

#### Carpeta *assets*
Contiene todo el codigo de estilos CSS y librerias JS que fueron instaladas mediante el gestor **Bower**.

#### Carpeta *vendor*
Contiene el codigo del SDK de PHP que fue instalado mediante el gestor de **Composer**

#### Carpeta *controllers*
Contiene los dos controladores de la aplicacion, **GenerateOrderController** y **WebhookController**
* **WebhookController:** Controlador encargado de recibir las peticiones de cambio de estatus de la aplicacion para su gestion interna.
* **GenerateOrderController:** Controlador encargado de generar las ordenes de pago conforme a la información recavada en el formulario
  
#### Carpeta *views*
Contiene las vistas post generacion de orden, como lo son la vista de errores y el success que mostrara el recibo de pago de cada orden.

#### Carpeta *css*
Carpeta con los archivos de estilos custom fuera de el Framework de **Miligram**

#### Carpeta *js*
Carpeta con los archivos de Javascript custom, eventos y validaciones de formularios.


## Instalación 
Para hacer uso de este demo debe de descargar desde github alguno de los reeleases publicados desde el [listado de releases](https://github.com/compropago/docs-php-sdk/releases), o tambien puede clonar el repositorio con el siguiente comando.

```bash
git clone https://github.com/compropago/docs-php-sdk
```

## Configuración
Para configurar el demo con su cuenta de compropago debe de editar el archivo **composer.json** que se encuentra en la raiz de los archivos descargdos de la siguiente forma:
```json
{
  "public_key": "pk_test_xxxxxxxxxxxxx",
  "private_key": "sk_test_xxxxxxxxxxxxxx",
  "mode": false
}
```
Donde **public_key** y **private_key** hacen referencia a las llaves publica y privada del modo en que se encuentra su panel de ComproPago, y **mode** al modo en que se encuentra el panel siendo *true* modo activo y *false* modo pruebas.


[compropago-config-link]: https://compropago.com/panel/configuracion
[compropago-link]: https://packagist.org/packages/compropago/php-sdk
[composer-link]: https://getcomposer.org/
[bower-link]: https://bower.io/
[milligram-link]: https://milligram.github.io
[jquery-link]: https://jquery.com/
