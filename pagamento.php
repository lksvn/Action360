<?php
	
	require('_includes/conexao.php');
	require('_includes/funcoes.php');

	/*
	- KEY
		IVdHhjmOcJvCAArRLlie_IPYs31uYSgf
	
	- DOCUMENTACAO
		http://vindi.github.io/api-docs/dist/
		
		http://atendimento.vindi.com.br/hc/pt-br/articles/203020644-Introdu%C3%A7%C3%A3o-%C3%A0-API-de-Recorr%C3%AAncia
		http://atendimento.vindi.com.br/hc/pt-br/articles/203051744
		http://atendimento.vindi.com.br/hc/pt-br/articles/208756888
		http://atendimento.vindi.com.br/hc/pt-br/articles/204163150
		
		
		http://vindi.github.io/api-docs/dist/#!/plans/GET_version_plans_format
	
	- FLUXO
		customers > payment_profiles > subscriptions > product_itens > bill_items > bills > charges > transactions
		
		customers > subscriptions > periods > bills > charges > transactions
	
	- METODOS DO FLUXO
	
		USUARIOS: customers
	{
	"name": "TESTE",
	"email": "",
	"registry_code": "",
	"code": "",
	"notes": "",
	"metadata": {},
	"address": {
			"street": "",
			"number": "",
			"additional_details": "",
			"zipcode": "",
			"neighborhood": "",
			"city": "",
			"state": "",
			"country": ""
		}
	}
	
	PERFIL: payment_profiles
	{
		"holder_name": "",
		"registry_code": "",
		"bank_branch": "",
		"bank_account": "",
		"card_expiration": "",
		"card_number": "",
		"card_cvv": "",
		"payment_method_code": "",
		"payment_company_code": "",
		"customer_id": 0
	}
	
	ASSINATURAS: subscriptions
	{
		"start_at": "",
		"plan_id": 0,
		"customer_id": 0,
		"code": "",
		"payment_method_code": "",
		"billing_trigger_type": "",
		"billing_trigger_day": 0,
		"billing_cycles": 0,
		"metadata": {},
		"product_items": [
			{
				"product_id": 0,
				"cycles": 0,
				"quantity": 0,
				"pricing_schema": {
				"price": 0,
				"minimum_price": 0,
				"schema_type": "",
				"pricing_ranges": [
					{
						"start_quantity": 0,
						"end_quantity": 0,
						"price": 0,
						"overage_price": 0
					}
				]
			},
				"discounts": [
					{
						"discount_type": "",
						"percentage": 0,
						"amount": 0,
						"quantity": 0,
						"cycles": 0
					}
				]
			}
		]
	}
	
	ITEM DO PRODUTO: product_itens
	{
	"product_id": 0,
	"subscription_id": 0,
	"cycles": 0,
	"quantity": 0,
	"pricing_schema": {
		"price": 0,
		"minimum_price": 0,
		"schema_type": "",
		"pricing_ranges": [
			{
			"start_quantity": 0,
			"end_quantity": 0,
			"price": 0,
			"overage_price": 0
			}
		]
		}
	}
	
	ITEM DA FATURA : bill_items
	
	FATURA: bills
	
	COBRANÇA: charges
	
	TRANSAÇÕES: transactions
	
	- METODOS EXTRAS
	
		PRODUTOS: products
		METODOS DE PAGAMENTO: payment_methods
		PLANOS: plans
	*/
	
	$test = FALSE;
	
	$json_r = array(
		'result' => FALSE,
		'msg' 	=> NULL
	);
	
	function curl($json = NULL, $page){
		
		$key = 'IVdHhjmOcJvCAArRLlie_IPYs31uYSgf';
		$credentials = $key.':';

		$url = 'https://app.vindi.com.br/api/v1/'.$page;
		
		$headers = array( 
			"Content-type: application/json", 
			"Accept: application/json; charset=UTF-8", 
			"Authorization: Basic " . base64_encode($credentials) 
		); 
			   
		$ch = curl_init(); 
		
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
		
		if(!is_null($json)){
			curl_setopt($ch, CURLOPT_POST, 1); 
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json); 
		}
	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
		$data = curl_exec($ch); 
		$data = json_decode($data, true);	
	
		if (curl_errno($ch)) { 
			print "Error: " . curl_error($ch);
			curl_close($ch);  
		} else { 
			return $data;
			//var_dump($data); 
		   //	echo '<br>___<br><pre>'.print_r($data, true);
		} 
		
	}
	$vindi = array(
		3445 => array(
			'name'		=> 'Aclimação',
			'product_id'=> 6203,
			'plan_id' 	=> 3445
		),
		3446 => array(
			'name'		=> 'Campo Belo',
			'product_id'=> 6203,
			'plan_id' 	=> 3446
		),
		3447 => array(
			'name'		=> 'Moema',
			'product_id'=> 6203,
			'plan_id' 	=> 3447
		),
		3448 => array(
			'name'		=> 'Oscar Freire',
			'product_id'=> 6203,
			'plan_id' 	=> 3448
		),
		3428 => array(
			'name'		=> 'Saúde',
			'product_id'=> 6203,
			'plan_id' 	=> 3428
		),
		3449 => array(
			'name'		=> 'Tatuapé',
			'product_id'=> 6203,
			'plan_id' 	=> 3449
		)
	);
	
	# ===========================
	if($test){
		$customer = array(
			'email' 		=> 'joao+1441825671@sorocabacom.com', //joao+1441825671@sorocabacom.com | joao+1441825787@sorocabacom.com | joao+1441832442@sorocabacom.com
			'name' 			=> 'João Muchon',
			'registry_code' => '68449945759' //CPF 68449945755
		);
		
		$payment = array(
			'holder_name'		=> 'JOAO M',
			'card_expiration' 	=> '12/2018',
			'card_number' 	=> '5555555555555557',			//VALIDO
			//'card_number' 		=> '5412955684522630', 	//INVALIDO
			'card_cvv' 			=> '888'
		);
		
		$plano = 3445;
	} else {
		$s = $_SESSION['dados'];
		
		$cpf = str_replace(array('-', '.', ''), '', $s['cpf']);
		$cartao = str_replace(array('-', '.', ''), '', $_POST['cartao_numero']);
		
		$customer = array(
			'email' 		=> unescape($s['email']),
			'name' 			=> unescape($s['nome']),
			'registry_code' => $cpf
		);
		
		$payment = array(
			'holder_name'		=> $_POST['cartao_nome'],
			'card_expiration' 	=> $_POST['cartao_validade'],
			'card_number' 		=> $cartao,
			'card_cvv' 			=> $_POST['cartao_cvv']
		);
		
		$plano = $s['unidade'];
	}
	
		
	# ===========================
	# PROCURA USUÁRIO POR EMAIL OU CPF
	
	$query 	= '(email='.$customer['email'].' OR registry_code='.$customer['registry_code'].')';
	$query 	= urlencode($query);
	$data 	= curl(NULL, 'customers?query='.$query);
	
	if(isset($data['customers'][0]['id'])){
		$customer_id = $data['customers'][0]['id'];
	} else {
		$json = '
		{
			"name"	: "'.$customer['name'].'",
			"email"	: "'.$customer['email'].'"
		}';
		$data = curl($json, 'customers');	
		$customer_id = $data['customer']['id'];
	}
	
	# ===========================
	# PROCURA MEIOS DE PAGAMENTO DO USUÁRIO CADASTRADO
	
	$query 	= 'customer_id='.$customer_id;
	$query 	= urlencode($query);
	$data 	= curl(NULL, 'payment_profiles?query='.$query);
		
	if(isset($data['payment_profiles'][0]['id'])){
		$payment_id = $data['payment_profiles'][0]['id'];
	} else {
		$json = '
		{
			"holder_name"		: "'. $payment['holder_name'] .'",
			"card_expiration"	: "'. $payment['card_expiration'] .'",
			"card_number"		: "'. $payment['card_number'] .'",
			"card_cvv"			: "'.$payment['card_cvv'].'",
			"payment_method_code": "credit_card",
			"customer_id"		: '. $customer_id .'
		}';
		$data = curl($json, 'payment_profiles');
		$payment_id = $data['payment_profile']['id'];
	}
	
	# ===========================
	# PROCURA POR ASSINATURAS DO USUÁRIO CADASTRADO
	
	//$query 	= 'customer_id='.$customer_id;
	//$query 	= urlencode($query);
	//$data 	= curl(NULL, 'subscriptions?query='.$query);
	
	//$create_bill = false;
	//if(isset($data['subscriptions'][0]['id'])){
		
	//} else {
		$json = '
		{
			"plan_id"			: '. $vindi[$plano]['plan_id'] .',
			"customer_id"		: '. $customer_id .',
			"payment_method_code": "credit_card",
			"product_items"		: [{
				"product_id"	: '. $vindi[$plano]['product_id'] .' 
			}]
		}';
		
		$data = curl($json, 'subscriptions');
		if($data['bill']['status'] == 'pending' && $data['bill']['charges'][0]['last_transaction']['status'] == 'rejected'){
			$json_r['msg'] = $data['bill']['charges'][0]['last_transaction']['gateway_message'];	
		}else {
			$_SESSION['dados']['painel'] = true;
			
			$json_r['result'] = TRUE;
			$json_r['msg'] = 'Pagamento efetuado com sucesso. Redirecionando...';
			$json_r['url'] = 'painel.php';
		}
		
	//}
	
	/*
	# ===========================
	# PROCURA POR BILLS DO USUÁRIO CADASTRADO
	
	if(!$create_bill){
		$query 	= 'customer_id='.$customer_id;
		$query 	= urlencode($query);
		$data 	= curl(NULL, 'bills?query='.$query);	

		echo '<hr /><pre>'.print_r($data, true).'</pre>';
	}
	*/
	
	if(checaAjax()){
		echo retornoJSON($json_r);
	} else {
		if(!is_null($url)){
			header('location: '.$url);
		} else {
			header('location: commerce.php');
		}
	}
	
	