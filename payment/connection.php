<?php
  $servidor= "localhost";
  $usuario= "ongs";
  $senha="ongs";
  $banco="dbongs";
  $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);

  if( mysqli_connect_errno() ) {
    die("Conexão falhou: ". mysqli_connect_errno());
  }
?>