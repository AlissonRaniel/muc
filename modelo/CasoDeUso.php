<?php 
class CasoDeUso{
	
	private $idCasoDeUso;
	private $nome;
	private $atores;
	private $descricao;
	private $preCondicao;
	private $posCondicao;
	private $passos;
	
	/**
	 * Metodo magico PHP - __set
	 * Pode ser usado para todos os atributos da classe
	 */
	public function __set($param, $value) {
        $this->$param = $value;
    }
 
	/**
	 * Metodo magico PHP - __get
	 * Pode ser usado para todos os atributos da classe
	 */
    public function __get($var) {
        return $this->$var;
    }	
}
?>