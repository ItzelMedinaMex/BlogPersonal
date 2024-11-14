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
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if ($carrito): ?>
        <ul>
            <?php foreach ($carrito as $id => $cantidad): ?>
                <?php $producto = $productos[$id]; ?>
                <li>
                    <?php echo $producto["nombre"] . " - $" . $producto["precio"] . " x " . $cantidad; ?>
                    <form action="baja.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </li>
                <?php $total += $producto["precio"] * $cantidad; ?>
            <?php endforeach; ?>
        </ul>
        <p><strong>Total: $<?php echo number_format($total, 2); ?></strong></p>
        <a href="indexCarrito.php">Seguir comprando</a>
    <?php else: ?>
        <p>El carrito está vacío.</p>
        <a href="indexCarrito.php">Volver a la tienda</a>
    <?php endif; ?>
</body>
</html>
