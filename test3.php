<?php
$questions = [
    [
        "question" => "What is the sum of 256 and 342?",
        "options" => ["598", "608", "618", "628"],
        "answer" => "A"
    ],
    [
        "question" => "Subtract 543 from 1024. What is the result?",
        "options" => ["481", "471", "461", "451"],
        "answer" => "A"
    ],
    [
        "question" => "What is 12 × 15?",
        "options" => ["180", "190", "200", "210"],
        "answer" => "A"
    ],
    [
        "question" => "Divide 144 by 12. What is the quotient?",
        "options" => ["12", "14", "16", "18"],
        "answer" => "A"
    ],
    [
        "question" => "A man buys an article for $50 and sells it for $70. What is his profit percentage?",
        "options" => ["40%", "50%", "60%", "70%"],
        "answer" => "A"
    ],
    [
        "question" => "Find the least common multiple (LCM) of 6 and 8.",
        "options" => ["24", "48", "72", "96"],
        "answer" => "A"
    ],
    [
        "question" => "What is the greatest common divisor (GCD) of 48 and 60?",
        "options" => ["12", "14", "16", "18"],
        "answer" => "A"
    ],
    [
        "question" => "If a train travels 240 miles in 4 hours, what is its speed in miles per hour?",
        "options" => ["60 mph", "50 mph", "70 mph", "80 mph"],
        "answer" => "A"
    ],
    [
        "question" => "Simplify (15 + 3) × 2.",
        "options" => ["36", "38", "40", "42"],
        "answer" => "A"
    ],
    [
        "question" => "Find the square root of 121.",
        "options" => ["11", "12", "13", "14"],
        "answer" => "A"
    ],
    [
        "question" => "What is 25% of 200?",
        "options" => ["50", "60", "70", "80"],
        "answer" => "A"
    ],
    [
        "question" => "The number increases from 80 to 100. What is the percentage increase?",
        "options" => ["25%", "30%", "35%", "40%"],
        "answer" => "A"
    ],
    [
        "question" => "The ratio of two numbers is 3:5. If their sum is 40, find the numbers.",
        "options" => ["15 and 25", "10 and 30", "20 and 20", "25 and 15"],
        "answer" => "A"
    ],
    [
        "question" => "A shopkeeper gives a 20% discount on an item marked at $500. What is the selling price?",
        "options" => ["$400", "$450", "$500", "$550"],
        "answer" => "A"
    ],
    [
        "question" => "In a mixture of 40 liters, the ratio of water to milk is 2:3. Find the quantity of water.",
        "options" => ["16 liters", "18 liters", "20 liters", "22 liters"],
        "answer" => "A"
    ],
    [
        "question" => "Solve for x: 2x + 5 = 15.",
        "options" => ["5", "6", "7", "8"],
        "answer" => "A"
    ],
    [
        "question" => "Simplify (x + 3)(x − 3).",
        "options" => ["x² − 9", "x² + 9", "2x − 9", "2x + 9"],
        "answer" => "A"
    ],
    [
        "question" => "If 4x = 20, what is x?",
        "options" => ["5", "6", "7", "8"],
        "answer" => "A"
    ]
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BrainBoost IQ Test</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 15px 30px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    header .logo {
      font-weight: bold;
      font-size: 20px;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .question-box {
      margin-bottom: 20px;
    }
    .question-category {
      font-size: 14px;
      color: #6366f1;
      font-weight: bold;
    }
    .question-text {
      font-size: 18px;
      font-weight: bold;
      margin: 10px 0;
    }
    .options button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #f3f4f6;
      cursor: pointer;
    }
    .navigation {
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }
    .navigation button {
      background-color: #6366f1;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
    }
    .timer-score {
      text-align: right;
      margin-bottom: 10px;
    }
    .scorecard {
      text-align: center;
      font-size: 22px;
      font-weight: bold;
      margin-top: 20px;
    }
    .close-btn {
      margin: 10px 10px 0 10px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #6366f1;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <div class="logo">
      <i class='bx bxs-brain'></i> BrainBoost IQ
    </div>
    <div class="timer-score">
      <span id="timer">Time Left: 20:00</span> |
      <span id="score">Score: 0</span>
    </div>
  </header>

  <div class="container">
    <div id="quiz-box"></div>
    <div class="navigation">
      <button id="next-btn" onclick="nextQuestion()">Next →</button>
      <button id="submit-btn" onclick="showScore()" style="display:none;">FNISH</button>
    </div>
    <div class="scorecard" id="scorecard"></div>
  </div>

  <script>
    const questions = <?php echo json_encode($questions); ?>;
    let current = 0;
    let score = 0;
    let selectedAnswers = new Array(questions.length);
    let time = 1200; // 20 minutes
    let timerInterval;

    function loadQuestion(index) {
      const q = questions[index];
      document.getElementById("quiz-box").innerHTML = `
        <div class="question-box">
          <div class="question-category">IQ Question</div>
          <div class="question-text">${index + 1}. ${q.question}</div>
          <div class="options">
            ${q.options.map((opt, i) => `
              <button onclick="selectOption('${String.fromCharCode(65 + i)}', this)">
                ${String.fromCharCode(65 + i)}) ${opt}
              </button>`).join('')}
          </div>
        </div>`;

      // Toggle buttons
      if (index === questions.length - 1) {
        document.getElementById("next-btn").style.display = 'none';
        document.getElementById("submit-btn").style.display = 'inline-block';
      } else {
        document.getElementById("next-btn").style.display = 'inline-block';
        document.getElementById("submit-btn").style.display = 'none';
      }
    }

    function selectOption(answer, btn) {
      selectedAnswers[current] = answer;
      document.querySelectorAll(".options button").forEach(b => {
        b.style.backgroundColor = '#f3f4f6';
      });
      btn.style.backgroundColor = '#a5b4fc';
    }

    function nextQuestion() {
      if (current < questions.length - 1) {
        current++;
        loadQuestion(current);
      }
    }

    function showScore() {
      questions.forEach((q, i) => {
        if (selectedAnswers[i] === q.answer) score++;
      });
      clearInterval(timerInterval);
      document.getElementById("quiz-box").style.display = 'none';
      document.querySelector(".navigation").style.display = 'none';
      document.getElementById("score").innerText = `Score: ${score}`;
      const timeTaken = formatTime(1200 - time);
      document.getElementById("scorecard").innerHTML = `
        You scored ${score} out of ${questions.length}<br>
        Time Taken: ${timeTaken}<br>
        <button class='close-btn' onclick='restartQuiz()'>Test Again</button>
        <button class='close-btn'><a href="secondpage.php" style="color:white; text-decoration: none;">Close</a></button>`;
    }

    function restartQuiz() {
      current = 0;
      score = 0;
      time = 1200;
      selectedAnswers = new Array(questions.length);
      document.getElementById("quiz-box").style.display = 'block';
      document.querySelector(".navigation").style.display = 'flex';
      document.getElementById("scorecard").innerHTML = '';
      loadQuestion(current);
      startTimer();
    }

    function startTimer() {
      clearInterval(timerInterval);
      timerInterval = setInterval(() => {
        if (time > 0) {
          time--;
          document.getElementById("timer").innerText = `Time Left: ${formatTime(time)}`;
        } else {
          showScore();
        }
      }, 1000);
    }

    function formatTime(seconds) {
      const mins = String(Math.floor(seconds / 60)).padStart(2, '0');
      const secs = String(seconds % 60).padStart(2, '0');
      return `${mins}:${secs}`;
    }

    loadQuestion(current);
    startTimer();
  </script>
</body>
</html>
