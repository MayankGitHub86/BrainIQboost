<?php
// indexCA2.php
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCA2.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styleCA2.css?v=<?php echo time(); ?>">
    <!-- <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1> -->

    <title>BrainBoost IQ - Home</title>
   
</head>
   <!-- <nav class="navbar">
        <div class="logo">BrainBoost IQ</div>
        <div class="nav-links">
            <a href="indexCa2.php">Home</a>
            <a href="profile.php">Profile</a>
            <a href="tests.php">Tests</a>
            <a href="results.php">Results</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav> -->

    <style>
    .li-a:hover{
        color: #0077ff;

        }
    .li-a{
        color: #4B5563;

    }
    .sec-2-div-main-2 .d-1:hover{
    border: 2px solid #0077ff;
    transition: 0.3s ease;
    transform: scale(1.1);
    }
    
    html {
    scroll-behavior: smooth;
    }
  
   
   
 </style>
<body>
    <header>
        <nav>
            <div class="logo">
                <i class='bx bxs-brain'></i>
                <span>BrainBoost IQ</span>
            </div>

            <ul type="none" style="display: flex; font-family: 'Inter', sans-serif;">
                <li style="margin-left: 20px;"><a href="indexCa2.php" style="text-decoration: none;" class="li-a">Home</a></li>
                <li style="margin-left: 20px;"><a href="#about" style="text-decoration: none;" class="li-a">About</li>
                <li style="margin-left: 20px;"><a class="li-a" href="faq2.php" style="text-decoration: none;">FAQ</a></li>
                <li style="margin-left: 20px;"><a href="#contact" style="text-decoration: none;" class="li-a">Contact</a></li>
                <li style="margin-left: 20px;"><a href="profile.php" style="text-decoration: none;" class="li-a">Profile</a></li>
                <button style="padding-top: 2px;margin-top:-7px;"><a href="logout.php"  style="text-decoration: none; color:white;" >Logout</a></button>
                

            </ul>
        </nav>
    </header>

    <section class="section-1">
        <div class="s-1div-main">
            <div class="s-1div-main-1">
                <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h1>
                <h2>Discover Your True <span style="margin-top: -5px;">Intellectual Potential</span></h2>
                <p>Take our professionally designed IQ test to measure your cognitive abilities and compare your results
                    with people worldwide.</p>
                <div class="btn-1">
                    <!-- <button class="btn-1-1"><a href="popup.php" style="text-decoration: none;">Start Free Test</a></button> -->
                    <button class="btn-1-1" onclick="window.location.href='popup.php'">Start Free Test</button>
                    <button class="btnnn-1-2" style="margin-left: 16px;" onclick="window.location.href='learnmore.php'">Learn More</button>
                    <!-- <button class="btnnn-1-2" style=" margin-left: 16px;"><a href="learnmore.php" style="text-decoration: none;">Learn More</a></button> -->
                </div>
            </div>
            <div class="s-1div-main-2 slider">
                <div class="slides">
                    <img src="https://plus.unsplash.com/premium_vector-1682311187746-982260e70856?q=80&w=2342&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <img src="https://plus.unsplash.com/premium_vector-1682269274488-5e8ca00054fb?q=80&w=2126&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
                    <img src="https://plus.unsplash.com/premium_vector-1682269498466-be10e63aaa8a?q=80&w=1966&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">

                </div>
            </div>

            
            
        </div>
    </section>

    <section class="section-2" id="about">
        <div class="sec-2div-main">
            <div class="sec-2-div-main-1">
                <h2 style="margin-left: 437.02px;">Why Choose Our IQ Test?</h2>
                <p style="color: #4B5563; margin-left: 294.52px; width: 600px;font-size: 16px; height: 20px; margin-top: 20px;">
                    Our scientifically validated test provides accurate results and detailed insights into your
                    <span style="color: #4B5563; margin-left: 38%; margin-top: -3px;">cognitive abilities.</span>
                </p>
            </div>
            <div class="sec-2-div-main-2" style="display: flex;">
                <div class="d-1">
                    <i class='bx bxs-time-five'></i>
                    <h3>Quick & Accurate</h3>
                    <p>Complete the test in 30 minutes and get instant results with detailed analysis.</p>
                </div>
                <div class="d-1" style="margin-left: 30px;">
                    <i class='bx bx-line-chart'></i>
                    <h3>Detailed Reports</h3>
                    <p>Receive comprehensive insights about your cognitive strengths and areas for improvement.</p>
                </div>
                <div class="d-1" style="margin-left: 30px;">
                    <i class="bx bx-help-circle"></i>
                    <h3 style="width: 344.66px;">Scientifically Validated</h3>
                    <p>Test designed by experts following international standards and methodologies.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-3">
        <div class="sec-3-div-main">
            <div class="sec-3-div-main-1">
                <div class="d-2">
                    <div class="d-2-1" style="padding-left: 98.77px;">4.9/5</div>
                    <div class="d-2-2" style="padding-left: 100.11px;">User Rating</div>
                </div>
                <div class="d-2">
                    <div class="d-2-1" style="padding-left: 102.31px;">98%</div>
                    <div class="d-2-2" style="padding-left: 89.14px;">Accuracy Rate</div>
                </div>
                <div class="d-2">
                    <div class="d-2-1" style="padding-left: 113.33px;">195</div>
                    <div class="d-2-2" style="padding-left: 107.36px;">Countries</div>
                </div>
                <div class="d-2">
                    <div class="d-2-1">500K+</div>
                    <div class="d-2-2">Tests Taken</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-4">
        <div class="d-4">
            <h3>Ready to Discover Your IQ?</h3>
            <p>Join millions of people who have already taken our test and gained valuable insights into 
               <span style="margin-left: 240px;">their cognitive abilities.</span></p>
            <button><a href="secondpage.php" style="color: white;">Take the Test Now</a></button>
        </div>
    </section>

    <footer style="display: flex;"  id="contact">
        <div class="d-f" style="margin-left: 7%;">
            <div class="d-f-1">
                <i class='bx bxs-brain'></i>
                <span>BrainBoost IQ</span>
            </div>
            <h1 style="font-size:14px;color:white; margin-top:38px;margin-left:0px;color: #9CA3AF;">Hello, <?php echo htmlspecialchars($user['username']); ?>! You can connect Me....</h1>
            <div class="d-f-2" style="padding-top: 25px;">
                <p>Discover and understand your cognitive abilities with our professional IQ testing platform.</p>
            </div>
        </div>
        <div class="d-f">
            <div class="d-f-1">
                <ul>Quick Links
                    <li style="margin-top: 20px;" onclick="window.location.href='indexCa2.php'">Home</li>
                    <li  onclick="window.location.href='#about'">About</li>
                    <li onclick="window.location.href='Faq2.php'">FAQ</li>

                </ul>
            </div>
        </div>
        <div class="d-f">
            <div class="d-f-1">
                <ul>Legal
                    <li style="margin-top: 20px;" onclick="window.location.href='Privicy.php'">Privacy Policy</li>
                    <li onclick="window.location.href='term.php'">Terms of Service</li>
                    <li onclick="window.location.href='cookiesp.php'">Cookie Policy</li>
                </ul>
            </div>
        </div>
        <div class="d-f">
            <div class="d-f-2">
                <ul>Follow Us
                    <li style="color: #9CA3AF;">
                        <a href="https://www.facebook.com" target="_blank" style="color: inherit; text-decoration: none;"><i class='bx bxl-facebook-circle' ></i></a>
                        <a href="https://twitter.com" target="_blank" style="color: inherit; text-decoration: none; margin-left: 15px;"><i class='bx bxl-twitter' style="margin-left: 15px;"></i></a>
                        <a href="https://www.linkedin.com" target="_blank" style="color: inherit; text-decoration: none; margin-left: 15px;"><i class='bx bxl-linkedin-square' style="margin-left: 15px;"></i></a>
                        <a href="https://www.instagram.com" target="_blank" style="color: inherit; text-decoration: none; margin-left: 15px;"><i class='bx bxl-instagram' style="margin-left: 15px;"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>
