<?php  

require_once ('../config/Database.php');
require_once ('../model/Cliente/Cliente.php');

class ClienteDAO {

    function incluiCliente(Database $db, Cliente $cliente) {

        $query = "	INSERT INTO tb_cliente (cli_tx_nome_cliente, cli_tx_endereco, cli_tx_telefone) 
        			VALUES ('{$cliente->getNome()}', '{$cliente->getEndereco()}', '{$cliente->getTelefone()}')";    
        $result = mysqli_query($db->conexao(), $query);

        return $result;
    }

    function alteraCliente(Database $db, Cliente $cliente) {

        $query = "  UPDATE tb_cliente 
                    SET cli_tx_nome_cliente = '{$cliente->getNome()}', cli_tx_endereco = '{$cliente->getEndereco()}', cli_tx_telefone = '{$cliente->getTelefone()}'
                    WHERE cli_id_cliente = '{$cliente->getId()}'";    
        $result = mysqli_query($db->conexao(), $query);

        return $result;
    }

    function consultaNome(Database $db, $nomeCliente) {
    	$query = "	SELECT cli_id_cliente, cli_tx_nome_cliente, cli_tx_endereco, cli_tx_telefone 
    				FROM tb_cliente 
    				WHERE cli_tx_nome_cliente LIKE '%$nomeCliente%' 
    				AND NOT cli_in_desativado"; 
    	$result = mysqli_query($db->conexao(), $query);

	    return $result;
    }

    function consultaID(Database $db, $clienteID) {
        $query = "  SELECT cli_id_cliente, cli_tx_nome_cliente, cli_tx_endereco, cli_tx_telefone 
                    FROM tb_cliente 
                    WHERE cli_id_cliente = $clienteID "; 
        $result = mysqli_query($db->conexao(), $query);

        return $result;
    }

    function excluiCliente(Database $db, $clienteID){
        $query = "  DELETE 
                    FROM tb_cliente 
                    WHERE cli_id_cliente = $clienteID 
                    AND NOT cli_in_desativado"; 
        $result = mysqli_query($db->conexao(), $query);

        return $result;
    }
}