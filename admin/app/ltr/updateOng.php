<?php 
  require_once("connection.php");
  require_once("funcaoUploadImg.php");
  require_once("funcaoUploadVideo.php");

function verificaFields(){
    if(isset($_POST["nome"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["email"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["telefone"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_POST["celular"]) ){
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
    if(isset($_FILES["foto_secundaria"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["video"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["logradouro"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["numero"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["bairro"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["cidade"]) ){
      return true;
    }else{
      return false;
    }
    if(isset($_FILES["cep"]) ){
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
    $resultado_prin = publicarArquivoImg($_FILES["foto_prin"]);
    $mensagem_prin = $resultado_prin[0];

    $resultado_sec1 = publicarArquivoImg($_FILES["foto_secundaria"]);
    $mensagem_sec1 = $resultado_sec1[0];

    $resultado_video = publicarArquivoVideo($_FILES["video"]);
    $mensagem_video = $resultado_video[0];

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];
    $imagem_prin = $resultado_prin;
    $imagem_sec1 = $resultado_sec1;
    $video = $resultado_video;
    $ativo = $_POST['radioBtnStatus'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];

    $enderecoCompleto = $logradouro.", ".$numero.", ".$bairro.", ".$cidade.", ".$cep;
    
    if($ativo == "sim")
        $ativo = true;
    else
        $stivo = false;

    $update = "UPDATE ong SET nome_fantasia = '$nome', ano_fundacao = '$ano', ";
    $update .= "descricao = '$descricao', imagem_principal ='$imagem_prin', ";
    $update .= "ativo = '$ativo', imagem_secundaria ='$imagem_sec1', video ='$video',"; 
    $update .= "endereco ='$enderecoCompleto', email = '$email', telefone = '$telefone', celular = '$celular' ";
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