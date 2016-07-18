
$(function(){
	//primeiro método chamado quando a página é carregada
	main();
});

/**
 *  Primeiro método chamado quando a página é carregada
 *  
 *  @return void
 */
function main()
{
	hoverIcoFooter('face');
	hoverIcoFooter('lin');
}

function hoverIcoFooter(id)
{
	var element = $( "#"+ id );
	element.hover(
		function() {
			element.attr('src', ('image/rodape/'+id+'-a.png'));				
		}, function() {
		  $( this ).find( "span:last" ).remove();
			element.attr('src', ('image/rodape/'+id+'.png'));				
		}
	  );
}

function addLinhaCasoDeUso()
{
	$('#table-cdu tbody').append('<tr>' +
					'<td></td>'+
					'<td><input type="text" name="usuario[]" class="form-control"></td>	'+	
					'<td><input type="text" name="sistema[]" class="form-control"></td>	'+
					'<td> '+
					'	<a href="javascript:addLinhaCasoDeUso();"><i class="icon-pencil"></i> Adicionar</a>		'+
					'	<a onclick="$(this).closest(\'tr\').remove();"><i class="icon-trash"></i> Excluir</a>			'+
					'</td>'+
			   '</tr>');
}

function validaNomeAtor(){	
	if($("input[name=nomeAtor]").val().length < 2)
		alert("Insira mais de uma letra no campo nome.");
	else
		$("form[name=formAtor]").submit();
}

function excluirAtor(idAtor, nome){
	if (confirm("Tem certeza que deseja excluir o Ator: "+ nome +"?")) {
		$("input[name=idAtor]").val(idAtor);
		$("input[name=nomeAtor]").val(nome);
		$("form[name=excluirAtor]").submit();
	}
}

function edicaoAtor(idAtor){
	$("input[name=idAtor]").val(idAtor);
	$("form[name=edicaoAtor]").submit();
}

function edicaoCasoDeUso(idCasoDeUso){
	$("input[name=idCasoDeUso]").val(idCasoDeUso);
	$("form[name=edicaoCasoDeUso]").submit();
}

function excluirCasoDeUso(idCasoDeUso, nome){
	if (confirm("Tem certeza que deseja excluir o Caso de Uso: "+ nome +"?")) {
		$("input[name=idCasoDeUso]").val(idCasoDeUso);
		$("input[name=nomeCasoDeUso]").val(nome);
		$("form[name=excluirCasoDeUso]").submit();
	}
}

function validaCamposCasosDeUso(){	
	var resultado = true;
	if($("input[name=nomeCasoDeUso]").val().length < 2){
		alert("Insira mais de uma letra no campo nome.");
		$("input[name=nomeCasoDeUso]").focus();
		resultado =  false;
	}
	if(!$(".checkAtores").is(':checked')){
		alert("Selecione pelo menos um ator.");
		$(".checkAtores").focus();
		resultado = false;
	}
	if($("textarea[name=descricao]").val().length < 2){
		alert("Insira mais de uma letra no campo Descricao.");
		$("textarea[name=descricao]").focus();
		resultado =  false;
	}
	if($("textarea[name=precondicao]").val().length > 0){
		if($("textarea[name=precondicao]").val().length < 2){
			alert("Insira mais de uma letra no campo Pre-Condicao.");
			$("textarea[name=precondicao]").focus();
			resultado = false;			
		}
	}
	if($("textarea[name=poscondicao]").val().length > 0){
		if($("textarea[name=poscondicao]").val().length < 2){
			alert("Insira mais de uma letra no campo Pos-Condicao.");
			$("textarea[name=poscondicao]").focus();
			resultado = false;			
		}
	}
	return resultado;
//	if(resultado) {
//		$("form[name=formCasoDeUso]").submit();
//	}
}