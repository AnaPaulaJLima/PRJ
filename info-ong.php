<?php
  session_start();
  //recebe o parâmetro GET
  $ID =  $_GET["id"]; 

  require_once("connection/connection.php");

 $consulta = "SELECT * FROM ONG WHERE id = '{$ID}' ;";
 $query = $conecta->query($consulta);
  if(!$query) {
      die("falha na consulta ao banco");    
  }

  $ong = mysqli_fetch_assoc($query);
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
  <script type="text/javascript" src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="js/mapa.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDoaQUc8HMwkucxT6-3UB4r6hdP83lro1M&callback=initMap" async defer></script>
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

  <!--/ Intro Single star /-->
  <section class="intro-single"  >
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box" >
            <h1 class="title-single"><?php echo $ong['nome_fantasia'] ?></h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="ongs.php">ONGs</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <?php echo $ong['nome_fantasia'] ?> 
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <?php
      if( !isset($_SESSION["usuarioNome"])) {
      echo '
      <div class="row" >
          <div class="col-md-2"></div>
            <div class="col-md-5" >   
            </div>
          <div class="col-md-4" >
          <h6>OBS.: Para realizar uma doação é necessário esta logado no site </h6>
          </div>
          </div>  ';
      } else {
      echo '
        <div class="row" >
          <div class="col-md-2"></div>
            <div class="col-md-5" >   
            </div>
          <div class="col-md-4" >
            <a type="button" class="btn btn-b-n" href="payment/payment.php?id='?><?= $ong['id']?><?php echo'" aria-expanded="false" style="width: 350px; height: 55px"><span class="nav-link">Contribua agora!</span></a>
          </div>
        </div>  
          ';
      }
    ?> 
  </section>

  <?php
    $img_sec_complet = $ong ['imagem_secundaria'];
    $array_img_sec = preg_split('/\//', $img_sec_complet);
    $foto_sec = 'img/' . $array_img_sec[4];

    $video_complet = $ong ['video'];
    $array_video = preg_split('/\//', $video_complet);
    $video = 'video/' . $array_video[4];
  ?>
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="<?php echo $foto_sec ?>" alt="imagem ong">
            </div>
          </div>
          <div class="col-md col-lg section-md">
              <div class="row">
                <div class="col-sm-">
                  <div class="title-box-d">
                    <h3 class="title-d">Quem somos</h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                </p><p class="description color-text-a no-margin">
                    <?php echo $ong['descricao'] ?>
                </p>
              </div>
              
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Projetos e Ações</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a no-margin">
                  <li>Oficina de Musica</li>
                  <li>Atividade de culinaria artesanal</li>
                  <li>Atividade cultural, artisitica e ludica</li>
                  <li>Atividade de recreação</li>
                  <li>Atividade de inclusão digital</li>
                  <li>Atividade de tecelagem</li>
                  <li>Atividade socioeducativa e sociocomunitaria</li>
                  <li>Serviço pedagogico</li>
                  <li>Serviço de piscologia</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10 offset-md-1">
          <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab"
                aria-controls="pills-video" aria-selected="true">Video</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                aria-selected="false">Localização</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
              <video width="100%" height="460" controls="controls">
              <source src="<?php echo $video ?>" type="video/mp4">                
              </video>
            </div>
            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab" >
              <div id="map" style="height: 500px; width: 850px"></div>
                <br>
                <input class="form-control" id="endereco" name="endereco" value="<?php echo $ong['endereco']?>" disabled>
                <input type="hidden" id="btnEndereco" name="btnEndereco" onclick="carregarNoMapa(endereco.value)" value="Mostrar no mapa" />
            </div>
          </div>
          <br>
          <br>
          <?php
              if( !isset($_SESSION["usuarioNome"])) {
              echo '<div class="row" >
              <div class="col-md-12 col-lg-3"></div>
              <div class="col-md-12 col-lg-8" >
                    <h6>OBS.: Para realizar uma doação é necessário esta logado no site </h6>
                    </div>
                </div>  ';
              } else {
              echo '
                <div class="row" >
                  <div class="col-md-12 col-lg-3"></div>
                  <div class="col-md-12 col-lg-8" >
                    <a type="button" class="btn btn-b-n" href="payment/payment.php?id='?><?= $ong['id']?><?php echo'" aria-expanded="false" style="width: 350px; height: 55px"><span class="nav-link">Contribua agora!</span></a>
                  </div>
                </div>  
                  ';
              }
          ?> 
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Contato</h3>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-12 col-lg-2"></div>
            <div class="col-md-12 col-lg-8">
              <div class="property-agent">
                <h4 class="title-agent"><?php echo $ong['nome_fantasia'] ?></h4>
                <p class="color-text-a">
                  Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                  dui. Quisque velit nisi,
                  pretium ut lacinia in, elementum id enim.
                </p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <strong>Telefone:</strong>
                    <span class="color-text-a"><?php echo $ong['telefone'] ?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Celular:</strong>
                    <span class="color-text-a"><?php echo $ong['celular'] ?></span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <span class="color-text-a"><?php echo $ong['email'] ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <!--<div class="col-md-12 col-lg-6">
              <div class="property-contact">
                <form class="form-a">
                  <div class="row">
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-lg form-control-a" id="inputName"
                          placeholder="Name *" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1"
                          placeholder="Email *" required>
                      </div>
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group">
                        <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45"
                          rows="8" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-a">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>-->
          </div>
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
              <span class="color-a">AmigoSolidário.</span> Todos os direitos reservados.
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
