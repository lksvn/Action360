	<!-- FOOTER -->
	<div class="row">
		<div class="footer">
			<div class="columns medium-6 botMarg"> <strong class="title">Nossas Unidades </strong>
				<ul class="address">
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
					<li><strong>Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</li>
				</ul>
			</div>
			<div class="columns medium-3"> <strong class="title">Fale com a gente</strong>
				<div class="address"> <strong class="mt">Nome da Unidade</strong> endereço da unidade <br/>
						Tel.: (99) 9999-9999</div>
				<div class="clear"></div>
				<strong class="title mt">Seja um Franqueado</strong>
				<div class="address"> <strong class="mt">nome da unidade</strong> endereço da unidade <br/>
					Tel.: (99) 9999-9999 </div>
			</div>
			<div class="columns medium-3 workTime"> <strong class="title">Horário <br/> de Funcionamento</strong>
				<ul>
					<li>Segunda à Sexta: 6h às 22h</li>
					<li>Sábados: 6h às 13h</li>
					<li>Feriados: 6h às 13h</li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<script src="assets/js/vendor/jquery.js"></script>
	<script src="assets/js/foundation.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/jquery.maskedinput.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/jquery.form.js"></script>

	<!--[if (IE 9)|(IE 10)]>
    <script src="assets/js/jquery.placeholder.min.js"></script>
    <script type="text/javascript">
      $('input, textarea, password').placeholder();
      $('textarea[maxlength]').keyup(function(){
        var text = $(this).val();
        var limit = $(this).attr('maxlength');
        if(text.length > limit){
            $(this).val(text.substr(0, limit));
        }
      });
    </script>
    <![endif]-->
	<?php

	if(isset($index)){
		echo '<script src="assets/js/outdatedbrowser.min.js"></script>';
	}
	?>

</body>
</html>

<?php
	$_HTML = ob_get_contents();
	ob_end_clean();

	echo $_HTML;

foreach($mysql_user_pass as $k => $v){
	if(isset($mysql_con[$k])){
		@mysql_close($mysql_con[$k]);
	}
}