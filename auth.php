<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

// First try to connect without database
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$result = $conn->query("SHOW DATABASES LIKE 'brainboost_db'");
if ($result->num_rows == 0) {
    // Database doesn't exist, redirect to create database page
    header("Location: create_database.php");
    exit();
}

// Now connect to the specific database
$conn->select_db("brainboost_db");

$error = '';
$success = '';
$active_tab = 'login'; // Default active tab

// // Check if user is already logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: indexCa2.php");
    exit();
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        // Login form submitted
        $usernameOrEmail = trim($_POST['username']);
        $password = $_POST['password'];

        if (empty($usernameOrEmail) || empty($password)) {
            $error = "Please fill in all fields.";
        } else {
            // Prepare SQL
            $sql = "SELECT * FROM users WHERE username = ? OR email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if user exists
            if ($result && $result->num_rows === 1) {
                $user = $result->fetch_assoc();

                // Verify password
                if (password_verify($password, $user['password'])) {
                    // Set session variables
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['logged_in'] = true;
                    
                    // Redirect to indexCa2.php
                    header("Location: indexCa2.php");
                    exit();
                } else {
                    $error = "Invalid password.";
                }
            } else {
                $error = "User not found.";
            }
            $stmt->close();
        }
    } elseif (isset($_POST['signup'])) {
        // Signup form submitted
        $active_tab = 'signup';
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate input
        if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
            $error = "All fields are required.";
        } elseif ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } elseif (strlen($password) < 8) {
            $error = "Password must be at least 8 characters long.";
        } else {
            // Check if username or email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error = "Username or email already exists.";
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user
                $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $username, $email, $hashed_password, $phone);

                if ($stmt->execute()) {
                    // Set session variables
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $conn->insert_id;
                    $_SESSION['logged_in'] = true;
                    
                    // Redirect to indexCa2.php
                    header("Location: indexCa2.php");
                    exit();
                } else {
                    $error = "Error: " . $conn->error;
                }
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup - BrainBoost IQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .tabs {
            display: flex;
            margin-bottom: 20px;
        }
        .tab {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            background: #f0f0f0;
            border: none;
            border-radius: 4px;
            margin: 0 5px;
        }
        .tab.active {
            background: #0077ff;
            color: white;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #0077ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        .form-content {
            display: none;
        }
        .form-content.active {
            display: block;
        }
        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 20px;
            color: red;
            cursor: pointer;
            font-weight: bold;
        }
        .close-btn:hover {
            color: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="close-btn" onclick="window.location.href='firstindex.php'">×</div>
        <h1>BrainBoost IQ</h1>
        
        <div class="tabs">
            <button class="tab <?php echo $active_tab === 'login' ? 'active' : ''; ?>" onclick="showTab('login')">Login</button>
            <button class="tab <?php echo $active_tab === 'signup' ? 'active' : ''; ?>" onclick="showTab('signup')">Sign Up</button>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if (!empty($success)): ?>
            <div class="success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>

        <!-- Login Form -->
        <div id="login-form" class="form-content <?php echo $active_tab === 'login' ? 'active' : ''; ?>">
            <form method="POST" action="">
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label for="login-username">Username or Email</label>
                    <input type="text" id="login-username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" id="login-password" name="password" required>
                </div>
                
                <button type="submit">Login</button>
                
            </form>
        </div>

        <!-- Signup Form -->
        <div id="signup-form" class="form-content <?php echo $active_tab === 'signup' ? 'active' : ''; ?>">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="signup-username">Username</label>
                    <input type="text" id="signup-username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="signup-email">Email</label>
                    <input type="email" id="signup-email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="signup-phone">Phone Number (Optional)</label>
                    <input type="tel" id="signup-phone" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="signup-password">Password</label>
                    <input type="password" id="signup-password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="signup-confirm-password">Confirm Password</label>
                    <input type="password" id="signup-confirm-password" name="confirm_password" required>
                </div>

               
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all forms
            document.querySelectorAll('.form-content').forEach(form => {
                form.classList.remove('active');
            });
            
            // Show selected form
            document.getElementById(tabName + '-form').classList.add('active');
            
            // Update active tab
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelector('.tab:nth-child(' + (tabName === 'login' ? '1' : '2') + ')').classList.add('active');
        }
    </script>
</body>
</html>