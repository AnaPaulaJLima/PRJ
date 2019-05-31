<?php
  session_start();
  unset($_SESSION["usuarioEmail"]);
  unset($_SESSION["usuarioNome"]);
  header("location: loginADM.php");
?>