<?php
include 'connect.php';

if (isset($_POST['inquiry'])) {
    $subject = $_POST['subject'];
    $fullname = $_POST['fullName'];
    $companyname = $_POST['cName'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $membership = $_POST['membership'];
    $fitnessgoals = $_POST['fitnessgoals'];

    $checkEmail = "SELECT * FROM membershipinquiry WHERE email='$email'";
    $result = $conn->query($checkEmail);
    

        $insertQuery = "INSERT INTO membershipinquiry(subject, fullname, companyname, email, phonenumber, membership, fitnessgoals) 
                        VALUES('$subject', '$fullname', '$companyname', '$email', '$phonenumber', '$membership', '$fitnessgoals')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>
                    alert('Inquiry submitted successfully!');
                    window.location.href = 'membership.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: " . addslashes($conn->error) . "');
                    window.history.back();
                  </script>";
        }
    }

?>