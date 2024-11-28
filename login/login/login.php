<?php
// Database connection
$servername = "localhost"; // Database host (localhost for local development)
$username = "root";        // Database username
$password = "";            // Database password (leave empty for local)
$dbname = "mydb";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

// Handle login requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the request
    $data = json_decode(file_get_contents('php://input'), true);
    
    if ($data['type'] === 'user') {
        // Validate user credentials
        $citizenship = $data['citizenship'];
        $phone = $data['phone'];

        $sql = "SELECT * FROM users WHERE citizenship = ? AND phone = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $citizenship, $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid credentials"]);
        }
    } elseif ($data['type'] === 'organization') {
        // Validate organization credentials
        $pan = $data['pan'];
        $phone = $data['phone'];

        $sql = "SELECT * FROM organizations WHERE pan = ? AND phone = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $pan, $phone);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid credentials"]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Invalid login type"]);
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Interface</title>
    <style>
        /* Basic Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f4f8;
        }

        #loginInterface {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .button {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-container {
            display: none;
            text-align: center;
        }

        .back-button {
            background-color: #ccc;
            color: #333;
            padding: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            border-radius: 4px;
        }

        .back-button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>

    <!-- Login Page Interface -->
    <div id="loginInterface">
        <h2>Login as:</h2>
        <button class="button" id="userLogin">User</button>
        <button class="button" id="orgLogin">Organization</button>

        <div id="userForm" class="form-container">
            <h3>User Login</h3>
            <input type="text" id="citizenship" class="input-field" placeholder="Citizenship Number">
            <input type="tel" id="phone" class="input-field" placeholder="Phone Number" pattern="[0-9]{10}">
            <button class="button" id="userSubmit">Submit</button>
            <button class="back-button" id="backButtonUser">Back</button>
        </div>

        <div id="orgForm" class="form-container">
            <h3>Organization Login</h3>
            <input type="text" id="pan" class="input-field" placeholder="PAN Number">
            <input type="tel" id="orgPhone" class="input-field" placeholder="Phone Number" pattern="[0-9]{10}">
            <button class="button" id="orgSubmit">Submit</button>
            <button class="button" id="backButtonOrg">Back</button>
        </div>
    </div>

    <script>
        // Show user login form
        document.getElementById('userLogin').addEventListener('click', function() {
            document.getElementById('userForm').style.display = 'block';
            document.getElementById('orgForm').style.display = 'none';
            document.getElementById('orgLogin').disabled = true;  // Disable the Organization button
            document.getElementById('backButtonUser').style.display = 'inline-block';  // Show the Back button
        });

        // Show organization login form
        document.getElementById('orgLogin').addEventListener('click', function() {
            document.getElementById('orgForm').style.display = 'block';
            document.getElementById('userForm').style.display = 'none';
            document.getElementById('userLogin').disabled = true;  // Disable the User button
            document.getElementById('backButtonOrg').style.display = 'inline-block';  // Show the Back button
        });

        // Go back to login options
        document.getElementById('backButtonUser').addEventListener('click', function() {
            document.getElementById('userForm').style.display = 'none';
            document.getElementById('orgLogin').disabled = false;  // Enable Organization button again
            document.getElementById('backButtonUser').style.display = 'none';  // Hide the Back button
        });

        document.getElementById('backButtonOrg').addEventListener('click', function() {
            document.getElementById('orgForm').style.display = 'none';
            document.getElementById('userLogin').disabled = false;  // Enable User button again
            document.getElementById('backButtonOrg').style.display = 'none';  // Hide the Back button
        });

        // Submit user form
        document.getElementById('userSubmit').addEventListener('click', function() {
            const citizenship = document.getElementById('citizenship').value;
            const phone = document.getElementById('phone').value;

            // Send a request to the server to validate user
            fetch('index.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ type: 'user', citizenship, phone })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'user-dashboard.html';  // Redirect to user dashboard
                } else {
                    alert('Invalid credentials');
                }
            });
        });

        // Submit organization form
        document.getElementById('orgSubmit').addEventListener('click', function() {
            const pan = document.getElementById('pan').value;
            const phone = document.getElementById('orgPhone').value;

            // Send a request to the server to validate organization
            fetch('index.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ type: 'organization', pan, phone })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = 'org-dashboard.html';  // Redirect to organization dashboard
                } else {
                    alert('Invalid credentials');
                }
            });
        });
    </script>

</body>
</html>
