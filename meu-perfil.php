<?php
    include('_includes/header.php');
    include('_includes/menu.php');
?>

<div class="row myProfile">
    <div class="title">Meu Perfil</div>
    <div class="columns small-12 medium-6 botMarg">
        <form action="#" method="post" id="myProfileChanges" data-abide>
        <!-- E-MAIL -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="email" class="small-only-text-left text-right">E-mail:</label>
                </div>
                <div class="small-12 medium-9 columns">
                    <input tabindex="1" type="text" id="email" name="email" value="lucas@sorocabacom.com.br" required pattern="email">
                    <small class="error">Digite o e-mail corretamente</small>
                </div>
            </div>
        <!-- PASSWORD -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="pass" class="small-only-text-left text-right">Senha:</label>
                </div>
                <div class="small-12 medium-9 columns">
                    <input tabindex="2" type="password" id="pass" name="pass">
                    <small class="error">Senha incorreta</small>
                </div>
            </div>
        <!-- NEW PASSWORD -->
            <div class="row">
                <div class="small-12 medium-3 columns lineFix">
                    <label for="newPass" class="small-only-text-left text-right lineFix">Nova Senha:</label>
                </div>
                <div class="small-12 medium-9 columns">
                    <input tabindex="3" type="password" id="newPass" name="">
                </div>
            </div>
        <!-- SUBMIT BUTTON -->
            <div class="row">
                <div class="medium-12 columns">
                    <input tabindex="4" type="submit" class="right" value="Salvar Alterações">
                </div>
            </div>
        </form>
    </div>
    <!-- CHOSE PLAN -->
    <div class="columns small-12 medium-6 chosePlan">
        <div class="step"> <span class="m">Plano Recorrente</span> <span>R$ 79,90 <br> <small>Mensal</small></span> </div>
        <div class="clear"></div>
        <a href="javascript:void(0);" class="deactivate right topMarg"><strong>Encerrar conta</strong></a>

        <div class="alert-box alert">
          Deseja realmente desativar a sua conta?
          <br>
          <a href="#" title="Desativar a conta" class="left">Sim</a>
          <a href="#" title="Não desativar a conta" class="left nope">Não</a>
          <a href="javascript:void(0);" class="close" title="Fechar">&times;</a>
        </div>

    </div>

<div class="clear"></div>

    <div class="title">Dados Cadastrais</div>
    <div class="columns small-12 medium-9 medium-offset-1">
        <form action="#" method="post" id="myProfileInfo" data-abide>
        <!-- NAME -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="nome" class="small-only-text-left text-right">Nome:</label>
                </div>
                <div class="small-12 medium-9 columns">
                    <input tabindex="5" type="text" class="left" id="nome" name="nome" required="" pattern="alpha">
                    <small class="error">Por favor, digite o seu nome</small>
                </div>
            </div>
        <!-- CPF -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="cpf" class="small-only-text-left text-right">CPF:</label>
                </div>
                <div class="small-12  medium-9  columns">
                    <input tabindex="6" type="text" class="left cpf" id="cpf" name="cpf" required="">
                    <small class="error">Por favor, digite o seu CPF</small>
                </div>
            </div>
        <!-- PHONE -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="telefone" class="small-only-text-left text-right">Telefone:</label>
                </div>
                <div class="small-12  medium-9  columns">
                    <input tabindex="7" type="text" class="left telefone" id="telefone" name="telefone" required="">
                    <small class="error">Por favor, digite o seu telefone</small>
                 </div>
            </div>
        <!-- CEP -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="cep" class="small-only-text-left text-right">CEP:</label>
                </div>
                <div class="small-12  medium-9  columns">
                    <input tabindex="8" type="text" class="left cep" id="cep" name="cep" required="">
                    <small class="error">Por favor, digite o seu CEP</small>
                 </div>
            </div>
        <!-- STREET -->
            <div class="row">
                <div class="small-12 medium-3 columns">
                    <label for="rua" class="small-only-text-left text-right">Rua:</label>
                </div>
                <div class="small-12 medium-6 columns">
                    <input tabindex="9" type="text" class="left" id="rua" name="rua" required="">
                    <small class="error">Por favor, digite a sua rua</small>
                </div>
        <!-- NUMBER -->
                <div class="small-12 medium-1 columns">
                    <label for="numero" class="small-only-text-left text-right">Nº:</label>
                </div>
                <div class="small-12 medium-2 columns end">
                    <input tabindex="10" type="text" id="numero" name="numero" required>
                    <small class="error">Por favor, digite o número</small>
                </div>
            </div>
            <div class="row">
        <!-- COMPLEMENT -->
                <div class="small-12 medium-3 columns">
                    <label for="complemento" class="small-only-text-left text-right">Complemento:</label>
                </div>
                <div class="small-12 medium-4 columns">
                    <input tabindex="11" type="text" id="complemento" name="complemento">
                </div>
        <!-- NEIGHBORHOOD -->
                <div class="small-12 medium-1 columns">
                    <label for="bairro" class="small-only-text-left text-right">Bairro:</label>
                </div>
                <div class="small-12 medium-4 columns">
                    <input tabindex="13" type="text" id="bairro" name="bairro" required="">
                    <small class="error">Por favor, digite o seu bairro</small>
                </div>
            </div>

            <div class="row">
        <!-- CITY -->
                <div class="small-12 medium-3 columns">
                    <label for="cidade" class="small-only-text-left text-right">Cidade:</label>
                </div>
                <div class="small-12 medium-4 columns">
                    <input tabindex="12" type="text" id="cidade" name="cidade" required="">
                    <small class="error">Por favor, digite a sua cidade</small>
                </div>
        <!-- STATE -->
                <div class="small-12 medium-1 columns">
                    <label for="uf" class="small-only-text-left text-right">UF:</label>
                </div>
                <div class="small-12 medium-4 columns">
                    <input tabindex="14" type="text" id="uf" name="uf" required="">
                    <small class="error">Por favor, digite o seu estado</small>
                </div>
            </div>
        <!-- SUBMIT BUTTON -->
            <div class="row">
                <div class="columns medium-12">
                    <input tabindex="15" type="submit" class="right botMarg" value="Salvar Alterações">
                </div>
            </div>
        </form>
    </div>

<div class="clear"></div>

    <div class="title">Dados de Pagamento</div>

    <div class="columns small-12 medium-9 medium-offset-1">
        <form action="#" method="post" id="paymentInfo" data-abide>
            <div class="row">
        <!-- CARD NUMBER -->
                <div class="columns small-12 medium-3">
                    <label for="pag_numero" class="small-only-text-left text-right lineFix">Número do Cartão:</label>
                </div>
                <div class="columns small-12 medium-9">
                    <input tabindex="16" type="text" class="left" id="pag_numero" name="cardNumber" required>
                    <small class="error">Por favor, digite o númedo do cartão</small>
                </div>
        <!-- CARD NAME -->
                <div class="columns small-12 medium-3">
                    <label for="titular" class="small-only-text-left text-right lineFix">Nome do Titular:</label>
                </div>
                <div class="columns small-12 medium-9">
                    <input tabindex="17" type="text" class="left" id="titular" name="titular" required pattern="alpha">
                    <small class="error">Por favor, digite o nome do titular</small>
                </div>
        <!-- DATE -->
                <div class="columns small-12 medium-3">
                    <label for="pag_data" class="small-only-text-left text-right lineFix">Data de Validade:</label>
                </div>
                <div class="columns small-12 medium-4">
                    <input tabindex="18" type="text" class="left" id="pag_data" name="pag_data" required>
                    <small class="error">Por favor, digite a data de validade</small>
                </div>
        <!-- CVV -->
                <div class="columns small-12 medium-3">
                    <label for="pag_cod" class="small-only-text-left text-right lineFix">Cód. de Segurança:</label>
                </div>
                <div class="columns small-12 medium-2">
                    <input tabindex="19" type="text" class="left" id="pag_cod" name="pag_cod" required>
                    <small class="error">Por favor, digite o cód. de segurança</small>
                </div>
            </div>
        <!-- SUBMIT BUTTON -->
            <div class="row">
                <div class="columns medium-12">
                    <input tabindex="20" type="submit" class="right botMarg" value="Atualizar">
                </div>
            </div>
        </form>
    </div>


</div>
<?php
    include('_includes/footer.php');
?>