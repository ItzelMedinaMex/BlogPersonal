<?php
session_start();

$productos = [
    1 => ["nombre" => "Zapatos Deportivos", "precio" => 50.00],
    2 => ["nombre" => "Tacones", "precio" => 75.00],
    3 => ["nombre" => "Mocasines", "precio" => 40.00],
    4 => ["nombre" => "Sandalias", "precio" => 30.00],
    5 => ["nombre" => "Botas", "precio" => 90.00],
];

$carrito = $_SESSION["carrito"] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Zapatería</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<header>
		<nav>
			<ul>
				<li><a href='index.html'>Inicio</a></li>
				<li><a href='autobiografia.html'>Quién soy</a></li>
				<li><a href='galeria.html'>Galería</a></li>
				<li><a href='contacto.html'>Contacto</a></li>
				<li><a href="actividades.html">Actividades</a></li>
				<li><a href="indexCarrito.php">ActividadCarrito</a></li>
			</ul>
		</nav>
	</header>
<body>
    <div class="container">
        <header>
            <h1>Tienda de Zapatería</h1>
        </header>

        <section class="productos">
            <h2>Productos Disponibles</h2>
            <div class="producto-lista">
                <?php foreach ($productos as $id => $producto): ?>
                    <div class="producto">
                        <h3><?php echo $producto["nombre"]; ?></h3>
                        <p class="precio">$<?php echo number_format($producto["precio"], 2); ?></p>
                        <form action="carrito.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <button class="btn-agregar" type="submit">Agregar al carrito</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <footer>
            <a href="compra.php" class="btn-ver-carrito">Ver Carrito</a>
        </footer>
    </div>
</body>
<footer>
		Yucatán, Agosto, 2024.
	</footer>
</html>
