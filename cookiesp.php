<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cookie Policy - BrainBoost IQ</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f0f4ff;
      color: #1e3a8a;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .modal {
      display: flex;
      position: fixed;
      z-index: 999;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.6);
      align-items: center;
      justify-content: center;
    }

    .modal-content {
      background-color: #ffffff;
      margin: auto;
      padding: 30px;
      border-radius: 10px;
      width: 90%;
      max-width: 600px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.3);
      text-align: center;
      animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
      from { transform: translateY(-50px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .close-btn {
      background-color: #ef4444;
      color: white;
      border: none;
      padding: 10px 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 20px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div id="cookiePolicyModal" class="modal">
    <div class="modal-content">
      <h2>Cookie Policy</h2>
      <p>
        Our website uses cookies to ensure the best experience for our users while taking quizzes, tracking progress, and improving our services.
      </p>
      <p>
        Cookies help us remember your preferences, understand how you interact with the platform, and personalize your quiz-taking experience. We do not use cookies to store any sensitive information or share your data with third parties without consent.
      </p>
      <p>
        By continuing to use our site, you consent to our use of cookies in accordance with this policy.
      </p>
      <button class="close-btn" id="closeModal"><a href="indexCa2.php" style="text-decoration: none; color:white;">Close</a></button>
    </div>
  </div>

  <script>
    const modal = document.getElementById("cookiePolicyModal");
    const closeBtn = document.getElementById("closeModal");

    closeBtn.onclick = () => {
      modal.style.display = "none";
    };

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>

</body>
</html>
