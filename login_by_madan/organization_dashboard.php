<?php
// Simulating demo hotel data
$org = [
    'name' => 'Sample Hotel',
    'phone' => '01-9876543',
    'pan' => '9876543210',
    'email' => 'info@samplehotel.com',
    'address' => '456 Luxury Lane, Kathmandu, Nepal',
    'establishment_date' => '2015-05-12'
];

// Simulating user check-ins and check-outs
$checkInsOuts = [
    ['name' => 'John Doe', 'check_in' => '2024-11-01', 'check_out' => '2024-11-05', 'room' => '101'],
    ['name' => 'Jane Smith', 'check_in' => '2024-11-02', 'check_out' => '2024-11-06', 'room' => '102'],
    ['name' => 'Bob Brown', 'check_in' => '2024-11-03', 'check_out' => '2024-11-07', 'room' => '103'],
    // Add more sample check-ins/check-outs (total 15)
    ['name' => 'Alice Green', 'check_in' => '2024-11-04', 'check_out' => '2024-11-08', 'room' => '104'],
    ['name' => 'Charlie White', 'check_in' => '2024-11-05', 'check_out' => '2024-11-09', 'room' => '105'],
    ['name' => 'David Black', 'check_in' => '2024-11-06', 'check_out' => '2024-11-10', 'room' => '106'],
    ['name' => 'Eva Blue', 'check_in' => '2024-11-07', 'check_out' => '2024-11-11', 'room' => '107'],
    ['name' => 'Frank Gray', 'check_in' => '2024-11-08', 'check_out' => '2024-11-12', 'room' => '108'],
    ['name' => 'Grace Red', 'check_in' => '2024-11-09', 'check_out' => '2024-11-13', 'room' => '109'],
    ['name' => 'Henry Yellow', 'check_in' => '2024-11-10', 'check_out' => '2024-11-14', 'room' => '110'],
    ['name' => 'Isla Pink', 'check_in' => '2024-11-11', 'check_out' => '2024-11-15', 'room' => '111'],
    ['name' => 'Jack Purple', 'check_in' => '2024-11-12', 'check_out' => '2024-11-16', 'room' => '112'],
    ['name' => 'Kathy Brown', 'check_in' => '2024-11-13', 'check_out' => '2024-11-17', 'room' => '113'],
    ['name' => 'Leo Black', 'check_in' => '2024-11-14', 'check_out' => '2024-11-18', 'room' => '114'],
    ['name' => 'Mona White', 'check_in' => '2024-11-15', 'check_out' => '2024-11-19', 'room' => '115'],
];

// Simulating payments for users
$payments = [
    ['name' => 'John Doe', 'payment_method' => 'Credit Card', 'amount' => '500', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123456'],
    ['name' => 'Jane Smith', 'payment_method' => 'Debit Card', 'amount' => '600', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123457'],
    ['name' => 'Bob Brown', 'payment_method' => 'Cash', 'amount' => '450', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123458'],
    // Add more payment examples (total 15)
    ['name' => 'Alice Green', 'payment_method' => 'Credit Card', 'amount' => '550', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123459'],
    ['name' => 'Charlie White', 'payment_method' => 'Debit Card', 'amount' => '650', 'payment_status' => 'Pending', 'transaction_id' => 'TXN123460'],
    ['name' => 'David Black', 'payment_method' => 'Cash', 'amount' => '500', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123461'],
    ['name' => 'Eva Blue', 'payment_method' => 'Credit Card', 'amount' => '700', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123462'],
    ['name' => 'Frank Gray', 'payment_method' => 'Debit Card', 'amount' => '750', 'payment_status' => 'Pending', 'transaction_id' => 'TXN123463'],
    ['name' => 'Grace Red', 'payment_method' => 'Cash', 'amount' => '800', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123464'],
    ['name' => 'Henry Yellow', 'payment_method' => 'Credit Card', 'amount' => '450', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123465'],
    ['name' => 'Isla Pink', 'payment_method' => 'Debit Card', 'amount' => '600', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123466'],
    ['name' => 'Jack Purple', 'payment_method' => 'Cash', 'amount' => '550', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123467'],
    ['name' => 'Kathy Brown', 'payment_method' => 'Credit Card', 'amount' => '500', 'payment_status' => 'Pending', 'transaction_id' => 'TXN123468'],
    ['name' => 'Leo Black', 'payment_method' => 'Debit Card', 'amount' => '650', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123469'],
    ['name' => 'Mona White', 'payment_method' => 'Cash', 'amount' => '700', 'payment_status' => 'Completed', 'transaction_id' => 'TXN123470'],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Organization Dashboard</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
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
        <h2>Welcome to the Hotel Dashboard</h2>

        <div class="dashboard-info">
            <div class="info-box">
                <h4>Hotel Name</h4>
                <p><?php echo $org['name']; ?></p>
            </div>
            <div class="info-box">
                <h4>Phone Number</h4>
                <p><?php echo $org['phone']; ?></p>
            </div>
            <div class="info-box">
                <h4>Email</h4>
                <p><?php echo $org['email']; ?></p>
            </div>
            <div class="info-box">
                <h4>Establishment Date</h4>
                <p><?php echo $org['establishment_date']; ?></p>
            </div>
        </div>

        <!-- Check-ins and Check-outs table -->
        <h3>Check-ins and Check-outs</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Room</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($checkInsOuts as $record): ?>
                <tr>
                    <td><?php echo $record['name']; ?></td>
                    <td><?php echo $record['check_in']; ?></td>
                    <td><?php echo $record['check_out']; ?></td>
                    <td><?php echo $record['room']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Payments table -->
        <h3>Payments</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Transaction ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?php echo $payment['name']; ?></td>
                    <td><?php echo $payment['payment_method']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
                    <td><?php echo $payment['payment_status']; ?></td>
                    <td><?php echo $payment['transaction_id']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Logout Button -->
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="footer">
        <p>&copy; 2024 Sample Hotel. All Rights Reserved.</p>
    </div>

</body>
</html>
