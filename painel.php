<?php 
	include('_includes/header.php');
	include('_includes/menu.php');
	
	if(!isset($_SESSION['dados']['painel'])){
		header('location: commerce.php');
		die;	
	}

?>
<!-- CONTENT --> 
<!-- E-COMMERCE -->
<div class="row collapse">
	<div class="ecommerceCall">
		<h1>Venha treinar na Action 360º</h1>
		Funcional ou pilates? Em três passos, escolha o seu plano e a unidade que deseja treinar. 
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
		<div class="carrinho_titulo">
			Assinatura concluída com sucesso
		</div>
		
		<table class="carrino_table">
			<thead>
				<tr>
					<th class="small-12 medium-3 carrinho_th">Academia</th>
					<th class="small-12 medium-7 carrinho_th">Descrição do Plano</th>
					<th class="small-12 medium-2 carrinho_th">Valor</th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td class="carrinho_td">
						<?php 
						$query = 'SELECT * FROM sa_unidades WHERE vindi = "'.escape($_SESSION['dados']['unidade']).'"';
						$result = mysql_query($query, $mysql_con['read']);
						if(mysql_num_rows($result) == 0){
							echo 'Nenhuma unidade escolhida';	
						} else {
							$dados = mysql_fetch_assoc($result);
							
							echo unescape($dados['nome']);
						}
						
						?>
					</td>
					
					<td class="carrinho_td">
						<strong>Lorem ipsum dolor sit amet</strong><br>						
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam illum explicabo ipsa dolor sequi unde sapiente ut laboriosam placeat, veniam eum similique voluptas et voluptatum, a magni soluta minus commodi.
					</td>
					<td class="carrinho_td">
						<strong>R$ 79,90</strong> / mês
					</td>
				
					
				</tr>
			</tbody>
		
		</table>
		
	</div>
	
	
</div>

<?php 
	include('_includes/footer.php');