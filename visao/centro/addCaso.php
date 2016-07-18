<?php

require_once('visao/classes/VisaoCasoDeUso.php');

	$visaoCasoDeUso = new VisaoCasoDeUso();	
	$visaoCasoDeUso->cadastrarCasoDeUso();
	
	$casoDeUso = $visaoCasoDeUso->atualizarCasoDeUso();
	
?>

<div class="form-add">
	<form class="form-horizontal" name="formCasoDeUso" method="post">
		<fieldset>
		<legend>CADASTRAR CASOS DE USO</legend>
		<div class="control-group">
		  <div class="controls">
			<input type="hidden" name="idCasoDeUso" value="<?php echo($casoDeUso->__get("idCasoDeUso"))? $casoDeUso->__get("idCasoDeUso"): ""; ?>" />
			<input name="nomeCasoDeUso" type="text" class="form-control" placeholder="Nome" value="<?php echo($casoDeUso->__get("nome"))? $casoDeUso->__get("nome"): ""; ?>" required autofocus>	
		  </div>
		</div>
		<br/>
		<div class="control-group">			
			<label class="control-label" for="ator">Ator:</label>
			<div class="controls">
				<?php 
					$visaoCasoDeUso->listarOpcoesDeAtores(json_decode($casoDeUso->__get("atores")));
				?>
			</div>
		</div>
		<br/>
		<br/>
		<br/>
		<div class="control-group">
		  <div class="controls">                     
			<textarea id="descricao" class="form-control" placeholder="Descri&ccedil;&atilde;o" name="descricao" required><?php echo($casoDeUso->__get("descricao"))? $casoDeUso->__get("descricao"): ""; ?></textarea>
		  </div>
		</div>
		<br/>
		<div class="control-group">
		  <div class="controls">                     
			<textarea id="precondicao" class="form-control" name="precondicao" placeholder="Pr&eacute;-Condi&ccedil;&atilde;o"><?php echo($casoDeUso->__get("preCondicao"))? $casoDeUso->__get("preCondicao"): ""; ?></textarea>
		  </div>
		</div>
		<br/>
		<div class="control-group">
		  <div class="controls">                     
			<textarea id="poscondicao" class="form-control" name="poscondicao" placeholder="P&oacute;s-Condi&ccedil;&atilde;o"><?php echo($casoDeUso->__get("posCondicao"))? $casoDeUso->__get("posCondicao"): ""; ?></textarea>
		  </div>
		</div>
		<br/>
		<br/>
		<legend>PASSOS:</legend>
		<table id="table-cdu" class="table table-striped">
			<thead>
			  <tr>
				<th>#</th>
				<th>USU&Aacute;RIO</th>
				<th>SISTEMA</th>
				<th>A&ccedil;&Atilde;O</th>
			  </tr>
			</thead>
			<tbody>
				<?php
					$visaoCasoDeUso->mostrarPassos();
				?>
			</tbody>
		</table>
		<input type="hidden" name="cadastraCaso" value="ok" />
		<div class="control-group">
		  <label class="control-label" for="submit"></label>
		  <div class="controls">
			  <button id="submit" name="button" type="submit" onsubmit="validaCamposCasosDeUso();" class="btn btn-large btn-block btn-primary">Cadastrar</button>
		  </div>
		</div>
		</fieldset>
		<input name="old_nomeCasoDeUso" type="hidden" value="<?php echo($casoDeUso->__get("nome"))? $casoDeUso->__get("nome"): ""; ?>" >	
		<input name="old_descricao" type="hidden" value="<?php echo($casoDeUso->__get("descricao"))? $casoDeUso->__get("descricao"): ""; ?>" >	
		<input name="old_precondicao" type="hidden" value="<?php echo($casoDeUso->__get("preCondicao"))? $casoDeUso->__get("preCondicao"): ""; ?>" >	
		<input name="old_poscondicao" type="hidden" value="<?php echo($casoDeUso->__get("posCondicao"))? $casoDeUso->__get("posCondicao"): ""; ?>" >	
	</form>
</div>
