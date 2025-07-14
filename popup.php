<?php
$questions = [
    [
        "question" => "What is the capital of France?",
        "options" => ["London", "Berlin", "Paris", "Madrid"],
        "answer" => "Paris"
    ],
    [
        "question" => "Which planet is known as the Red Planet?",
        "options" => ["Earth", "Mars", "Jupiter", "Saturn"],
        "answer" => "Mars"
    ],
    [
        "question" => "Who wrote 'Hamlet'?",
        "options" => ["Shakespeare", "Dickens", "Tolkien", "Rowling"],
        "answer" => "Shakespeare"
    ]
];

$score = 0;
$total = count($questions);

$showResult = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $showResult = true;
    foreach ($questions as $index => $q) {
        $selected = $_POST["q$index"] ?? "";
        if ($selected === $q["answer"]) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>PHP Quiz with Close Button</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f3f4f6;
      padding: 20px;
    }
    .container, .result-box {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.15);
      position: relative;
    }
    h1, h2 {
      text-align: center;
      color: #2563eb;
    }
    .question {
      margin-bottom: 20px;
    }
    .question h3 {
      color: #374151;
    }
    .options label {
      display: block;
      margin: 5px 0;
    }
    .btn {
      background-color: #2563eb;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      display: block;
      margin: auto;
    }
    .close-btn {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 20px;
      color: #888;
      cursor: pointer;
      font-weight: bold;
    }
    .close-btn:hover {
      color: red;
    }
    .link {
      text-align: center;
      margin-top: 15px;
    }
    .link a {
      color: #2563eb;
      text-decoration: none;
    }
  </style>
</head>
<body>

<?php if ($showResult): ?>
  <div class="result-box" id="resultBox">
    <span class="close-btn" onclick="closeResult()"><a href="indexCa2.php">×</a></span>
    <h2>You scored <?= $score ?> out of <?= $total ?></h2>
    <div class="link"><a href="popup.php">Try Again</a></div>
  </div>
<?php else: ?>
  <div class="container" id="quizBox">
    <span class="close-btn" onclick="closeQuiz()"><a href="indexCa2.php">×</a></span>
    <h1 style="font-style: italic;">BrainBoost Free Trial</h1>
    <form method="post">
      <?php foreach ($questions as $index => $q): ?>
        <div class="question">
          <h3><?= ($index + 1) . ". " . htmlspecialchars($q["question"]) ?></h3>
          <div class="options">
            <?php foreach ($q["options"] as $option): ?>
              <label>
                <input type="radio" name="q<?= $index ?>" value="<?= htmlspecialchars($option) ?>" required />
                <?= htmlspecialchars($option) ?>
              </label>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
      <button type="submit" class="btn">Submit Quiz</button>
    </form>
  </div>
<?php endif; ?>

<script>
  function closeQuiz() {
    document.getElementById("quizBox").style.display = "none";
  }

  function closeResult() {
    document.getElementById("resultBox").style.display = "none";
  }
</script>

</body>
</html>
