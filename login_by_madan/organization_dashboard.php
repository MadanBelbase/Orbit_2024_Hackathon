<?php
// Simulating demo organization data
$org = [
    'name' => 'Demo Organization',
    'phone' => '01-2345678',
    'pan' => '1234567890',
    'email' => 'demo@org.com',
    'address' => '123 Demo Street, Kathmandu, Nepal',
    'establishment_date' => '2020-01-01'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organization Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .dashboard-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .info-box {
            width: 48%;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .info-box h4 {
            margin-top: 0;
            font-size: 18px;
            color: #444;
        }
        .info-box p {
            font-size: 16px;
            color: #666;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #888;
        }
        .logout-btn {
            display: block;
            width: 100px;
            padding: 10px;
            margin: 0 auto;
            background-color: #f44336;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome to Organization Dashboard</h2>

        <div class="dashboard-info">
            <!-- Organization Information -->
            <div class="info-box">
                <h4>Organization Name:</h4>
                <p><?php echo $org['name']; ?></p>
            </div>
            <div class="info-box">
                <h4>Phone:</h4>
                <p><?php echo $org['phone']; ?></p>
            </div>
            <div class="info-box">
                <h4>PAN Number:</h4>
                <p><?php echo $org['pan']; ?></p>
            </div>
            <div class="info-box">
                <h4>Email:</h4>
                <p><?php echo $org['email']; ?></p>
            </div>
            <div class="info-box">
                <h4>Address:</h4>
                <p><?php echo $org['address']; ?></p>
            </div>
            <div class="info-box">
                <h4>Establishment Date:</h4>
                <p><?php echo $org['establishment_date']; ?></p>
            </div>
        </div>

        <!-- Logout Button -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="footer">
        <p>&copy; 2024 Demo Organization Dashboard. All rights reserved.</p>
    </div>

</body>
</html>
