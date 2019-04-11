<?php
session_start();

if ($_SESSION['cargo'] != "Administrador") {
    header("Location: login.php");
    exit;
}
?>
<?php
include('clases\master.php');
$producto= new camposInventarioProd();

if($_POST){
	$id_producto=$_POST['txtid'];
	$produc=$_POST{'txtproduc'};
	$precio=$_POST{'txtprecio'};
	$cantidad=$_POST{'txtcantidad'};
	$id_categoria=$_POST{'txtcategoria'};
	$activo=$_POST{'txtactivo'};
	$producto->asignarValor($id_producto,$produc,$precio,$cantidad,$id_categoria,$activo);
	$producto->guardar();
}
elseif(isset($_GET{'eliminar'})){
	$producto->eliminar($_GET{'eliminar'});
	}
elseif(isset($_GET{'modificar'})){
	$producto->modificar($_GET{'modificar'});
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
						<li class="nav-item active dropdown">
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
						<li class="nav-item dropdown">
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
							<a class="nav-link" href="gallery.html">Galeria</a>
						</li>
											<!-- menu contactanos -->
						<li class="nav-item">
						<a class="nav-link" href="logout.php">Cerrar Sesión</a>
						</li>
					</ul>
					<!-- menu button -->
					<div class="menu">
						<a href="#" class="navicon"></a>
						<div class="toggle">
							<ul class="toggle-menu list-unstyled">
								<li>
									<a href="index.php">Inicio</a>
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
				<h2 class="text-dark mb-2">Inventario Productos</h2>
				<p>Puedes crear los productos disponibles.</p>
			</div>
			<div class="row address-row">
				<div class="col-lg-6 address-right">
					<div class="address-info wow fadeInRight animated" data-wow-delay=".5s">
						<h4 class="font-weight-bold mb-3">Repostería</h4>
						<p>Lo mejor para endulzarte el día.</p>
					</div>
					<div class="address-info address-mdl wow fadeInRight animated" data-wow-delay=".7s">
						<h4 class="font-weight-bold mb-3">Pasteles </h4>
						<p>Chocolate</p>
						<p>Caramelo</p>
					</div>
					<div class="address-info agileits-info wow fadeInRight animated" data-wow-delay=".6s">
						<h4 class="font-weight-bold mb-3">Pan dulce</h4>
						<p>
						
						</p>
						
					</div>
				</div>
				<div class="col-lg-6 address-left mt-lg-0 mt-5">
					<div class="address-grid">
						<h4 class="font-weight-bold mb-3">Crear Producto</h4>
						<form action="inventario_producto.php" method="post">
							<div class="form-group">
							<input type="hidden" class="form-control" placeholder="Nombre" name="txtid" value ="<?php echo $producto->id_producto;?>">
								<input type="text" class="form-control" placeholder="Producto" name="txtproduc" required="" value ="<?php echo $producto->producto;?>">
							</div>
							<div class="form-group">
								<input type="decimal" class="form-control" placeholder="Precio" name="txtprecio" required="" value ="<?php echo $producto->precio;?>">
							</div>
							<div class="form-group">
								<input type="number" class="form-control" placeholder="Cantidad" name="txtcantidad" required="" value ="<?php echo $producto->cantidad;?>">
							</div>
							<div class="form-group">
                                Categoría
                                <select name="txtcategoria">
																<?php 
																	include 'db.php';
																	$resulSetCategoria= $mysqli->query("SELECT id_categoria, nombre_categoria FROM categoria");
																?>
																			<?php
																			while($row=$resulSetCategoria->fetch_assoc())
																			{
																				$id_categorias=$row['id_categoria'];
																				$categorias=$row['nombre_categoria'];
																				echo "<option value='$id_categorias'>$categorias</option>";
																			} 
																			?>  
                                 </select>
                            </div>
                            <div class="form-group">
                                Estado
                                <select name="txtactivo" value ="<?php echo $producto->activo;?>">
                                        <option value="1">Activo</option> 
                                        <option value="0" selected>No activo</option>
                                 </select>
							</div>
							<input type="submit" value="Crear"><br/><br/>
							</br></br><button class="btn btn-warning" type="button" onclick="window.location= 'inventario_producto.php'">Limpiar</button>
						</form>
					</div>
                </div>


	<fieldset>
	<br/><br/><br/><br/>
	<table class="table">

<tr>
	<th>Producto</th>
	<th>Precio</th>
	<th>Cantidad</th>
	<th>Categoria</th>
	<th>Activo</th>
</tr>

<?php
	$datosProducto=camposInventarioProd::listarInventarioProd();
	foreach($datosProducto as $producto){
		$id_producto= $producto['id_producto'];
		echo <<<PRODUCTO
		<tr>
		<td>{$producto['producto']}</td>
		<td>{$producto['precio']}</td>
		<td>{$producto['cantidad']}</td>
		<td>{$producto['id_categoria']}</td>
		<td>{$producto['activo']}</td>
		<td><a  	class="btn btn-danger" href ="inventario_producto.php?eliminar=($id_producto)">Eliminar</a></td>
		<td><a 	class="btn btn-info" href ="inventario_producto.php?modificar=($id_producto)">Modificar</a></td>
		</tr>		
PRODUCTO;
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
			<p class="copy-right-grids text-light my-lg-5 my-4 pb-4">© 2019 Lexar's Bakery. All Rights Reserved | Design by Team Lexar
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