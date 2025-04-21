<?php
session_start();
include("connect.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="login.css">
    

</head>

<body>
    <div class="container" id="signUp" style="display: none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fname">First Name</label>


            </div>
            <br>
            <div class="input-group">
               
               <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
            </div>
            <br>
            <div class="input-group">
                
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>


            </div>
            <br>
            <div class="input-group">
               
                <input type="password" name="password" id="password" placeholder="password" required>
                <label for="password">Password</label>


            </div>
         
            <br>
            <input type="submit" class="btn" value="sign Up" name="signUp">

        </form>
        <p class="or">
            --------or-------

        </p>
       <div class="links">
        <p>Already Have Account ?</p>
        <button id="signInButton">Sign In</button>
        
        

       </div>
    </div>



    <div class="container" id="signIn" >
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            
            <div class="input-group">
                
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
                


            </div>
            <br>
            <div class="input-group">
                
                <input type="password" name="password" id="password" placeholder="password" required>
                <label for="password">Password</label>
                


            </div>
           
            <input type="submit" class="btn" value="sign In" name="signIn">

        </form>
        <p class="or">
            --------or-------

        </p>
       <div class="links">
        <p>Don't have account yet?</p>
        <button id="signUpButton">Sign Up</button>
        <a href="index.php"><span>BACK<i class='bx bx-right-arrow-alt'></i></span></a>

       </div>
    </div>
    <script src="user.js"></script>

</body>

</html>