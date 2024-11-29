<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Demo user data (replace with real data from database if needed)
$user = [
    'name' => 'John Doe',
    'address' => '123 Main St, Kathmandu, Nepal',
    'phone' => '9876543210',
    'email' => 'johndoe@example.com',
    'check_in' => '2024-11-01 08:00 AM',
    'check_out' => '2024-11-01 05:00 PM',
    'education' => 'Bachelor of Computer Engineering',
    'dob' => '1999-08-10',
    'gender' => 'Male',
    'profile_pic' => 'https://via.placeholder.com/150',  // Placeholder image
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- External CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        .profile-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .profile-info img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
        }
        .profile-info div {
            flex: 1;
            padding-left: 20px;
        }
        .profile-info h2 {
            margin: 0;
            font-size: 24px;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .section h3 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }
        .section p {
            font-size: 16px;
            color: #555;
        }
        footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<header>
    <h1>User Dashboard</h1>
</header>

<div class="container">
    <!-- Profile Section -->
    <div class="profile-info">
        <img src="<?php echo $user['profile_pic']; ?>" alt="Profile Picture">
        <div>
            <h2><?php echo $user['name']; ?></h2>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Phone:</strong> <?php echo $user['phone']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $user['dob']; ?></p>
            <p><strong>Gender:</strong> <?php echo $user['gender']; ?></p>
        </div>
    </div>

    <!-- Address Section -->
    <div class="section">
        <h3>Address</h3>
        <p><?php echo $user['address']; ?></p>
    </div>

    <!-- Check-In/Check-Out Section -->
    <div class="section">
        <h3>Check-In & Check-Out</h3>
        <p><strong>Check-In:</strong> <?php echo $user['check_in']; ?></p>
        <p><strong>Check-Out:</strong> <?php echo $user['check_out']; ?></p>
    </div>

    <!-- Education Section -->
    <div class="section">
        <h3>Education</h3>
        <p><?php echo $user['education']; ?></p>
    </div>

    <!-- Logout Button -->
    <div class="section" style="text-align: center;">
        <a href="logout.php" style="padding: 10px 20px; background-color: #FF5733; color: white; border-radius: 5px; text-decoration: none;">Logout</a>
    </div>
</div>

<footer>
    <p>&copy; 2024 Your Website. All Rights Reserved.</p>
</footer>

</body>
</html>
