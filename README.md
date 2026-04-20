<h1>FastLight Framework</h1>
    		
<h2>Bienvenido!</h2>
        		
<a href="https://fastlight.org">FastLight</a> es un framework rápido y ligero para desarrollar aplicaciones web en PHP o APIs RESTFUL.

Está planteado como framework para docencia, pero se puede utilizar para desarrollos profesionales pequeños y medianos. Incorpora las características esenciales para crear aplicaciones web rápidas, sólidas y fiables, pero no incluye algunas funcionalidades que desarrollamos en clase (las encontraréis detalladas en la documentación y tutoriales). 

Todas las herramientas que incorpora han sido creadas expresamente para él, aunque está basado en frameworks PHP anteriores que he implementado desde 2013, cogiendo las ideas más interesantes en cada caso.

Su modo de empleo está inspirado en Laravel/Symfony (aunque sus ancestros se inspiraban en CodeIgniter), lo que deriva en una transición muy sencilla desde FastLight hacia Laravel, Symfony u otros frameworks MVC sobre PHP.	 

Existen dos herramientas:
- FastLight Framework: https://github.com/robertsallent/fastlight.git
- FastLight API: - Fastlight Framework: https://github.com/robertsallent/fastlightapi.git   
		   
<h2>FastLight API</h2>
		    	
FastLight API nos permite creaer APIs RESTFUL de una forma sencilla y rápida.

<h3>Lo que incorpora de serie:</h3>

- Integración con Docker.
- Patrón de diseño MVC. 
- Dispatcher con mapeo directo de URL a controlador.
- Se mapea el método HTTP usado a un metodo de controlador.
- ORM con Query builder y clase base para los modelos, que hace uso de PDO con sentencias preparadas y "magia".
- Autoload mediante mapa de clases.
- Middleware.
- Gestión integrada de errores y herramientas de depuración.
- Registo en ficheros (log).
- Motor de estadísticas para analizar las visitas a las distintas URLs del proyecto.
- Autenticación y autorización basada en roles.
- Librerias para trabajar con XML, JSON y CSV.
- Protección CSRF.
- Multitud de librerías para las funcionalidades habituales: trabajo con ficheros y directorios, subida de ficheros, bases de datos...
- Ejemplos, documentación, tutoriales y manuales para clase.
- ...
    				

<h2>Requisitos</h2>

En docencia trabajamos cada año con las últimas versiones de PHP. En este sentido, el código del framework se va adaptando para funcionar en versiones nuevas, eliminando el soporte para las antiguas.

Actualmente, la versión 1.0.0 de FastLight API ha sido testeada en PHP 8.2 con MySQL 8.0. Esto no quiere decir que no funcione en versiones ligeramente anteriores o posteriores, pero no se garantiza que lo haga.


<h2>Integración con Docker</h2>

Si dispones de Docker instalado en el equipo, para montar el servidor con las
versiones adecuadas de PHP y Mysql, tan solo tienes que hacer por terminal:

docker-compose up -d

Se creará todo lo necesario para poder trabajar, incuida la base de datos fastlight (que encontrarás en /docker/mysql/initdb) con las tablas base del framework.

- Para realizar las pruebas, desde tu herramienta para realizar peticiones HTTP (POSTMAN, Bruno, curl...) puedes usar la URL: http://localhost:8080 
- Para gestionar la base de datos desde el navegador web, con phpmyadmin: http://localhost:8081
- Para trabajar con un cliente de MySQL externo (por ejemplo MySQL Workbench), puedes usar
como host mysql, usuario root, password root y puerto 3306.

<h2>Consideraciones</h2>

Ha sido desarrollado completamente desde cero por <a href="https://robertsallent.com">Robert Sallent</a> y no tiene dependencias con paquetes externos. Su funcionamiento se explica en detalle en los cursos de <a href="https://php.net">PHP</a> y desarrollo web, que imparte desde 2010, en distintos <a href="https://serveiocupacio.gencat.cat/es/soc/com-ens-organitzem/centres-propis-formacio-cifo-cfpa/centres-dinnovacio-i-formacio-ocupacional-cifo/index.html">Centros de Innovación y Formación Ocupacional</a> (CIFO) de la província de Barcelona para la Generalitat de Catalunya.
        		   	   
     		   
<h2>Licencia</h2>    

FastLight y FastLight API se distribuyen bajo licencia <b>GPL 3.0</b>, con lo que puedes usarlo libremente para desarrolar aplicaciones web sin tener que pagar absolutamente nada. Solamente tienes la obligación de reconocer al autor (Robert Sallent).
  
Estas son algunas consideraciones a tener en cuenta:
- Eres libre de usar este framework para desarrollar aplicaciones web y APIs para uso particular y profesional.
- En docencia, puedes usar tanto el framework como los apuntes y tutoriales. Si creas apuntes derivados de los originales no puedes omitir la mención al autor.
- Puedes desarrollar aplicaciones web y distribuirlas libremente. 
- Puedes obtener ingresos con las aplicaciones desarrolladas a partir de FastLight, pero si pretendes distribuir versiones modificadas o derivadas del framework, debes mantenerlas como Open Source.
- Si te es útil en el trabajo y sacas rendimiento de él, plantéate la posibilidad de realizar una donación al autor.

Este software es Open Source, el autor (Robert Sallent) <b>no se hará responsable de los errores o fallos de seguridad que se pudieran producir y de los daños que pudieran derivar de ello</b>.

Se aceptan sugerencias y los reportes de errores serán tenidos en consideración, actualizando o corrigiendo los problemas lo antes posible.


