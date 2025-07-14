<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";

// Connect to database
$conn = new mysqli($servername, $username, $password, "brainboost_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = '';
$success = '';

// Get user information
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = trim($_POST['username']);
    $new_email = trim($_POST['email']);
    $new_phone = trim($_POST['phone']);
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate current password
    if (!password_verify($current_password, $user['password'])) {
        $error = "Current password is incorrect.";
    } else {
        // Check if new username or email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE (username = ? OR email = ?) AND id != ?");
        $stmt->bind_param("ssi", $new_username, $new_email, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username or email already exists.";
        } else {
            // Update user information
            if (!empty($new_password)) {
                if ($new_password !== $confirm_password) {
                    $error = "New passwords do not match.";
                } elseif (strlen($new_password) < 8) {
                    $error = "New password must be at least 8 characters long.";
                } else {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, phone = ?, password = ? WHERE id = ?");
                    $stmt->bind_param("ssssi", $new_username, $new_email, $new_phone, $hashed_password, $user_id);
                }
            } else {
                $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, phone = ? WHERE id = ?");
                $stmt->bind_param("sssi", $new_username, $new_email, $new_phone, $user_id);
            }

            if (empty($error)) {
                if ($stmt->execute()) {
                    $success = "Profile updated successfully!";
                    // Update session username
                    $_SESSION['username'] = $new_username;
                    // Refresh user data
                    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_assoc();
                } else {
                    $error = "Error updating profile: " . $conn->error;
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Profile - BrainBoost IQ</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .navbar {
            background: #0077ff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .nav-links {
            display: flex;
            gap: 20px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }
        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .profile-card h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
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
    </style>
</head>
<body style="    background-color: #fbfdff;">
    <nav class="navbar">
        <div class="logo">
        <i class='bx bxs-brain'></i>
        <span>BrainBoost IQ</span>
        </div>
        <div class="nav-links">
            <a href="indexCa2.php">Home</a>
            <a href="profile.php">Profile</a>
            <!-- <a href="tests.php">Tests</a> -->
            <!-- <a href="results.php">Results</a> -->
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="profile-card">
            <h1>Edit Profile</h1>
            
            <?php if (!empty($error)): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <?php if (!empty($success)): ?>
                <div class="success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                </div>
                
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>
                
                <div class="form-group">
                    <label for="new_password">New Password (leave blank to keep current)</label>
                    <input type="password" id="new_password" name="new_password">
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                </div>
                
                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</body>
</html> 