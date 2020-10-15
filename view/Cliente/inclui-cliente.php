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
      </ul>
      <br>
      <h3 style="text-align: center" >Novo Cliente</h3>
      <br>
      <form method="POST" action="../../controller/ClienteController.php">
        <input type="hidden" name="metodo" value="incluir">
        <div class="form-group row">
          <label for="inputNome" class="col-sm-2 col-form-label">Nome:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputNome" name="nome">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEndereco" class="col-sm-2 col-form-label">Endereço:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEndereco" name="endereco">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputTelefone" class="col-sm-2 col-form-label">Telefone:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputTelefone" name="telefone">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Incluir</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>