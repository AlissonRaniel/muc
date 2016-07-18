<?php 

	require_once('visao/classes/VisaoCasoDeUso.php');

	$visaoCasoDeUso = new VisaoCasoDeUso();	
	$visaoCasoDeUso->mostraMensagensCasoDeUso();
?>

<legend>LISTA DE CASOS DE USO</legend>
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
		$visaoCasoDeUso->mostrarCasoDeUsoListagem();
	?>
	</tbody>
</table>
<form name="excluirCasoDeUso" method="post">
	<input type="hidden" name="idCasoDeUso" />
	<input type="hidden" name="nomeCasoDeUso" />
	<input type="hidden" name="excluiCasoDeUso" value="ok"/>
</form>

<form name="edicaoCasoDeUso" method="post" action="index.php?page=3">
	<input type="hidden" name="idCasoDeUso" />
</form>