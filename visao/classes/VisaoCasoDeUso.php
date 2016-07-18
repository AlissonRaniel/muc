<?php

require_once('controle/ControleCasoDeUso.php');
require_once('modelo/CasoDeUso.php');
require_once('controle/ControleAtor.php');
require_once('modelo/Ator.php');

class VisaoCasoDeUso{
	
	public function cadastrarCasoDeUso(){
		if(isset($_POST['cadastraCaso']) && $_POST['cadastraCaso'] == "ok"){
			$controleCasoDeUso = new ControleCasoDeUso();
			$casoDeUso = new CasoDeUso();
			$casoDeUso->__set("nome", $_POST["nomeCasoDeUso"]);
			$casoDeUso->__set("atores", json_encode($_POST["atores"]));	
			$casoDeUso->__set("descricao", $_POST["descricao"]);		
			$casoDeUso->__set("preCondicao", $_POST["precondicao"]);		
			$casoDeUso->__set("posCondicao", $_POST["poscondicao"]);

			$passos = array("usuario" => $_POST["usuario"],
							"sistema" => $_POST["sistema"]);

			if(isset($_POST['idCasoDeUso']) && !empty($_POST['idCasoDeUso'])){
				$casoDeUso->__set("idCasoDeUso",$_POST['idCasoDeUso']);
				
				if($controleCasoDeUso->atualizarCasoDeUso($casoDeUso, $passos) != null){
					header("Location: index.php?page=4&edicao=".$casoDeUso->__get("nome"));
				}
			} else if($controleCasoDeUso->cadastrarCasoDeUso($casoDeUso, $passos) != null) {
				header("Location: index.php?page=4&cadastroCasoDeUso=".$casoDeUso->__get("nome"));
			}
		}
	}
	
	public function isAlteracao(){
		$result = false;
		if(($_POST["old_nomeCasoDeUso"] == $_POST["nomeCasoDeUso"]) || 
		   ($_POST["old_descricao"] == $_POST["descricao"]) ||
		   ($_POST["old_precondicao"] == $_POST["precondicao"]) ||
		   ($_POST["old_precondicao"] == $_POST["poscondicao"]) ||
		   ($_POST["old_poscondicao"] == $_POST["poscondicao"])
		  ){
			if(count($_POST["atores"]) > 0) {
			  foreach ($_POST["atores"] as $value) {
				  $result = true;
			  }
			} else 
				$result = true;
		}
		return $result;
	}


	public function atualizarCasoDeUso(){
		$controleCasoDeUso = new ControleCasoDeUso();
		$casoDeUso = new CasoDeUso();
		
		if(isset($_POST['idCasoDeUso'])){
			$result = $controleCasoDeUso->listarCasoDeUso($_POST['idCasoDeUso']);
			
			foreach ($result as $value) {
				$casoDeUso->__set("idCasoDeUso" ,$value->idCasoDeUso);
				$casoDeUso->__set("nome" ,$value->nome);
				$casoDeUso->__set("atores" ,$value->idAtores);
				$casoDeUso->__set("descricao" ,$value->descricao);
				$casoDeUso->__set("preCondicao" ,$value->preCondicao);
				$casoDeUso->__set("posCondicao" ,$value->posCondicao);
			}
		}
		
		return $casoDeUso;
	}
	
	public function listarOpcoesDeAtores($atoresCheck = NULL){
		$controleAtor = new ControleAtor();
		$atores[] = $controleAtor->listarAtores();
		$i = 0;
		$j = 0;
		$idCheck = array();
		$idCheck = ($atoresCheck != null && is_array($atoresCheck))? $atoresCheck : $idCheck;
		
		if(count($atores) > 0){
			foreach ($atores[0] as $ator) {
				echo '<label class="checkbox inline" for="ator-'.$i.'">';
				  echo '<input type="checkbox" class="checkAtores" ';
				  if (count($idCheck) > 0){
					  foreach ($idCheck as $value) {
						if($value == $ator->idAtor)
							echo 'checked';
					  }
				  }
				  echo ' name="atores[]" id="ator-'.$i.'" value="'.$ator->idAtor.'">';
				  echo $ator->nome;
				echo '</label>';
				$i++;
			}
		} else {
			echo "N&atilde;o existe ator(es) cadastrado(s)";
		}
	}
	
	public function mostraMensagensCasoDeUso(){
		$controleCasoDeUso = new ControleCasoDeUso();
		
		if(isset($_POST["excluiCasoDeUso"])){
			if($controleCasoDeUso->excluirCasoDeUso($_POST["idCasoDeUso"]) != null) {
				echo '<div class="alert alert-success" role="alert">
						O Caso de uso <b>'. $_POST["nomeCasoDeUso"] .'</b> foi excluido com sucesso !
					</div>';
			}
		} else if(isset($_GET["cadastroCasoDeUso"])){
			echo '<div class="alert alert-success" role="alert">
					O Caso de uso <b>'. $_GET["cadastroCasoDeUso"] .'</b> foi cadastrado com sucesso !
				</div>';
		} else if(isset($_GET["edicao"])){
			echo '<div class="alert alert-success" role="alert">
					O Caso de uso <b>'. $_GET["edicao"] .'</b> foi atualizado com sucesso !
				</div>';
		}
	}
	
	
	public function mostrarCasoDeUsoListagem(){
		$controleCasoDeUso = new ControleCasoDeUso();
		$controleAtor = new ControleAtor();
		$i = 1;
		$casosDeUso[] = $controleCasoDeUso->listarCasosDeUso();
		if(count($casosDeUso) > 0){
			foreach ($casosDeUso[0] as $casoDeUso) {
				echo '<tr>';
				echo	'<td>'.$casoDeUso->idCasoDeUso.'</td>';
				echo	'<td><a href="javascript:edicaoCasoDeUso(\''.$casoDeUso->idCasoDeUso.'\');">'.$casoDeUso->nome.'</a></td>';				
				echo	'<td>';
				echo		'<a href="javascript:excluirCasoDeUso('.$casoDeUso->idCasoDeUso	.', \''. $casoDeUso->nome .'\');"><img src="visao/image/ico/delete.gif"/> Excluir</a>';
				echo	'</td>';				
				echo  '</tr>';
				$i++;
			}
		}
	}
	
	public function mostrarPassos(){
		$controleCasoDeUso = new ControleCasoDeUso();
		
		if(isset($_POST['idCasoDeUso']) && !empty($_POST['idCasoDeUso'])){
			$result = $controleCasoDeUso->listarPassoPorCasoDeUso($_POST['idCasoDeUso']);
			$i = 0;
			if(count($result) > 0) {
				foreach ($result as $value) {
					$this->htmlInputsPassos($value->usuario, $value->sistema);
				}
			} else
				$this->htmlInputsPassos();
		} else {
			$this->htmlInputsPassos();
		}
	}
	
	public function htmlInputsPassos($usuario = null, $sistema = null ) {
			echo '<tr>';
				echo '	<td></td>';
				echo '	<td><input type="text" name="usuario[]" value="'.$usuario.'" class="form-control"></td>';
				echo '	<td><input type="text" name="sistema[]" value="'.$sistema.'" class="form-control"></td>';
				echo '	<td>';
				echo '		<a href="javascript:addLinhaCasoDeUso();"><i class="icon-pencil"></i> Adicionar</a>';
				echo '		<a onclick="$(this).closest(\'tr\').remove();"><i class="icon-trash"></i> Excluir</a>';
				echo '	</td>';
			   echo '</tr>';
	}
}