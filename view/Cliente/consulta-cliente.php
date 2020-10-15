<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/modal.css" rel="stylesheet">
    <title>Projeto CRUDs</title>
  </head>
  <body>
    <div class="container">
      <ul style="padding-top: 10px" class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" href="../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="menu-cliente.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Funcionários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Ordens de Serviço</a>
        </li>
      </ul>
      <br>
      <h3 style="text-align: center" >Consulta Cliente</h3>
      <br>
      <form class="form-inline my-2 my-lg-0 justify-content-center" method="POST" action="../../controller/ClienteController.php">
        <input type="hidden" name="metodo" value="consultarNome">
        <input class="form-control mr-sm-2" type="search" placeholder="Nome do Cliente" name="nome">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Consultar</button>
      </form>
      <br> <br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Telefone</th>
            <th scope="col">Alterar</th>
            <th scope="col">Excluir</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if(isset($_GET['novo_cliente'])){
              echo '<h5 style="text-align: center; color: green" >Cliente incluído com sucesso!</h5><br>';
            } 
            if(isset($_GET['cliente_alterado'])){
              echo '<h5 style="text-align: center; color: green" >Cliente atualizado com sucesso!</h5><br>';
            } 
            if(isset($_GET['error'])) {
              echo '<h5 style="text-align: center; color: red" >Problemas no sistema! Entre em contato com o suporte.</h5><br>';
            }
            if(isset($_GET['result'])){
              $tabela = json_decode(base64_decode(urldecode($_GET['result'])));
              foreach ($tabela as $row) {
                $id = $row->cli_id_cliente;
                  echo '<form method="POST" action="../../controller/ClienteController.php">';
                  echo '<input type="hidden" name="metodo" value="consultarID">';
                  echo '<input type="hidden" name="clienteID" value="'.$id.'">';
                  echo '<tr>';
                  echo '<td>'.$row->cli_tx_nome_cliente.'</td>';
                  echo '<td>'.$row->cli_tx_endereco.'</td>';
                  echo '<td>'.$row->cli_tx_telefone.'</td>';
                  echo '<td>';
                  echo '<button type="submit">';
                  echo '<img src="../../assets/img/pencil-square.svg" alt="" width="16" height="16">';
                  echo '</button>';
                  echo '</td>';
                  echo '<td>';
                  echo '</form>';
                  echo '<button onclick="del('. $id .')">';
                  echo '<img src="../../assets/img/trash-fill.svg" alt="" width="16" height="16">';
                  echo '</button>';
                  echo '</td>';
                  echo '</tr>';
              }
            }
          ?>

        </tbody>
      </table>

      <div id="modal" class="modal">
        <span onclick="document.getElementById('modal').style.display='none'" class="close">&times;</span>
        <form class="modal-content" method="POST" action="../../controller/ClienteController.php">
          <input type="hidden" name="metodo" value="excluir">
          <input type="hidden" id="cli_id" name="delID" value="">
          <div class="container">
            <h1>Excluir Cliente</h1>
            <p>Tem certeza que deseja excluir o cliente?</p>
  
            <div class="clearfix">
              <button onclick="document.getElementById('modal').style.display='none'" type="button" class="cancelbtn">Cancelar</button>
              <button type="submit" class="deletebtn">Excluir</button>
            </div>
          </div>
        </form>
      </div>

    </div>
    <script type="text/javascript">
      function del(cli_id){
        document.getElementById('cli_id').setAttribute('value', cli_id);
        document.getElementById('modal').style.display = 'block';
      }
    </script>
  </body>
</html>
