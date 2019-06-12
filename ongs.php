<?php
  session_start();
  require_once("connection/connection.php");
  $query = "SELECT * FROM ong WHERE ativo = '1';";

  $listOng = $conecta->query($query);
  if(!$listOng) {
      die("falha na consulta ao banco");   
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <link rel="icon" type="image/png" sizes="16x16" href="admin/assets/images/logo.jpg">
	<title>AmigoSolidário</title>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <div class="click-closed"></div>

 <!--/ Nav Star /-->
 <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.php">Amigo<span class="color-b">Solidário</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Sobre Nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ongs.php">Ongs</a>
          </li>
          <!--<li class="nav-item">
          <a class="nav-link" href="blog-grid.html">Blog</a>
        </li>-->
     
        </ul>
      </div>
   
      <!--<form class="form-inline my-2 my-lg-0"> -->
          <?php
              if( !isset($_SESSION["usuarioNome"])) {
              echo '

              <button type="button" class="btn btn-b-n" data-toggle="modal"
                  data-target="#modalLogin" aria-expanded="false">
                    <span class="nav-link">Login</span>
              </button>
              <a class="nav-item">ou</a>
              <button type="button" class="btn btn-b-n" data-toggle="modal"
                data-target="#modalCadastro" aria-expanded="false">
                  <span class="nav-link" aria-hidden="true">Cadastre-se</span>
              </button> 
                  ';
              } else {
              echo '
                <p class="nav-link" style="padding-right: 20px">Bem vindo(a), ' . $_SESSION["usuarioNome"] .' </p>                                
                <a class="nav-link" href="logout.php">Sair</a>
                  ';
              }
          ?> 
    </div>
  </nav>
  <!--/ Nav End /-->

  <!-- /Modal Login--> 
  <div id="modalLogin" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">				
          <h4 class="modal-title">Login</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form action="login.php" method="POST">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Login" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="senha" placeholder="Senha" required="required">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
            </div>
            <p class="hint-text"><a href="#">Esqueceu a Senha?</a></p>
          </form>
        </div>
        <div class="modal-footer">Não tem uma conta? <a href="#"> Crie uma</a></div>
      </div>
    </div>
  </div>     
 <!-- /Modal Login--> 
 
  <!-- /Modal Cadastro--> 
  <div id="modalCadastro" class="modal fade">
    <div class="modal-dialog modal-login">
      <div class="modal-content">
        <div class="modal-header">				
          <h4 class="modal-title">Cadastro</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <form action="cadastrarUsuario.php" method="POST">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" name="nome" placeholder="Nome" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control" name="email" placeholder="Email@email.com" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="text" class="form-control" name="celular" placeholder="(16)99999-9999" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" name="senha" placeholder="Senha" required="required">
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block btn-lg">Entrar</button>
              <p class="hint-text"><a href="index.php">Cancelar</a></p>
            </div>
          </form>
        </div>
        <div class="modal-footer">Já tem conta? <a href="#modalLogin"> Faça login</a></div>
      </div>
    </div>
  </div>     
 <!-- /Modal Cadastro--> 

  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">ONGs parceiras</h1>
            <span class="color-text-a"></span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                ONGs
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

      <section class="property-grid grid">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="grid-option">
                <form>
                  <select class="custom-select">
                    <option selected>All</option>
                    <option value="1">New to Old</option>
                    <option value="2">For Rent</option>
                    <option value="3">For Sale</option>
                  </select>
                </form>
              </div>
            </div>
            <div class="col-md-4">
            <?php
                while( $ongs = mysqli_fetch_assoc($listOng)) {

                  $fotoComplet = $ongs ['imagem_principal'];
                  $arraFoto = preg_split('/\//', $fotoComplet);
                  $foto = 'img/' . $arraFoto[4];
            ?>
              <div class="card-box-a card-shadow" style="width: 20rem">
                <div class="img-box-a">
                  <img src="<?php echo $foto ?>" alt="imagem da ong" class="img-a img-fluid">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="info-ong.php?id=<?= $ongs['id']?>"><?php echo $ongs['nome_fantasia'] ?>
                          <br /> </a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <a href="info-ong.php?id=<?= $ongs['id']?>" class="link-a">Saber mais
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">  
          <?php } ?>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <nav class="pagination-a">
                <ul class="pagination justify-content-end">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <span class="ion-ios-arrow-back"></span>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item next">
                    <a class="page-link" href="#">
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </section>
  <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">AmigoSolidário</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
          </div>
        </div>
        
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a >Termos e Uso</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a >Politica de Privacidade</a>
                </li>
                <li class="item-list-a">
                <i class="fa fa-angle-right"></i> <a >Ajuda/Contato</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; 2019
              <span class="color-a">AmigoSolidário.</span>Todos os direitos reservados.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ Footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/scrollreveal/scrollreveal.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
