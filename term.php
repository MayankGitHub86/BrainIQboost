<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Terms of Service - BrainBoost IQ</title>
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

  <div id="termsModal" class="modal">
    <div class="modal-content">
      <h2>Terms of Service</h2>
      <p>
        Welcome to BrainBoost IQ Quiz Test. By accessing or using our website, you agree to comply with and be bound by the following terms and conditions.
      </p>
      <p>
        Our quizzes are for entertainment and educational purposes only. We do not guarantee the accuracy of results, and they should not be used as a substitute for professional advice.
      </p>
      <p>
        You must be at least 13 years old to use our services. We reserve the right to suspend or terminate access to users who violate these terms.
      </p>
      <p>
        Your use of this website constitutes acceptance of these terms. We may update them from time to time, so please check regularly.
      </p>
      <button class="close-btn" id="closeModal"><a href="indexCa2.php" style="text-decoration: none; color:white;">Close</a></button>
    </div>
  </div>

  <script>
    const modal = document.getElementById("termsModal");
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
