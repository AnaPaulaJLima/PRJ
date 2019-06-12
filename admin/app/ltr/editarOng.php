<?php
  session_start();
  //recebe o parâmetro GET
  $ID =  $_GET["id"]; 

  require_once("connection.php");

 $consulta = "SELECT * FROM ONG WHERE id = '{$ID}' ;";
 $query = $conecta->query($consulta);
  if(!$query) {
      die("falha na consulta ao banco");    
  }

  $ong = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo.jpg">
    <title>AmigoSolidário</title>
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
</head>


    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <div class="navbar-brand">
                        <a href="indexAdm.php" class="logo">
                            <b class="logo-icon">AmigoSolidário</b>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="indexAdm.php" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="perfil.php" aria-expanded="false">
                                <i class="mdi mdi-account-network"></i>
                                <span class="hide-menu">Perfil</span>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cadastrarOng.php" aria-expanded="false">
                                <i class="mdi mdi-arrange-bring-forward"></i>
                                <span class="hide-menu">Cadastrar ONGs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tabelaONGs.php" aria-expanded="false">
                                <i class="fas fa-list"></i>
                                <span class="hide-menu">Listagem de ONGs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cadastrarUser.php" aria-expanded="false">
                                <i class="mdi mdi-face"></i>
                                <span class="hide-menu">Cadastrar Usuário ADM</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="listUsers.php" aria-expanded="false">
                                <i class="fas fa-list"></i>
                                <span class="hide-menu">Gerenciamento Usuários ADM</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="logout.php" aria-expanded="false" >
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Edição de ONG</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edição de ONG</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
                $endereco_complet = $ong ['endereco'];
                $array_endereco = preg_split('/\,/', $endereco_complet);
                $logradouro = $array_endereco[0];
                $numero = $array_endereco[1];
                $bairro = $array_endereco[2];
                $cidade = $array_endereco[3];
                $cep = $array_endereco[4];
            ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <form class="form-horizontal m-t-30" action="updateOng.php" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nome Fantasia</label>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $ong ['nome_fantasia']?>">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> Ex. "example@gmail.com"</span></label>
                                    <input type="email" id="email" name="email" class="form-control" value="<?php echo $ong ['email']?>">
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Telefone</label>
                                        <input type="text" id="telefone" name="telefone" class="form-control" value="<?php echo $ong ['telefone']?>">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Celular</label>
                                        <input type="text" id="celular" name="celular" class="form-control" value="<?php echo $ong ['celular']?>">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Ano de Fundação</label>
                                        <input type="text" class="form-control" name="ano" value="<?php echo $ong ['ano_fundacao']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-10">
                                        <label>Logradouro</label>
                                        <input type="text" class="form-control" name="logradouro" value="<?php echo $logradouro?>">
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Número</label>
                                        <input type="number" class="form-control" name="numero" value="<?php echo $numero?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name="bairro" value="<?php echo $bairro?>">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="cidade" value="<?php echo $cidade?>">
                                    </div>
                                    <div class="form-group col-2">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="cep" value="<?php echo $cep?>">
                                    </div>
                                    <!--<div class="form-group col-2">
                                        <label>Estado</label>
                                        <select class="custom-select col-12" id="inlineFormCustomSelect" name="estado">
                                            <option selected>Qual estado</option>
                                            <option value="sp">SP</option>
                                            <option value="pr">PR</option>
                                            <option value="bh">BH</option>
                                        </select>
                                    </div>-->
                                </div>
                                <div class="form-group">
                                    <label>Descrição/Quem somos</label>
                                    <textarea class="form-control" name="descricao" rows="20"><?php echo $ong ['descricao']?></textarea>
                                </div>
                                
                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <label>Status</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="radioBtnStatus" value="sim" class="custom-control-input" <?php if($ong ['ativo'] == '1')echo "checked=\"checked\"" ?>>
                                            <label class="custom-control-label" for="customRadio1">Ativado</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="radioBtnStatus" value="nao" class="custom-control-input" <?php if($ong ['ativo'] == '0')echo "checked=\"checked\"" ?>>
                                            <label class="custom-control-label" for="customRadio2">Desativado</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Imagem de exibição principal</label>
                                    <input type="file" class="form-control" name="foto_prin">
                                </div>
                                <div class="form-group">
                                    <label>Imagem de exibição secundario (Será exibida na tela de informações da ONG)</label>
                                    <input type="file" class="form-control" name="foto_secundaria">
                                </div>
                                <div class="form-group">
                                    <label>Video sobre a ONG ou de algum projeto</label>
                                    <input type="file" class="form-control" name="video">
                                </div>
                                <input type="hidden" class="form-control" name="id" value="<?php echo $ID?>">
                                <div class="form-group">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">Editar</button>
                                            <a href="tabelaONGs.php" class="btn btn-link">Cancelar</a>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer text-center">
                © 2019 AmigoSolidário. Todos os direitos reservados.
            </footer>
        </div>
    </div>

    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../../dist/js/waves.js"></script>
    <script src="../../dist/js/sidebarmenu.js"></script>
    <script src="../../dist/js/custom.min.js"></script>
</body>

</html>