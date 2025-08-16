<?php
session_start();
include("connect.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title= mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
  
    $image = $_FILES['image']['name'];
    $target = "img/" . basename($image);

    
    $query = "INSERT INTO blogpost (title, author,  image,content) VALUES ('$title', '$author',  '$image','$content')";
    if (mysqli_query($conn, $query)) {
      
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Post added successfully.";
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
    <title>Add Blogpost</title>
    <link rel="stylesheet" href="blogcreate.css">
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
    <form action="blogcreate.php" method="post" enctype="multipart/form-data">
        
   
        <label for="title">blogpost title:</label>
        <input type="text" name="title" required><br>

        <label for="author">Author:</label>
        <input type="text" name="author" required><br>
        <label for="image">Post Image:</label>
        <input type="file" name="image" required><br><br>
        <label for="content">Content:</label>
        <input type="text" name="content" required><br>


        <button type="submit">Add Post</button>
    </form>
    </div>
</section>

</body>
</html>