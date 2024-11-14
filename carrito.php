<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    // Inicializar el carrito si no existe
    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"] = [];
    }

    // Si el producto ya está en el carrito, aumentar la cantidad
    if (isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]++;
    } else {
        $_SESSION["carrito"][$id] = 1;
    }
}

header("Location: compra.php");
exit();
