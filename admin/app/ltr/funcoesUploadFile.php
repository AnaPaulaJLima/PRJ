<?php

  function gerarCodigoUnico() {
    $alfabeto   = "23456789ABCDEFJGHJKMNPQRS";
    $tamanho    = 30;
    $letra      = "";
    $resultado  = "";

    for ($i = 1; $i < $tamanho ; $i++ ) {
      //sorteia um dos caracteres da palavra variavel alfabeto e concatena até resultado conter 30 caracteres
      $letra      = substr( $alfabeto, rand(0,23), 1); 
      $resultado  .= $letra;
    }

    //gera um codigo utilizando a data + horario naquele instante
    date_default_timezone_set('America/Recife');
    $agora = getdate();
    $codigo_data = $agora['year'] . "_" . $agora['yday'];
    $codigo_data .= $agora['hours'] . $agora['minutes'] . $agora['seconds'];
    
    //concatena os codigos gerados
    return "foto_" . $codigo_data . "_" . $resultado;
  }

  //pega apenas a extensão do nome da imagem
  function getExtensao($nome) {
    //funcao pega caracteres a partir do caracterer selecionado
    return strrchr($nome,".");
  }

  function  publicarArquivo( $imagem ) {
    $arquivo_tmp = $imagem["tmp_name"];
    $nome_original = basename( $imagem["name"] );
    $nome_novo = gerarCodigoUnico() . getExtensao($nome_original);
    $nome_completo = "../../../img/" . $nome_novo;

    move_uploaded_file($arquivo_tmp, $nome_completo);

    return $nome_completo;

  }

   function mostrarAvisoPublicacao( $numero ) {
    // Array com possiveis erros ao fazer upload de arquivo para PHP
    $array_erro = array(
      UPLOAD_ERR_OK => "Sem erro.",
      UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
      UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
      UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
      UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
      UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
      UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
      UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
    );

    return $array_erro[$numero];
  }

?>