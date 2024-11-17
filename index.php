<!DOCTYPE HTML>
<html>
	<head>
		<title>Innovatech México</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header" class="container">

						<!-- Logo -->
							<h1 id="logo"><a href="index.html">Innovatech México</a></h1>
					</div>
							<!-- Nav -->
							<nav id="nav">
								<ul>
								<li><a href="index.html">Inicio</a></li>
									<li><a href="recu.html">Recursos Humanos</a></li>
									<li class="break"><a href="fina.html">Gestión Financiera</a></li>
									<li><a href="vent.html">Ventas y Marketing</a></li>
								</ul>
							</nav>
					<!-- Hero -->
						<section id="hero" class="container">
							<header>
								<h2>Innovatech México
								<br />
								</h2>
							</header>
							<p>es una plataforma integral de gestión empresarial 
diseñada para optimizar los procesos internos, mejorar la toma de decisiones y 
potenciar el crecimiento de las empresas.</p>
							<ul class="actions">
								<li><a href="#" class="button">Aquirir Innovatech</a></li> 
							</ul>
						</section>
						<br><br><br><br><br><br><br><br>
						
						
				</div>
			<!-- Footer -->
				<div id="footer-wrapper">
					<div id="footer" class="container">
						<header class="major">
							<h2>Escribemos para adquirir Innovatech</h2>
							<p>Estamos esperando tu mensaje</p>
						</header>
						<div class="row">
							<section class="col-6 col-12-narrower">
								<form method="post" action="#">
									<div class="row gtr-50">
										<div class="col-6 col-12-mobile">
											<input name="name" placeholder="Name" type="text" />
										</div>
										<div class="col-6 col-12-mobile">
											<input name="email" placeholder="Email" type="text" />
										</div>
										<div class="col-12">
											<textarea name="message" placeholder="Message"></textarea>
										</div>
										<div class="col-12">
											<ul class="actions">
												<li><input type="submit" value="Send Message" /></li>
												<li><input type="reset" value="Clear form" /></li>
											</ul>
										</div>
									</div>
								</form>
							</section>
							<section class="col-6 col-12-narrower">
								<div class="row gtr-0">
									<ul class="divided icons col-6 col-12-mobile">
										<li class="icon brands fa-twitter"><a href="#"><span class="extra">twitter.com/</span>untitled</a></li>
										<li class="icon brands fa-facebook-f"><a href="#"><span class="extra">facebook.com/</span>untitled</a></li>
										<li class="icon brands fa-dribbble"><a href="#"><span class="extra">dribbble.com/</span>untitled</a></li>
									</ul>
									<ul class="divided icons col-6 col-12-mobile">
										<li class="icon brands fa-instagram"><a href="#"><span class="extra">instagram.com/</span>untitled</a></li>
										<li class="icon brands fa-youtube"><a href="#"><span class="extra">youtube.com/</span>untitled</a></li>
										<li class="icon brands fa-pinterest"><a href="#"><span class="extra">pinterest.com/</span>untitled</a></li>
									</ul>
								</div>
							</section>
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="menu">
							<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="#">Jair Orozco Dominguez</a></li>
						</ul>
					</div>
				</div>

		</div>

		<?php
    // Configuración de la conexión
    $host = "tuservidor.railway.app"; // Cambiar por el host proporcionado por Railway
    $port = "5432"; // Puerto por defecto de PostgreSQL
    $dbname = "tu_basedatos"; // Nombre de la base de datos
    $user = "tu_usuario"; // Usuario de la base de datos
    $password = "tu_contraseña"; // Contraseña del usuario

    // Construir la cadena de conexión
    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

    try {
        // Conectar a la base de datos
        $dbconn = pg_connect($conn_string);
        
        if (!$dbconn) {
            throw new Exception("Error al conectar con la base de datos.");
        }
        
        echo "<p>Conexión exitosa a la base de datos PostgreSQL en Railway.</p>";

        // Consulta de prueba
        $result = pg_query($dbconn, "SELECT NOW() AS current_time");
        if (!$result) {
            throw new Exception("Error al ejecutar la consulta.");
        }

        // Mostrar resultados
        echo "<ul>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<li>Hora actual en el servidor: " . htmlspecialchars($row['current_time']) . "</li>";
        }
        echo "</ul>";

        // Cerrar la conexión
        pg_close($dbconn);
    } catch (Exception $e) {
        echo "<p style='color:red;'>Excepción capturada: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
    ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>