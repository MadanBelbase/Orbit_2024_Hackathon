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
    'name' => 'Madan Belbase',
    'address' => '123 Main St, Kathmandu, Nepal',
    'current_address' => '456 Current St, Kathmandu, Nepal',
    'permanent_address' => '789 Permanent St, Kathmandu, Nepal',
    'phone' => '9876543210',
    'email' => 'user1@example.com',
    'dob' => '2004-08-10',
    'gender' => 'Male',
    'citizenship' => '1234567890',
    'school_college' => 'Nepal College of Information Technology',
    'profile_pic' => 'http://localhost:50/final_hackathon/Orbit_2024_Hackathon/image/hero-image.png',  // Placeholder image
    'check_in_out' => [
        ['check_in' => '2024-11-01 08:00 AM', 'check_out' => '2024-11-01 05:00 PM', 'location' => 'Sagar Math College'],
        ['check_in' => '2024-11-02 09:00 AM', 'check_out' => '2024-11-02 06:00 PM', 'location' => 'Kathmandu College'],
        ['check_in' => '2024-11-03 07:30 AM', 'check_out' => '2024-11-03 04:30 PM', 'location' => 'Biratnagar College'],
        ['check_in' => '2024-11-04 10:00 AM', 'check_out' => '2024-11-04 07:00 PM', 'location' => 'Pokhara College'],
        ['check_in' => '2024-11-05 08:15 AM', 'check_out' => '2024-11-05 05:30 PM', 'location' => 'Chitwan College']
    ],
    'payment_details' => [
        ['payment_method' => 'Credit Card', 'amount' => '5000 NPR', 'payment_status' => 'Completed', 'transaction_id' => 'T123456789'],
        ['payment_method' => 'Cash', 'amount' => '2000 NPR', 'payment_status' => 'Pending', 'transaction_id' => 'T987654321']
    ],
    'arrival_by_vehicle' => [
        ['vehicle_type' => 'Car', 'arrival_time' => '2024-11-01 07:45 AM', 'vehicle_number' => 'BA-1234'],
        ['vehicle_type' => 'Bus', 'arrival_time' => '2024-11-02 09:10 AM', 'vehicle_number' => 'AB-5678'],
        ['vehicle_type' => 'Motorcycle', 'arrival_time' => '2024-11-03 08:30 AM', 'vehicle_number' => 'CD-1122']
    ]
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
        .check-in-table, .payment-table, .vehicle-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .check-in-table th, .payment-table th, .vehicle-table th,
        .check-in-table td, .payment-table td, .vehicle-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .check-in-table th, .payment-table th, .vehicle-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .check-in-table td, .payment-table td, .vehicle-table td {
            text-align: center;
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
    <h1>Welcome, <?php echo $user['name']; ?>!</h1>
    <p>We are glad to have you back. Here is your personalized dashboard.</p>
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
        <h3>Addresses</h3>
        <p><strong>Current Address:</strong> <?php echo $user['current_address']; ?></p>
        <p><strong>Permanent Address:</strong> <?php echo $user['permanent_address']; ?></p>
    </div>

    <!-- Citizenship and School/College Section -->
    <div class="section">
        <h3>Citizenship & Education</h3>
        <p><strong>Citizenship No:</strong> <?php echo $user['citizenship']; ?></p>
        <p><strong>School/College:</strong> <?php echo $user['school_college']; ?></p>
    </div>

    <!-- Check-In/Check-Out Section -->
    <div class="section">
        <h3>Check-In & Check-Out Records</h3>
        <table class="check-in-table">
            <tr>
                <th>Check-In Time</th>
                <th>Check-Out Time</th>
                <th>Location</th>
            </tr>
            <?php foreach ($user['check_in_out'] as $record): ?>
                <tr>
                    <td><?php echo $record['check_in']; ?></td>
                    <td><?php echo $record['check_out']; ?></td>
                    <td><?php echo $record['location']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Payment Details Section -->
    <div class="section">
        <h3>Payment Details</h3>
        <table class="payment-table">
            <tr>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Transaction ID</th>
            </tr>
            <?php foreach ($user['payment_details'] as $payment): ?>
                <tr>
                    <td><?php echo $payment['payment_method']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
                    <td><?php echo $payment['payment_status']; ?></td>
                    <td><?php echo $payment['transaction_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Arrival by Vehicle Section -->
    <div class="section">
        <h3>Arrival by Vehicle</h3>
        <table class="vehicle-table">
            <tr>
                <th>Vehicle Type</th>
                <th>Arrival Time</th>
                <th>Vehicle Number</th>
            </tr>
            <?php foreach ($user['arrival_by_vehicle'] as $vehicle): ?>
                <tr>
                    <td><?php echo $vehicle['vehicle_type']; ?></td>
                    <td><?php echo $vehicle['arrival_time']; ?></td>
                    <td><?php echo $vehicle['vehicle_number']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<footer>
    <p>&copy; 2024 Orbit Hackathon. All rights reserved.</p>
</footer>

</body>
</html>
