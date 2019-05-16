<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>AmigoSolidário</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: EstateAgency
    Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
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
            <a class="nav-link" href="about.php">Sobre Nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ongs.php">Ongs</a>
          </li>
          <!--<li class="nav-item">
          <a class="nav-link" href="blog-grid.html">Blog</a>
        </li>-->
        <?php
          if ( isset($_SESSION["usuarioNome"])) {
          echo '<li class="nav-item">
                  <a class="nav-link">Contribuir</a>
              </li>';
          }
      ?>
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
              <li class="nav-item"><a>ou</a></li>
              <button type="button" class="btn btn-b-n" data-toggle="modal"
                data-target="#modalCadastro" aria-expanded="false">
                  <span class="nav-link" aria-hidden="true">Cadastre-se</span>
              </button> 
                  ';
              } else {
              echo '
                  <p class="nav-link">Bem vindo(a), ' . $_SESSION["usuarioNome"] .' </p>                                  
                  <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                  </li>
                  
                    
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
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Hospital de Retaguarda Franscico de Assis</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="property-grid.html">ONGs</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                 Hospital Francisco de Assis 
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
            <div class="carousel-item-b">
              <img src="img/retaguarda.jpg" alt="">
            </div>
            <div class="carousel-item-b">
              <img src="img/Retaguarda2.jpg" alt="">
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
                <p class="description color-text-a">
                O Hospital de Retaguarda Francisco de Assis é uma instituição filantrópica sem fins lucrativos, 
                que atua em Ribeirão Preto e região, com a finalidade de prestar assistência a enfermos acamados com
                doenças crônicas e em situação estável, mas que necessitam de cuidados prolongados. 
                </p>
                <p class="description color-text-a no-margin">
                Nossa equipe técnica é composta por profissionais altamente qualificados, presta assistência aos pacientes 24h, 
                e dentre os profissionais estão: médicos, enfermeiros, técnicos de enfermagem, psicólogos, 
                nutricionistas, fisioterapeutas, fonoaudiólogos e farmacêuticos. Também contamos com um serviço 
                de acompanhamento familiar, oferecendo um tratamento mais humanizado, permitindo visitas a qualquer
                momento a fim de manter a proximidade do paciente com sua família.
                Esse trabalho é possível graças à ajuda da sociedade, que através de doações, é responsável por cerca 
                de 80% dos recursos disponíveis para o funcionamento do hospital, sendo o restante proveniente de 
                convênios diversos. Por esse motivo somos imensamente gratos a sociedade por nos permitir manter o 
                serviço funcionando 24h por dia, o que dá esperança a pacientes e familiares para vencer os desafios 
                diários. Essa ajuda e confiança potencializa os resultados e frutos do nosso trabalho, além de fortalecer
                o ideal de servir àqueles que mais necessitam de assistência. Trabalhamos sempre com carinho e dignidade, 
                princípios norteadores de nossa vida no Hospital de Retaguarda Francisco de Assis.
                </p>
                <p class="description color-text-a no-margin">
                O apoio da comunidade, em forma de doações e voluntariado, é essencial em nossa caminhada e, muitas vezes, 
                contrariando todas as possibilidades conseguimos alcançar resultados além de nossas expectativas. Graças a 
                esta motivação, proporcionada nossos colaboradores e em seu amor ao próximo, podemos ir mais além e buscar 
                cada vez mais novas maneiras de ajudar a população que mais precisa.
                </p><p class="description color-text-a no-margin">
                O nosso ideal é humanizar vidas e, assim, fazer a diferença no mundo. Aqui, a ação acontece, 
                e por meio de nossas atitudes diárias, estamos fazendo história graças ao apoio das pessoas que 
                contribuem conosco e fazem parte de nossa trajetória.
                </p>
              </div>
              <!--
              <div class="row section-t3">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d">Amenities</h3>
                  </div>
                </div>
              </div>
              <div class="amenities-list color-text-a">
                <ul class="list-a no-margin">
                  <li>Balcony</li>
                  <li>Outdoor Kitchen</li>
                  <li>Cable Tv</li>
                  <li>Deck</li>
                  <li>Tennis Courts</li>
                  <li>Internet</li>
                  <li>Parking</li>
                  <li>Sun Room</li>
                  <li>Concrete Flooring</li>
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
              <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans"
                aria-selected="false">Floor Plans</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map"
                aria-selected="false">Ubication</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
              <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0"
                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
              <img src="img/plan2.jpg" alt="" class="img-fluid">
            </div>
            <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834"
                width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row section-t3">
            <div class="col-sm-12">
              <div class="title-box-d">
                <h3 class="title-d">Contact Agent</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <img src="img/agent-4.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="property-agent">
                <h4 class="title-agent">Anabella Geller</h4>
                <p class="color-text-a">
                  Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                  dui. Quisque velit nisi,
                  pretium ut lacinia in, elementum id enim.
                </p>
                <ul class="list-unstyled">
                  <li class="d-flex justify-content-between">
                    <strong>Phone:</strong>
                    <span class="color-text-a">(222) 4568932</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Mobile:</strong>
                    <span class="color-text-a">777 287 378 737</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Email:</strong>
                    <span class="color-text-a">annabella@example.com</span>
                  </li>
                  <li class="d-flex justify-content-between">
                    <strong>Skype:</strong>
                    <span class="color-text-a">Annabela.ge</span>
                  </li>
                </ul>
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
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                      <a href="#">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
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
            </div>
          </div>-->
        </div>
      </div>
    </div>
  </section>
  <!--/ Property Single End /-->

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
              &copy; Copyright
              <span class="color-a">Amigo Solidário</span> Todos os direitos reservados.
            </p>
          </div>
          <!--<div class="credits">
            
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
            
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>-->
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
