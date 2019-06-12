<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../../dist/css/stylelogin.css" rel="stylesheet">
    <link href="../../dist/js/login.js" >
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo.jpg">
    <title>AmigoSolidário</title>
    
</head>

<body>

    <div class="login-page">
    <div class="form">
        <form class="register-form" >
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="text" placeholder="email address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form class="login-form" action="logar.php" method="POST" role="form" enctype="multipart/form-data">
        <h1>AmigoSolidário</h1>
        <input type="text" name="email" placeholder="login"/>
        <input type="password" name="senha" placeholder="senha"/>
        <button type=submit>Entrar</button>
        <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
        
        </form>
    </div>
    </div>
</body>

</html>