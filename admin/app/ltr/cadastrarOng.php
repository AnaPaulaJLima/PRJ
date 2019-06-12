<?php
  session_start();
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
                    <!--<ul class="navbar-nav float-left mr-auto">
                        
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-magnify font-20 mr-1"></i>
                                    <div class="ml-1 d-none d-sm-block">
                                        <span>Search</span>
                                    </div>
                                </div>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                    </ul> -->
                    <!--<ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                            </div>
                        </li>
                    </ul>-->
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
                                <i class="mdi mdi-border-none"></i>
                                <span class="hide-menu">Listagem de ONGs</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="cadastrarUser.php" aria-expanded="false">
                                <i class="mdi mdi-face"></i>
                                <span class="hide-menu">Cadastrar Usuário</span>
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
                        <h4 class="page-title">Cadastro de ONGs</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Cadastro de ONGs </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <form class="form-horizontal m-t-30" action="cadastroOng.php" method="POST" role="form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nome Fantasia</label>
                                    <input type="text" class="form-control" name="nome" placeholder="Amigos do Bem">
                                </div>
                                <div class="form-group">
                                    <label for="example-email">Email <span class="help"> Ex. "example@gmail.com"</span></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Telefone</label>
                                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(19)3919-3593">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Celular</label>
                                        <input type="text" id="celular" name="celular" class="form-control" placeholder="(19)99400-5587">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Ano de Fundação</label>
                                        <input type="text" class="form-control" name="ano" placeholder="1978">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-10">
                                        <label>Logradouro</label>
                                        <input type="text" class="form-control" name="logradouro" placeholder="Rua Do Bem">
                                    </div>
                                    <div class="form-group col-2">
                                        <label>Número</label>
                                        <input type="number" class="form-control" name="numero" placeholder="2724">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-4">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" name="bairro" placeholder="Centro">
                                    </div>
                                    <div class="form-group col-4">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" name="cidade" placeholder="São Carlos">
                                    </div>
                                    <div class="form-group col-2">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" name="cep" placeholder="13560-001">
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
                                    <textarea class="form-control" name="descricao" rows="20"></textarea>
                                </div>
                                <div class="form-group row p-t-20">
                                    <div class="col-sm-4">
                                        <label>Status</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="radioBtnStatus" value="sim" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1" checked >Ativado</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="radioBtnStatus" value="nao" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2" checked >Desativado</label>
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
                                <div class="form-group">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success">Cadastrar</button>
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