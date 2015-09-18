<?php 
	include('_includes/header.php');
	include('_includes/menu.php');
	
	if(!isset($_SESSION['dados'])){
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
			Carrinho
		</div>
		
		<table class="carrino_table">
			<thead>
				<tr>
					<th class="small-12 medium-3 carrinho_th">Academia</th>
					<th class="small-12 medium-7 carrinho_th">Descrição do Plano</th>
					<th class="small-12 medium-2 carrinho_th">Valor</th>
				</tr>
			</thead>
			
			<tfoot>
				<tr>
					<td class="carrinho_th">
						Total
					</td>
					<td></td>
					<td class="carrinho_th">
						R$ 79,90
					</td>
				</tr>
			</tfoot>
			
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
		
		<div class="carrinho_titulo">
			Forma de Pagamento
		</div>
		
		<div class="row">
			<div class="small-12 medium-11 columns">
				<form action="pagamento.php" method="post" data-abide="ajax" id="form-pagamento" class="ajax-form">
				<div class="carrinho_border">
				
					<div class="row"> 
						<div class="small-12 medium-3 columns text-right">
							<label for="pag_nome" class="inline pag_label">Nome do titular</label>
							
						</div>
						<div class="small-12 medium-4 end columns">
							<input type="text" name="cartao_nome" id="pag_nome" placeholder="CARLOS ALBERTO DA SILVA" required />
							<small class="error">Digite o nome impresso no cartão</small>
						</div>
						
						<div class="small-12 medium-3 columns text-right">
							<label for="pag_data" class="inline pag_label">Data de Validade</label>
						</div>
						
						<div class="small-12 medium-2 columns">
							<input type="text" name="cartao_validade" id="pag_data" placeholder="99/9999" maxlength="5" required />
							<small class="error">Digite a data de validade</small>
						</div>
					</div>
					
					<div class="row">
						<div class="small-12 medium-3 columns text-right">
							<label for="pag_numero" class="inline pag_label">Número do cartão</label>
						</div>
						<div class="small-12 medium-4 end columns">
							<input type="text" class="cartao" name="cartao_numero" placeholder="9999 9999 9999 9999" id="pag_numero" maxlength="20" required />
							<small class="error">Digite o número do cartão</small>
						</div>
						
						
						<div class="small-12 medium-3 columns text-right">
							<label for="pag_cod" class="inline pag_label">Código de Segurança</label>
						</div>
						
						<div class="small-12 medium-2 columns end">
							<input type="text" name="cartao_cvv" id="pag_cod" placeholder="999" required />
							<small class="error">Digite o código de segurança</small>
						</div>
					</div>
					
					<div class="form_result topMarg"></div>

					<div class="row">
						<div class="small-12 medium-2 right columns">
							<button type="submit" class="btn expand tiny">PAGAR</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	
	</div>
	
	
</div>

<?php 
	include('_includes/footer.php');