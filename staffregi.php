<?php

include 'connect.php';

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $position = $_POST['position'];
    $password = md5($_POST['password']);

    $checkEmail = "SELECT * FROM staff WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
    if ($result->num_rows > 0) {
        echo "Email Address Already Exists!";
    } else {
        $insertQuery = "INSERT INTO staff(firstName, lastName, email, phonenumber, position, password) VALUES('$firstName', '$lastName', '$email','$phonenumber','$position', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            header("Location: admin.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

?>