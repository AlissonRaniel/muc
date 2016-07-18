<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/modelo/Passo.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/conexao/ConexaoDao.php');

class PassoDAO{
	
	private $conexao;
	
	/**
	 * Construtor da classe
	 */
	public function __construct() {
		$this->conexao = new ConexaoDAO();
	}
	
	/**
	 * Metodo que cadastra um passo
	 */
	public function cadastrarPasso(Passo $passo){
		$sql="INSERT INTO `passo` 
				(usuario, sistema, idCasoDeUso) 
			  values
				(:usuario, :sistema, :idCasoDeUso)";
		$binds = array(
					":usuario" => $passo->__get("usuario"),
					":sistema" => $passo->__get("sistema"),
					":idCasoDeUso" => $passo->__get("idCasoDeUso")
				);
		return $this->conexao->insertDB($sql, $binds);
	}
	
	/**
	 * Metodo que exclui um passo
	 */
	public function excluirPasso($idPasso){
		$sql="DELETE FROM `passo` WHERE `idPasso`=". $idPasso;
		return $this->conexao->deleteDB($sql);
	}
	
	/**
	 * Metodo que exclui  passos atraves de um caso de uso
	 */
	public function excluirPassosPorCasoDeUso($idCasoDeUso){
		$sql="DELETE FROM `passo` WHERE `idCasoDeUso`=". $idCasoDeUso;
		return $this->conexao->deleteDB($sql);
	}
	
	/**
	 * Metodo que lista os passos
	 */
	public function listarPassos(){
		$sql="SELECT * FROM `passo` ";		
		return $this->conexao->selectDB($sql);
	}
	
	/**
	 * Metodo que lista um passo
	 */
	public function listarPasso($idPasso){
		$sql="SELECT * FROM `passo` WHERE `idPasso` Like :idPasso";
		$binds = array(":idPasso" => $idPasso);
		return $this->conexao->selectDB($sql, $binds);
	}
	
	/**
	 * Metodo que lista os passos atraves do caso de uso
	 */
	public function listarPassoPorCasoDeUso($idCasoDeUso){
		$sql="SELECT * FROM `passo` WHERE `idCasoDeUso` Like :idCasoDeUso";
		$binds = array(":idCasoDeUso" => $idCasoDeUso);
		return $this->conexao->selectDB($sql, $binds);
	}
	
	/**
	 * Metodo que atualiza um caso de uso
	 */
	public function atualizarPassos(Passo $passo){
		
		return $this->cadastrarPasso($passo);
	}
	
}
?>
