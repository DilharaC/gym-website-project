<?php
session_start();
include("connect.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $image = $_FILES['image']['name'];
    $target = "img/" . basename($image);

   
    $query = "INSERT INTO trainers (name, experience, email, image) VALUES ('$name', '$experience', '$email', '$image')";
    if (mysqli_query($conn, $query)) {
      
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Trainer added successfully.";
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Trainer</title>
    <link rel="stylesheet" href="addtrainer.css">
</head>
<body>

<header>
   
    <div class="navbar">
            <a href="staffprofile.php">Cancel<i class='bx bx-x'></i></a>
            
           
        </div>
</header>

<section>
   
 <div class="all">
 <div class="head">
    <h1> ADD TRAINERS </h1>
    </div>
    <form action="addtrainer.php" method="post" enctype="multipart/form-data">
        
   
        <label for="name">Trainer Name:</label>
        <input type="text" name="name" required><br>

        <label for="experience">Experience (years):</label>
        <input type="number" name="experience" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="image">Profile Image:</label>
        <input type="file" name="image" required><br><br>

        <button type="submit">Add Trainer</button>
    </form>
    </div>
</section>

</body>
</html>