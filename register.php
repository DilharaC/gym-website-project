<?php
include 'connect.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    $checkEmail = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($checkEmail);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo "<script>alert('Email Address Already Exist!'); window.location.href='login.php';</script>";
    } else {
        $insertQuery = "INSERT INTO users(firstName, lastName, email, password) VALUES(?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);
        
        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            error_log("Error: " . $stmt->error); 
            echo "There was an issue creating your account. Please try again.";
        }
    }
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql_staff = "SELECT * FROM staff WHERE email=?";
    $stmt = $conn->prepare($sql_staff);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_staff = $stmt->get_result();

    if ($result_staff->num_rows > 0) {
        $row = $result_staff->fetch_assoc();
       
        if ($row['password'] === md5($password)) { 
            session_start();
            $_SESSION['email'] = $row['email'];
            header("Location: staffprofile.php");
            exit();
        } else {
            echo "<script>alert('Incorrect Email or Password'); window.location.href='login.php';</script>";
        }
    }


   
    $sql_user = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql_user);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result_user = $stmt->get_result();

    if ($result_user->num_rows > 0) {
        $row = $result_user->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit();
        } else {
            
            echo "<script>alert('Incorrect Email or Password'); window.location.href='login.php';</script>";
            
        }
    } else {
        
        echo "<script>alert('Incorrect Email or Password'); window.location.href='login.php';</script>";
    }
}
?>
