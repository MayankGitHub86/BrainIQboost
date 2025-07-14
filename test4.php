<?php
$questions = [
    [
        "question" => "Book is to Reading as Fork is to:",
        "options" => ["Drawing", "Writing", "Eating", "Cooking"],
        "answer" => "C"
    ],
    [
        "question" => "Which of the following is the opposite of 'Generous'?",
        "options" => ["Kind", "Selfish", "Charitable", "Kind-hearted"],
        "answer" => "B"
    ],
    [
        "question" => "Complete the analogy: Water is to River as Sand is to:",
        "options" => ["Beach", "Desert", "Glass", "Stone"],
        "answer" => "B"
    ],
    [
        "question" => "Which word is most similar to 'Happy'?",
        "options" => ["Joyful", "Sad", "Angry", "Bored"],
        "answer" => "A"
    ],
    [
        "question" => "If 'PAPER' is coded as 'QBRFQ', how is 'STONE' coded?",
        "options" => ["TUPNF", "UQTPF", "TSPNF", "UQONE"],
        "answer" => "B"
    ],
    [
        "question" => "Which of the following does not belong to the group?",
        "options" => ["Dog", "Cat", "Carrot", "Rabbit"],
        "answer" => "C"
    ],
    [
        "question" => "Find the missing number in the sequence: 2, 4, 8, 16, ___, 64",
        "options" => ["20", "32", "48", "56"],
        "answer" => "B"
    ],
    [
        "question" => "Which of the following is a synonym of 'Diligent'?",
        "options" => ["Lazy", "Careful", "Reckless", "Forgetful"],
        "answer" => "B"
    ],
    [
        "question" => "If all roses are flowers and some flowers fade quickly, which of the following statements is true?",
        "options" => ["All roses fade quickly", "Some roses fade quickly", "No roses fade quickly", "All flowers are roses"],
        "answer" => "B"
    ],
    [
        "question" => "Which of the following words is the odd one out?",
        "options" => ["Chair", "Table", "Sofa", "Car"],
        "answer" => "D"
    ],
    [
        "question" => "Rearrange the letters of 'LISTEN' to form a meaningful word:",
        "options" => ["SILENT", "TENSIL", "ELSTIN", "NISTEL"],
        "answer" => "A"
    ],
    [
        "question" => "Which of the following is a homophone of 'Flour'?",
        "options" => ["Flower", "Floor", "Flowerpot", "Flourish"],
        "answer" => "A"
    ],
    [
        "question" => "What comes next in the sequence: Monday, Tuesday, Wednesday, ___?",
        "options" => ["Thursday", "Friday", "Sunday", "Saturday"],
        "answer" => "A"
    ],
    [
        "question" => "Which of the following words is most similar to 'Brave'?",
        "options" => ["Fearful", "Cowardly", "Courageous", "Timid"],
        "answer" => "C"
    ],
    [
        "question" => "If 'HOT' is to 'COLD', then 'UP' is to:",
        "options" => ["Down", "Left", "Right", "Forward"],
        "answer" => "A"
    ],
    [
        "question" => "Which word is formed by rearranging the letters of 'RACT'?",
        "options" => ["Cart", "Crat", "Trac", "Ract"],
        "answer" => "A"
    ],
    [
        "question" => "Identify the odd one out:",
        "options" => ["Apple", "Banana", "Carrot", "Mango"],
        "answer" => "C"
    ],
    [
        "question" => "What is the meaning of 'Incessant'?",
        "options" => ["Stopping", "Continuous", "Delayed", "Occasional"],
        "answer" => "B"
    ],
    [
        "question" => "Which of the following words is an antonym of 'Ancient'?",
        "options" => ["Old", "Modern", "Historic", "Traditional"],
        "answer" => "B"
    ],
    [
        "question" => "Which of the following words is most similar to 'Bright'?",
        "options" => ["Dim", "Shiny", "Dark", "Faint"],
        "answer" => "B"
    ],
    [
        "question" => "Which of the following numbers is a prime number?",
        "options" => ["21", "27", "29", "33"],
        "answer" => "C"
    ],
    [
        "question" => "If you rearrange the letters of 'ACTOR', which word can you form?",
        "options" => ["Actor", "Cortar", "Carto", "Racto"],
        "answer" => "A"
    ],
    [
        "question" => "What is the next number in the sequence: 2, 3, 5, 8, 12, ___?",
        "options" => ["16", "18", "20", "21"],
        "answer" => "B"
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
