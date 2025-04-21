<?php
session_start();
include 'connect.php';


if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $quantity = intval($_POST['quantity']);

    
    $query = $conn->prepare("SELECT * FROM product WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

   
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $item = [
            'id' => $product['id'],
            'name' => $product['productname'],
            'price' => $product['productprice'],
            'image' => $product['productimage'],
            'quantity' => $quantity
        ];

        
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$id] = $item;
        }

        
        header("Location: cart.php?status=added");
        exit();
    } else {
       
        header("Location: product.php?status=error");
        exit();
    }
} else {
    
    header("Location: product.php?status=invalid");
    exit();
}
?>