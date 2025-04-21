<?php
session_start();
include("connect.php");

$productsQuery = "SELECT * FROM product";
$productsResult = $conn->query($productsQuery);


if (!$productsResult) {
    echo "Error fetching products: " . $conn->error;
    $products = [];
} else {
    $products = $productsResult->fetch_all(MYSQLI_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<header>
<div class="tp">
        <div class="header-top">






       

<div class="login">
<i class='bx bxs-user'></i> 


<?php


if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    
    
    if ($row = mysqli_fetch_array($query)) {
        echo '<span class="user-name">' . htmlspecialchars($row['firstName']) . ' ' . htmlspecialchars($row['lastName']) . '</span>';
    } else {
        
        echo '<span class="user-name">Guest</span>';
    }
} else {
    
    echo '<span class="user-name">Guest</span>';
}
?>

    <i class='bx bx-caret-down' id="dropdown-toggle" aria-label="Profile Menu"></i>
    <div class="dropdown-menu" id="dropdown-menu">
       
        <?php
        if (isset($_SESSION['email'])) {
           
            echo '<a href="logout.php">Log Out</a>';
        } else {
            
            echo '<a href="login.php">Log In</a>';
        }
        ?>
        
</div>
</div>
</div>


</div>
    </div>
<div class="btom">
            
        <div class="header-bottom">
            <a href="index.php#home" class="logo"><img src="img/ff.png" alt=""></i></a>

            <div class="nav-wrapper">

                <ul class="navbar">
                    
                    <li><a href="classes.php">Classes</a></li>
                    <li><a href="membership.php">Membership</a></li>
                    
                    <li><a href="training.php">Training</a></li>
                   
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="product.php">Shop</a></li>
                    <li><a href="cart.php">Cart</a></li>

                    <li><a href="contact.php" >Contact Us</a></li>
                    <li><a href="membershipform.php" class="regi-active">Join Now</a></li>
                </ul>
            </div>

           

        </div>
    </div>
    </header>


    <section class="hero-section">

<div class="hero-content">
    <p>Shop</p>
    <h1>Fuel your fitness. Style your grind.</h1>


</div>


</section>


       
  

 
    <section class="products" id="products">
    <div class="heading">
        <h1>Our All<br><span>Products</span></h1>
    </div>
    <div class="products-container">
        <?php foreach ($products as $product): ?>
            <div class="box">
                <img src="<?php echo htmlspecialchars($product['productimage']); ?>" alt="<?php echo htmlspecialchars($product['productname']); ?>">
                <span><?php echo htmlspecialchars($product['productcategory']); ?></span>
                <h2><?php echo htmlspecialchars($product['productname']); ?></h2>
                <h3 class="price">LKR<?php echo number_format($product['productprice'], 2); ?></h3>
                
             
                <form action="add_to_cart.php" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="add-to-cart-btn"> Add to Cart</button>
                </form>
                
                
            </div>
        <?php endforeach; ?>
    </div>
</section>
    
<section class="foot-bg">  
      <section class="footer" id="footer">
        <div class="footer-box">
        <a href="#home" class="logo"><img src="img/ff.png" alt=""></i></a>
           <br> <p>Kurunagala,50th Street,4th <br>Floor 3, 10022</p>
            <div class="social">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-youtube'></i></a>





            </div>

        </div>
        <div class="footerbox">
            <h2>Customer Service</h2>
            <a href="contact.php">Contact Us</a>
            <a href="meminquiries.php">membership inquaries</a>
            <a href="class.php">Classes</a>
            
            <a href="training.php">Personal Training</a>


           
        </div>
        <div class="footerbox">
            <h2>About</h2>
            <a href="#about">About US</a>
            
            <a href="#">Blogs</a>
            <a href="#">Return Policy</a>
        </div>
        <div class="footerbox">
            <h2>Membership</h2>
            <a href="membershipform.php">Join Us</a>
            
          
            <a href="membership.php">membership plans</a>
            
        </div>
        
       
  
    </section>
    </section>

    <script src="script.js"></script>

</body>
</html>