<?php

	require('_includes/conexao.php');
	require('_includes/funcoes.php');

	$json = array(
		'result'	=> FALSE,
		'msg'		=> 'Email e/ou senha inválidos.'
	);

	extract($_POST, EXTR_OVERWRITE);
	
	if(!isset($email) || !validaEmail($email)){	
		$json['msg'] = 'Email inválido.';
	}
	
	if(isset($email) && validaEmail($email) && isset($senha)){

		$query = 'SELECT * FROM sa_cadastros WHERE email = "'.escape($email).'"';
		$result = mysql_query($query, $mysql_con['read']);
		
		//$json['url'] = 'commerce.php';

		if(mysql_num_rows($result) > 0){

			$dados = mysql_fetch_assoc($result);
			
			if($senha == $dados['senha']){
				
				$_SESSION['dados'] = $dados;
				
				$json['result'] = TRUE;
				$json['url'] = 'carrinho.php';
				$json['msg'] = NULL;
			}	
		}

		
	}
	
	if(checaAjax()){
		echo retornoJSON($json);
	} else {
		if(!is_null($url)){
			header('location: '.$url);
		} else {
			header('location: commerce.php');
		}
	}
	