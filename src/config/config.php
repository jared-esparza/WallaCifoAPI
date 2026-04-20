<?php

/** config.php
 * 
 * Parámetros de configuración de la API.
 * 
 * Todas las directivas se encuentran documentadas en el mismo fichero config.php.
 * 
 * Última revisión: 24/03/26
 * @author Robert Sallent <robert@fastlight.org>
 * @since v0.1.0
 */
   

/* -------------------------------------------------------------
 * AUTOLOAD
 * -------------------------------------------------------------*/

// listado de directorios (classmap) para que el el autoload busque clases (no PSR-4) 
// listado de directorios (mapa de clases) para que el el autoload busque las clases a cargar (no PSR-4)
define('AUTOLOAD_DIRECTORIES',  [
    '../app/core',          // core
    '../app/http',          // peticiones y respuestas
    '../app/middleware',    // middleware
    '../app/libraries',     // librerías
    '../mvc/controllers',   // controladores
    '../mvc/models',        // modelos
    '../app/orm',           // FastLight ORM, mapeador objeto-relacional
    '../app/exceptions'     // excepciones
]);
 
    
    
/* -------------------------------------------------------------
 * APLICACIÓN
 * -------------------------------------------------------------*/

define('APP_NAME', 'FastLight API'); // Título de la aplicación.

define('APP_VERSION', '0.9.0');  // versión actual del framework o aplicación desarrollada

// ¿Deben las cadenas vacías ser convertidas a NULL?
// se aplica al recuperar los datos de la petición mediante el objeto Request,
// tanto si llegan por GET, POST, COOKIE...
define('EMPTY_STRINGS_TO_NULL', true);


/* -------------------------------------------------------------
 * BASE DE DATOS
 * -------------------------------------------------------------*/

// FastLight usa PDO, el driver por defecto será "mysql"
define('SGDB','mysql');             // Driver que debe usar PDO.

// Parámetros de configuración de la base de datos:
// define('DB_HOST','localhost');      // Host (configuración habitual)
define('DB_HOST','mysql');          // Host (configuración para Docker)

define('DB_USER','root'); // Usuario para identificarse con la BDD.
define('DB_PASS','root'); // Password para identificarse con la BDD.
define('DB_NAME','fastlight');      // Nombre de la base de datos.
define('DB_PORT',  3306);           // Puerto.
define('DB_CHARSET','utf8');        // Codificación de caracteres para la conexión.


/* -------------------------------------------------------------
 * CORS
 * -------------------------------------------------------------*/

// CABECERAS CORS:
// Orígenes aceptados para peticiones.
define('ALLOW_ORIGIN', 'http://localhost');

// Métodos HTTP aceptados.
define('ALLOW_METHODS', 'POST, GET, PUT, DELETE, OPTIONS');

// Cabeceras permitidas
define('ALLOW_HEADERS', 'csrf_token');

// ¿Se permite el envío de credenciales?
define('ALLOW_CREDENTIALS', 'true');

// Método de autenticación para las peticiones a la API.
// Puede ser COOKIE (implementado) o KEY (no implementado aún)
define('API_AUTHENTICATION', 'COOKIE');


/* ---------------------------------------------------------------------------
 * EMAIL
 * ---------------------------------------------------------------------------*/

// ubicación del servidor de correo saliente SMTP
// se puede comentar o borrar para usar la configuración por defecto en php.ini
define('SMTP', 'localhost');

// puerto para el servidor de correo saliente SMTP
// se puede comentar o borrar para usar la configuración por defecto en php.ini
define('SMTP_PORT', '25');

// Email y nombre del administrador.
define('ADMIN_EMAIL', 'admin@fastlight.test.local');
define('ADMIN_EMAIL_NAME', 'App admin');

// Email y nombre para el remitente de envíos genéricos
define('DEFAULT_EMAIL', 'no-reply@fastlight.test.local');
define('DEFAULT_EMAIL_NAME', 'No-reply test');



/* -------------------------------------------------------------
 * VERSIONES DE PHP Y HTTP
 * -------------------------------------------------------------*/

// versión de PHP necesaria para ejecutar el framework o aplicación
// podría funcionar en versiones anteriores pero no se garantiza que lo haga
define('MIN_PHP_VERSION', '8.2.0');  

// comprobación de la versión de PHP del servidor
// si está a true impide que se ejecute la aplicación en servidores con versiones
// de PHP anteriores a MIN_PHP_VERSION.
define('CHECK_PHP_VERSION', true);


define('HTTP_VERSION', '1.1');       // versión de HTTP a usar en las respuestas
define('RESPONSE_CHARSET', 'utf-8'); // charset para las respuestas HTTP



/* -------------------------------------------------------------
 * USUARIOS, ROLES Y PRIVILEGIOS BÁSICOS
 * -------------------------------------------------------------*/

// longitud mínima para los passwords
define('PASSWORD_LENGTH', 6);

// ROLES para los usuarios. Podemos crear o eliminar roles según las necesidades.
define('USER_ROLES', [
    'Usuario'       => 'ROLE_USER',
    'Administrador' => 'ROLE_ADMIN',
    'API'           => 'ROLE_API',
    'Estudiante'    => 'ROLE_STUDENT',
    'Debug'         => 'ROLE_DEBUG',
    'Bloqueado'     => 'ROLE_BLOCKED'
]);



/* -------------------------------------------------------------
 * LOGIN
 * -------------------------------------------------------------*/

// campo usado para la identificación del usuario (junto con el password)
// puede ser email, phone o both (si queremos que sirva cualquiera de los dos)
// también se puede indicar otro campo de la tabla users siempre y cuando
// sus valores sean únicos, por ejemplo podríamos usar un dni
define('LOGIN_FIELD', 'email');

// si queremos usar otro campo que no sea email, phone o both, hay que indicarlo expresamente
define('ALLOW_OTHER_LOGIN_FIELD', false); 

define('LOG_LOGIN_ERRORS', false);                 // guardar errores de login en fichero de log.

define('LOGIN_ERRORS_FILE', '../logs/login.log');  // ruta del fichero para los errores de login.

define('DB_LOGIN_ERRORS', false);                  // guardar errores de login en la base de datos.



/* -------------------------------------------------------------
 * SESIÓN Y COOKIE DE SESIÓN
 * -------------------------------------------------------------*/

// nombre de la sesión (y de la cookie de sesión)
define('SESSION_NAME', 'FLAPISSESSID');   

// tiempo (en segundos) antes de marcar los datos de sesión como basura
define('SESSION_TIME', 1440);           

// tiempo de expiración de la cookie de sesión (0 cuando se reinicie el navegador)
define('SESSION_COOKIE_EXPIRE', 0); 

// la cookie de sesión solamente se enviará si la conexión es segura (HTTPS)
// el valor "true" nos puede dar problemas en localhost si no usamos HTTPS
// en producción debería estar a true
define('SESSION_COOKIE_SECURE', false);

// la cookie de sesión no podrá ser accedida desde JavaScript
define('SESSION_COOKIE_HTTPONLY', true);


/* -------------------------------------------------------------
 * SUBIDA DE FICHEROS
 * -------------------------------------------------------------*/

// carpeta por defecto para la subida de ficheros
define('UPLOAD_FOLDER', '../storage'); 

// tamaño máximo para los ficheros subidos en bytes (0 sin límite)
define('UPLOAD_MAX_SIZE', 0);          


/* -------------------------------------------------------------
 * HERRAMIENTAS DE DEPURACIÓN 
 * -------------------------------------------------------------*/
    
define('DISPLAY_ERRORS', true); // Muestra errores en pantalla. En producción debe estar a false.
define('DEBUG', true);          // Activa el modo debug. En producción debe estar a false.  

define('LOG_ERRORS', true);                        // guardar errores en fichero de log.
define('ERROR_LOG_FILE', '../logs/error.log');     // ruta del fichero de log.
define('LOG_MAX_SIZE', 8388608);                   // tamaño máximo del fichero de LOG en Bytes (0 ilimitado)

define('DB_ERRORS', true);                         // guardar errores en la base de datos.
define('ERROR_DB_TABLE', 'errors');                // nombre de la tabla en la BDD para los errores.


/* -------------------------------------------------------------
 * ESTADÍSTICAS DE VISITAS
 * -------------------------------------------------------------*/

// Si queremos guardar estadísticas del número de visitas de cada URL
define('SAVE_STATS', true);

// nombre de la tabla para las estadísticas de visitas en la BDD
define('STATS_TABLE', 'stats');



