<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memberships</title>
    <link rel="stylesheet" href="memberships.css">
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

    <h1>BE PART OF OUR TEAM.</h1>



    </section>
    <section class="text">
        <h1>Your journey, your pace.</h1>
        <p>Choose the membership that matches your goals, and let’s grow stronger—together!</p>


    </section>


    <section class="main" id="main">
    <div class="mplans">
        <div class="box">
            <h1>STARTER</h1>
            <div class="price">
                <span>from <h2>$9.99 a month</h2> + one-time signup</span>
            </div>
            <div class="benefits">
                <br><li><strong>Weekday Morning Access</strong></li>
                <span>Train anytime from 5AM–11AM, Monday to Friday</span>
                
                <li><strong><br>Free Intro Session</strong></li>
                <span>One complimentary PT session for new joiners</span>

                <li><strong><br>Basic Workout Zones</strong></li>
                <span>Access to cardio, resistance, and stretching areas</span>

                <li><strong><br>App Access</strong></li>
                <span>Book slots and track progress using the mobile app</span>

                <br><br><a href="membershipform.php" class="btn">JOIN TODAY</a>
            </div>
        </div>

        <div class="box">
            <h1>STANDARD</h1>
            <div class="price">
                <span>from <h2>$16.99 a month</h2> + joining fee</span>
            </div>
            <div class="benefits">
                <br><li><strong>Full Day Gym Access</strong></li>
                <span>Unlimited entry during all operating hours</span>

                <li><strong><br>Unlimited Group Classes</strong></li>
                <span>Join any group class including spin, HIIT, and yoga</span>

                <li><strong><br>Locker + Shower Facilities</strong></li>
                <span>Modern locker rooms with rainfall showers</span>

                <li><strong><br>Nutrition Planning Tools</strong></li>
                <span>Custom diet plans and grocery guides via app</span>

                <br><br><a href="membershipform.php" class="btn">JOIN TODAY</a>
            </div>
        </div>

        <div class="box">
            <h1>ELITE<i class='bx bx-crown'></i></h1>
            <div class="price">
                <span>from <h2>$24.99 a month</h2> + no joining fee</span>
            </div>
            <div class="benefits">
                <ul>
                    <br><li><strong>24/7 Multi-Location Access</strong></li>
                    <span>Train anytime, anywhere with national access</span>

                    <li><strong><br>Priority Class Booking (14 Days)</strong></li>
                    <span>Early booking for all fitness classes</span>

                    <li><strong><br>Guest Passes Included</strong></li>
                    <span>Bring a friend up to 6 times a month</span>

                    <li><strong><br>Sports Recovery Zone</strong></li>
                    <span>Access massage chairs, saunas, and foam rolling areas</span>

                    <li><strong><br>Exclusive Member Discounts</strong></li>
                    <span>Get up to 25% off at partner stores and cafes</span>
                </ul>
                <br><br><a href="membershipform.php" class="btn">JOIN TODAY</a>
            </div>
        </div>
    </div>
</section>
<section class="inquiery">
   
        <h1>JOIN THE BEST. TRAIN WITH THE BEST. INQUIRE NOW.</h1>
        
        <a href="inquiery.php" class="btn">INQUIRE NOW</a>
    
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