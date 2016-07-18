<?php

require_once('controle/ControleAtor.php');
require_once('modelo/Ator.php');

class VisaoAtor{
	
	public function cadastrarAtor(){
		$controleAtor = new ControleAtor();
		$ator = new Ator();

		if(isset($_POST['cadastraAtor']) && isset($_POST['nomeAtor']) && $_POST['cadastraAtor'] == "ok"){

			$ator->setNome($_POST['nomeAtor']);
			if(isset($_POST['idAtor']) && !empty($_POST['idAtor'])){
				$ator->setId($_POST['idAtor']);
				if($controleAtor->atualizarAtor($ator) != null){
					header("Location: index.php?page=2&edicao=".$ator->getNome());
				}
			} else {
				if($controleAtor->cadastrarAtor($ator) != null) {
					header("Location: index.php?page=2&cadastro=".$ator->getNome());
				}
			}
		}
	}
	
	public function atualizarAtor(){
		$controleAtor = new ControleAtor();
		$ator = new Ator();
		
		if(isset($_POST['idAtor'])){
			$result = $controleAtor->listarAtor($_POST['idAtor']);
			foreach ($result as $value) {
				$ator->setId($value->idAtor);
				$ator->setNome($value->nome);
			}
		}
		
		return $ator;
	}
	
	public function mostraMensagemAtor(){
		if(isset($_POST["excluiAtor"])){
			$controleAtor = new ControleAtor();
			if($controleAtor->excluirAtor($_POST["idAtor"]) != null) {
				echo '<div class="alert alert-success" role="alert">
						O Ator <b>'. $_POST["nomeAtor"] .'</b> foi excluido com sucesso !
					</div>';
			}
		} else if(isset($_GET["cadastro"])){
			echo '<div class="alert alert-success" role="alert">
					O Ator <b>'. $_GET["cadastro"] .'</b> foi cadastrado com sucesso !
				</div>';
		} else if(isset($_GET["edicao"])){
			echo '<div class="alert alert-success" role="alert">
					O Ator <b>'. $_GET["edicao"] .'</b> foi atualizado com sucesso !
				</div>';
		}
	}
	
	public function listarAtores(){
		$controleAtor = new ControleAtor();
		$atores[] = $controleAtor->listarAtores();
		if(count($atores) > 0){
			foreach ($atores[0] as $ator) {
				echo '<tr>';
				echo    '<td id="idAtor">'. $ator->idAtor .'</td>';
				echo	'<td><a href="javascript:edicaoAtor(\''.$ator->idAtor.'\');">'. $ator->nome .'</a></td>';
				echo 	'<td>';
				echo	'	<a href="javascript:excluirAtor('.$ator->idAtor.', \''. $ator->nome .'\');"><img src="visao/image/ico/delete.gif"/> Excluir</a>';
				echo	'</td>';
				echo '</tr>';
			}
		}
	} 
	
}