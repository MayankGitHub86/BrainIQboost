<?php
$questions = [
    [
        "question" => "A car travels 180 km in 3 hours. What is its average speed?",
        "options" => ["55 km/h", "60 km/h", "65 km/h", "70 km/h"],
        "answer" => "B"
    ],
    [
        "question" => "If a train moves at a speed of 90 km/h, how far will it travel in 4 hours?",
        "options" => ["360 km", "400 km", "380 km", "340 km"],
        "answer" => "A"
    ],
    [
        "question" => "A box contains 3 red, 5 green, and 2 blue balls. What is the probability of picking a green ball?",
        "options" => ["1/5", "5/10", "1/2", "1/3"],
        "answer" => "B"
    ],
    [
        "question" => "What is the missing number in the sequence: 2, 4, 8, 16, ___?",
        "options" => ["24", "32", "48", "64"],
        "answer" => "B"
    ],
    [
        "question" => "A person buys a shirt for $30 and sells it for $45. What is the profit percentage?",
        "options" => ["50%", "60%", "75%", "100%"],
        "answer" => "A"
    ],
    [
        "question" => "How many squares are there in a 4x4 grid?",
        "options" => ["16", "20", "30", "36"],
        "answer" => "C"
    ],
    [
        "question" => "A man can complete a task in 6 days. How many days will it take for 3 men to complete the same task?",
        "options" => ["2 days", "3 days", "4 days", "6 days"],
        "answer" => "B"
    ],
    [
        "question" => "If the perimeter of a rectangle is 50 cm and the length is 15 cm, what is the width?",
        "options" => ["5 cm", "10 cm", "12 cm", "15 cm"],
        "answer" => "B"
    ],
    [
        "question" => "What is the next number in the sequence: 1, 3, 6, 10, 15, ___?",
        "options" => ["18", "21", "24", "27"],
        "answer" => "B"
    ],
    [
        "question" => "A car covers 150 km in 2.5 hours. What is its average speed?",
        "options" => ["58 km/h", "60 km/h", "65 km/h", "70 km/h"],
        "answer" => "A"
    ],
    [
        "question" => "What is the value of x in the equation: 5x - 3 = 2x + 9?",
        "options" => ["4", "3", "2", "5"],
        "answer" => "A"
    ],
    [
        "question" => "How many triangles are there in the given figure?",
        "options" => ["12", "14", "16", "18"],
        "answer" => "B"
    ],
    [
        "question" => "A man spends 1/4 of his income on rent and 1/5 on food. What fraction of his income is left?",
        "options" => ["1/5", "1/3", "1/2", "1/4"],
        "answer" => "B"
    ],
    [
        "question" => "If a clock shows 7:25, what is the angle between the hour and minute hands?",
        "options" => ["37.5°", "50°", "55°", "75°"],
        "answer" => "B"
    ],
    [
        "question" => "A box contains 6 red balls, 4 green balls, and 2 blue balls. What is the ratio of red to green balls?",
        "options" => ["3:2", "2:3", "3:4", "4:3"],
        "answer" => "A"
    ], [
        "question" => "A factory produces 1200 items in 8 hours. How many items will it produce in 12 hours at the same rate?",
        "options" => ["1400", "1600", "1800", "2000"],
        "answer" => "B"
    ]
    , [
        "question" => "A person invests $5000 at 5% annual interest rate. What will be the simple interest after 3 years?",
        "options" => ["$750", "$500", "$150", "$1000"],
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
