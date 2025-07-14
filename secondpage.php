<?php
// indexCA2.php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, "brainboost_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    <!-- <link rel="stylesheet" href="secondpage.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="secondpage.css?v=<?php echo time(); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <header>

        <nav>
            <div class="logo">
                <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHsyY7SZCOh8iQ2SueR2l3KpEa88XgUlWF4ZkLBoFQlaBzOUB0x4SZ5FVkLNeuu1V3V8s&usqp=CAU" alt="Logo"> -->
                <i class='bx bxs-brain'></i>
                <span>BrainBoost IQ</span>

            </div>

            <ul type="none" style="color:#4B5563;  display: flex; font-family: 'Inter', sans-serif;">
                <li style="margin-left: 20px;"><a href="indexCa2.php">Home</a></li>
                <!-- <li style="margin-left: 20px;"><a href="#about">About</a></li> -->
                <li style="margin-left: 40px;"><a class="li-a" href="Faq3.php" style="text-decoration: none;">FAQ</a></li>
                <li style="margin-left: 40px;">Contact</li>
                <!-- <li style="margin-left: 20px;"><a href="loginpage.html">Login</a></li> -->
                <h1><span style="color:#0077ff;">Welcome,</span> <?php echo htmlspecialchars($user['username']); ?>!</h1>
        </ul>

        </nav>
    </header>
    <div class="div-main">
      <div class="div-main-1" >

        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-brain'></i>
                <h3>Logical Reasoning</h3>
            </div>
            <p>Test your ability to identify patterns and
                logical sequences.</p>

            <div class="d-1-2">
                <h3>20 Questions</h3>
                <button><a href="test1.php" style="color:white;">Start Test</a></button>
            </div>

        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-shapes' style="color: #9333EA;"></i>
                <h3>Spatial Reasoning</h3>
            </div>
            <p>Evaluate your ability to manipulate shapes and
                spatial dimensions.</p>

            <div class="d-1-2">
                <h3>15 Questions</h3>
                <button style="background-color: #9333EA;"><a href="test2.php" style="color:white;">Start Test</a></button>
            </div>
        </div>
        <div class="d-1"><div class="d-1-1">
            <i class='bx bxs-calculator' style="color: #16A34A;"></i>
            <h3>Mathematical Ability</h3>
        </div>
        <p>Test your numerical and mathematical
            problem-solving skills.</p>

        <div class="d-1-2">
            <h3>18 Questions</h3>
            <button style="background-color: #16A34A;"><a href="test3.php" style="color:white;">Start Test</a></button>
        </div>
            
        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-component' style="color: #DC2626;"></i>
                <h3>Verbal Reasoning</h3>
            </div>
            <p>Assess your language comprehension and
                verbal analogies.</p>

            <div class="d-1-2">
                <h3>25 Questions</h3>
                <button style="background-color: #DC2626;"><a href="test4.php" style="color:white;">Start Test</a></button>
            </div>
        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class="fa-solid fa-memory" style="font-size: 27px; color:#EA580C;"></i>
                <h3>Memory</h3>
            </div>
            <p>Test your short-term and working memory
                capabilities.</p>

            <div class="d-1-2">
                <h3>12 Questions</h3>
                <button style="background-color: #EA580C;"><a href="test5.php" style="color:white;">Start Test</a></button>
            </div>
        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-brain' ></i>
                
                <h3>Pattern Recognition</h3>
            </div>
            <p>Identify and complete complex visual
                good patterns.</p>

            <div class="d-1-2">
                <h3>16 Questions</h3>
                <button style="background-color: #0D9488;"><a href="test6.php" style="color:white;">Start Test</a></button>
            </div>

        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-time-five' style="color: #4F46E5;"></i>
                <h3>Processing Speed</h3>
            </div>
            <p>Measure your mental processing speed and accuracy.</p>

            <div class="d-1-2">
                <h3>30 Questions</h3>
                <button style="background-color: #4F46E5;"><a href="test7.php" style="color:white;">Start Test</a></button>
            </div>

        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class="fa-solid fa-eye" style="color: #DB2777; font-size: 26px;"></i>
                <h3>Visual Processing</h3>
            </div>
            <p>Test your visual perception and processing
                abilities.</p>

            <div class="d-1-2">
                <h3>22 Questions</h3>
                <button style="background-color: #DB2777;"><a href="test8.php" style="color:white;">Start Test</a></button>
            </div>
        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class="fa-solid fa-lightbulb" style="color: #CA8A04;"></i>
                <h3>Problem Solving</h3>
            </div>
            <p>Evaluate your creative problem-solving
                abilities.</p>

            <div class="d-1-2">
                <h3>14 Questions</h3>
                <button style="background-color: #CA8A04;"><a href="test9.php" style="color:white;">Start Test</a></button>
            </div>
        </div>
        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-brain'></i>
                <h3>Abstract Reasoning</h3>
            </div>
            <p>Test your ability to understand abstract
                concepts and relationships.</p>

            <div class="d-1-2">
                <h3>17 Questions</h3>
                <button style="background-color: #0891B2;"><a href="test10.php" style="color:white;">Start Test</a></button>
            </div>
        </div>



        <div class="d-1">
            <div class="d-1-1">
                <i class='bx bxs-brain'></i>
                <h3>Front End</h3>
            </div>
            <p>Test your ability to understand abstract
                concepts and relationships.</p>

            <div class="d-1-2">
                <h3>17 Questions</h3>
                <button style="background-color: #0891B2;"><a href="test10.php" style="color:white;">Start Test</a></button>
            </div>
        </div>

      </div>
    </div> 
    <!-- <button><a href="cha1.php">view mark</a></button> -->
    
    <footer style="display: flex;">
        <div class="d-f" style="margin-left: 7%;">
            <div class="d-f-1">
                <i class='bx bxs-brain'></i>
                <span>BrainBoost IQ</span>

            </div>
            <h1 style="font-size:14px;color:white; margin-top:38px;margin-bottom:-30px;color: #9CA3AF; ">Hello, <?php echo htmlspecialchars($user['username']); ?>! You can connect Me....</h1>

            <div class="d-f-2" style="padding-top: 25px;">
                <p>Discover and understand your cognitive abilities with our professional IQ testing platform.</p>

            </div>
        </div>
        <div class="d-f">
            <div class="d-f-1">
                <ul>Quick Links
                <li style="margin-top: 20px;" onclick="window.location.href='indexCa2.php'">Home</li>
                    <li  onclick="window.location.href='learnmore.php'">About</li>
                    <li onclick="window.location.href='Faq3.php'">FAQ</li>

                </ul>
            </div>
        </div>
        <div class="d-f">
            <div class="d-f-1">
                <ul>Legal
                <li style="margin-top: 20px;" onclick="window.location.href='Privicy2.php'">Privacy Policy</li>
                    <li onclick="window.location.href='term2.php'">Terms of Service</li>
                    <li onclick="window.location.href='cookiesp2.php'">Cookie Policy</li>
                     
                </ul>
            </div>
        </div>
        <div class="d-f">
            <div class="d-f-2">
                <ul >Follow Us
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