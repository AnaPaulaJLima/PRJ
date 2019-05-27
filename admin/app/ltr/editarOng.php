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
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>AmigoSolidario - Gerencial</title>
    <!-- Custom CSS -->
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
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                    <a href="indexAdm.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--<h4 class="page-title">AmigoSolidário</h4>-->
                                AmigoSolidário
                                <!--<img src="../../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />-->
                                 
                                <!--<img src="../../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />-->
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <!--<span class="logo-text">
                                 dark Logo text 
                                <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                                Light Logo text 
                                <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                            </span>-->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
                    
                </div>
            </nav>
        </header>-->
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
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
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
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
                                    <label>Ano de Fundação</label>
                                    <input type="text" class="form-control" name="ano" value="<?php echo $ong ['ano_fundacao']?>">
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
                                    <label>Imagem</label>
                                    <input type="file" class="form-control" name="foto">
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
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>

        </div>

    </div>

    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
</body>

</html>