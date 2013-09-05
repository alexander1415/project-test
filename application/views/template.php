<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Libreria BestSeller</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="<?php echo base_url() . "resource/"; ?>img/favicon.ico" />
		<link rel="stylesheet" href="<?php echo base_url() . "resource/"; ?>css/style.css" type="text/css" media="all" />
		<link rel="stylesheet" href="<?php echo base_url() . "resource/"; ?>css/bootstrap.min.css" type="text/css" media="all" />

		<script type="text/javascript" src="<?php echo base_url() . "resource/"; ?>js/jquery-1.9.1.js"></script>
		<script type="text/javascript" src="<?php echo base_url() . "resource/"; ?>js/bootstrap.min.js"></script>
		
		
		<!--[if IE 6]>
		<script type="text/javascript" src="js/png-fix.js"></script>
		<![endif]-->
	</head>
	<body>
		<!-- Header -->
		<div id="header" class="shell">
			<div id="logo">
				<h1><a href="#">BestSeller</a></h1>
			</div>
			<!-- Navigation -->
			<div id="navigation">
				<ul>
					<li>
						<a href="#" class="active">Inicio</a>
					</li>
					<li>
						<a href="#">Productos</a>
					</li>
					<li>
						<a href="#">Promociones</a>
					</li>
					<li>
						<a href="#">Perfil</a>
					</li>
					<li>
						<a href="#">Contactenos</a>
					</li>
				</ul>
			</div>
			<!-- End Navigation -->
			<div class="cl">
				&nbsp;
			</div>
			<!-- Login-details -->
			<div id="login-details">
				<p>
					Welcome, <a href="#" id="user">Guest</a> .
				</p>
				<p>
					<a href="#" class="cart" ><img src="<?php echo base_url() . "resource/img"; ?>/cart-icon.png" alt="" /></a>Shopping Cart (0) <a href="#" class="sum">$0.00</a>
				</p>
			</div>
			<!-- End Login-details -->
		</div>
		<!-- End Header -->
		<!-- Slider -->
		
		<!-- End Slider -->
		<!-- Main -->
		<div id="main" class="shell">
			<!-- Sidebar -->
                        <div id="sidebar" class="span2">
				<ul class="categories">
					<li>
						<h4>Categorias</h4>			
						<ul>
							<?php foreach ($categorias as $item):?>
								<li>
									<a href="<?php echo base_url('libro/porcategoria') . '/' . $item['id']; ?>"><?php echo $item['descripcion']; ?></a>
								</li>									
							<?php endforeach; ?>							
						</ul>
					</li>
					<li>
						<h4>Autores</h4>
						<ul>							
							<?php foreach($autores as $item): ?>							
							<li>
								<a href="<?php echo base_url('libro/porautor') . '/' . $item['id']; ?>"><?php echo $item['nombre']; ?></a>
							</li>							
							<?php  endforeach; ?>							
						</ul>
					</li>
				</ul>
			</div>
                        <div class="span6">
                           <?php echo $contenido; ?> 
                        </div>
			<!-- End Sidebar -->
						
			<div class="cl">
				&nbsp;
			</div>
		</div>
		<!-- End Main -->
		<!-- Footer -->
		<div id="footer" class="shell">
			<div class="top">
				<div class="cnt">
					<div class="col about">
						<h4>About BestSellers</h4>
						<p>
							Nulla porttitor pretium mattis. Mauris lorem massa, ultricies non mattis bibendum, semper ut erat. Morbi vulputate placerat ligula. Fusce
							<br />
							convallis, nisl a pellentesque viverra, ipsum leo sodales sapien, vitae egestas dolor nisl eu tortor. Etiam ut elit vitae nisl tempor tincidunt. Nunc sed elementum est. Phasellus sodales viverra mauris nec dictum. Fusce a leo libero. Cras accumsan enim nec massa semper eu hendrerit nisl faucibus. Sed lectus ligula, consequat eget bibendum eu, consequat nec nisl. In sed consequat elit. Praesent nec iaculis sapien.
							<br />
							Curabitur gravida pretium tincidunt.
						</p>
					</div>
					<div class="col store">
						<h4>Store</h4>
						<ul>
							<li>
								<a href="#">Home</a>
							</li>
							<li>
								<a href="#">Special Offers</a>
							</li>
							<li>
								<a href="#">Log In</a>
							</li>
							<li>
								<a href="#">Account</a>
							</li>
							<li>
								<a href="#">Basket</a>
							</li>
							<li>
								<a href="#">Checkout</a>
							</li>
						</ul>
					</div>
					<div class="col" id="newsletter">
						<h4>Newsletter</h4>
						<p>
							Lorem ipsum dolor sit amet  consectetur.
						</p>
						<form action="" method="post">
							<input type="text" class="field" value="Your Name" title="Your Name" />
							<input type="text" class="field" value="Email" title="Email" />
							<div class="form-buttons">
								<input type="submit" value="Submit" class="submit-btn" />
							</div>
						</form>
					</div>
					<div class="cl">
						&nbsp;
					</div>
					<div class="copy">
						<p>
							&copy; <a href="#">BestSeller.com</a>. Design by <a href="http://css-free-templates.com/">CSS-FREE-TEMPLATES.COM</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer -->
	</body>
</html>