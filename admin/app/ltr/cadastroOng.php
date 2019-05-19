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
    if(isset($_FILES["foto"]) ){
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
    $resultado = publicarArquivo($_FILES["foto"]);

    $mensagem = $resultado[0];

    /*console.log($mensagem);*/



    $nome = $_POST['nome'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];
    $imagem = $resultado;
    $ativo = $_POST['radioBtnStatus'];

    if($ativo == "sim")
        $ativo = true;
    else
        $stivo = false;

    $inserir = "INSERT INTO ong ";
    $inserir .= "(nome_fantasia, ano_fundacao,descricao,imagem,ativo) ";
    $inserir .= "VALUES ";
    $inserir .= "('$nome','$ano', '$descricao','$imagem','$ativo')";

      $queryInserir = mysqli_query($conecta, $inserir);
      if(!$queryInserir) {
        die("Erro na inserção");
      } else {
        $mensagem = "Inserção ocorreu com sucesso.";
        header("location: tabelaONGs.php");
      }

      // Fechar as queries
    mysqli_free_result($queryInserir);
    mysqli_free_result($result);

    // Fechar conexao
    mysqli_close($conecta);
  }else{
    echo "Erro";
  }
    
?>