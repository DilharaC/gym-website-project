<?php
include('connect.php'); 
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "No inquiry ID provided.";
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reply = mysqli_real_escape_string($conn, $_POST['reply']);
    $reply_date = date("Y-m-d H:i"); 

    $sql = "UPDATE membershipinquiry SET reply = '$reply', replydate = '$reply_date' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='success'>Reply sent successfully and saved to the database.</div>";
    } else {
        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
    }
}


$sql = "SELECT * FROM membershipinquiry WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Inquiry not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Inquiry</title>
    <link rel="stylesheet" href="inqueryreply.css" />
  
</head>
<body>
    <section class="form">
        <div class="formin">
    <h1>Reply to Inquiry</h1>
    <div class="inquiry-details">
        <h3>Subject: <?php echo htmlspecialchars($row['subject']); ?></h3>
        <h3>Full Name: <?php echo htmlspecialchars($row['fullname']); ?></h3>
        <h3>Email: <?php echo htmlspecialchars($row['email']); ?></h3>
    </div>

    <div class="form-container">
        <form method="POST" action="">
            <label for="reply">Your Reply:</label>
            <textarea name="reply" id="reply" rows="4" required></textarea>
            <input type="submit" value="Send Reply">
        </form>
    </div>
<div class="text">
    <a href="membershipinquary.php">Back to Membership Inquiries</a>
    </div>
    </div>
    </section>
</body>
</html>