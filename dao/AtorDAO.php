<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/modelo/Ator.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/conexao/ConexaoDao.php');

class AtorDAO{
	
	private $conexao;
	
	/**
	 * Construtor da classe
	 */
	public function __construct() {
		$this->conexao = new ConexaoDAO();
	}
	
	/**
	 * Metodo que cadastra um ator
	 */
	public function cadastrarAtor(Ator $ator){
		$sql="INSERT INTO `ator` (nome) values (:nome)";
		$binds = array(":nome" => $ator->getNome());
		return $this->conexao->insertDB($sql, $binds);
	}
	
	/**
	 * Metodo que atualiza um ator
	 */
	public function atualizarAtor(Ator $ator){
		$sql="UPDATE `ator` set nome = :nome WHERE `idAtor`= :idAtor";
		$binds = array(":nome" => $ator->getNome(),
						":idAtor" => $ator->getId());
		return $this->conexao->updateDB($sql, $binds);
	}
	
	/**
	 * Metodo que exclui um ator
	 */
	public function excluirAtor($idAtor){
		$sql="DELETE FROM `ator` WHERE `idAtor`=". $idAtor;
		return $this->conexao->deleteDB($sql);
	}
	
	/**
	 * Metodo que lista os atores
	 */
	public function listarAtores(){
		$sql="SELECT * FROM `ator` ";		
		return $this->conexao->selectDB($sql);
	}
	
	/**
	 * Metodo que lista os atores
	 */
	public function listarAtor($idAtor){
		$sql="SELECT * FROM `ator` WHERE `idAtor` Like :idAtor";
		$binds = array(":idAtor" => $idAtor);
		return $this->conexao->selectDB($sql, $binds);
	}
	
	
}
?>
