<?php  

require_once ('../config/Database.php');
require_once ('../model/Cliente/Cliente.php');
require_once ('../model/Cliente/ClienteDAO.php');

if(isset($_POST['metodo'])) { 
    $metodo = $_POST['metodo'];
    if(method_exists('ClienteController', $metodo)) {
        $controller = new ClienteController();
        $controller->$metodo($_POST);
    } else {
        echo 'Função incorreta!';
    }
} 

class ClienteController {

    public function incluir() {
        if(empty($_POST['nome']) || empty($_POST['endereco']) || empty($_POST['telefone'])){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
            exit;
        }
            
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];

        $db = new Database();
        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setEndereco($endereco);
        $cliente->setTelefone($telefone);

        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->incluiCliente($db, $cliente);

        if($result->error){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
        }

        $url = "../view/Cliente/menu-cliente.php?novo_cliente=ok";
        header('Location: '.$url);
    }

    public function consultarNome() {
        if(empty($_POST['nome'])){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
            exit;
        }

        $nomeCliente = $_POST['nome'];
        $db = new Database();
        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->consultaNome($db, $nomeCliente);

        if($result->error){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
        }

        $tabela = array();
        $index = 0;
        while($rows = mysqli_fetch_array($result)){   
            $tabela[$index]['cli_id_cliente'] = $rows['cli_id_cliente'];
            $tabela[$index]['cli_tx_nome_cliente'] = $rows['cli_tx_nome_cliente'];
            $tabela[$index]['cli_tx_endereco'] = $rows['cli_tx_endereco'];
            $tabela[$index]['cli_tx_telefone'] = $rows['cli_tx_telefone'];
            $index++;
        }

        $tabela = urlencode(base64_encode(json_encode($tabela)));

        $url = "../view/Cliente/consulta-cliente.php?result=".$tabela;
        header('Location: '.$url);     
    }


    public function consultarID() {
        if(empty($_POST['clienteID'])){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
            exit;
        }

        $clienteID = $_POST['clienteID'];
        $db = new Database();
        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->consultaID($db, $clienteID);

        $cliente = array();
        while ($row = $result->fetch_assoc()) {
            $cliente['cli_id_cliente'] = $row['cli_id_cliente'];
            $cliente['cli_tx_nome_cliente'] = $row['cli_tx_nome_cliente'];
            $cliente['cli_tx_endereco'] = $row['cli_tx_endereco'];
            $cliente['cli_tx_telefone'] = $row['cli_tx_telefone'];
        }
    
        $cliente = urlencode(base64_encode(json_encode($cliente)));

        $url = "../view/Cliente/altera-cliente.php?cliente=".$cliente;
        header('Location: '.$url);   
    }

    public function excluir() {
        if(empty($_POST['delID'])){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
            exit;
        }

        $clienteID = $_POST['delID'];
        $db = new Database();
        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->excluiCliente($db, $clienteID);

        if($result->error){
            $url = "../view/Cliente/menu-cliente.php?error=ok";
            header('Location: '.$url);
        }

        $url = "../view/Cliente/consulta-cliente.php";
        header('Location: '.$url);
    }

    public function alterar(){
        if(empty($_POST['id']) || empty($_POST['nome']) || empty($_POST['endereco']) || empty($_POST['telefone'])){
            $url = "../view/Cliente/consulta-cliente.php?error=ok";
            header('Location: '.$url);
            exit;
        }
            
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];

        $db = new Database();
        $cliente = new Cliente();
        $cliente->setId($id);
        $cliente->setNome($nome);
        $cliente->setEndereco($endereco);
        $cliente->setTelefone($telefone);

        $clienteDAO = new ClienteDAO();
        $result = $clienteDAO->alteraCliente($db, $cliente);

        if($result->error){
            $url = "../view/Cliente/consulta-cliente.php?error=ok";
            header('Location: '.$url);
        }

        $url = "../view/Cliente/consulta-cliente.php?cliente_alterado=ok";
        header('Location: '.$url);
    }
}