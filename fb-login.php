<?php

	require('_includes/conexao.php');
	require('_includes/funcoes.php');

	$json = array(
		'result'	=> false,
		'url'		=> NULL
	);
	
	if(isset($_POST['u'])){
		
		$u = $_POST['u'];
		
		$query = 'SELECT * FROM sa_cadastros WHERE fb_id = "'.escape($u['id']).'"';
		$result = mysql_query($query, $mysql_con['read']);
		
		if(mysql_num_rows($result) > 0 && $_POST['login'] == true){
			
			//$json['url'] = 'painel.php';
			
		} else {
			
			$query = 'INSERT INTO sa_cadastros (`data`, ip, imagem, email, sexo, fb_id, link, nome, slug) VALUES 
			('.time().', "'.$_SERVER['REMOTE_ADDR'].'", "'.escape($_POST['imagem']).'", "'.escape($u['email']).'", "'.escape($u['gender']).'", "'.escape($u['id']).'", "'.escape($u['link']).'", 
			"'.escape($u['name']).'", "'.slug($u['name']).'")';
			$result = mysql_query($query, $mysql_con['read']); 
			
			$query = 'SELECT * FROM sa_cadastros WHERE id = "'.mysql_insert_id($mysql_con['read']).'"';
			$result = mysql_query($query, $mysql_con['read']);
			
			//$json['url'] = 'pagamento.php';
		}
		
		$dados = mysql_fetch_assoc($result);	
		
		$_SESSION['dados'] = $dados;
		
		$json['result'] = true;
	}
	
	if(checaAjax()){
		echo retornoJSON($json);
	} else {
		if(!is_null($url)){
			header('location: '.$url);
		} else {
			header('location: index.php');
		}
	}