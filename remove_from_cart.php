<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_SESSION['cart']) && isset($_POST['id'])) {
        $productId = $_POST['id'];

       
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

       
        header("Location: cart.php");
        exit();
    } else {
        echo "Item not found in cart.";
    }
} else {
    echo "Invalid request.";
}
?>