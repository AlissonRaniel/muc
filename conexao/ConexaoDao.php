<?php
 class ConexaoDAO{
    /*
	 * M�todo construtor do banco de dados
	 */
    public function __construct(){}
          
    /*
	 * M�todo que destroi a conex�o com banco de dados e remove 
	 * da mem�ria todas as vari�veis setadas
	 */
    public function __destruct() {
        $this->disconnect();
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }
     
    private static $dbtype   = "mysql";
    private static $host     = "localhost";
    private static $port     = "3306";
    private static $user     = "root";
    private static $password = "";
    private static $db       = "muc";
     
    /*
	 * Metodos que trazem o conteudo da variavel desejada
     * @return   $xxx = conteudo da variavel solicitada
	 */
    private function getDBType()  {
		return self::$dbtype;
	}
    private function getHost()    {
		return self::$host;
	}
    private function getPort()    {
		return self::$port;
	}
    private function getUser()    {
		return self::$user;
	}
    private function getPassword(){
		return self::$password;
	}
    private function getDB()      {
		return self::$db;
	}
     
    private function connect(){
        try
        {
            $this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
        }
        catch (PDOException $i)
        {
            //se houver exce��o, exibe
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
         
        return ($this->conexao);
    }
     
    private function disconnect(){
        $this->conexao = null;
    }
     
    /*M�todo select que retorna um VO ou um array de objetos*/
    public function selectDB($sql,$binds=null){
        $query= $this->connect()->prepare($sql);
		
		if($binds != null && is_array($binds)){
			foreach (array_keys($binds) as $key){
				$query->bindValue($key, $binds[$key]);				
			}
		}
		
        $query->execute();         
        $rs = $query->fetchAll(PDO::FETCH_OBJ) ;
        
        self::__destruct();
        return $rs;
    }
     
    /*M�todo insert que insere valores no banco de dados e retorna o �ltimo id inserido*/
    public function insertDB($sql,$binds=null){
        $conexao=$this->connect();
        $query=$conexao->prepare($sql);
		
		if($binds != null && is_array($binds)){
			foreach (array_keys($binds) as $key){
				$query->bindValue($key, $binds[$key]);				
			}
		}
		
        $query->execute();
        $rs = $conexao->lastInsertId() ;
//				or die(print_r("ERROR: ".$query->errorInfo()[2], true));
        self::__destruct();
        return $rs;
    }
     
    /*M�todo update que altera valores do banco de dados e retorna o n�mero de linhas afetadas*/
    public function updateDB($sql,$binds=null){
        $query=$this->connect()->prepare($sql);
		
		if($binds != null && is_array($binds)){
			foreach (array_keys($binds) as $key){
				$query->bindValue($key, $binds[$key]);				
			}
		}
		
        $query->execute();
        $rs = $query->rowCount() or die(print_r("ERROR: ".$query->errorInfo()[2], true));
        self::__destruct();
        return $rs;
    }
     
    /*M�todo delete que exclu� valores do banco de dados retorna o n�mero de linhas afetadas*/
    public function deleteDB($sql){
        $query=$this->connect()->prepare($sql);
        $query->execute();
        $rs = $query->rowCount() or die(print_r("ERROR: ".$query->errorInfo()[2], true));
        self::__destruct();
        return $rs;
    }
}
?>