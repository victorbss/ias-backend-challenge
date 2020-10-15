<?php 

class Cliente {

	private $idCliente;
	private $txNomeCliente;
	private $txEndereco;
	private $txTelefone;
	private $inDesativado;

	public function getId(){
		return $this->idCliente;
	}

	public function setId($id){
		$this->idCliente = $id;
	}

	public function getNome(){
		return $this->txNomeCliente;
	}

	public function setNome($nome){
		$this->txNomeCliente = $nome;
	}

	public function getEndereco(){
		return $this->txEndereco;
	}

	public function setEndereco($endereco){
		$this->txEndereco = $endereco;
	}

	public function getTelefone(){
		return $this->txTelefone;
	}

	public function setTelefone($telefone){
		$this->txTelefone = $telefone;
	}
	
	public function getDesativado(){
		return $this->inDesativado;
	}

	public function setDesativado($desativado){
		$this->inDesativado = $desativado;
	}
}
