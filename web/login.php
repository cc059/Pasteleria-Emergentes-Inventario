<!DOCTYPE html>
<html>
<head>
  <link rel='icon' type='image/x-icon' href='images/favicon.ico' />
	<title>Inicio de sesión</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles_login.css">
</head>
<body>

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Iniciar Sesión</h2>

<form action="process_login.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Usuario</label>
    <input type="text" class="form-control" name="usuario" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Contraseña</label>
    <input type="password" class="form-control" name="contraseña" placeholder="">
  </div>
  
  <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Recordarme</small>
    </label>
    <button type="submit" class="btn btn-login float-right" name="btn_entrar">Entrar</button>
  </div>
</form>

<div class="copy-text">Lexar's Bakery <i class="fa fa-heart"></i> te da la bienvenida!</div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="images/1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Los mejores sabores!</h2>
            <p>Los pasteles con los mejores sabores en la ciudad.</p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/5.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Disfruta tu trabajo!</h2>
            <p>No hay un mejor lugar para trabajar que una pasteleria. Ama lo que haces!</p>
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/3.jpg" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Tu eres nuestra prioridad!</h2>
            <p>Lexar's Bakery se preocupa por sus empleados asi que les ofrecemos todo tipo de beneficios.</p>
        </div>	
    </div>
    </div>
            </div>	   
		    
		</div>
	</div>
</div>
</section>
</body>
</html>