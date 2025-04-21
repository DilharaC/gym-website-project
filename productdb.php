<?php
include 'connect.php';


if (isset($_POST['product'])) {
    $productname = $_POST['pName'];
    $productprice = $_POST['pPrice'];
    $productquantity = $_POST['pQuantity'];
    $productcategory = $_POST['pCategory'];

    if (isset($_FILES['pImage']) && $_FILES['pImage']['error'] == 0) {
        $productimage = $_FILES['pImage'];

       
        $targetDir = "uploads/";
        
       
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($productimage["name"]);

       
        if (move_uploaded_file($productimage["tmp_name"], $targetFile)) {
            $checkProduct = "SELECT * FROM product WHERE productname='$productname'";
            $result = $conn->query($checkProduct);

            if ($result->num_rows > 0) {
                echo ""; echo "<script>alert('Product Already Exists!'); window.location.href='additem.php';</script>";
            } else {
              
                $insertQuery = "INSERT INTO product(productname, productprice, productquantity, productcategory, productimage) 
                                VALUES('$productname', '$productprice', '$productquantity', '$productcategory', '$targetFile')";

                if ($conn->query($insertQuery) === TRUE) {
                    header("Location: product.php");
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "No valid image file uploaded.";
    }
}


$productsQuery = "SELECT * FROM product";
$products = $conn->query($productsQuery);
?>