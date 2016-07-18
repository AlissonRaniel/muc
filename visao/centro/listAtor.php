<?php

require_once('visao/classes/VisaoAtor.php');

	$visaoAtor = new VisaoAtor();	
	$visaoAtor->mostraMensagemAtor();
	
?>
<legend>LISTA DE ATORES</legend>

<table class="table table-striped">
	<thead>
	  <tr>
		<th>#</th>
		<th>NOME</th>
		<th>A&Ccedil;&Atilde;O</th>
	  </tr>
	</thead>
	<tbody>
	<?php 	
		$visaoAtor->listarAtores();
	?>
	</tbody>
</table>
<form name="excluirAtor" method="post">
	<input type="hidden" name="idAtor" />
	<input type="hidden" name="nomeAtor" />
	<input type="hidden" name="excluiAtor" value="ok"/>
</form>

<form name="edicaoAtor" method="post" action="index.php?page=1">
	<input type="hidden" name="idAtor" />
</form>