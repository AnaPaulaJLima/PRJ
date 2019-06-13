<?php 
    session_start();

  require_once("connection.php");

  $ongs = "SELECT * FROM ONG where ativo = '1';";
  $query = $conecta->query($ongs);
  if(!$query) {
      die("falha na consulta ao banco");   
  }

 $busca = "SELECT AVG(valor) AS media FROM DOACAO;";
  $media = $conecta->query($busca);
  if(!$media) {
      die("falha na consulta ao banco");   
  }else{
    $mediaDoacao = mysqli_fetch_assoc($media);
  }
    
    $buscaTotal = "SELECT COUNT(id) AS total FROM ONG;";
    $total = $conecta->query($buscaTotal);
    if(!$total) {
        die("falha na consulta ao banco");   
    }else{
        $totalOng = mysqli_fetch_assoc($total);
    }

    $buscaAtiva = "SELECT COUNT(id) AS ativa FROM ONG where ativo = '1';";
    $ativo = $conecta->query($buscaAtiva);
    if(!$ativo) {
        die("falha na consulta ao banco");   
    }else{
        $ongsAtivas = mysqli_fetch_assoc($ativo);
    }

    $buscaDesativo = "SELECT COUNT(id) AS desativa FROM ONG where ativo = '0';";
    $desativo = $conecta->query($buscaDesativo);
    if(!$desativo) {
        die("falha na consulta ao banco");   
    }else{
        $ongsDesativadas = mysqli_fetch_assoc($desativo);
    }

    $buscaDoacao = "SELECT o.nome_fantasia AS nomeOng, o.ativo As ativo, d.data AS dataDoacao, d.valor AS valor, p.credito 
                    AS credito, p.debito AS debito FROM doacao d INNER JOIN ONG o on d.id_ong = o.id 
                    INNER JOIN pagamento p on d.tipo_pagamento = p.id;";
    $doacao = $conecta->query($buscaDoacao);
    if(!$doacao) {
        die("falha na consulta ao banco");   
    }
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo.jpg">
    <title>AmigoSolidário</title>
    <link href="../../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>
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
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
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
                        <h4 class="page-title">Graficos</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="indexADM.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Graficos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Doações</h4>
                                <div class="sales ct-charts mt-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title m-b-5">Media de Doações</h5>
                                <h3 class="font-light"><?php $media = $mediaDoacao['media'];
                                                            $media = number_format($media, 2, '.', '');
                                                            echo $media?></h3>
                                <div class="m-t-20 text-center">
                                    <div id="earnings"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-b-0">Total Ongs</h4>
                                <h2 class="font-light"><?php echo $totalOng['total']?></h2>
                                <div class="m-t-30">
                                    <div class="row text-center">
                                        <div class="col-6 border-right">
                                            <span class="font-16 text-success font-medium"><?php echo $ongsAtivas['ativa']?></span>
                                            <h6 class="font-14 text-muted">Ongs Ativas</h6>
                                        </div>
                                        <div class="col-6">
                                            <span class="label label-rounded label-danger"><?php echo $ongsDesativadas['desativa']?></span>
                                            <h6 class="font-14 text-muted">Ongs Desativadas</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Doações por ongs</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Nome</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Data</th>
                                            <th class="border-top-0">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php 
                                            while($ongsDoacao = mysqli_fetch_assoc($doacao)){ ?>
                                            <tr>
                                                <td class="txt-oflo"><?php echo $ongsDoacao['nomeOng'] ?></td>
                                                <td><span class="label label-success label-rounded"><?php if($ongsDoacao['ativo'] == 1) $ativo = "ATIVO"; echo $ativo ?></span> </td>
                                                <td class="txt-oflo"><?php $data_complet = $ongsDoacao['dataDoacao'];
                                                                            $array_data = preg_split('/\-/', $data_complet);
                                                                            $data = $array_data[2] .'/' . $array_data[1] . '/' . $array_data[0];
                                                                            echo $data?></td>
                                                <td><span class="font-medium"><?php echo $ongsDoacao['valor'] ?></span></td>
                                            </tr> 
                                            <?php } ?>  
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
    <script src="../../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../dist/js/pages/dashboards/dashboard1.js"></script>
</body>

</html>