<?php
class Ator{
	
	private $nome;
	private $id;
	
	public function getNome() {
		 return $this->nome;
	}	
	public function setNome($nome) {
		 $this->nome = $nome;
	}	
	
	public function getId() {
		 return $this->id;
	}	
	public function setId($id) {
		 $this->id = $id;
	}
}
?>