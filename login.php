<?php

  require_once("connection/connection.php");
  
  //inicia uma seção na pagina
  session_start();

  //Verifica se uma das variaveis está configurada
  if(isset($_POST["email"])){
    //Recebe as informações do form
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    echo $email . $senha;
    //Compara as informações do form com banco de dados
    $login = "select * ";
    $login .= "from usuario ";
    $login .= "where email = '{$email}' and senha = '{$senha}' ";
    $acesso =  mysqli_query($conecta, $login);

    var_dump($login);
    if(!$acesso){
      die("Falha na consulta ao banco");
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
  }

  
?>