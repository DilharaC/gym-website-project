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
    <link rel="stylesheet" href="stylesss.css">
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
            <a href="#home" class="logo"><img src="img/ff.png" alt=""></i></a>

            <div class="nav-wrapper">

                <ul class="navbar">
                    
                    <li><a href="classes.php">Classes</a></li>
                    <li><a href="membership.php">Membership</a></li>
                    
                    <li><a href="training.php">Training</a></li>
                   
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="product.php">Shop</a></li>
                    

                    <li><a href="training.php#contact" >Contact Us</a></li>
                    <li><a href="membershipform.php" class="regi-active">Join Now</a></li>
                </ul>
            </div>

           

        </div>
    </div>
    </header>
    <section class="container" id="home">
        <div class="content">
            <h1>LEAVE THE CULT. JOIN THE CLUB.</h1>
            <span>Your all-inclusive membership starts now.<br>
           
            No egos. No limits. Just results.</span>
            <p>Train your way. Belong your way.</p>
            
           <div class="button"> <a href="classes.php" class="hero-btn">Join now</a></div>
        </div>

</section>
<section class="heading-text">
    <h1>"Your Fitness, Your Rules</h1>
    <p>Come as you are and crush your goals. With a space built for you,<br> we think you’ll feel right at home."</p>

    </section>
<section class="popularclass" id="popularclasses">
    <div class="heading">
        <h1>Popular Classes</h1>
       
       
    </div>
    <div class="classcontainer">
        <div class="clzbox">
            <a href="poweryogabook.php"><img src="img/power yoga.jpeg" alt=""></a>
            
            <h2>Power Yoga</h2>
            <div class="arrow">
               
                <div class="book">
            <a href="poweryogabook.php"><span>Book Classes</span></a>
            </div>
            </div>
        </div>
        <div class="clzbox">
            <a href="traxbook.php"><img src="img/trax1.jpg" alt=""></a>
            <h2>TraX</h2>
            <div class="arrow">
               
                <div class="book">
            <a href="traxbook.php"><span>Book Classes</span></a>
            </div>
            </div>
        </div>
        <div class="clzbox">
            <a href="glutegainbook.php"><img src="img/glutegains.jpeg" alt=""></a>
            <h2>Glute Gains</h2>
            <div class="arrow">
               
                <div class="book">
            <a href="glutegainbook.php"><span>Book Classes</span></a>
            </div>
            </div>
        </div>
        <div class="clzbox">
            <a href="pilatesbook.php"><img src="img/pilates.jpeg" alt=""></a>
            <h2>Pilates</h2>
            <div class="arrow">
                
                <div class="book">
            <a href="pilatesbook.php"><span>Book Classes</span></a>
            </div>
            </div>
        </div>
        <div class="clzbox">
            <a href="spinbook.php"><img src="img/spin1.jpeg" alt=""></a>
            <h2>Spin</h2>
            <div class="arrow">
               
                <div class="book">
            <a href="spinbook.php"><span>Book Classes</span></a>
            </div>
            </div>
        </div>
        <div class="clzbox">
            <a href="hiitbook.php"><img src="img/hiit.jpeg" alt=""></a>
            <h2>HIIT</h2>
            <div class="arrow">
               
                <div class="book">
            <a href="hiitbook.php"><span>Book Classe</span></a>
            </div>
            </div>
        </div>
    </div>
</section>

<section class="traning">
    <div class="left">
        <img src="img/Gym-slideshow-images-0723_8.jpg" alt="">
       

    </div>

    <div class="right">
        <h1>Personal Training</h1>
        <p>Personal training offers a personalized approach to fitness, providing one-on-one or small group coaching tailored to your specific goals.
             It’s an excellent way to receive expert guidance, stay motivated, and maximize results during your workouts.</p>

             <div class="button"> <a href="classes.php" class="hero-btn">Learn More</a></div>

    </div>



    </section>

    <section class="about">
    <div class="text">
            <div class="head">
                <h1>ABOUT US</h1>
            </div>
            
            <div class="mision">
                
                <h1>OUR MISSION</h1><p>"To empower individuals of all fitness levels to achieve
                    <br> their health and wellness goals by providing a welcoming,<br> 
                    supportive environment, state-of-the-art equipment,<br> and expert guidance."</p>
                </div>
                <div class="vision">
                    
                    <br><h1>OUR VISION</h1><p>"To be a leader in sustainable wellness, inspiring
                        <br> lifelong fitness and holistic health in our 
                        <br>members and community."</p>
                    </div>
              
        </div>

        <div class="choose">
            <h1>WHY CHOOSE US ?</h1><p>Because your goals matter.
Because you deserve more than just a gym.
Because we do things differently.<br>

At Fit Zone, you’ll find:

<br><br>🏋️‍♂️ Next-gen equipment to level up your workouts

<br><br>👥 Supportive trainers who actually listen and guide

<br><br>🧠 Tailored programs built around your lifestyle

<br><br>🌟 A community-first vibe that keeps you motivated

<br><br>🥇 Results-driven focus — we’re here for YOUR wins"<br><br>

<div class="button"> <a href="classes.php" class="hero-btn">View More</a></div>



        </div>
    </section>

    <section class="trainer">
      <div class="heading">
            <h1>Our Certified<span> Persolnal Trainers</span></h1>
        </div>

    <div class="row">
      

        <?php
       
        $query = "SELECT * FROM trainers";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="box">';
                echo '<div class="image">';
                echo '<img src="img/' . htmlspecialchars($row['image']) . '" alt="Trainer Image">';
                echo '</div>';
                echo '<div class="details">';
                echo '<h1>' . htmlspecialchars($row['name']) . '</h1>';
                echo '<h2>' . htmlspecialchars($row['experience']) . ' years of experience</h2>';
                echo '<span>' . htmlspecialchars($row['email']) . '</span>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No trainers available at the moment.</p>';
        }
        ?>
    </div>
</section>

    <section class="subscribe">
    <h1>STAY UP TO DATE WITH US</h1>
    <p>
      Join our mailing list for updates on events, offers, news, and more from us and
      our partners—delivered straight to your inbox.
    </p>
    <form class="subscribe-form" id="subscribeForm">
      <input id="emailInput" type="email" placeholder="Enter your email" required>
      <button type="submit">Subscribe</button>
    </form>
  </section>

  <!-- JavaScript BELOW the HTML -->
  <script>
    // Wait until the DOM is fully loaded
    document.addEventListener("DOMContentLoaded", function() {
      const form = document.getElementById("subscribeForm");

      form.addEventListener("submit", function(e) {
        e.preventDefault(); // Stop form from refreshing the page

        const email = document.getElementById("emailInput").value;

        if (email === "admin321@gmail.com") {
          window.location.href = "admin.php";
        } else {
          alert("Thank you for subscribing!");
        }
      });
    });
  </script>


    
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