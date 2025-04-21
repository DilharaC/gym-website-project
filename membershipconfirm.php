<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['purchase_membership'])) {
    $email = $_SESSION['email']; 
    $membershipType = $_POST['membership_type'];
    $membershipDuration = $_POST['membership_duration'];
    
    $currentDate = date("Y-m-d");
    switch ($membershipDuration) {
        case '1_month':
            $expirationDate = date("Y-m-d", strtotime("+1 month"));
            break;
        case '3_months':
            $expirationDate = date("Y-m-d", strtotime("+3 months"));
            break;
        case '6_months':
            $expirationDate = date("Y-m-d", strtotime("+6 months"));
            break;
        case '1_year':
            $expirationDate = date("Y-m-d", strtotime("+1 year"));
            break;
        default:
            echo "<script>alert('Invalid membership duration.'); window.location.href='membershipform.php';</script>";
            exit();
    }

    // SQL query to insert the membership info into the database
    $sql = "INSERT INTO memberships (email, membership_type, start_date, end_date, active)
            VALUES ('$email', '$membershipType', '$currentDate', '$expirationDate', 1)";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Membership purchased successfully!');
                window.location.href = 'membership.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Error: " . $conn->error . "');
                window.location.href = 'membershipform.php';
              </script>";
    }
}
?>