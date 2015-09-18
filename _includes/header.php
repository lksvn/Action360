<?php

	require('_includes/conexao.php');
	require('_includes/funcoes.php');

?><!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Action 360º | Página Inicial</title>
    <link rel="stylesheet" href="assets/css/foundation.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/mobile.css" />
    <link rel="stylesheet" href="assets/css/slick.css"/>
    <script src="assets/js/vendor/modernizr.js"></script>

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
    <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <![endif]-->
	<?php
	if(isset($index)){
	?>
		<script type="text/javascript">
		  //event listener form DOM ready
		  function addLoadEvent(func) {
			  var oldonload = window.onload;
			  if (typeof window.onload != 'function') {
				  window.onload = func;
			  } else {
				  window.onload = function() {
					  if (oldonload) {
						  oldonload();
					  }
					  func();
				  }
			  }
		  }
		  //call function after DOM ready
		  addLoadEvent(function(){
			  outdatedBrowser({
				  bgColor: '#f25648',
				  color: '#ffffff',
				  lowerThan: 'transform',
				  languagePath: 'assets/br.html'
			  })
		  });
		</script>
		<?php
	}
	?>
</head>
<body>
	<!-- HEADER -->

	<div id="outdated"></div>

	<div class="row header">
		<a href="#" class="loginCall right" data-reveal-id="loginModal">Login</a>

		<!-- LOGIN MODAL -->
		<div id="loginModal" class="reveal-modal custom" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<h2 class="modaltitle">Login</h2>
			<div class="submits">
				<a href="#" class="fbSignIn">Entrar com o Facebook</a> <span class="or">ou</span>
				<div class="clear"></div>
			</div>

			<form action="" method="post" data-abide>
				<div>
					<label>
						<input type="text" id="email" name="" placeholder="E-mail" required pattern="email">
					</label>
					<small class="error">Digite o seu e-mail</small>
				</div>

				<div>
					<label>
						<input type="password" id="senha" name="" placeholder="Senha" required>
					</label>
					<small class="error">Digite a sua senha</small>
				</div>

				<div class="submits">
					<a href="javascript:void(0);" data-reveal-id="forgotPass" class="">Esqueci minha senha</a>
					<input type="submit" value="Entrar" class="tpMarg login">
					<div class="clear"></div>
					<a href="commerce.php" title="Não sou cadastrado" class="signIn">Não sou cadastrado</a>
				</div>
			</form>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>

		<!-- FORGOT PASSWORD MODAL -->
		<div id="forgotPass" class="reveal-modal custom" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<h2 class="modaltitle">Esqueci minha senha</h2>

			<form action="" method="post" data-abide>
				<div>
					<label>
						<input type="text" id="email" name="" placeholder="E-mail" required pattern="email">
					</label>
					<small class="error">Digite o seu e-mail</small>
				</div>

				<div class="submits">
					<input type="submit" value="Enviar" class="botMarg login">
				</div>
			</form>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>

		<div class="columns medium-6">
			<a href="index.php" title="Action 360º"><img src="assets/img/logo.png" alt="Action 360º"></a>
		</div>

		<div class="columns medium-6">
			<ul class="inline-list socialList">
				<li><a href="#" class="socialIco insta tip-top" title="Acesse nosso Instagram" data-tooltip aria-haspopup="true" data-options="show_on:large"></a></li>
				<li><a href="#" class="socialIco fb tip-top" title="Curta-nos no Facebook" data-tooltip aria-haspopup="true" data-options="show_on:large"></a></li>
				<li><a href="#" class="socialIco tw tip-top" title="Siga-nos no Twitter" data-tooltip aria-haspopup="true" data-options="show_on:large"></a></li>
			</ul>
		</div>
	</div>
