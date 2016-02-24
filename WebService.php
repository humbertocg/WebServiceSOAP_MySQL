<?php
//Llamar libreria nusoap
require_once ('lib/nusoap.php'); 
//Crear el servidor SOAP y fijar parametros
$server = new nusoap_server;
$serverName='Web Service ejemplo';
$serverNamespace='www.WebServiceEjemplo.com.mx';
$server->configureWSDL($serverName,$serverNamespace); 

//Se registra una funcion para el WebService
$server->register('get_Login',
			array('Usuario' => 'xsd:string','Pass' => 'xsd:string'),
			array('return' => 'xsd:string'),
			$serverNamespace,
			$serverNamespace.'#get_Login',
			'rpc',
			'encoded',
			utf8_decode('Funcion Login, recibe parametros Usuario y contraseña como cadenas y entrega como salida el resultado de la consulta')); 

// Rutina de la funcion get_Login del WebService 
function get_Login($Usuario,$Pass)
{
	if(!$Usuario&&!$Pass){ 
		return new soap_fault('Client','Falta parametros'); 
	}
	//----------------------Rutina de conexión y consulta con MySQL----------------------------------
	include "dbConexion.php";
	$query = sprintf("select * from usuarios where usuarios.User='%s' and usuarios.Pass='%s'",
						mysqli_real_escape_string($conectar, $Usuario),mysqli_real_escape_string($conectar, $Pass));
	$result1 = mysqli_query($conectar,$query);
	$número_filas = mysqli_num_rows($result1);
	if($número_filas>0)
	{
		while($row = mysqli_fetch_assoc($result1)){
			$json['Query_result'][]=$row;
		}
	}
	else
		$json['Query_result'][]='';
	mysqli_close($conectar);
	//------------------------------------------------------------------------------------------------
	return utf8_decode(json_encode($json, JSON_UNESCAPED_UNICODE)); //Regresa el resultado de la query.
}

if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
//Inicializa el servicio
$server->service($HTTP_RAW_POST_DATA);
exit(); 
?> 