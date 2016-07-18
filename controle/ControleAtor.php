<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/dao/AtorDAO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/modelo/Ator.php');


class ControleAtor{

	private $atorDAO;
	
	/*
	 * Construtor da classe
	 */
	public function __construct(){
		$this->atorDAO = new AtorDAO();
	}
	
	/*
	 * Metodo que cadastra o nome do Ator
	 */
	public function cadastrarAtor(Ator $ator){
		return $this->atorDAO->cadastrarAtor($ator);
	}
	
	/*
	 * Metodo que exclui o Ator
	 */
	public function excluirAtor($idAtor){
		return $this->atorDAO->excluirAtor($idAtor);
	}
	
	/*
	 * Metodo que lista os Atores
	 */
	public function listarAtores(){
		return $this->atorDAO->listarAtores();
	}
	
	/*
	 * Metodo que lista um Ator
	 */
	public function listarAtor($idAtor){
		return $this->atorDAO->listarAtor($idAtor);
	}
	
	/*
	 * Metodo que atualiza um Ator
	 */
	public function atualizarAtor(Ator $ator){
		return $this->atorDAO->atualizarAtor($ator);
	}
}
?>
