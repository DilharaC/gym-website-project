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
    <link rel="stylesheet" href="trainingss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<header>
<div class="tp">
        <div class="header-top">


        <div class="cart">
    <a href="cart.php"><i class='bx bx-cart-alt' style='color:#ffffff'  ></i>
    <span >Cart</span></a>

       
</div>



       

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
                   

                    <li><a href="#contact" >Contact Us</a></li>
                    <li><a href="membershipform.php" class="regi-active">Join Now</a></li>
                </ul>
            </div>

           

        </div>
    </div>
    </header>


    <section class="hero-section">

        <div class="hero-content">
            <p>Training</p>
            <h1>Your journey, your way.</h1>
<img src="img/The-Gym-Group-Sports-Day.jpg" alt="">

        </div>
       

    </section>

    <section class="workout">
       
   
    </section>

    <section class="workout1">
        <div class="content">

        <div class="left">
            <h1>Push. Power. Progress – FitZone Style</h1>
            <p>At FitZone, we believe in functional training that’s both intense and rewarding. Whether you’re swinging kettlebells, slamming battle ropes, or powering through TRX® exercises, we’ve got the tools to help you get stronger, fitter, and more confident.<br><br>

Our expert trainers design HIIT (High-Intensity Interval Training) programs that challenge every muscle and keep you engaged with a variety of dynamic equipment. No two sessions are ever the same!<br><br>

The FitZone offers a well-rounded approach to fitness—combining:

Individual Coaching,

Group Training,

Nutritional Guidance.

We’re here to support your fitness journey from start to finish.

<br><br><a href="#training">PERSONAL TRAINING</a>
<br><br><a href="#nutrition">NUTRITION</a></p>

    </div>

        <div class="right">
        <img src="img/pic3.jpg" alt="">
    </div>
    
        </div>
       

    </section>
    <section class="workout2" id="nutrition">
        <div class="content">

        <div class="left">
          <img src="img/nutrition.jpeg" alt="">

    
    </div>

        <div class="right">
            <h1>Fuel Up. Level Up.</h1>
       <p>At FitZone, we believe nutrition is the key to maximizing results. That’s why our certified trainers create personalized plans tailored to your goals, in partnership with dotFIT.<br><br>

We offer:<br><br>

Custom meal plans to support performance, muscle gain, and fat loss<br>

Science-backed supplements to fill nutritional gaps<br>

Ongoing support to keep you on track<br><br>

Fuel smarter. Train harder. Achieve more with FitZone + dotFIT.


    </div>
    
        </div>
       

    </section>

    <section class="workout3" id="training">
        <div class="content">

        <div class="left">
            <h1>Personal Training</h1>
            <p>Personal training at FitZone is your shortcut to fast, safe, and effective results. Our expert trainers design fun, customized programs that combine the latest fitness and nutrition techniques, plus Combative Training Center to push your limits.<br><br>

With specialized certifications, our trainers are ready to motivate anyone—from beginners to seasoned athletes—helping you achieve your full potential.</p>




    </div>

        <div class="right">
        <img src="img/pic3.jpg" alt="">
    </div>
    
        </div>
    </section>

        <section class="contact" id="contact">
    <div class="container1">
        <form method="post" action="contactdb.php">
            <div class="fullbox">
                <div class="topic">
                    <h1>CONTACT FITZONE</h1>
                </div>

                <br>
                <div class="row">
                    <div class="input-group">
                        <label for="fName">FIRST NAME</label>
                        <input type="text" name="fName" id="fName" placeholder="First Name" required>
                    </div>
                    <div class="input-group">
                        <label for="lName">LAST NAME</label>
                        <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="input-group">
                        <label for="age">AGE</label>
                        <input type="number" name="age" id="age" placeholder="Age" required>
                    </div>
                    <div class="input-group">
                        <label for="cNumber">CONTACT NUMBER</label>
                        <input type="text" name="cNumber" id="cNumber" placeholder="Contact Number" required>
                    </div>
                </div>

                <br>
                <div class="input-group">
                    <label for="email">EMAIL</label>
                    <input type="email" name="email" id="email" placeholder="EMAIL" required>
                </div>

                <br>
                <button type="submit" class="btn" name="contact">Submit</button>
            </div>
        </form>
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
            <a href="join.php">Join Us</a>
            
          
            <a href="membership.php">membership plans</a>
            
        </div>
        
       
  
    </section>
    </section>

       
    <script src="script.js"></script>

</body>
</html>