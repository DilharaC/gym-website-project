<?php

include 'connect.php';

if (isset($_GET['id'])) {
    $staffId = intval($_GET['id']); 

    
    $fetchQuery = $conn->prepare("SELECT * FROM staff WHERE id = ?");
    $fetchQuery->bind_param("i", $staffId);
    $fetchQuery->execute();
    $result = $fetchQuery->get_result();

    if ($result->num_rows > 0) {
    
        $deleteQuery = $conn->prepare("DELETE FROM staff WHERE id = ?");
        $deleteQuery->bind_param("i", $staffId);

        if ($deleteQuery->execute()) {
           
            header("Location: admin.php"); 
            exit();
        } else {
            echo "Error deleting staff record: " . $conn->error;
        }

        $deleteQuery->close();
    } else {
        echo "Staff member not found.";
    }

    $fetchQuery->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>