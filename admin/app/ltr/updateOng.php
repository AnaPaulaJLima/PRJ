<?php 
  require_once("connection.php");
  require_once("funcoesUploadFile.php");

function verificaFields(){
    if(isset($_POST["nome"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["ano"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["descricao"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["radioBtnStatus"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["foto_prin"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["foto_sec1"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["foto_sec2"]) ){
      return true;
    }else{
      return false;
    }
  }

  /*session_start();
  $emailUsuario = $_SESSION["usuarioEmail"];*/

  if(verificaFields()) {
    /*$queryUser = "SELECT id FROM USUARIO WHERE email like '$emailUsuario'";
    $result = $conecta->query($queryUser);
    $id = mysqli_fetch_assoc($result);
    $id_usuario = $id['id'];*/
    $resultado_prin = publicarArquivo($_FILES["foto_prin"]);
    $mensagem_prin = $resultado_prin[0];

    $resultado_sec1 = publicarArquivo($_FILES["foto_sec1"]);
    $mensagem_sec1 = $resultado_sec1[0];

    $resultado_sec2 = publicarArquivo($_FILES["foto_sec2"]);
    $mensagemsec2 = $resultado_sec2[0];


    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];
    $imagem_prin = $resultado_prin;
    $imagem_sec1 = $resultado_sec1;
    $imagem_sec2 = $resultado_sec2;
    $ativo = $_POST['radioBtnStatus'];
    
    
    if($ativo == "sim")
        $ativo = true;
    else
        $stivo = false;

    $update = "UPDATE ong SET nome_fantasia = '$nome', ano_fundacao = '$ano', ";
    $update .= "descricao = '$descricao', imagem_principal ='$imagem_prin', ";
    $update .= "ativo = '$ativo', imagem_sec1 ='$imagem_sec1', imagem_sec2 ='$imagem_sec2'";
    $update .= "WHERE ";
    $update .= "id = '$id'";

      $queryUpdate = mysqli_query($conecta, $update);
      if(!$queryUpdate) {
        die("Erro na inserção");
      } else {
        $mensagem = "Inserção ocorreu com sucesso.";
        header("location: tabelaONGs.php");
      }

      // Fechar as queries
    mysqli_free_result($queryUpdate);
    mysqli_free_result($result);

    // Fechar conexao
    mysqli_close($conecta);
  }else{
    echo "Erro";
  }
    
?>