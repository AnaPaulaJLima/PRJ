<?php 
  require_once("connection.php");

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
    $register .= "(email, senha, nome, celular, admin) VALUES ";
    $register .= "('{$email}', '{$senha}', '{$nome}', '{$celular}', '1')";

    $acessoInsert =  mysqli_query($conecta, $register);
        if(!$acessoInsert){
            die("Ops. Ocorreu um erro no cadastro!");
        }else{
            header("location: listUsers.php");
        }

    // Fechar as queries
    mysqli_free_result($queryInserir);

    // Fechar conexao
    mysqli_close($conecta);
  }    
?>