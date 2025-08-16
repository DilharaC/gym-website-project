<?php

include 'connect.php';

if (isset($_POST['contact'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $age = $_POST['age'];
    $contactnumber = $_POST['cNumber'];
    $email = $_POST['email'];
    

    $checkEmail = "SELECT * FROM contact WHERE email='$email'";
    $result = $conn->query($checkEmail);
    
   
        $insertQuery = "INSERT INTO contact(firstName, lastName, age, contactnumber, email) VALUES('$firstName', '$lastName', '$age','$contactnumber','$email')";

        if ($conn->query($insertQuery) === TRUE) {
            header("Location: training.php#contact");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }


?>