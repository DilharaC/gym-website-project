<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="staffregister.css">
</head>
<body>
    <div class="container" id="signUp">
        <h1 class="form-title">Staff Registration</h1>
        <form method="post" action="staffregi.php">
          
            <div class="input-group">
                <input type="text" name="fName" id="fName" placeholder="First Name" required>
                <label for="fName">First Name</label>
            </div>
            <br>
    
          
            <div class="input-group">
                <input type="text" name="lName" id="lName" placeholder="Last Name" required>
                <label for="lName">Last Name</label>
            </div>
            <br>
    
          
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <br>
    
          
            <div class="input-group">
                <input type="tel" name="phonenumber" id="phonenumber" placeholder="Phone Number" required>
                <label for="phonenumber">Phone Number</label>
            </div>
            <br>
    
           
            <div class="input-group">
                <input type="text" name="position" id="position" placeholder="Position" required>
                <label for="position">Position</label>
            </div>
            <br>
    
           
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <br>
    
           
            <input type="submit" class="btn" value="Register" name="signUp">

            <a href="admin.php" class="back-btn">← Back</a>
        </form>
    </div>