<?php
session_start();
include 'connect.php';


$cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
   
    <div class="section">
    <h1>Your Shopping Cart</h1>

 
    <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
        <a href="product.php">Continue Shopping</a>
    <?php else: ?>
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php
            $totalPrice = 0;
            foreach ($cartItems as $id => $item):
                $productName = htmlspecialchars($item['name']);
                $quantity = (int)$item['quantity'];
                $price = (float)$item['price'];
                $total = $quantity * $price;
                $totalPrice += $total;
            ?>
            <tr>
                <td><?php echo $productName; ?></td>
                <td><?php echo $quantity; ?></td>
                <td>LKR <?php echo number_format($price, 2); ?></td>
                <td>LKR <?php echo number_format($total, 2); ?></td>
                <td>
                 
                    <form action="remove_from_cart.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button type="submit" class="remove-button">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total Price:</strong></td>
                <td><strong>LKR <?php echo number_format($totalPrice, 2); ?></strong></td>
            </tr>
        </table>

      
        <form action="product.php" method="post">
            <button type="submit" class="checkout-btn">Continue Shopping</button>
        </form>
        <form action="check-out.php" method="post">
            <button type="submit" class="checkout-btn">Proceed to Checkout</button>
        </form>
    <?php endif; ?>
    
    </div>
</body>
</html>