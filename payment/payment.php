<?php
  session_start();
  require_once("connection.php");
  //recebe o parâmetro GET
  $ID = $_GET["id"]; 

  $query = "SELECT * FROM ong WHERE id = '$ID';";

  $ongs = $conecta->query($query);
  if(!$ongs) {
      die("falha na consulta ao banco");   
  }else {
	$ong = mysqli_fetch_assoc($ongs);
  }
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Doação</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Payment Form Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Fugaz+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Alegreya+Sans:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="main">
		<h1></h1>
		<div class="content">
			
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
						
					</script>
						<div class="sap_tabs">
								<div class="pay-tabs">
									<h2><?php echo $ong['nome_fantasia']?></h2>
									  <ul class="resp-tabs-list">
										<div class="custom-control custom-radio">   
											<li class="resp-tab-item" role="tab"><span><label class="pic1"><input type="radio" id="radio30" name="radioBtnValor" value="30" class="custom-control-input">
											<br>R$ 30,00</label></span></li>
										</div>
										<div class="custom-control custom-radio">   
											<li class="resp-tab-item" role="tab"><span><label class="pic1"><input type="radio" id="radio50" name="radioBtnValor" value="50" class="custom-control-input">
											<br>R$ 50,00</label></span></li>
										</div>
										<div class="custom-control custom-radio">   
											<li class="resp-tab-item" role="tab"><span><label class="pic1"><input type="radio" id="radio100" name="radioBtnValor" value="100" class="custom-control-input">
											<br>R$ 100,00</label></span></li>
										</div>
										<div class="custom-control custom-radio">   
											<li class="resp-tab-item" role="tab"><span><label class="pic1"><input type="radio" id="radio150" name="radioBtnValor" value="150" class="custom-control-input">
											<br>R$ 150,00</label></span></li>
										</div>
										  <div class="clear"></div>
									  </ul>	
								</div>
								<?php
											function valor(){
												$valor = "radioBtnValor";
											
													if ($valor == "30.00"){
														return	$valorDoacao = "30.00";}
													else if ($valor == "50.00"){
														return $valorDoacao = "50.00";	}
													else if ($valor == "100.00") {
														return $valorDoacao = "100.00";	}
													else if ($valor == "150.00") {
														return	$valorDoacao = "150.00";	}
											}		
								?>
								<div id="horizontalTab" style=" width: 100%; margin: 0px;">
								<div class="pay-tabs">
									<ul class="resp-tabs-list">
										<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label></label><i class="far fa-credit-card"></i> Credit Card</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label></label><i class="fas fa-credit-card"></i> Debit Card</span></li>
										<div class="clear"></div>
									</ul>	
								</div>
								<div class="resp-tabs-container">
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="payment-info">
										<h3 class="pay-title">Informações Cratão de Crédito</h3>
											<form id="formCredito"action="doacao.php" method="POST" role="form" enctype="multipart/form-data">
												<div class="tab-for">				
													<h5>Email</h5>
														<input type="text" name="email" placeholder="amigosolidario@gmail.com">
													<h5>CPF</h5>													
														<input type="text" name="cpf" placeholder="000.000.000-00" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
												</div>			
											
												<div class="tab-for">				
													<h5>Nome impresso no cartão</h5>
														<input type="text" name="nome_cartao" placeholder="MARIANA J LIMA">
													<h5>Número do cartão</h5>													
														<input class="pay-logo" type="text" name="numero_cartao" placeholder="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>Vencimento</h5>
															<ul>
																<li>
																	<input type="number" name="mes" class="text_box" type="text" placeholder="6" min="1" />	
																</li>
																<li>
																	<input type="number" name="ano" class="text_box" type="text" placeholder="1988" min="1" />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
														<h5>CVV</h5>													
															<input type="text" placeholder="xxx" onfocus="this.value = '';" onblur="if (this.value == '3') {this.value = 'xxx';}" required="">
													</div>
													<div class="clear"></div>
												</div>
												<input type="hidden" class="form-control" name="id_ong" value="<?php echo $ID?>">
												<input type="hidden" class="form-control" name="valor" value="<?php valor()?>">
												<input type="hidden" class="form-control" name="tipo_payment" value="credito">
												<input type="submit" value="DOAR">
											</form>
											<div class="single-bottom">
											</div>
										</div>
									</div>
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">	
										<div class="payment-info">
											
											<h3 class="pay-title">Informações do Cartão de Débito</h3>
											<form id="formDebito" action="doacao.php" method="POST" role="form" enctype="multipart/form-data">
												<div class="tab-for">
													<h5>Nome impresso no cartão</h5>
														<input type="text" name="nome_cartao" placeholder="MARIANA J LIMA">
													<h5>Número do cartão</h5>													
														<input class="pay-logo" type="text" name="numero_cartao" placeholder="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">				
												</div>	
												<div class="transaction">
													<div class="tab-form-left user-form">
														<h5>Vencimento</h5>
															<ul>
																<li>
																	<input type="number" name="mes" class="text_box" type="text" placeholder="6" min="1" />	
																</li>
																<li>
																	<input type="number" name="ano" class="text_box" type="text" placeholder="1988" min="1" />	
																</li>
																
															</ul>
													</div>
													<div class="tab-form-right user-form-rt">
														<h5>CVV</h5>													
															<input type="text" placeholder="xxx" onfocus="this.value = '';" onblur="if (this.value == '3') {this.value = 'xxx';}" required="">
													</div>
													<div class="clear"></div>
												</div>
												<input type="hidden" class="form-control" name="id_ong" value="<?php echo $ID?>">
												<input type="hidden" class="form-control" name="tipo_payment" value="debito">


												<input type="submit" value="DOAR">
											</form>
											<div class="single-bottom">
													<ul>
														<li>
															<input type="checkbox"  id="brand" value="">
															<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
														</li>
													</ul>
											</div>
										</div>	
									</div>
								</div>	
							</div>
						</div>	

		</div>
		<p class="footer">Copyright © 2016 Payment Form Widget. All Rights Reserved | Template by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	</div>
</body>
</html>