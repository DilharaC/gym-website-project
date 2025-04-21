<?php
session_start();
include 'connect.php'; 


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email']; 


$query = "SELECT * FROM memberships WHERE email = '$email' AND active = 1 AND end_date >= CURDATE()";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    
    echo "<script>alert('You must purchase an active membership before booking a class.'); window.location.href='membership.php';</script>";
    exit();
}


$query_user = "SELECT * FROM users WHERE email = '$email'";
$user_result = $conn->query($query_user);
$user = $user_result->fetch_assoc();


$message = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $user['id']; 
    $class_name = 'Power Yoga'; 
    $class_date = $_POST['class_date'];
    $class_time = $_POST['class_time']; 
    $class_datetime = $class_date . ' ' . $class_time; 

    
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, class_name, class_date) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $class_name, $class_datetime);

    if ($stmt->execute()) {
        $message = "Booking successful!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Spin Class</title>
    <link rel="stylesheet" href="spinbooking.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<header>
<div class="navbar">
            <a href="classes.php">Cancel<i class='bx bx-x'></i></a>
            
           
        </div>
</header>

<section class="container">
    <div class="home-text">
        <h1>Book Power Yoga Class</h1>
        <p>Choose your preferred date and time for the Power Yoga class.</p>
    </div>

   
    <?php if (!empty($message)) { echo "<p class='message'>$message</p>"; } ?>

   
    <form method="POST" action="">
        <label for="class_date">Select Class Date:</label>
        <input type="date" id="class_date" name="class_date" required>
        
        <label for="class_time">Select Class Time:</label>
        <select id="class_time" name="class_time" required>
            <option value="10:00 AM">7:00 AM</option>
            <option value="18:00 PM">19:30 PM</option>
        </select>

        <button type="submit">Book Class</button>
    </form>


    <p id="selected-day"></p>
</section>

<section class="footer" id="footer">
 
</section>

<script src="script.js"></script>
</body>
</html>