<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/modelo/CasoDeUso.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/conexao/ConexaoDao.php');

class CasoDeUsoDAO{
	
	private $conexao;
	
	/*
	 * Construtor da classe
	 */
	public function __construct() {
		$this->conexao = new ConexaoDAO();
	}
	
	/**
	 * Metodo que cadastra um caso de uso
	 */
	public function cadastrarCasoDeUso(CasoDeUso $casoDeUso){
		$sql="INSERT INTO `casodeuso` 
				(nome, idAtores, descricao, preCondicao, posCondicao) 
			  values
				(:nome, :atores, :descricao, :preCondicao, :posCondicao)";
		$binds = array(
					":nome" => $casoDeUso->__get("nome"),
					":atores" => $casoDeUso->__get("atores"),
					":descricao" => $casoDeUso->__get("descricao"),
					":preCondicao" => $casoDeUso->__get("preCondicao"),
					":posCondicao" => $casoDeUso->__get("posCondicao")
				);
		return $this->conexao->insertDB($sql, $binds);
	}
	
	/**
	 * Metodo que atualiza um caso de uso
	 */
	public function atualizarCasoDeUso(CasoDeUso $casoDeUso){
		$sql="UPDATE `casodeuso` SET 
					nome = :nome, 
					idAtores = :idAtores,
					descricao = :descricao,
					preCondicao = :preCondicao,
					posCondicao = :posCondicao
			  WHERE `idCasoDeUso`= :idCasoDeUso";
		$binds = array(
					":nome" => $casoDeUso->__get("nome"),
					":idAtores" => $casoDeUso->__get("atores"),
					":descricao" => $casoDeUso->__get("descricao"),
					":preCondicao" => $casoDeUso->__get("preCondicao"),
					":posCondicao" => $casoDeUso->__get("posCondicao"),
					":idCasoDeUso" => $casoDeUso->__get("idCasoDeUso")
				);
		return $this->conexao->updateDB($sql, $binds);
	}
	
	/**
	 * Metodo que exclui um caso de uso
	 */
	public function excluirCasoDeUso($idAtor){
		$sql="DELETE FROM `casodeuso` WHERE `idCasoDeUso`=". $idAtor;
		$this->conexao->deleteDB($sql);
	}
	
	/**
	 * Metodo que lista os casos de uso
	 */
	public function listarCasosDeUso(){
		$sql="SELECT caso.idCasoDeUso, caso.nome, caso.idAtores FROM `casodeuso` caso";
		return $this->conexao->selectDB($sql);
	}
	
	/**
	 * Metodo que lista um caso de uso
	 */
	public function listarCasoDeUso($idCasoDeUso){
		$sql="SELECT * 
				FROM `casodeuso` caso 
				WHERE `idCasoDeUso` Like :idCasoDeUso";
		
		$binds = array(":idCasoDeUso" => $idCasoDeUso);		
		return $this->conexao->selectDB($sql,$binds);
	}
	
}
?>
