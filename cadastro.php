<?php

	require('_includes/conexao.php');
	require('_includes/funcoes.php');

	$json = array(
		'result'	=> FALSE,
		'msg'		=> 'Email inválido.'
	);
		
	extract($_POST, EXTR_OVERWRITE);
	
	if(!isset($email) || !validaEmail($email)){	
		$json['msg'] = 'Email inválido.';
	}
	
	if(isset($email) && validaEmail($email) && isset($senha)){
		
		$unidade = (int)$unidade;
		
		if(isset($fb_id)){
			$query = 'SELECT * FROM sa_cadastros WHERE fb_id = "'.escape($fb_id).'"';
			$result = mysql_query($query, $mysql_con['read']);
			
			if(mysql_num_rows($result) > 0){
				$query = 'UPDATE sa_cadastros SET unidade = "'.escape($unidade).'", email = "'.escape($email).'", senha = "'.md5($senha).'", telefone = "'.escape($telefone).'", cpf = "'.escape($cpf).'" 
				WHERE fb_id = "'.escape($fb_id).'"';
				$result = mysql_query($query, $mysql_con['read']);
				
				$query = 'SELECT * FROM sa_cadastros WHERE fb_id = "'.escape($fb_id).'"';
				$result = mysql_query($query, $mysql_con['read']);
				
				$dados = mysql_fetch_assoc($result);
				$_SESSION['dados'] = $dados;
			
				$json['result'] = TRUE;
				$json['url'] = 'carrinho.php';
				$json['msg'] = 'Cadastro atualizado com sucesso. Redirecionando...';
			}
		
		} else {
		
			$query = 'SELECT * FROM sa_cadastros WHERE email = "'.escape($email).'"';	
			$result = mysql_query($query, $mysql_con['read']);
		
			if(mysql_num_rows($result) == 0){

				$query = 'INSERT INTO sa_cadastros 
				(`data`, ip, nome, email, senha, cpf, telefone, unidade) 
				VALUES
				('.time().', "'.$_SERVER['REMOTE_ADDR'].'", "'.escape($nome).'", "'.escape($email).'", "'.escape($senha).'", "'.escape($cpf).'", "'.escape($telefone).'", "'.escape($unidade).'")';
				$result = mysql_query($query, $mysql_con['read']);
				
				$query = 'SELECT * FROM sa_cadastros WHERE id = "'.mysql_insert_id($mysql_con['read']).'"';
				$result = mysql_query($query, $mysql_con['read']);
				
				$dados = mysql_fetch_assoc($result);
				$_SESSION['dados'] = $dados;
				$_SESSION['dados']['unidade'] = $unidade;
				
				$json['result'] = TRUE;
				$json['url'] = 'carrinho.php';
				$json['msg'] = 'Cadastro efetuado com sucesso. Redirecionando...';
			
			} else{
				
				$json['msg'] = 'Email já cadastrado.';
				
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
	