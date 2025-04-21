<?php
include('connect.php'); 
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
  
    $sql = "SELECT * FROM staff WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $staff = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $position = $_POST['position'];
        
        // Optional password update logic
        if (!empty($_POST['password'])) {
            $password = md5($_POST['password']);
            $updateSql = "UPDATE staff SET firstName = ?, lastName = ?, email = ?, phonenumber = ?, position = ?, password = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("ssssssi", $firstName, $lastName, $email, $phonenumber, $position, $password, $id);
        } else {
            $updateSql = "UPDATE staff SET firstName = ?, lastName = ?, email = ?, phonenumber = ?, position = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("sssssi", $firstName, $lastName, $email, $phonenumber, $position, $id);
        }

        if ($updateStmt->execute()) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "Invalid staff ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
    <link rel="stylesheet" href="staffregister.css">
</head>
<body>
    <div class="container">
        <h1 class="form-title">Update Staff</h1>
        <form method="POST" action="">
            <div class="input-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($staff['firstName']); ?>" required>
            </div>
            
            <div class="input-group">
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($staff['lastName']); ?>" required>
            </div>
            
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($staff['email']); ?>" required>
            </div>
            
            <div class="input-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="tel" name="phonenumber" id="phonenumber" value="<?php echo htmlspecialchars($staff['phonenumber']); ?>" required>
            </div>
            
            <div class="input-group">
                <label for="position">Position:</label>
                <input type="text" name="position" id="position" value="<?php echo htmlspecialchars($staff['position']); ?>" required>
            </div>

            <div class="input-group">
                <label for="password">Password (leave blank to keep existing):</label>
                <input type="password" name="password" id="password">
            </div>
            
            <button type="submit" class="btn">Update Staff</button>
            <a href="admin.php" class="back-btn">← Back</a>
        </form>
    </div>
</body>
</html>