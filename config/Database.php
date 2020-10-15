<?php  

class Database {

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "projeto_cruds";


    public function conexao() {
        $conexao = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($conexao->connect_errno) {
		    printf("Connect failed: %s\n", $conexao->connect_error);
		    exit();
		} else {
			return $conexao;
		} 
    }

}

?>