<?php 
  require_once("connection.php");

function verificaFields(){
    if(isset($_POST["nome_cartao"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["numero_cartao"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["mes"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["ano"]) ){
      return true;
    }else{
      return false;
    }
  
  }

  session_start();
  $emailUsuario = $_SESSION["usuarioEmail"];

  if(verificaFields()) {
    $queryUser = "SELECT id FROM USUARIO WHERE email like '$emailUsuario'";
    $result = $conecta->query($queryUser);
    $id = mysqli_fetch_assoc($result);
    $id_usuario = $id['id'];

    $id_ong = $_POST['id_ong'];
    $nome_cartao = $_POST['nome_cartao'];
    $numero_cartao = $_POST['numero_cartao'];
    $mes_vencimento = $_POST['mes'];
    $ano_vencimento = $_POST['ano'];
    $tipo_payment = $_POST['tipo_payment'];
    $valor = $_POST['valor']; 
    

    /*Condição da flag do tipodo pagamento*/
    if($tipo_payment == "credito"){
        $credito = true;
        $debito = false;
    }else if($tipo_payment == "debito"){
        $credito = false;
        $debito = true;
    }

    /*Condição do valor da doação */
    /*if($valor == "30")
        $valor = '30.00';
    else if($valor == "50")
        $valor = '50.00';
    else if($valor == "50")
        $valor = '100.00';
    else if($valor == "50")
        $valor = '150.00';*/


    $inserirPayment = "INSERT INTO pagamento ";
    $inserirPayment .= "(nome_cartao, numero_cartao, mes_vencimento, ano_vencimento, credito, debito) ";
    $inserirPayment .= "VALUES ";
    $inserirPayment .= "('$nome_cartao','$numero_cartao', '$mes_vencimento', '$ano_vencimento','$credito','$debito')";

    $queryInserirP = mysqli_query($conecta, $inserirPayment);
      if(!$queryInserirP) {
        die("Erro na inserção pagamento");
      } else {
        $mensagem = "Inserção ocorreu com sucesso.";
        $id = mysqli_insert_id($conecta);
        $id_payment = $id;

        $hora_doacao = date('H:i:s');

        $inserirDoacao = "INSERT INTO doacao ";
        $inserirDoacao .= "(id_ong, id_usuario, valor, tipo_pagamento, hora) ";
        $inserirDoacao .= "VALUES ";
        $inserirDoacao .= "('$id_ong', '$id_usuario', '$valor', '$id_payment', '$hora_doacao')";

        $queryInserirD = mysqli_query($conecta, $inserirDoacao);
        if(!$queryInserirD) {
            die("Erro na inserção doacao");
          } else {
            $mensagem = "Inserção ocorreu com sucesso.";
            header("location: ../index.php");
          }
      }

      // Fechar as queries
    mysqli_free_result($queryInserirP);
    mysqli_free_result($queryInserirD);

    // Fechar conexao
    mysqli_close($conecta);
}
?>