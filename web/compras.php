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
<!-- Hace que requiera del archivo process_compra.php -->
<?php require_once 'process_compra.php'; ?>

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

	<!-- contact page -->
<!-- ----------MENSAJE INICIO--------------- -->
	<!-- Mostraremos un mensaje arriba segun la accion que se haya realizado este puede ser
			 de succees si se ha guardado, warning si se ha editado y danger si se ha eliminado un registro -->
<?php 
	
	if (isset($_SESSION['message'])): ?>
	<!-- Le pasamos el valor de la SESSION y el mensaje que queremos que muestre -->
	<div class="alert alert-<?=$_SESSION['msg_type']?>">

		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<!-- ----------MENSAJE FIN--------------- -->	

<!-- contact page -->
<div class="address py-5">
<div class="container py-xl-5 py-lg-3">
		<div class="title text-center mb-5">
			<h2 class="text-dark mb-2">Compras</h2>
			<p>Registra tus compras.</p>
		</div>

		
		<!-- Este es nuestro form para agregar nuevos registros -->
		<div class="row justify-content-center">
			<div class="col-lg-6 address-left mt-lg-0 mt-5">
				<div class="address-grid">
					<h4 class="font-weight-bold mb-3">Crea tu compra</h4>
					<!-- Definimos nuestro action hacia el archivo donde queremos dirigirlo y nuestro method -->
					<form action="process_compra.php" method="POST">   
						<!-- Colocamos un input tipo hidden para almacenar el id de nuestro registro -->
						<input type="hidden" name="id_compra" value="<?php echo $id; ?>"> 
						<div class="form-group">
							<!-- Cargar datos a combobox proveedor -->
							<?php
								include 'db.php';
								$resultSetProv = $mysqli->query("SELECT id_proveedor, nombre_proveedor FROM proveedor");
							?>
							<label>Selecciona algún proveedor </label>
							<select name = "cb_proveedores">
							<?php
								while($row = $resultSetProv->fetch_assoc())
								{
									$nombre_proveedor = $row['nombre_proveedor'];
									$id_proveedor = $row['id_proveedor'];
									echo "<option value='$id_proveedor'>$nombre_proveedor</option>";
								}
							?>
							</select>
						</div>

						<div class="form-group">
							<!-- Cargar datos a combobox empleados -->
							<?php
								include 'db.php';
								$resultSetEmp = $mysqli->query("SELECT id_empleado, nombre_empleado FROM empleado");
							?>
							<label>Selecciona el empleado  </label>
							<select name = "cb_empleados">
							<?php
								while($row = $resultSetEmp->fetch_assoc())
								{
									$nombre_empleado = $row['nombre_empleado'];
									$id_empleado = $row['id_empleado'];
									echo "<option value='$id_empleado'>$nombre_empleado</option>";
								}
							?>
							</select>
						</div>	

						<div class="form-group">
							<!-- Cargar datos a combobox tipo pago-->
							<?php
								include 'db.php';
								$resultSetPago = $mysqli->query("SELECT id_pago, tipo FROM tipos_pago");
							?>
							<label>Selecciona el tipo de pago  </label>
							<select name = "cb_tipospago">
							<?php
								while($row = $resultSetPago->fetch_assoc())
								{
									$tipo = $row['tipo'];
									$id_pago = $row['id_pago'];
									echo "<option value='$id_pago'>$tipo</option>";
								}
							?>
							</select>
						</div>	

						<div class="form-group">
							<!-- Cargar datos a combobox productos-->
							<?php
								include 'db.php';
								$resultSetProd = $mysqli->query("SELECT id_producto, producto FROM inventario_materia_prima");
							?>
							<label>Selecciona la materia prima  </label>
							<select name = "cb_materia_prima">
							<?php
								while($row = $resultSetProd->fetch_assoc())
								{
									$producto = $row['producto'];
									$id_producto = $row['id_producto'];
									echo "<option value='$id_producto'>$producto</option>";
								}
							?>
							</select>
						</div>	

						<div class="form-group">
							<input type="number" step="0.01" class="form-control" value="<?php echo $cantidad_compra; ?>" placeholder="Cantidad" name="txtCantidad">
						</div>	
						<div class="form-group">
							<input type="number" step="0.01" class="form-control" value="<?php echo $precio_compra; ?>" placeholder="Precio" name="txtPrecio">
						</div>	
						<div class="form-group">
							<input type="number" step="0.01" class="form-control" value="<?php echo $decuento_compra; ?>" placeholder="Descuento" name="txtDescuento">
						</div>	
						<div class="form-group">
							<?php
							if ($update == true):
							?>
									<button type="submit" class="btn btn-primary" name="btnUpdate">Actualizar</button>
							<?php else: ?>
									<button type="submit" class="btn btn-success" name="btnSave">Guardar</button>
							<?php endif; ?>
							</br></br><button class="btn btn-warning" type="button" onclick="window.location= 'compras.php'">Limpiar</button>
						</div>

					</form>
				</div>
			</div>
		</div>

		<br/>


		<!-- Mostraremos nuestros registro en una tabla para ello debemos de establecer una conexion con la bd y 
				 la consulta que queremos mostrar, esta la almacenaremos en una variable -->
	<div class="container">
		<?php
			include 'db.php';
			$result = $mysqli->query("SELECT cc.id_compra, pp.nombre_proveedor, ee.nombre_empleado, mp.producto, dc.cantidad, 
			dc.precio_uni, dc.descuento, cc.fecha_compra, dc.precio_uni * dc.cantidad as Total FROM compra cc 
			INNER JOIN proveedor pp ON cc.id_proveedor = pp.id_proveedor INNER JOIN empleado ee ON cc.id_empleado = ee.id_empleado
			INNER JOIN detalle_compra dc ON cc.id_compra = dc.id_compra INNER JOIN inventario_materia_prima mp
			ON dc.id_producto = mp.id_producto") or die($mysqli->error);
		?>

		<!-- Creamos la tabla -->
		<div class ="row justify-content-center">
			<table class="table">
				<thead>
					<tr>
						<th>Id Compra</th>
						<th>Proveedor</th>
						<th>Empleado</th>
						<th>Producto</th>
						<th>Cantidad</th>
						<th>Precio Uni</th>
						<th>Descuento</th>
						<th>Fecha Compra</th>
						<th>Total</th>
						
					</tr>
				</thead>
				<!-- Aqui es donde cargaremos los datos de nuestra tabla con el metodo 'fetch_assoc' nos permite
						 retornar un array asociativo correspondiente a la fila obtenida o NULL si no hubiera más filas. 
						 Para ello le decimos que mientras la cantidad de la fila sea igual de la tabla entonces que 
						 nos retorne un array con esos registros-->
				<?php
					while ($row = $result->fetch_assoc()): ?>
					<tr>
						<td><?php echo $row['id_compra']; ?></td>
						<td><?php echo $row['nombre_proveedor']; ?></td>
						<td><?php echo $row['nombre_empleado']; ?></td>
						<td><?php echo $row['producto']; ?></td>
						<td><?php echo $row['cantidad']; ?></td>
						<td><?php echo $row['precio_uni']; ?></td>
						<td><?php echo $row['descuento']; ?></td>
						<td><?php echo $row['fecha_compra']; ?></td>
						<td><?php echo round($row['Total'], 2); ?></td>
						
					</tr>
					<?php endwhile; ?>
			</table>
		</div>
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