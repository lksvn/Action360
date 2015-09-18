<?php
	include('_includes/header.php');
	include('_includes/menu.php');
?>
<!-- CONTENT -->
<!-- E-COMMERCE -->
<div class="row collapse">
	<div class="ecommerceCall">
		<h1>Venha treinar na Action 360º</h1>
		Funcional ou pilates? Em três passos, escolha o seu plano e a unidade que deseja treinar. </div>
</div>
<div class="row ecommerce">
	<div class="columns medium-4 botMarg">
		<div class="step"> <span>Passo 1</span> Conheça nossas vantagens! </div>
		<div class="buyItem">
			<div class="sobrePack botMarg">A escolha ideal para quem está de passagem pela cidade!</div>
			<div class="clear"></div>
			<div class="untGood"> <img src="assets/img/iconGoods.png" class="left"/> <small class="left">Plano Recorrente</small> </div>
			<div class="descGood"> <span class="price"><small>R$</small> <strong>79</strong>,90</span> </div>
			<div class="clear"></div>
			<div class="small-only-text-justify txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam illum explicabo ipsa dolor sequi unde sapiente ut laboriosam placeat, veniam eum similique voluptas et voluptatum, a magni soluta minus commodi.</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="columns medium-4 withBorder sellGoods botMarg ">
		<div class="step"> <span>Passo 2</span> Escolha a unidade mais próxima! </div>
		<ul class="unidadesLista">
			<li><img src="http://lorempixel.com/300/150/sports" alt=""></li>
			<?php
			$query = 'SELECT * FROM sa_unidades WHERE ativo = "1"';
			$result = mysql_query($query, $mysql_con['read']);

			$i = 0;
			$uni = 0;
			while($dados = mysql_fetch_assoc($result)){
				$ck = array(NULL, NULL);

				if ($i == 0) {
					$ck = array('class="active"', 'checked="checked"');
					$uni = $dados['vindi'];
				}

				echo '
				<li '.$ck[0].'>
					<input id="unidade_'.$i.'" type="radio" name="unidade" class="hide" value="'.unescape($dados['vindi']).'" '.$ck[1].' >
					<label for="unidade_'.$i.'" title="'.unescape($dados['nome']).'">'.unescape($dados['nome']).'</label>
				</li>';
				$i++;
			}
			?>
		</ul>
	</div>
	<div class="columns medium-4 botMarg">
		<div class="step"> <span>Passo 3</span> Cadastre-se ou acesse sua conta e bons treinos! </div>

        <form id="form-cadastro" action="cadastro.php" method="post" class="ajax-form" data-abide="ajax">
			<input type="hidden" id="cad_unidade" name="unidade" value="<?php echo $uni?>" />
          <div>
            <label>
              <input type="text" id="cad_nome" name="nome" placeholder="Nome" required>
            </label>
            <small class="error">Digite o seu nome</small>
          </div>

          <div>
            <label>
              <input type="text" id="cad_email" name="email" placeholder="E-mail" required pattern="email">
            </label>
            <small class="error">Digite o seu e-mail</small>
          </div>

          <div>
            <label>
              <input type="text" id="cad_cpf" name="cpf" placeholder="CPF" class="cpf"  required>
            </label>
            <small class="error">Digite o seu CPF</small>
          </div>

          <div>
            <label>
              <input type="password" id="cad_senha" name="senha" placeholder="Senha" required>
            </label>
            <small class="error">Digite a sua senha</small>
          </div>

		  <div>
            <label>
              <input type="password" id="cad_confsenha" name="confsenha" placeholder="Confirme sua senha" required data-equalto="cad_senha">
            </label>
            <small class="error">Confirme a sua senha</small>
          </div>

          <div>
            <label>
              <input type="text" id="cad_telefone" name="telefone" placeholder="Telefone" class="telefone" required>
            </label>
            <small class="error">Digite o seu telefone</small>
          </div>

		  <div class="form_result topMarg"></div>

          <div class="submits">
            <input type="submit" value="Cadastrar" class="botMarg">
            <a href="javascript:void(0)" class="fbSignIn" id="fb-cad">Cadastro via Facebook</a>
            <span class="or">ou</span>
            <div class="clear"></div>
            <a href="javascript:void(0)" id="btn-cadastrar" title="Entrar" class="signIn">Entrar</a>
          </div>
        </form>
        <form id="form-login" action="login.php" method="post" class="ajax-form hide" data-abide="ajax">
            <div class="submits"> <a href="javascript:void(0)" id="fb-login" class="fbSignIn">Entrar com o Facebook</a> <span class="or">ou</span>
                <div class="clear"></div>
            </div>
            <div>
                <label>
                    <input type="text" id="log_email" name="email" placeholder="E-mail" required pattern="email">
                </label>
                <small class="error">Digite o seu e-mail</small> </div>
            <div>
                <label>
                    <input type="password" id="log_senha" name="senha" placeholder="Senha" required>
                </label>
                <small class="error">Digite a sua senha</small>
            </div>

            <div class="form_result topMarg"></div>

            <div class="submits">
                <a href="javascript:void(0);" data-reveal-id="forgotPass" class="">Esqueci minha senha</a>
                <input type="submit" value="Entrar" class="tpMarg login">
            </div>
        </form>


	</div>
	<div class="clear"></div>
</div>

<?php
	include('_includes/footer.php');