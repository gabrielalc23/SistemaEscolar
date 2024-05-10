<?php
  include("../connection/connection.php");
  $cadastrado = false;

  if(isset($_POST['enviar'])){
    $nome       = $_POST['nome'];
    $email      = $_POST['email'];
    $senha      = $_POST['senha'];
    $data_nascimento   = $_POST['data_nascimento'];
    $telefone   = $_POST['telefone'];
    $cpf        = $_POST['cpf'];
    $rg         = $_POST['rg'];
    $permission_level       = 'usr';

    $senha = password_hash($senha,PASSWORD_DEFAULT);

    $verifica = $conn->prepare("SELECT cpf FROM usuarios WHERE cpf = :cpf");
    $verifica->execute(array(
      ':cpf' => $cpf
    ));

    $verifica = $verifica->fetchAll(PDO::FETCH_ASSOC);

    if($verifica){
      echo'
      <!doctype html>
      <html lang="en">
      
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Erro ao entrar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cadastro.css">
      </head>
      
      <body>
        <div class="modal" tabindex="-1" id="erroModal"> <!-- Adicionado ID para referenciar o modal -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">CPF ja cadastrado!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>CPF ja cadastrado no banco de dados,tente outro</p>
              </div>
              <div class="modal-footer">
                <a href="./cadastroPrincipal.php"><button type="button" class="btn btn-secondary">Fechar</button></a>
              </div>
            </div>
          </div>
        </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
          window.onload = function() {
            var modal = new bootstrap.Modal(document.getElementById(\'erroModal\'));
            modal.show();
          };
        </script>
      </body>
      
      </html>
      ';
    }
    else{

    $verificaRg = $conn->prepare("SELECT rg FROM usuarios WHERE rg = :rg");
    $verificaRg->execute(array(
      ':rg' => $rg
    ));

    $verificaRg = $verificaRg->fetchAll(PDO::FETCH_ASSOC);

    if($verificaRg){
      echo'
      <!doctype html>
      <html lang="en">
      
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Erro ao entrar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
      </head>
      
      <body>
        <div class="modal" tabindex="-1" id="erroModal"> <!-- Adicionado ID para referenciar o modal -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">RG ja cadastrado!!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>RG ja cadastrado no banco de dados,tente outro</p>
              </div>
              <div class="modal-footer">
                <a href="./cadastroPrincipal.php"><button type="button" class="btn btn-secondary">Fechar</button></a>
              </div>
            </div>
          </div>
        </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
          window.onload = function() {
            var modal = new bootstrap.Modal(document.getElementById(\'erroModal\'));
            modal.show();
          };
        </script>
      </body>
      
      </html>
      ';
    }
    else{
    $sql = $conn->prepare("INSERT INTO usuarios (nome,email,senha,data_nascimento,telefone,cpf,rg,permission_level)
                                         VALUES(:nome,:email,:senha,:data_nascimento,:telefone,:cpf,:rg,:permission_level)");
    $sql->execute(array(
      ':nome'     => $nome,
      ':email'    => $email,
      ':senha'    => $senha,
      ':data_nascimento' => $data_nascimento,
      ':telefone' => $telefone,
      ':cpf'      => $cpf,
      ':rg'       => $rg,
      ':permission_level'     => $permission_level
    ));
    $cadastrado = true;
    echo'
      <!doctype html>
      <html lang="en">
      
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Erro ao entrar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cadastro.css">
      </head>
      
      <body>
        <div class="modal" tabindex="-1" id="erroModal"> <!-- Adicionado ID para referenciar o modal -->
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Conta cadastrada com sucesso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Sua conta foi cadastrada com sucesso, agora é só partir para o login</p>
              </div>
              <div class="modal-footer">
                <a href="../../SistemaEscolar/login.php"><button type="button" class="btn btn-success">Login</button></a>
              </div>
            </div>
          </div>
        </div>
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
          window.onload = function() {
            var modal = new bootstrap.Modal(document.getElementById(\'erroModal\'));
            modal.show();
          };
        </script>
      </body>
      
      </html>
      ';
  }
  }
  
}
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro Aluno</title>
</head>

<body>
    <div class = "caixa">
        <form action = "#" method = "post">
            
            <div class="form-group">
                <h1>Cadastre-se</h1>
            </div>

            <div class = "form-group">
                <label for ="nome" >Nome completo</label>
                <input type = "text" class = "form-control" name = "nome" placeholder="Digite eu nome completo..." required>
            </div>

            <div class = "form-group">
              <label for ="email" >Email</label>
              <input type = "text" class = "form-control" name = "email" placeholder="Digite seu melhor email..." required>
            </div>

            <div class="form-group">
              <label for="senha">Digite sua senha</label>
              <input type="password" name="senha" id="insertPass" class="form-control" placeholder="Insira sua senha..." required>
            </div>
            
            <div class="form-group">
              <label for="senha">Digite novamente sua senha</label>
              <input type="password" name="senha" id="confirmPass" class="form-control" placeholder="confirme sua senha..." required>
            </div>

            <div class = "form-group">
              <label for ="data_nascimento" >Data de nascimento</label>
              <input type = "date" class = "form-control" name = "data_nascimento" required>
            </div>

            <div class = "form-group">
                <label for ="telefone" >Telefone</label>
                <input type = "text" class = "form-control" name = "telefone" placeholder="Digite seu telefone..." maxlength="11" minlength="11" required>
            </div>
            
            <div class = "form-group">
                <label for ="telefone" >Cpf</label>
                <input type = "text" class = "form-control" name = "cpf" placeholder="Digite seu cpf..." maxlength="11" minlength="11" required>
            </div>
            
            <div class = "form-group">
                <label for ="telefone" >RG</label>
                <input type = "text" class = "form-control" name = "rg" placeholder="Digite seu rg..." maxlength="10" minlength="10" required>
            </div>
            
            <label class = "g-5px">
              <input type="submit" onClick="ValidarSenha()"class="send" value="Enviar" name = "enviar">
                <a href = "../login.php"><input type="button"class="send" value="Login" name = "login"></a>
              </label>
                

        </form>    
    </div>
</body>

<script src="../js/ValidarSenha.js"></script>

</html>