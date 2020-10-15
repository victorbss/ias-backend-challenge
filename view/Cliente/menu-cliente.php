<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
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
      </ul> <br><br>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="inclui-cliente.php">Incluir Cliente</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="consulta-cliente.php">Consultar Cliente</a>
        </li>
      </ul>
      <h1 style="text-align: center" >Projeto CRUDs</h1>
      <?php
        if(isset($_GET['novo_cliente'])){
          echo '<h5 style="text-align: center; color: green" >Cliente incluído com sucesso!</h5>';
        } 
        if(isset($_GET['error'])) {
          echo '<h5 style="text-align: center; color: red" >Problemas no sistema! Entre em contato com o suporte.</h5>';
        }
      ?>
    </div>
  </body>
</html>