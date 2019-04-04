<?php
include('clases\master.php');
$clientes= new camposCliente();

if($_POST){
	$id_cliente=$_POST['txtid'];
	$nombre_cliente=$_POST{'txtnombre'};
	$direccion=$_POST{'txtdireccion'};
	$telefono=$_POST{'txttelefono'};
	$DUI=$_POST{'txtdui'};
	$sexo=$_POST{'txtsexo'};
	$email=$_POST{'txtemail'};
	$clientes->asignarValor($id_cliente,$nombre_cliente,$direccion,$telefono,$DUI,$sexo,$email);
	$clientes->guardar();
}
elseif(isset($_GET{'eliminar'})){
		$clientes->eliminar($_GET{'eliminar'});
	}
elseif(isset($_GET{'modificar'})){
	$clientes->modificar($_GET{'modificar'});
	}



?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<link rel='icon' type='image/x-icon' href='images/favicon.ico' />
	<title>Lexar's Bakery|Pasteles con amor</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Cakes Bakery Services Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Oxygen:300,400,700&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Pacifico&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
    <!-- //Web-Fonts -->
    <!-- css de tabla -->
    <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 95%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
 <!-- css de tabla termina -->

</head>

<body>
	<div class="mian-content">
		<!-- header -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="logo text-left">
					<h1>
						<a class="navbar-brand" href="index.php">
							<img src="images/logo.png" alt="" class="img-fluid">Lexar's Bakery</a>
					</h1>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">

					</span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-lg-auto text-lg-right text-center">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Inicio
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
							    aria-haspopup="true" aria-expanded="false">
								Inventario
							</a>
							<div class="dropdown-menu text-lg-left text-center" aria-labelledby="navbarDropdown">
								<a class="dropdown-item link"  href="compras.php">Compras</a>
								<a class="dropdown-item link"  href="ventas.php">Ventas</a>
								<a class="dropdown-item link"  href="pedidos.php">Pedidos</a>
								<a class="dropdown-item link"  href="inventario_producto.php">Inventario Producto</a>
								<a class="dropdown-item link"  href="inventario_materia_prima.php">Inventario Materia Prima</a>
								<a class="dropdown-item link"  href="categorias.php">Categorias</a>
								<a class="dropdown-item link"  href="tipos_pago.php">Tipos de pago</a>
							</div>
						</li>
						<li class="nav-item active dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
							    aria-haspopup="true" aria-expanded="false">
									Personal
							</a>
							<div class="dropdown-menu text-lg-left text-center" aria-labelledby="navbarDropdown">
								<a class="dropdown-item link"  href="clientes.php">Clientes</a>
								<a class="dropdown-item link"  href="empleados.php">Empleados</a>
								<a class="dropdown-item link"  href="proveedores.php">Proveedores</a>

							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="gallery.html">Galería</a>
						</li>
											<!-- menu contactanos -->
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Contáctanos</a>
						</li>
					</ul>
					<!-- menu button -->
					<div class="menu">
						<a href="#" class="navicon"></a>
						<div class="toggle">
							<ul class="toggle-menu list-unstyled">
								<li>
									<a href="index.php">Index Page</a>
								</li>
								<li>
									<a class="scroll" href="#products">Nuevos Productos</a>
								</li>
								<li>
									<a href="gallery.html">Ultimos Pasteles</a>
								</li>
								<li>
									<a class="scroll" href="#order">Ordenar Pastel</a>
								</li>
								<li>
									<a class="scroll" href="faq.html">Preguntas Frecuentes</a>
								</li>
								<li>
									<a href="contact.html">Contactanos</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- //menu button -->
				</div>
			</nav>
		</header>
		<!-- //header -->

		<!-- banner 2 -->
		<div class="banner2-w3ls">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- main -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb m-0">
				<li class="breadcrumb-item">
					<a href="index.php">Inicio</a>
				</li>
			</ol>
		</nav>
	</div>
	<!-- //page details -->

	<!-- contact page -->
	<div class="address py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-5">
				<h2 class="text-dark mb-2">Clientes</h2>
				<p>Registra los clientes.</p>
			</div>
			<div class="row address-row">
				<div class="col-lg-6 address-right">
					<div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
										<h4 class="font-weight-bold mb-3">Harina </h4>
										<h4 class="font-weight-bold mb-3">Azúcar </h4>
										<h4 class="font-weight-bold mb-3">Vainilla </h4>
										<h4 class="font-weight-bold mb-3">Leche </h4>
                    <h4 class="font-weight-bold mb-3">Caramelo </h4>


					</div>			
				</div>
				<div class="col-lg-6 address-left mt-lg-0 mt-5">
					<div class="address-grid">
						<h4 class="font-weight-bold mb-3">Ingresas los datos</h4>
						<form action="clientes.php" method="post">
                    
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Nombre" name="txtnombre" required=""value ="<?php echo $clientes->nombre_cliente;?>" />
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Dirección" name="txtdireccion" required="" value ="<?php echo $clientes->direccion;?>" />
                            </div>
                            <div class="form-group">
								<input type="text" class="form-control" placeholder="Teléfono" name="txttelefono" required="" value ="<?php echo $clientes->telefono;?>">
                            </div>
                            <div class="form-group">
								<input type="text" class="form-control" placeholder="DUI" name="txtdui" required="" value ="<?php echo $clientes->DUI;?>">
							</div><br/>
							 Sexo
                                <select name="txtsexo">
                                        <option value="1">Femenino</option> 
                                        <option value="2" selected>Masculino</option>
                                 </select><br/><br/>
                                 <div class="form-group">
								<input type="email" class="form-control" placeholder="Correo" name="txtemail" required="" value ="<?php echo $clientes->email;?>">
								<input type="hidden" class="form-control" placeholder="Nombre" name="txtid" value ="<?php echo $clientes->id_cliente;?>" />
							</div>
							</div>
														<input type="submit" value="Enviar"><br/><br/>
														<button type="button" onclick="window.location= 'clientes.php'">Limpiar</button>
						</form>
					</div>
                </div><br/><br/>
								<fieldset>
<table  id="customers">
  <tr>
	  <th>Nombre</th>
    <th>Dirección</th>
    <th>Teléfono</th>
    <th>Dui</th>
    <th>Sexo</th>
    <th>Correo</th>
	</tr>

<?php
	$datosClientes=camposCliente::listarClientes();
	foreach($datosClientes as $cliente){
		$id_cliente= $cliente['id_cliente'];
		echo <<<CLIENTES
		<tr>
		<td>{$cliente['nombre_cliente']}</td>
		<td>{$cliente['direccion']}</td>
		<td>{$cliente['telefono']}</td>
		<td>{$cliente['DUI']}</td>
		<td>{$cliente['sexo']}</td>
		<td>{$cliente['email']}</td>
		<td><a href ="clientes.php?eliminar=($id_cliente)">Eliminar</a></td>
		<td><a href ="clientes.php?modificar=($id_cliente)">Modificar</a></td>
		</tr>		
CLIENTES;
	}
?>
</table>
</fieldset>

			</div>
		</div>
	</div>
	<!-- //contact page -->


	<!-- footer -->
	<footer class="text-center py-sm-4 py-3">
		<div class="container py-xl-5 py-3">
			<div class="w3l-footer footer-social-agile mb-4">
				<ul class="list-unstyled">
					<li>
						<a href="#">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li class="mx-1">
						<a href="#">
							<i class="fab fa-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-dribbble"></i>
						</a>
					</li>
					<li class="ml-1">
						<a href="#">
							<i class="fab fa-vk"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- copyright -->
			<p class="copy-right-grids text-light my-lg-5 my-4 pb-4">© 2019 Lexar's Bakery. All Rights Reserved| Design by Team Lexar
			</p>
			<!-- //copyright -->
		</div>
		<!-- chef -->
		<img src="images/chef.png" alt="" class="img-fluid chef-style" />
		<!-- //chef -->
	</footer>
	<!-- //footer -->


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- menu-js -->
	<script>
		$('.navicon').on('click', function (e) {
			e.preventDefault();
			$(this).toggleClass('navicon--active');
			$('.toggle').toggleClass('toggle--active');
		});
	</script>
	<!-- //menu-js -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/cakes-bakery.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>