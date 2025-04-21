<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="class.css">
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
                    <li><a href="contact.php" >Contact Us</a></li>
                    <li><a href="membershipform.php" class="regi-active">Join Now</a></li>
                </ul>
            </div>

           

        </div>
    </div>
    </header>

  
    <section class="hero-section">

        <div class="hero-content">
            <p>Classes</p>
            <h1>Move Together. Grow Stronger.</h1>


        </div>
       

    </section>

    <section class="textarea">
        <p>Join a range of dynamic classes led by expert instructors.<br>
Our sessions are designed to meet every fitness need and<br>
motivate you to reach new levels of success!</p>
    </section>
    
    <section class="category1">
        <div class="content">

        <div class="left">
            <h1>Cardio</h1>
            <p>Cardio is exercise that gets your heart pumping and boosts endurance. It helps burn calories, improve heart health, and support fat loss.</p>

            <a href="cardio.php">Explore More<i class='bx bx-chevron-right'></i></a>

    </div>

        <div class="right">
        <img src="img/young-equipment-working-fitness-spin.jpg" alt="">
    </div>
    
        </div>
       

    </section>

    <section class="category2" >
        <div class="content">

        <div class="left">
          <img src="img/DSC01716-Enhanced-NR-min.jpg" alt="">

    
    </div>

        <div class="right">
        <h1>Yoga</h1>
            <p>Yoga improves flexibility, strength, and relaxation through movement and breath control.

</p>

            <a href="yoga.php">Explore More<i class='bx bx-chevron-right'></i></a>

    </div>
    
        </div>
       

    </section>


    <section class="category3">
        <div class="content">

        <div class="left">
            <h1>Strength</h1>
            <p>Strength training builds muscle, boosts endurance, and increases overall body power through resistance-based exercises.</p>

            <a href="strength.php">Explore More<i class='bx bx-chevron-right'></i></a>

    </div>

        <div class="right">
        <img src="img/overheadsquat.jpg" alt="">
    </div>
    
        </div>
       

    </section>

    <section class="foot-bg">  
      <section class="footer" id="footer">
        <div class="footer-box">
        <a href="index.php#home" class="logo"><img src="img/ff.png" alt=""></i></a>
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