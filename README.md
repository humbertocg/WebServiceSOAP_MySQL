# WebServiceSOAP_MySQL
Crear un webservice en PHP para consultar una base de datos en MySQL con la libreria NuSOAP

Se crea una función simple de login que recibe como parametros un usuario y contraseña en un WebService SOAP con conexión a MySQL y se consume el servicio para demostrar el ejemplo. 

- Descargar repositorio y pegar en directorio del servidor apache.

- Modificar el archivo dbConexion.php con datos de conexion del servidor MySQL local o remoto.

- WebService.php se crea el WebService con conexión a MySQL.
   * Se registra función get_Login en WebService.
   * Se genera rutina de conexión y ejecución de query en MySQL.
   * Devuelve el resultado de la query al cliente que consume el servicio.
   
- Test_webservice.php sirve para comprobar el funcionamiento del webservice.
   * Se configuran los datos de entrada (usuario y contraseña) para la funcion get_Login del WebService.
   * Se configura la ruta URL y los parametros de entrada del WebService a consumir.
   * Imprime el resultado de la funcion get_Login del WebService.
