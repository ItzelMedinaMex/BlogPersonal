<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    // Si el producto existe en el carrito, reducir la cantidad o eliminarlo
    if (isset($_SESSION["carrito"][$id])) {
        $_SESSION["carrito"][$id]--;
        if ($_SESSION["carrito"][$id] <= 0) {
            unset($_SESSION["carrito"][$id]);
        }
    }
}

header("Location: compra.php");
exit();
