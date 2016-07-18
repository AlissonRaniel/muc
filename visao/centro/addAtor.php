<?php

require_once('visao/classes/VisaoAtor.php');

	$visaoAtor = new VisaoAtor();
	
	$visaoAtor->cadastrarAtor();
	$ator = $visaoAtor->atualizarAtor();
	
	

?>
<div class="form-add">
	<form class="form-horizontal" name="formAtor" role="form" method="post">
		<fieldset>
			<legend>CADASTRO DE ATORES</legend>
			<input type="text" name="nomeAtor" class="form-control" placeholder="Nome" value="<?php echo($ator->getNome())? $ator->getNome(): ""; ?>" required autofocus>		 
			<input type="hidden" name="cadastraAtor" value="ok" />
			<input type="hidden" name="idAtor" value="<?php echo($ator->getId())? $ator->getId(): ""; ?>" />
			 <div class="control-group">
				<label class="control-label" for="submit"></label>
				<div class="controls">
					<button  class="btn btn-large btn-block btn-primary" onclick="validaNomeAtor();" type="button">Cadastrar</button>
				</div>
			 </div>
		</fieldset>
	</form>
</div>