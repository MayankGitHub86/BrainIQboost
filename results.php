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

// Get user information
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Get test results - using created_at instead of test_date
$stmt = $conn->prepare("SELECT * FROM test_results WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$results = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results - BrainBoost IQ</title>
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 50px;
            height: 50px;
            background: #0077ff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
        }
        .user-details h1 {
            color: #333;
            margin-bottom: 5px;
            font-size: 24px;
        }
        .user-details p {
            color: #666;
            font-size: 14px;
        }
        .welcome-section p {
            color: #666;
            line-height: 1.6;
        }
        .results-table {
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .results-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .results-table th,
        .results-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .results-table th {
            background: #f8f9fa;
            color: #333;
            font-weight: 600;
        }
        .results-table tr:hover {
            background: #f8f9fa;
        }
        .no-results {
            text-align: center;
            padding: 30px;
            color: #666;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #0077ff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .score {
            font-weight: bold;
            color: #0077ff;
        }
        .time {
            color: #666;
        }
        .date {
            color: #888;
            font-size: 0.9em;
        }
        .performance-summary {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }
        .summary-item {
            text-align: center;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 4px;
        }
        .summary-item h3 {
            color: #333;
            margin-bottom: 5px;
            font-size: 16px;
        }
        .summary-item p {
            color: #0077ff;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">BrainBoost IQ</div>
        <div class="nav-links">
            <a href="auth.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="tests.php">Tests</a>
            <a href="results.php">Results</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-section">
            <div class="user-info">
                <div class="user-avatar">
                    <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
                </div>
                <div class="user-details">
                    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                    <p>View your test results and track your progress</p>
                </div>
            </div>
        </div>

        <?php if ($results->num_rows > 0): ?>
            <div class="performance-summary">
                <h2>Performance Summary</h2>
                <div class="summary-grid">
                    <div class="summary-item">
                        <h3>Total Tests Taken</h3>
                        <p><?php echo $results->num_rows; ?></p>
                    </div>
                    <div class="summary-item">
                        <h3>Average Score</h3>
                        <p>
                            <?php 
                            $total_score = 0;
                            $results->data_seek(0);
                            while ($result = $results->fetch_assoc()) {
                                $total_score += $result['score'];
                            }
                            echo number_format($total_score / $results->num_rows, 1) . '%';
                            ?>
                        </p>
                    </div>
                    <div class="summary-item">
                        <h3>Best Score</h3>
                        <p>
                            <?php 
                            $results->data_seek(0);
                            $best_score = 0;
                            while ($result = $results->fetch_assoc()) {
                                if ($result['score'] > $best_score) {
                                    $best_score = $result['score'];
                                }
                            }
                            echo $best_score . '%';
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="results-table">
            <?php if ($results->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Test Name</th>
                            <th>Date</th>
                            <th>Score</th>
                            <th>Time Taken</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $results->data_seek(0);
                        while ($result = $results->fetch_assoc()): 
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($result['test_name']); ?></td>
                                <td class="date"><?php echo date('F j, Y', strtotime($result['created_at'])); ?></td>
                                <td class="score"><?php echo htmlspecialchars($result['score']); ?>%</td>
                                <td class="time"><?php echo htmlspecialchars($result['time_taken']); ?> minutes</td>
                                <td>
                                    <a href="result_details.php?id=<?php echo $result['id']; ?>" class="btn">View Details</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="no-results">
                    <p>You haven't taken any tests yet.</p>
                    <a href="secondpage.php" class="btn">Take a Test</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 