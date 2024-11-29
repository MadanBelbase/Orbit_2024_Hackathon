<?php
include('dp.php'); // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $phone = $_POST['phone'];

    if ($type === 'user') {
        $citizenship = $_POST['citizenship'];

        // Query to verify user
        $sql = "SELECT * FROM users WHERE phone = ? AND citizenship = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $phone, $citizenship);
        $stmt->execute();
        $result = $stmt->get_result();

        // if ($result->num_rows > 0) {
        //     // User found
        //     echo "<h2>Welcome to User Dashboard</h2>";
        // } 
        if ($result->num_rows > 0) {
            // Start a session to store user information
            session_start();
            
            // Fetch user data (optional: if you need user details in the session)
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['phone'] = $user['phone'];
            
            // Redirect to the User Dashboard
            header("Location: user_dashboard.php");
            exit(); // Ensure no further code is executed
        } else {
            echo "<h2>Invalid User Details</h2>";
        }
    } elseif ($type === 'organization') {
        $pan = $_POST['pan'];

        // Query to verify organization
        $sql = "SELECT * FROM organizations WHERE phone = ? AND pan = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $phone, $pan);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Organization found
            echo "<h2>Welcome to Organization Dashboard</h2>";
        
            // Redirect to organization dashboard (you can replace 'organization_dashboard.php' with your actual dashboard page)
            header("Location: organization_dashboard.php");
            exit();  // Always call exit() after header() to ensure no further code is executed
        } else {
            echo "<h2>Invalid Organization Details</h2>";
        }
        
    } else {
        echo "<h2>Invalid Login Type</h2>";
    }

    $stmt->close();
}
$conn->close();
?>
