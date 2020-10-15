<?php

class OrdemServico {
	
	private $idOrdemServico;
	private $idFuncionario;
	private $idCliente;
	private $dtAbertura;
	private $dtFechamento;
	private $vlServico;
	private $cdStatus;
	private $inDesativado;

	public function getOrdemServico(){
		return $this->idOrdemServico;
	}

	public function setOrdemServico($ordemServico){
		$idOrdemServico = $ordemServico;
	}

	public function getFuncionario(){
		return $this->idFuncionario;
	}

	public function setFuncionario($funcionario){
		$idFuncionario = $funcionario;
	}

	public function getCliente(){
		return $this->idCliente;
	}

	public function setCliente($cliente){
		$idCliente = $cliente;
	}

	public function getDtAbertura(){
		return $this->dtAbertura;
	}

	public function setDtAbertura($abertura){
		$dtAbertura = $abertura;
	}

	public function getDtFechamento(){
		return $this->dtFechamento;
	}

	public function setDtFechamento($fechamento){
		$dtFechamento = $fechamento;
	}

	public function getVlServico(){
		return $this->vlServico;
	}

	public function setVlServico($servico){
		$vlServico = $servico;
	}

	public function getCdStatus(){
		return $this->cdStatus;
	}

	public function setCdStatus($status){
		$cdStatus = $status;
	}

	public function getDesativado(){
		return $this->inDesativado;
	}

	public function setDesativado($desativado){
		$inDesativado = $desativado;
	}
}