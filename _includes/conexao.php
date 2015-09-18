<?php

	session_start();
	

	if($_SERVER['HTTP_HOST'] != 'localhost'){	
		
		
		$mysql_server 	= 'localhost';
		$mysql_db 		= 'sorocaba_action';
		
		$mysql_user_pass = array(
			'read' 		=> array('sorocaba_action',	'1qazZAQ!')
		);
		

		error_reporting(0);
		//error_reporting(E_ALL);		
	} else {
		
		$mysql_server 	= 'localhost';
		$mysql_db 		= "action";
		
		$mysql_user_pass = array(
			'read' 		=> array('root',	'')
		);
		
		error_reporting(E_ALL);
	}
	
	ini_set("zlib.output_compression", "On");
	ini_set("ServerTokens", "Prod");
	ini_set("expose_php", "Off");
	
	date_default_timezone_set('America/Sao_Paulo');
	
	header('Content-Type: text/html; charset=utf-8');
	header('Content-language: pt-br');
	header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
	header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); 
	header('Pragma: no-cache');
	header('X-Powered-By: SAS');
	
	$_CREATE = true;
	$mysql_con = array();
	$mysql_sel = array();
	
	if(isset($mysql_user_pass)){
		foreach($mysql_user_pass as $k => $v){
			$mysql_con[$k]	= @mysql_connect($mysql_server, $v[0], $v[1], true) or die('<!--Conexão '.$k.'-->');
			$mysql_sel[$k] 	= @mysql_select_db($mysql_db, $mysql_con[$k]) or die('<!--Banco de Dados - '.$k.'-->');
		}
	}
	
	ob_start();