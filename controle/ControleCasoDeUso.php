<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/dao/CasoDeUsoDAO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/modelo/CasoDeUso.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/modelo/Passo.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/muc/dao/PassoDAO.php');


class ControleCasoDeUso{

	private $casoDeUsoDAO;
	private $passoDAO;
	
	/*
	 * Construtor da classe
	 */
	public function __construct(){
		$this->casoDeUsoDAO = new CasoDeUsoDAO();
		$this->passoDAO = new PassoDAO();
	}
	
	/*
	 * Metodo que cadastra o Caso de Uso
	 */
	public function cadastrarCasoDeUso(CasoDeUso $casoDeUso, $passos= null){
		if($idCasoDeUso = $this->casoDeUsoDAO->cadastrarCasoDeUso($casoDeUso)){
			if($passos != null && is_array($passos)){				
				for($i = 0; $i < count($passos["usuario"]); $i++){
					$passo = new Passo();
					$passo->__set("usuario", $passos["usuario"][$i]);
					$passo->__set("sistema", $passos["sistema"][$i]);
					$passo->__set("idCasoDeUso", $idCasoDeUso);
					
					$this->passoDAO->cadastrarPasso($passo);
				}
			}
			return 1;
		}
		return 0;
	}
	
	/*
	 * Metodo que exclui o Caso de Uso
	 */
	public function excluirCasoDeUso($idCasoDeUso){
		return $this->casoDeUsoDAO->excluirCasoDeUso($idCasoDeUso);
	}
	
	/*
	 * Metodo que lista os Casos de Uso
	 */
	public function listarCasosDeUso(){
		return $this->casoDeUsoDAO->listarCasosDeUso();
	}
	
	/*
	 * Metodo que lista um Caso de Uso
	 */
	public function listarCasoDeUso($idCasoDeUso){
		return $this->casoDeUsoDAO->listarCasoDeUso($idCasoDeUso);
	}
	
	/*
	 * Metodo que atualiza um Caso de Uso
	 */
	public function atualizarCasoDeUso(CasoDeUso $casoDeUso, $passos){
		if($this->casoDeUsoDAO->atualizarCasoDeUso($casoDeUso)){
			
			$this->passoDAO->excluirPassosPorCasoDeUso($casoDeUso->__get("idCasoDeUso"));
			
			if($passos != null && is_array($passos)){	
				for($i = 0; $i < count($passos["usuario"]); $i++){
					$passo = new Passo();
					
					$passo->__set("usuario", $passos["usuario"][$i]);
					$passo->__set("sistema", $passos["sistema"][$i]);
					$passo->__set("idCasoDeUso", $casoDeUso->__get("idCasoDeUso"));
					
					$this->passoDAO->atualizarPassos($passo);
				}
			}
			return 1;
		}
		return 0;
		
	}
	
	public function listarPassoPorCasoDeUso($idCasoDeUso){
		return $this->passoDAO->listarPassoPorCasoDeUso($idCasoDeUso);
	}
}
?>
