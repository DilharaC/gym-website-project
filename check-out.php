<?php
session_start();
include 'connect.php';


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php?status=empty");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
 
    $totalAmount = 0;
    foreach ($_SESSION['cart'] as $item) {
        $totalAmount += $item['price'] * $item['quantity'];
    }

 
    $stmt = $conn->prepare("INSERT INTO orders (name, address, email, phone, total_amount) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing order statement: " . $conn->error);
    }

   
    $stmt->bind_param("ssssd", $_POST['name'], $_POST['address'], $_POST['email'], $_POST['phone'], $totalAmount);
    if ($stmt->execute()) {
        echo "Order inserted successfully. Order ID: " . $stmt->insert_id . "<br>";

        foreach ($_SESSION['cart'] as $id => $item) {
            $quantityToUpdate = $item['quantity'];
            $updateStmt = $conn->prepare("UPDATE product SET productquantity = productquantity - ? WHERE id = ?");
            if (!$updateStmt) {
                die("Error preparing product update statement: " . $conn->error);
            }

            
            $updateStmt->bind_param("ii", $quantityToUpdate, $id);
            if (!$updateStmt->execute()) {
                echo "Failed to update product quantity for product ID " . $id . ": " . $updateStmt->error . "<br>";
            } else {
                echo "Updated product quantity for product ID " . $id . ".<br>";
            }
            $updateStmt->close();
        }

        unset($_SESSION['cart']);
        header("Location: order_success.php");
        exit();
    } else {
        echo "Checkout failed: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
<div class="heading">
<h2>Checkout Your Order</h2>
</div>
<div class="fullform">
<div class="cart-summary">
    <h3>Order Summary</h3>
    <table>
        <?php
        $totalAmount = 0;
        foreach ($_SESSION['cart'] as $item):
            $itemTotal = $item['price'] * $item['quantity'];
            $totalAmount += $itemTotal;
        ?>
        <tr>
            <td><?php echo htmlspecialchars($item['name']); ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>LKR<?php echo number_format($item['price'], 2); ?></td>
            <td>LKR<?php echo number_format($itemTotal, 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3>Total Amount: LKR<?php echo number_format($totalAmount, 2); ?></h3>
</div>

<form method="post" action="check-out.php"> 
    <h3>Billing Information</h3>
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" required>

    <button type="submit" name="confirm_order">Confirm Order</button>
</form>

</div>
<div class="btn">
<a href="cart.php" class="btn">Back To Cart</a>
</div>
</body>
</html>