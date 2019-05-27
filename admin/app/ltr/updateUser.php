<?php 
  require_once("connection.php");

  session_start();

  //Verifica se uma das variaveis está configurada
  if(isset($_POST["email"])){

    //Recebe as informações do form
    $id = $_POST['id'];
    $nome = $_POST["nome"];
    $celular = $_POST["celular"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    //Compara as informações do form com banco de dados
    /*$verifica = "SELECT * ";
    $verifica .= "FROM usuario ";
    $verifica .= "WHERE email = '{$email}' ";

    $acessoVerifica =  mysqli_query($conecta, $verifica);
    if(!$acessoVerifica){
        die("Falha na consulta ao banco(email)");
    }*/

    //Montando a query de insert 
    $update = "UPDATE usuario SET email = '$email', senha = '$senha', ";
    $update .= "nome = '$nome', celular ='$celular' ";
    $update .= "WHERE ";
    $update .= "id = '$id'";

    $queryUpdate =  mysqli_query($conecta, $update);
        if(!$queryUpdate){
            die("Ops. Ocorreu um erro no cadastro!");
        }else{
            header("location: listUsers.php");
        }

    // Fechar as queries
    mysqli_free_result($queryUpdate);

    // Fechar conexao
    mysqli_close($conecta);
  }    
?>