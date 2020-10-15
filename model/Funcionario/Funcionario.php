<?php	

class Funcionario {
	
	private $idFuncionario;
	private $txNomeFuncionario;
	private $cdUsername;
	private $cdSenha;
	private $inDesativado;

	public function getId(){
		return $this->idFuncionario;
	}

	public function setId($id){
		$this->idFuncionario = $id;
	}

	public function getNome(){
		return $this->txNomeFuncionario;
	}

	public function setNome($nome){
		$this->txNomeFuncionario = $nome;
	}

	public function getUsername(){
		return $this->cdUsername;
	}

	public function setUsername($username){
		$this->cdUsername = $username;
	}

	public function getSenha(){
		return $this->cdSenha;
	}

	public function setSenha($senha){
		$this->cdSenha = $senha;
	}

	public function checkSenha($senha){
		return $senha == $this->cdSenha;
	}

	public function getDesativado(){
		return $this->inDesativado;
	}

	public function setDesativado($desativado){
		$this->inDesativado = $desativado;
	}

}