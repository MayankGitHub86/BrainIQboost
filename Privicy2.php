<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Privacy Policy - BrainBoost IQ</title>
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

  <div id="privacyModal" class="modal">
    <div class="modal-content">
      <h2>Privacy Policy</h2>
      <p>
        At BrainBoost IQ, your privacy is our top priority. When you take our quiz tests, we may collect information such as your name, email, test results, and usage patterns to enhance your experience.
      </p>
      <p>
        We never sell your data. All personal data is securely stored and used only to improve our platform and personalize your results. By using our services, you agree to the collection and use of information in accordance with this policy.
      </p>
      <p>
        For any concerns, feel free to reach out to our support team. Thank you for trusting BrainBoost IQ!
      </p>
      <button class="close-btn" id="closeModal"><a href="secondpage.php" style="text-decoration: none; color:white;">Close</a></button>
    </div>
  </div>

  <script>
    const modal = document.getElementById("privacyModal");
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
