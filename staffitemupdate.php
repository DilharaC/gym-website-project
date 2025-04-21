<?php
include('connect.php');
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM product WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    if (!$product) {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Invalid product ID.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pName = $_POST['pName'];
    $pCategory = $_POST['pCategory'];
    $pPrice = $_POST['pPrice'];
    $pQuantity = $_POST['pQuantity'];
    $pImage = $_FILES['pImage']['name'];
    
    if ($pImage) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($pImage);
        move_uploaded_file($_FILES["pImage"]["tmp_name"], $target_file);
    } else {
        $target_file = $product['productimage'];
    }

    $updateQuery = "UPDATE product SET productname = ?, productcategory = ?, productprice = ?, productquantity = ?, productimage = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param('ssdisi', $pName, $pCategory, $pPrice, $pQuantity, $target_file, $id);
    if ($stmt->execute()) {
        header("Location: staffprofile.php");
        exit;
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <link rel="stylesheet" href="additem.css">
</head>
<body>
    <section class="form" id="form">
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="fullbox">
                    <div class="topic">
                        <h1>UPDATE PRODUCT</h1>
                    </div>
                    <div class="input-group">
                        <label>Product Name</label>
                        <input type="text" name="pName" id="pName" value="<?php echo htmlspecialchars($product['productname']); ?>" required>
                    </div>
                    <div class="input-group">
                        <label for="pCategory">Product Category</label>
                        <select name="pCategory" id="pCategory" required>
                            <option value="Fitness Equipment" <?php if ($product['productcategory'] === "Fitness Equipment") echo "selected"; ?>>Fitness Equipment</option>
                            <option value="Apparel" <?php if ($product['productcategory'] === "Apparel") echo "selected"; ?>>Apparel</option>
                            <option value="Nutrition and Supplements" <?php if ($product['productcategory'] === "Nutrition and Supplements") echo "selected"; ?>>Nutrition and Supplements</option>
                            <option value="Personal Care" <?php if ($product['productcategory'] === "Personal Care") echo "selected"; ?>>Personal Care</option>
                            <option value="Technology and Gadgets" <?php if ($product['productcategory'] === "Technology and Gadgets") echo "selected"; ?>>Technology and Gadgets</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Product Price</label>
                        <input type="number" name="pPrice" id="pPrice" min="0" value="<?php echo $product['productprice']; ?>" required>
                    </div>
                    <div class="input-group">
                        <label>Product Quantity</label>
                        <input type="number" name="pQuantity" id="pQuantity" value="<?php echo $product['productquantity']; ?>" required>
                    </div>
                    <div class="input-group">
                        <label>Product Image</label>
                        <input type="file" name="pImage" id="pImage" accept="image/png, image/jpg, image/jpeg">
                        <img src="<?php echo $product['productimage']; ?>" alt="Current Product Image" width="100">
                    </div>
                    <input type="submit" class="btn" value="UPDATE">
                </div>
            </form>
        </div>
    </section>
</body>
</html>