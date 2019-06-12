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
        $ativo = false;

    $inserir = "INSERT INTO ong ";
    $inserir .= "(nome_fantasia, ano_fundacao, descricao, imagem_principal, ativo, imagem_secundaria, ";
    $inserir .= "video, endereco, email, celular, telefone) ";
    $inserir .= "VALUES ";
    $inserir .= "('$nome','$ano', '$descricao','$imagem_prin','$ativo','$imagem_sec1','$video', '$enderecoCompleto', '$email', '$telefone', '$celular')";

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