<?php 
  require_once("connection/connection.php");

  session_start();

  //Verifica se uma das variaveis está configurada
  if(isset($_POST["email"])){

    //Recebe as informações do form
    $nome = $_POST["nome"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //Compara as informações do form com banco de dados
    $verifica = "SELECT * ";
    $verifica .= "FROM usuario ";
    $verifica .= "WHERE email = '{$email}' ";

    $acessoVerifica =  mysqli_query($conecta, $verifica);
    if(!$acessoVerifica){
        die("Falha na consulta ao banco(email)");
    }

    //Montando a query de insert 
    $register = "INSERT INTO usuario ";
    $register .= "(nome, celular, email, senha, ADMIN) VALUES ";
    $register .= "('{$nome}', '{$celular}', '{$email}', '{$senha}', '0')";

    $acessoInsert =  mysqli_query($conecta, $register);
        if(!$acessoInsert){
            die("Ops. Ocorreu um erro no cadastro!");
        }

    //Compara as informações do form com banco pra já logar o usuário
    $login = "SELECT * ";
    $login .= "FROM usuario ";
    $login .= "WHERE email = '{$email}' and senha = '{$senha}' ";
    $acesso =  mysqli_query($conecta, $login);

    if(!$acesso){
      die("Ops. Ocorreu um erro no login automático!");
    }

    //Recebe as informações da consulta
    $informacao = mysqli_fetch_assoc($acesso);
    
    //Verifica se as inforamções de consulta não vieram vazias
    if ( empty($informacao) ){
      $mensagem = "Email ou senha informados não foram encontrados!";
    } else {
      $_SESSION["usuarioEmail"] = $informacao["email"];
      $_SESSION["usuarioNome"] = $informacao["nome"];
      header("location: index.php");
    }


    // Fechar as queries
    mysqli_free_result($queryInserir);

    // Fechar conexao
    mysqli_close($conecta);
  }    
?>