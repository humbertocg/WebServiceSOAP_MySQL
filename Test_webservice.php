<?php
	require_once ('lib/nusoap.php'); 
	
	//Parametros de entrada
	$Usuario= 'Humberto';
	$Pass= 'Pass';
	
	//Impresion de parametros de entrada
	print_r('Usuario: '.$Usuario);
	echo '<br/>';
	print_r( utf8_decode('Contraseña: ').$Pass);
	
	echo '<br/>';
	echo '<br/>';
	echo '<br/>';
	
	//Conexion y consumo del WebService
	$client = new nusoap_client('http://localhost/WebServiceSOAP_MySQL/WebService.php?wsdl');
	$result=$client->call('get_Login', array('Usuario' => $Usuario, 'Pass' => $Pass));
	print_r($result); //Obtener resultado
?>