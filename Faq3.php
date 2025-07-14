<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>IQ BrainBoost FAQ</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      color: #111827;
      margin: 0;
      padding: 20px;
      position: relative;
    }

    h2 {
      text-align: center;
      color: #1d4ed8;
    }

    .icon {
      display: block;
      margin: 0 auto 20px;
      width: 100px;
      margin-left:35%;

    }

    .faq-container {
      max-width: 800px;
      margin: auto;
    }

    .faq-item {
      background-color: white;
      border-radius: 8px;
      margin: 10px 0;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .faq-question {
      padding: 15px 20px;
      font-weight: bold;
      color: #1d4ed8;
      cursor: pointer;
      position: relative;
    }

    .faq-question::after {
      content: '▼';
      position: absolute;
      right: 20px;
      transition: transform 0.3s;
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      padding: 0 20px;
      background-color: #f3f4f6;
      transition: max-height 0.3s ease, padding 0.3s ease;
    }

    .faq-item.active .faq-answer {
      max-height: 500px;
      padding: 15px 20px;
    }

    .faq-item.active .faq-question::after {
      transform: rotate(180deg);
    }

    .close-icon {
      position: absolute;
      top: 20px;
      right: 30px;
      font-size: 28px;
      color: #ef4444;
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
    }

    .close-icon:hover {
      color: #dc2626;
    }
  </style>
</head>
<body>

  <a href="secondpage.php" class="close-icon" title="Close">&times;</a>

  <!-- <img src="https://files.oaiusercontent.com/file-IkjcxkYH9f3RgoM3qb2ZsUrh?se=2024-04-06T16%3A54%3A13Z&sp=r&sv=2021-08-06&sr=b&sig=H2OJ1mGrg8YNvdn7reYhvNabYcvFrkqUlRHxUuUCPwA%3D" alt="IQ BrainBoost Icon" class="icon"> -->
  <i class='bx bxs-brain' class="icon" style="color:#0077ff;margin-left:45%;"> IQ BrainBoost Icon</i>

  <h2>FAQ (Frequently Asked Questions)</h2>

  <div class="faq-container">

    <div class="faq-item">
      <div class="faq-question">What is IQ BrainBoost?</div>
      <div class="faq-answer">
        IQ BrainBoost is a scientifically formulated supplement designed to enhance cognitive function, improve focus, and support memory retention. It contains a blend of natural ingredients known for their brain-boosting benefits.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">How does IQ BrainBoost work?</div>
      <div class="faq-answer">
        IQ BrainBoost works by increasing blood flow to the brain, providing essential nutrients, and supporting neurotransmitter activity. This leads to improved mental clarity, enhanced concentration, and better overall brain health.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Who can use IQ BrainBoost?</div>
      <div class="faq-answer">
        IQ BrainBoost is suitable for adults looking to enhance cognitive performance, including students, professionals, and seniors. However, pregnant or nursing women and individuals with medical conditions should consult a healthcare professional before use.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">What are the key ingredients in IQ BrainBoost?</div>
      <div class="faq-answer">
        The formula includes natural ingredients such as Ginkgo Biloba, Bacopa Monnieri, Omega-3 Fatty Acids, Caffeine, and L-Theanine.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">How should I take IQ BrainBoost?</div>
      <div class="faq-answer">
        The recommended dosage is one to two capsules daily, preferably with a meal.
      </div>
    </div>

    <div class="faq-item">
      <div class="faq-question">Are there any side effects?</div>
      <div class="faq-answer">
        IQ BrainBoost is generally well-tolerated. However, individual reactions may vary. It's advisable to consult your doctor before beginning any new supplement.
      </div>
    </div>

  </div>

  <script>
    document.querySelectorAll('.faq-question').forEach((question) => {
      question.addEventListener('click', () => {
        const parent = question.parentElement;
        parent.classList.toggle('active');
      });
    });
  </script>

</body>
</html>
