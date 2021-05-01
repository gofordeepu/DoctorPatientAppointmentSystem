<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CureLogic</title>
    <link rel="stylesheet" type="text/css"href="../style/Index.css">
    <link rel="stylesheet" type="text/css"href="../style/feedback.css">
</head>
<body>
    <div class="wrap">  
        <header>
              <nav id="navbar">
                <div class="container">
                 <h1 class="logo coloring">CureLogic</h1>
                  <ul>
                    <li><a class="current" href="Index.php">Home</a></li>
                    <li><a href="Login.php">Patient Login</a></li>
                    <li><a href="dlogin.php">Doctor Login</a></li>
                    <li><a href="contact.php">Contact</a></li>
                  </ul>
                </div>
              </nav>
        </header>
        <?php
      if (isset($_SESSION['sent'])) {
        
          echo '<div class="msg" style="color:white; width:100%; background-color:green;text-align:center">
          Feedback sent
          </div>';
        session_destroy();
      }
      ?>
        <form action="../backend/feedback.php" method="POST">
        <div class="FeedbackArea">
        <div class="email">
         <input type="Email" placeholder="Enter your Email Id" name="Email" required>
        </div>
        <div class="feedback">
         <textarea name="Feedback" id="" cols="30" rows="10" placeholder="Enter your problem or feedback...."></textarea>
        </div>
        <div class="sendBtn">
         <button type="submit" name="sendBtn">Send</button>
        </div>
        </div>
        </form>
    </div>  
</body>
</html>