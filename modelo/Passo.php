<?php
class Passo{
	private $usuario;
	private $sistema;
	private $idCasoDeUso;
	
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