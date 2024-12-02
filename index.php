<?php
    // Configuración de la conexión
    $host = "autorack.proxy.rlwy.net"; // Cambiar por el host proporcionado por Railway
    $port = "40315"; // Puerto por defecto de PostgreSQL
    $dbname = "railway"; // Nombre de la base de datos
    $user = "postgres"; // Usuario de la base de datos
    $password = "vzkFAnZtJDAaHBDtQgzLcNNFdoAWWvtC"; // Contraseña del usuario
    
	$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

	$dbconn = pg_connect($conn_string);
	if (!$dbconn) {
		die("Error de conexión: " . pg_last_error());
	}

	// Procesar formulario de acuerdo a la acción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? ''; // Acción específica: agregar, editar, eliminar
    $id = $_POST['id'] ?? null; // Para editar o eliminar
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $message = $_POST['message'] ?? null;

    try {
        if ($action === 'add') {
            // Agregar un registro
            $query = "INSERT INTO cita (name, email, message) VALUES ($1, $2, $3)";
            $result = pg_query_params($dbconn, $query, [$name, $email, $message]);
            $mensaje = "Registro agregado exitosamente.";
        } elseif ($action === 'edit' && $id) {
            // Editar un registro
            $query = "UPDATE cita SET name = $1, email = $2, message = $3 WHERE id = $4";
            $result = pg_query_params($dbconn, $query, [$name, $email, $message, $id]);
            $mensaje = "Registro actualizado exitosamente.";
        } elseif ($action === 'delete' && $id) {
            // Eliminar un registro
            $query = "DELETE FROM cita WHERE id = $1";
            $result = pg_query_params($dbconn, $query, [$id]);
            $mensaje = "Registro eliminado exitosamente.";
        }
    } catch (Exception $e) {
        $mensaje = "Error: " . $e->getMessage();
    }
}

// Consultar todos los registros para mostrar
$registros = [];
$query = "SELECT * FROM cita ORDER BY id";
$result = pg_query($dbconn, $query);
while ($row = pg_fetch_assoc($result)) {
    $registros[] = $row;
}

	?>
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
        <!-- Formulario -->
        <section class="col-6 col-12-narrower">
            <h2>Gestión de registros</h2>
            <?php if ($message): ?>
                <p><?= htmlspecialchars($message) ?></p>
            <?php endif; ?>
            <form method="post" action="#">
                <div class="row gtr-50">
                    <input type="hidden" name="id" value="" id="record-id">
                    <div class="col-6 col-12-mobile">
                        <input name="name" placeholder="Name" type="text" id="name" required />
                    </div>
                    <div class="col-6 col-12-mobile">
                        <input name="email" placeholder="Email" type="email" id="email" required />
                    </div>
                    <div class="col-12">
                        <textarea name="message" placeholder="Message" id="message" required></textarea>
                    </div>
                    <div class="col-12">
                        <ul class="actions">
                            <li>
                                <button type="submit" name="action" value="add">Agregar</button>
                            </li>
                            <li>
                                <button type="reset" onclick="resetForm()">Limpiar</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
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

	

		<!-- Scripts -->
		<script>
       

        // Resetear el formulario
        function resetForm() {
            document.getElementById('record-id').value = '';
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('message').value = '';
        }
    </script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>