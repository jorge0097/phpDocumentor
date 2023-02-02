# PHPDOCUMENTOR

## Documentación

https://docs.phpdoc.org/guide/getting-started/installing.html

## Qué es
PhpDocumentor permite generar automaticamente una buena documentación en nuestro código mediante comentarios y 
unas etiquetas especiales definimos de forma sencilla que hace la cada clase, cada método y cada función de nuestro código.

PhpDocumentor permite generar la documentación de varias formas y en varios for>

. Desde la línea de comandos
. Desde interfaz web
. Desde el propio código

## Funcionamiento
En phpDocumentor la documentación se distribuye en bloques "DocBlock" estos bloques siempre se colocan justo antes del
elemento  al que documentan con el siguiente formato:

>[!NOTE]
>/**
>*Descripción breve
>*Descripción detallada con las líneas necesarias
>*/


Ejemplo:

` /**
 Este Docblock documenta la función suma()
*/

function suma(){

} `

También hay diferentes marcas que se pueden incluir mediante una '@' que se pueden consultar el la documentación oficial [phpDocumentor](https://docs.phpdoc.org/guide/references/phpdoc/tags/index.html)
 
## Instalación 
Si queremos poder usar phpDocumentor a través del navegador necesitaremos apache instalado [Apache](https://www.digitalocean.com/community/tutorials/how-to-install-the-apache-web-server-on-ubuntu-20-04)

Por otro lado tendremos que instalar php 7.4.0 o superior y las siguiente extensiones:

* mbstring 
* xml


### Para instalar Apache desde el terminal escribimos:

	sudo apt update

	sudo apt install apache2 
### Permitimos a apache en el firewall

	sudo ufw allow 'Apache'

### Para revisar el estado de Apache escribimos:

	sudo service apache2 status

Una vez instalado tenemos que ubicar nuestras aplicaciones en /var/www/html para poder visualizarlas, ya que es la ruta
por defecto.

Para instalar php y las extensiones simplemente desde el terminal escribimos:

	apt install php-cli

NOTA:tenga en cuenta que ha de poner la versión de su php

	apt install php8.1-mbstring
	
	apt install php8.1-xml

## Generar la documentación
Para generar la documentación nos descargamos en la carpeta del proyecto el archivo phpDocumentor.phar

        wget https://phpdoc.org/phpDocumentor.phar

Para otros métodos de instalación consultar la documentación mencionada anteriormente.

Y ejecutamos el siguiente comando desde el terminal:

	php phpDocumentor.phar -d [carpeta_proyecto_php] -t [carpeta_volcado_documentación]

Ejemplo:
	
	php phpDocumentor.phar -d . -t /var/www/html/docs

NOTA: tenemos que volcar la documentación en una carpeta en la que nuestro apache tenga acceso.
