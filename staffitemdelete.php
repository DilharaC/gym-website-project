<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $productid = $_GET['id'];

    
    $fetchQuery = "SELECT productimage FROM product WHERE id='$productid'";
    $result = $conn->query($fetchQuery);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $productimage = $product['productimage'];

        
        $deleteQuery = "DELETE FROM product WHERE id='$productid'";
        if ($conn->query($deleteQuery) === TRUE) {
            
            if (file_exists($productimage)) {
                unlink($productimage);
            }
            header("Location: staffprofile.php"); 
            exit();
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>