<?php
  include("./connection/connection.php");
  if(!isset($_SESSION)){
    session_start();
  }

  if(!isset($_SESSION['nome'])){
    $logout = false;

    if (isset($_POST['deletar'])){
      header("Location: {$_SERVER['PHP_SELF']}");
    }
    if (isset($_POST['enviar'])){
      $cpf    = $_POST['cpf'];
      $senha  = $_POST['senha'];

      $sql = $conn -> prepare("SELECT senha FROM usuarios WHERE cpf = :cpf");
      $sql -> execute(array(
        ':cpf' => $cpf
      )); 

      $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
   if($sql){
      foreach($sql as $linha){
        $senhaCorreta = $linha['senha'];
      }

      if(password_verify($senha,$senhaCorreta)){
        $sql = $conn->prepare("SELECT * FROM usuarios WHERE cpf = :cpf");
        $sql -> execute(array(
          ':cpf' => $cpf
        ));
        $sql = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($sql as $item){
          $_SESSION['id']               = $item['id'];
          $_SESSION['nome']             = $item['nome'];
          $_SESSION['email']            = $item['email'];
          $_SESSION['permission_level'] = $item['permission_level'];
          $_SESSION['cpf']              = $item['cpf'];
          $_SESSION['rg']               = $item['rg'];
          $_SESSION['telefone']         = $item['telefone'];
          $_SESSION['data_nascimento']  = $item['data_nascimento'];
        }
        header("Location: {$_SERVER['PHP_SELF']}");
      }
      else{
        die("<p>senha incorreta</p>
        <a href = \"login.php\">
        <button type = \"button\" class = \"btn btn-primary\">tentar novamente</button>
        </a> ");
      }
    }
    else{
      die("<p>cpf não encontrado</p>
      <a href = \"login.php\">
      <button type = \"button\" class = \"btn btn-primary\">tentar novamente</button>
      </a>");
    }
    }
  }else{
    $logout = true;
    if(isset($_POST['logout'])){
      session_destroy();
      header("Location: {$_SERVER['PHP_SELF']}");
    }
  }
?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>trabai</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/cadastro.css">

</head>

<body>
  <?php
    if($logout){
      echo'<div class = "caixa">
      <form action = "#" method = "post">
          

        <h1>Deseja fazer logout?</h1>

        <input type="submit" class="send" value="Logout" name = "logout">

        <a href = "./telaInicial.php"><input type="button" class = "send" value = "Tela Inicial"></a>

      </form>    
  </div>';
    }
    else{
      echo'<div class = "caixa">
      <form action = "#" method = "post">
          
          <div class="form-group">
              <h1>Login</h1>
          </div>

          <div class = "form-group">
              <label for ="telefone" >Cpf</label>
              <input type = "text" class = "form-control" name = "cpf" placeholder="Digite seu cpf..." maxlength="11" minlength="11" required>
          </div>  

          <div class="form-group">
            <label for="senha">Digite sua senha</label>
            <input type="password" name="senha" class="form-control" placeholder="Insira sua senha..." required>
          </div> 

          <label>
          <input type="submit" class="send" value="Enviar" name = "enviar">
          <a href = "../../SistemaEscolar/cadastros/cadastroPrincipal.php"><input type = "button" class = "send" value = "Cadastre-se"></a>
          </label>

      </form>    
  </div>';
    }
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>